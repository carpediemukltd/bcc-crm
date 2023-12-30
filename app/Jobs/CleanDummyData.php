<?php

namespace App\Jobs;

use App\Models\Deal;
use App\Models\DocumentManagerUser;
use App\Models\Documents;
use App\Models\MagicLink;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\NotificationSettingDetail;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserOwner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CleanDummyData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $dataClass;
    public $timeout = 18000;


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
        // Perform the query based on form data using the User model
        $query = User::query();

        if ($this->dataClass['operator'] === 'contains') {
            $query->where($this->dataClass['column'], 'LIKE', '%' . $this->dataClass['value'] . '%');
        } elseif ($this->dataClass['operator'] === 'starts_with') {
            $query->where($this->dataClass['column'], 'LIKE', $this->dataClass['value'] . '%');
        } elseif ($this->dataClass['operator'] === 'ends_with') {
            $query->where($this->dataClass['column'], 'LIKE', '%' . $this->dataClass['value']);
        } else {
            $query->where($this->dataClass['column'], $this->dataClass['operator'], $this->dataClass['value']);
        }

        // Fetch the results
        $userIds = $query->pluck('id');
        // Delete deals
        Deal::whereIn('user_id', $userIds)->delete();

        // Delete documents and related records
        Documents::whereIn('user_id', $userIds)->each(function ($doc) {
            DB::table('ocrolus_book_detail')->where('document_id', $doc->id)->delete();
            DB::table('ocrolus_book_level_fraud')->where('document_id', $doc->id)->delete();
            DB::table('ocrolus_book_summaries')->where('book_pk', $doc->ocrolus_book_pk)->delete();
        });
        Documents::whereIn('user_id', $userIds)->delete();

        // Delete report details and queries
        $reportQueryIds = DB::table('report_queries')->whereIn('user_id', $userIds)->pluck('id')->toArray();
        DB::table('report_details')->whereIn('report_query_id', $reportQueryIds)->delete();
        DB::table('report_queries')->whereIn('id', $reportQueryIds)->delete();

        // Delete other related records
        UserDetails::whereIn('user_id', $userIds)->delete();
        UserOwner::whereIn('user_id', $userIds)->delete();
        DocumentManagerUser::whereIn('user_id', $userIds)->delete();
        MagicLink::whereIn('user_id', $userIds)->delete();
        Notification::whereIn('user_id', $userIds)->delete();

        // Delete notification settings and details
        $notificationSettingIds = NotificationSetting::whereIn('user_id', $userIds)->pluck('id')->toArray();
        NotificationSettingDetail::whereIn('notification_settings_id', $notificationSettingIds)->delete();
        NotificationSetting::whereIn('id', $notificationSettingIds)->delete();

        // Step 2: Delete users
        User::whereIn('id', $userIds)->delete();
        // Get the current date in the desired format
        $formattedDate = date('d, F Y');

        // Email Subject
        $subject = "CRM-Lendotics - Data Removal Report - $formattedDate";

        // Email Body
        $body = "<p>Dear User,</p>";
        $body .= "<p>This is to inform you that the requested data removal process has been completed successfully on $formattedDate.</p>";
        $body .= "<p>The following actions were taken:</p>";
        $body .= "<ul>";
        $body .= "<li>User records matching the criteria were deleted.</li>";
        $body .= "<li>Associated deals, documents, and other related records were also removed.</li>";
        $body .= "</ul>";
        $body .= "<p>If you have any questions or concerns, please contact our support team.</p>";
        $body .= "<p>Thank you for using our services.</p>";

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
            $mail->addAddress($this->dataClass['userEmail']);
            $mail->isHTML(true);
            $mail->Subject      = $subject;
            $mail->Body         = $body;
            $mail->send();
        } catch (Exception $e) {
            DB::table('testings')->insert(['payload'=> $e->getMessage()]);
        }
    }
}
