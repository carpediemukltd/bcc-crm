<?php

namespace App\Jobs;

use App\Models\Company;
use App\Models\Marketing\CustomSmtp;
use App\Models\Marketing\MarketingCampaign as MarketingMarketingCampaign;
use App\Models\Marketing\MarketingCampaignReporting;
use App\Models\Marketing\MarketingCampaignSequence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AutomateBirthdayMarketingCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 50000;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $companies = Company::where('status', 'active')->get();
        if(count($companies)){
            foreach ($companies as $company) {
                $smtps = CustomSmtp::whereCompanyId($company->id)->get();
                $campaign = MarketingMarketingCampaign::whereCompanyId($company->id)->whereType('automate')->whereName('Birthday Wishes')->whereStatus('active')->first();
                if($campaign) {
                    $users = User::whereStatus('active')->where('company_id', $campaign->company_id)
                        ->whereIn('role', ['user', 'contact'])
                        ->get();
        
                    // Get active first sequence with start_date <= now
                    $activeSequence = MarketingCampaignSequence::where('marketing_campaign_id', $campaign->id)->first();
        
                    if (count($users) === 0 || count($smtps) === 0) {
                        continue;
                    }
    
        
                    if (!$activeSequence) {
                        continue;
                    }
        
                    foreach ($users as $user) {
                        if($user->dnd == '1'){
                            continue;
                        }
                        // Check if the user has a valid date of birth
                        if ($user->dob === null) {
                            continue;
                        }
                        
                        // Check if it's the user's birthday
                        $today = now('America/New_York')->format('Y-m-d');
        
                        if ($today != $user->dob) {
                            continue;
                        }
                        // Check if the birthday email has already been sent to this user today
                        if ($user->birthday_email_sent_date == $today) {
                            // Email already sent today, skip this user
                            continue;
                        }
        
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
                            $mail->setFrom($randomSmtp->username, $randomSmtp->username_display);  // Use the username as the email address and display name
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
        
                                // Update MarketingCampaignReporting for successful email
                                $reporting->fill([
                                    'email_sent' => '1',
                                    'sent_date'  => now()
                                ])->save();
                            } else {
        
                                // Update MarketingCampaignReporting for failed email
                                $reporting->fill([
                                    'email_failed' => '1'
                                ])->save();
                            }
                        } catch (Exception $e) {
                            
                            // Update MarketingCampaignReporting for exception
                            $reporting->fill([
                                'email_failed' => '1',
                                'failed_data'  => 'Exception: ' . $e->getMessage() . ' at line ' . $e->getLine(),
                            ])->save();
                        }
                        // Update the user's record to indicate that the birthday email has been sent today
                        $user->update(['birthday_email_sent_date' => $today]);

                    }
                }
                
            }
        }        
    }
}
