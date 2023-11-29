<?php

namespace App\Jobs;

use App\Imports\UsersImport as ImportsUsersImport;
use App\Models\User;
use App\Models\UserImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use PHPMailer\PHPMailer\PHPMailer;

class UsersImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $userImport;
    protected $companyId;
    public $timeout = 18000;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserImport $classUserImport, $companyId)
    {
        $this->userImport = $classUserImport;
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hasError = false;
        try {
            $import = new ImportsUsersImport($this->companyId, $this->userImport->id);
            Excel::import($import, public_path('csv/imports/') . $this->userImport->file_name);
            if ($import->getInsertedRowCount() == $import->getRowsCount() || ($import->getDuplicateRows() + $import->getInsertedRowCount())  == $import->getRowsCount()) {
                $this->userImport->status = 'completed';
                $this->userImport->save();
            }
        } catch (\Exception $e) {
            $hasError = true;
            $this->userImport->status = 'failed';
            $this->userImport->save();
        }

        try {
            $user = User::find($this->userImport->added_by);
            if ($hasError) {
                $templateBody = "<h2>Hey Team , Bulk upload through excel importer failed to process! </h2>
                <br><br>
                <p>File Name : <b>" . $this->userImport->file_name . "</b> </p>
                <br>
                <p>Uploaded By : <b>" . $this->userImport->file_name . " " . $user->last_name . "</b> </p>
                ";
            } else {
                $templateBody = "<h2>Hey Team , Bulk upload through excel importer successfully processed! </h2>
                <br><br>
                <p>File Name : <b>" . $this->userImport->file_name . "</b> </p>
                <br>
                <p>Uploaded By : <b>" . $this->userImport->file_name . " " . $user->last_name . "</b> </p>
                ";
            }


            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = 3;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = env('EMAIL_HOST');                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = env('EMAIL_USERNAME');                     //SMTP username
            $mail->Password = env('EMAIL_PASSWORD');                                //SMTP password
            $mail->SMTPSecure = env('EMAIL_SMTP');              //Enable implicit TLS encryption
            $mail->Port = env('EMAIL_PORT');
            $mail->setFrom(env('EMAIL_FROM'));
            $mail->isHTML(true); //Set email format to HTML

            $mail->Subject = env('APP_NAME') . " - Bulk contacts upload";

            foreach ([

                $user->first_name    => $user->email
            ] as $rec_name => $rec_email) {
                $mail->addAddress($rec_email, $rec_name);
                $mail->Body    = $templateBody;
                $mail->send();
            }
        } catch (\Exception $e) {
        }
    }
}
