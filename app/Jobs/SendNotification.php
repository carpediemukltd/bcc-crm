<?php

namespace App\Jobs;

use App\Models\Deal;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dataClass;
    public $timeout = 18000;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataClass = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);
        $type = $this->dataClass['type'];
        $id   = $this->dataClass['id'];

        if ($type == 'contact_added') {
            $contact    = User::whereId($id)->first();
            $companyId  = $contact->company_id;
            $userIds    = NotificationSetting::whereSettingName('notification_contact_added')
            ->where('status', 'enabled')
            ->whereIn('user_id', function ($query) use ($companyId) {
                $query->select('id')
                    ->from('users')
                    ->where('company_id', $companyId)
                    ->whereIn('role', ['admin']);
            })
            ->pluck('user_id');
            $message    = "New Contact Named " . $contact->first_name . " has been added.";
            $targetUrl  =  '/contact/' . $contact->id . "/details";
            
        }
        if ($type == 'deal_added') {
            $deal       = Deal::whereId($id)->first(); 
            $contact    = User::whereId($deal->user_id)->first();
            $companyId  = $contact->company_id;
            $stage = Stage::whereId($deal->stage_id)->first();
            $userIds = NotificationSetting::with('detail')
                ->whereSettingName('notification_specific_deal_stage')
                ->where('status', 'enabled')
                ->whereHas('detail', function ($query) use ($stage) {
                    $query->where('stage_id', $stage->id);
                })
                ->whereIn('user_id', function ($query) use ($companyId) {
                    $query->select('id')
                        ->from('users')
                        ->where('company_id', $companyId)
                        ->whereIn('role', ['admin']);
                })->pluck('user_id');

            $message    = "New deal moved to stage named " . $stage->title;
            $targetUrl  =  '/stages/' . $stage->id;
        }
        if ($type == 'round_robin_owner_added') {
            $userIds = NotificationSetting::whereUserId($id)->whereSettingName('notification_round_robin')
                ->where('status', 'enabled')
                ->pluck('user_id');

            $message    = "New contact has been assigned to you!";
            $targetUrl  =  '/roundrobin';
        }
        $admins = User::whereIn('id', $userIds)->get();
        if ($admins->count()) {
            foreach ($admins as $admin) {
                $dataToPost = array();
                $dataToPost['user_id']    = $admin->id;
                $dataToPost['target_url'] = $targetUrl;
                $dataToPost['title']      = $message;
                $dataToPost['is_read']    = '0';
                Notification::create($dataToPost);
                User::whereId($admin->id)->increment('bell_notification_count');
                $subject = env("APP_NAME") . " - Notification";
                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host         = env('MAIL_HOST');
                    $mail->SMTPAuth     = true;
                    $mail->Username     = env('MAIL_USERNAME');
                    $mail->Password     = env('MAIL_PASSWORD');
                    $mail->SMTPSecure   = env('MAIL_ENCRYPTION');
                    $mail->Port         = env('MAIL_PORT');
                    $mail->setFrom(env('MAIL_USERNAME'));
                    $mail->addAddress($admin->email);
                    $mail->isHTML(true);
                    $mail->Subject      = $subject;
                    $mail->Body         = $message;
                    $mail->send();
                } catch (Exception $e) {
                }
            }
        }
    }
}
