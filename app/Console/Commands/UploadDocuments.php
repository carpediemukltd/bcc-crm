<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;

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
            ->join('users', 'document_manager_user.user_id', '=', 'users.id')
            ->join('document_managers', 'document_manager_user.document_manager_id', '=', 'document_managers.id')
            ->select('document_manager_user.user_id', 'users.first_name', 'users.email', 'document_managers.title', 'document_manager_user.due_date')
            ->groupBy('document_manager_user.user_id', 'users.first_name', 'users.email', 'document_manager_user.due_date', 'document_managers.title')
            ->get();
        $groupedResults = $data->groupBy('user_id');
        foreach ($groupedResults as $documents) {
            $userEmail = $documents[0]->email; // Assuming email is the same for a user in all records
            $userFirstName = $documents[0]->first_name; // Assuming first_name is the same for a user in all records

            $dueDate = Carbon::parse($documents[0]->due_date);
            $currentDate = Carbon::now();

            $email = [
                'email' => $userEmail
            ];
            $subject = '';
            foreach ($documents as $index => $document){
                $subject .= $document->title;
                $subject .= $index +1 == count($documents) ? ' ' : ', ';
            }

            $isDueDatePassed = $dueDate->isPast();
            if($isDueDatePassed){
                $daysDifference = $dueDate->diffInDays($currentDate);
                $subject .= " is already due - $daysDifference days ago";
                $email['subject'] = $subject;
            }else{
                $daysDifference = $currentDate->diffInDays($dueDate);
                $subject .= " is nearly due - $daysDifference days to go";
                $email['subject'] = $subject;
            }

            if($daysDifference <= 7 && $daysDifference % 2 == 1) {
                Mail::send('email.newRegistration', [
                    'first_name' => $userFirstName,
                    'documents' => $documents
                ], function ($message) use ($email) {
                    $message->to($email['email']);
                    $message->subject($email['subject']);
                });
            }
        }

    }
}
