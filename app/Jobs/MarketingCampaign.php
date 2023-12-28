<?php

namespace App\Jobs;

use App\Models\Marketing\CustomSmtp;
use App\Models\Marketing\MarketingCampaign as MarketingMarketingCampaign;
use App\Models\Marketing\MarketingCampaignReporting;
use App\Models\Marketing\MarketingCampaignSequence;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MarketingCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 50000;
    private $campaignClass;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MarketingMarketingCampaign $campaign)
    {
        $this->campaignClass = $campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $campaign   = MarketingMarketingCampaign::with(['marketingCampaignSequence', 'marketingCampaignUser'])->find($this->campaignClass->id);
        $smtps      = CustomSmtp::whereCompanyId($this->campaignClass->company_id)->get();
       
        // Get active first sequence with start_date <= now
        $activeSequence = MarketingCampaignSequence::where('marketing_campaign_id', $campaign->id)
        ->where('start_date', '<=', now()->toDateTimeString())
        ->where('status', '!=', 'completed')
        ->orderBy('start_date', 'ASC')
        ->first();

        if (!$activeSequence) {
            // No active sequence found, mark the campaign as completed
            $campaign->update(['status' => 'completed']);
            return;
        }
        if (count($campaign->marketingCampaignUser) === 0 || count($smtps) === 0) {
            return;
        }

        if (!$activeSequence) {
            return;
        }
       
        

        foreach ($campaign->marketingCampaignUser as $user) {
            if($user->user->dnd == '1'){
                continue;
            }
            $subject = $activeSequence->subject;
            $body    = $activeSequence->body;

            $imageTracking = '<br /><img src="https://crm.lendotics.com/image/' . $user->uuid . '?sequence=' . $activeSequence->id . '" height="1px" width="1px" />';
            $unsubscribeUrl = env('APP_URL') . "/marketing-unsubscribe/" . $user->user->uuid;
            $dndOption = '<div style="padding:20px;"><center><a target="_blank" href="' . $unsubscribeUrl . '">Unsubscribe</a></center></div>';
            $body .= $imageTracking;
            $body .= $dndOption;
        
            $userEmail = $user->user->email;

            // Pick a random SMTP configuration
            $randomSmtp = $smtps->random();

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host         = $randomSmtp->host;
                $mail->SMTPAuth     = true;
                $mail->Username     = $randomSmtp->username;
                $mail->Password     = $randomSmtp->password;
                $mail->SMTPSecure   = $randomSmtp->encryption_type;
                $mail->Port         = $randomSmtp->port;
                $mail->setFrom($randomSmtp->username, $randomSmtp->username_display);  // Use the username as the email address and display name
                $mail->addAddress($userEmail);

                // Set "Reply-To" address and display name
                $mail->addReplyTo($randomSmtp->reply_to, $randomSmtp->username_display);

                $mail->isHTML(true);
                $mail->Subject      = $subject;
                $mail->Body         = $body;

                 // Create a MarketingCampaignReporting instance for the current email
                 $reporting = new MarketingCampaignReporting([
                    'user_id'                        => $user->user_id,
                    'marketing_campaign_sequence_id' => $activeSequence->id,
                    'custom_smtp_id'                 => $randomSmtp->id,
                ]);

                 // Send email
                 if ($mail->send()) {
                    // Update MarketingCampaignUser columns based on successful email sending
                    $user->update([
                        'email_sent' => '1',
                    ]);
                     // Update MarketingCampaignReporting for successful email
                     $reporting->fill([
                        'email_sent' => '1',
                        'sent_date' => now()
                    ])->save();
                } else {
                    // Update MarketingCampaignUser columns based on failed email sending
                    $user->update([
                        'email_failed' => '1',
                    ]);
                      // Update MarketingCampaignReporting for failed email
                      $reporting->fill([
                        'email_failed' => '1'
                    ])->save();
                }
            } catch (Exception $e) {
                // Handle exceptions if needed
                $user->update([
                    'email_failed' => '1',
                ]);
                // Update MarketingCampaignReporting for exception
                $reporting->fill([
                    'email_failed' => '1',
                    'failed_data' => 'Exception: ' . $e->getMessage() . ' at line ' . $e->getLine(),
                    ])->save();
            }
        }
         // Mark the sequence as completed
        $activeSequence->update(['status' => 'completed']);

        // Mark the campaign as completed if it was the last sequence
        $lastSequence = MarketingCampaignSequence::where('marketing_campaign_id', $campaign->id)
            ->where('status', '!=', 'completed')
            ->orderBy('start_date', 'DESC')
            ->first();

        if ($lastSequence) {
            $campaign->update(['status' => 'active']);
        }else{
            $campaign->update(['status' => 'completed']);
        }
    }
}
