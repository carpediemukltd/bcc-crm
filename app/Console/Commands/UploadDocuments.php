<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;
use Twilio\Rest\Client;

class UploadDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to user to upload documents';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = DB::table('document_manager_user')
            ->where('document_uploaded', 0)
            ->where('due_date', '!=', '')
            ->join('users', 'document_manager_user.user_id', '=', 'users.id')
            ->join('document_managers', 'document_manager_user.document_manager_id', '=', 'document_managers.id')
            ->select('document_manager_user.user_id', 'document_manager_user.due_date', 'users.first_name', 'users.email', 'users.phone_number', 'document_managers.title', 'document_manager_user.due_date')
            ->groupBy('document_manager_user.user_id', 'document_manager_user.due_date', 'users.first_name', 'users.email', 'users.phone_number', 'document_manager_user.due_date', 'document_managers.title')
            ->get();
        $groupedResults = $data->groupBy('user_id');
        foreach ($groupedResults as $documents) {
            try{
                $userEmail = $documents[0]->email;
                $userFirstName = $documents[0]->first_name;
                $userPhoneNumber = $documents[0]->phone_number;

                $dueDate = Carbon::parse($documents[0]->due_date);
                $currentDate = Carbon::now();

                $email = [
                    'email' => $userEmail
                ];
                $subject = '';
                foreach ($documents as $index => $document) {
                    $subject .= $document->title;
                    $subject .= $index + 1 == count($documents) ? ' ' : ', ';
                }

                $isDueDatePassed = $dueDate->isPast();

                if ($isDueDatePassed) {
                    $daysDifference = $dueDate->diffInDays($currentDate);
                    $this->info('A');
                } else {
                    $daysDifference = $currentDate->diffInDays($dueDate);
                }

                $template = '';
                $message = '';
                if ($isDueDatePassed) {
                    $template = 'email.duedate.passed';
                    $email['subject'] = "BCCUSA Documents Overdue by $daysDifference Days";
                    $message = "Attention $userFirstName! The documents required for your bank financing application with BCCUSA are now overdue by $daysDifference days. Navigate https://dashboard.bccusa.com/ to access your bank portal to securely upload. For a more optimized mobile experience, download the IOS App or Android App. Reply Stop to opt out.";
                } else {
                    $template = 'email.duedate.notpassed';
                    $email['subject'] = "BCCUSA Bank Financing: Documents Pending & Due in $daysDifference Days";
                    $message = "Hi $userFirstName! The documents required for your bank financing application with BCCUSA are due in $daysDifference days. Navigate https://dashboard.bccusa.com/ to access your bank portal to securely upload. For a more optimized mobile experience, download the IOS App or Android App. Reply Stop to opt out.";
                }


                if($daysDifference == 0 || ($daysDifference <= 7 && $daysDifference % 2 ==1)){
                    $this->info($template);
                    $this->info($email['email']);
                    $this->info($message);
                    Mail::send($template, [
                        'first_name' => $userFirstName,
                        'documents' => $documents,
                        'days' => $daysDifference
                    ], function ($message) use ($email) {
                        $message->to($email['email']);
                        $message->subject($email['subject']);
                    });

                    $twilioPhoneNumber = env('TWILIO_NUMBER');
                    $twilioSid = env('TWILIO_SID');
                    $twilioToken = env('TWILIO_AUTH_TOKEN');
                    $client = new Client($twilioSid, $twilioToken);
                    // Remove spaces from the phone number
                    $toPhoneNumber = str_replace(' ', '', $userPhoneNumber);
                    $client->messages->create(
                        $toPhoneNumber,
                        [
                            'from' => $twilioPhoneNumber,
                            'body' => $message,
                        ]
                    );
                }
            } catch (\Exception $ex){

            }
        }
    }
}
