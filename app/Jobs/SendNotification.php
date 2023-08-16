<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\NotificationSetting;
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
            $userIds = NotificationSetting::whereSettingName('notification_contact_added')->where('status', 'enabled')->pluck('user_id');
            $contact = User::whereId($id)->first();
            $message = "New Contact Named ".$contact->first_name." has been added."; 
        }
        $admins = User::whereIn('role', ['superadmin', 'admin'])->whereIn('id', $userIds)->get();
        if($admins->count()){
            foreach ($admins as $admin) {
                $dataToPost = array();
                $dataToPost['user_id']    = $admin->id;
                $dataToPost['target_url'] = '/contact/edit/'.$contact->id;
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
