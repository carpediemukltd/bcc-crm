<?php

namespace App\Jobs;

use App\Models\Marketing\CustomSmtp;
use App\Models\Marketing\MarketingCampaign as MarketingMarketingCampaign;
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

        if (count($campaign->marketingCampaignUser) === 0 || count($smtps) === 0) {
            return;
        }

        $sequence = $campaign->marketingCampaignSequence->first();

        if (!$sequence) {
            return;
        }
        $subject = $sequence->subject;
        $body    = $sequence->body;

        foreach ($campaign->marketingCampaignUser as $user) {
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

                 // Send email
                 if ($mail->send()) {
                    // Update MarketingCampaignUser columns based on successful email sending
                    $user->update([
                        'email_sent' => '1',
                    ]);
                } else {
                    // Update MarketingCampaignUser columns based on failed email sending
                    $user->update([
                        'email_failed' => '1',
                    ]);
                }

                $mail->send();
            } catch (Exception $e) {
                // Handle exceptions if needed
                $user->update([
                    'email_failed' => '1',
                ]);
            }
        }
        // Mark the campaign as completed
        $campaign->update([
            'status' => 'completed',
        ]);
    }
}
