<?php

namespace App\Jobs;

use App\Models\Deal;
use App\Models\Marketing\CustomSmtp;
use App\Models\Marketing\MarketingCampaign as MarketingMarketingCampaign;
use App\Models\Marketing\MarketingCampaignReporting;
use App\Models\Marketing\MarketingCampaignSequence;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AutomateDealCompletionMarketingCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 50000;
    private $dealClass;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Deal $deal)
    {
        $this->dealClass = $deal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->dealClass->user_id);
    
        $smtps = CustomSmtp::whereCompanyId($user->company_id)->get();
        $campaign = MarketingMarketingCampaign::whereCompanyId($user->company_id)
            ->whereType('automate')
            ->whereName('Deal Completed')
            ->whereStatus('active')
            ->whereStageId($this->dealClass->stage_id)
            ->first();
        if($user->dnd == '1'){
           return;
        }
        if ($campaign) {
            // Get active first sequence with start_date <= now
            $activeSequence = MarketingCampaignSequence::where('marketing_campaign_id', $campaign->id)->first();
    
            if (count($smtps) > 0 && $activeSequence) {
                $subject = $activeSequence->subject;
                $body    = $activeSequence->body;
    
                $imageTracking = '<br /><img src="https://crm.lendotics.com/image/' . $user->uuid . '?sequence=' . $activeSequence->id . '" height="1px" width="1px" />';
                $unsubscribeUrl = env('APP_URL') . "/marketing-unsubscribe/" . $user->uuid;
                $dndOption = '<div style="padding:20px;"><center><a target="_blank" href="' . $unsubscribeUrl . '">Unsubscribe</a></center></div>';
                $body .= $imageTracking;
                $body .= $dndOption;
    
                $userEmail  = $user->email;
                $body       = str_replace('{name}', $user->full_name, $body);
    
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
                    $mail->setFrom($randomSmtp->username, $randomSmtp->username_display);
                    $mail->addAddress($userEmail);
    
                    // Set "Reply-To" address and display name
                    $mail->addReplyTo($randomSmtp->reply_to, $randomSmtp->username_display);
    
                    $mail->isHTML(true);
                    $mail->Subject      = $subject;
                    $mail->Body         = $body;
    
                    // Create a MarketingCampaignReporting instance for the current email
                    $reporting = new MarketingCampaignReporting([
                        'user_id'                        => $user->id,
                        'marketing_campaign_sequence_id' => $activeSequence->id,
                        'custom_smtp_id'                 => $randomSmtp->id,
                    ]);
    
                    // Send email
                    if ($mail->send()) {
                        // Update the columns accordingly
                        $user->marketingCampaignUser()->update([
                            'email_sent' => '1',
                        ]);
    
                        // Update MarketingCampaignReporting for successful email
                        $reporting->fill([
                            'email_sent' => '1',
                            'sent_date'  => now()
                        ])->save();
                    } else {
                        // Update the columns accordingly
                        $user->marketingCampaignUser()->update([
                            'email_failed' => '1',
                        ]);
    
                        // Update MarketingCampaignReporting for failed email
                        $reporting->fill([
                            'email_failed' => '1'
                        ])->save();
                    }
                } catch (Exception $e) {
                    // Handle exceptions if needed
                    $user->marketingCampaignUser()->update([
                        'email_failed' => '1',
                    ]);
    
                    // Update MarketingCampaignReporting for exception
                    $reporting->fill([
                        'email_failed' => '1',
                        'failed_data'  => 'Exception: ' . $e->getMessage() . ' at line ' . $e->getLine(),
                    ])->save();
                }
            }
        }
    }
    
}
