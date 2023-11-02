<?php

namespace App\Jobs;

use App\Models\Documents;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostFilesToOcrolus implements ShouldQueue
{
    private $loanDoc;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 18000;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Documents $doc)
    {
        $this->loanDoc = $doc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);
        $doc = Documents::find($this->loanDoc->id);
        $token  = $this->grantAuthenticationTokenOcrolus();
        $token  = $token->access_token;
        $fileName = $doc->file_name;
        $filepath = $doc->file_path;
        //create book
        $rand   = mt_rand(1, 1000);
        $length = 10; // length of the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // characters to be used in the random string
        $randomString = substr(str_shuffle($characters), 0, $length); // generate random string

        $time   = time() . "_" . $rand . "_" . $randomString;
        $bookName = "BankPortal" . " " . $doc->user_id . "-User_" . $time;
        $createBook = $this->createBook($token, $bookName);
        if ($createBook && $createBook->status == 200) {
            $bookUuid = $createBook->response->uuid;
            $bookPk    = $createBook->response->pk;
            $check = $this->uploadPDFtoBook($token, $filepath, $fileName, $bookUuid);
            if (isset($check->status) && $check->status == 200) {
                $response = $check->response;
                $uploaded_docs = $response->mixed_uploaded_docs;
                foreach ($uploaded_docs as $uploaded_doc) {
                    $doc->ocrolus_mixed_doc_id      = $uploaded_doc->id;
                    $doc->ocrolus_mixed_doc_pk      = $uploaded_doc->pk;
                    $doc->ocrolus_mixed_doc_uuid    = $uploaded_doc->uuid;
                    $doc->ocrolus_doc_page_count    = $uploaded_doc->page_count;
                    $doc->ocrolus_status            = '1';
                    $doc->ocrolus_book_uuid         = $bookUuid;
                    $doc->ocrolus_book_pk           = $bookPk;
                    $doc->save();
                }
            }
        }
    }
    private function grantAuthenticationTokenOcrolus()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('OCROLUS_TOKEN_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "grant_type":"' . env('OCROLUS_GRANT_TYPE') . '",
            "audience":"' . env('OCROLUS_AUDIENCE') . '",
            "client_id":"' . env('OCROLUS_CLIENT_ID') . '",
            "client_secret":"' . env('OCROLUS_CLIENT_SECRET') . '"
        }',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    private function uploadPDFtoBook($token, $filePath, $fileName, $bookUuid)
    {
        // 'https://loan.bccusa.com/a53b87a4-d3bb-4d90-a01b-8e5ca616892d_2.pdf',
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('OCROLUS_UPLOAD_MIX_DOC_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',

            CURLOPT_POSTFIELDS => array('file' => curl_file_create(
                $filePath,
                'application/pdf',
                $fileName
            ), 'book_uuid' => $bookUuid),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: multipart/form-data',
                "Authorization: Bearer $token"
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error: ' . curl_error($curl);
        }
        curl_close($curl);
        return json_decode($response);
    }
    private function createBook($token, $bookName)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('OCROLUS_ADD_BOOK'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "is_public":"' . true . '",
            "name":"' . $bookName . '"
        }',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                "Authorization: Bearer $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}
