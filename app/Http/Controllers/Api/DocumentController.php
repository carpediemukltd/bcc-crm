<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Jobs\PostFilesToOcrolus;
use App\Services\ApiResponse;
use App\Models\Documents;
use Illuminate\Http\Request;
use Validator;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $ocrolusCSV = auth()->user()->ocrolus_csv_path;
        $year                         = date('Y');
        $yearToDateProfitLoss         = $year . "_Year-to-date_(or_within_60_days_max)_Profit_&_Loss";
        $yearToDateProfitBalanceSheet = $year . "_Year-to-date_(or_within_60_days_max)_Balance_Sheet";
        $all_doc_type  = [
            "expedited_products" => [
                "Completed_Application" => [], "Past_6_Months_of_Bank_Statements" => [], "Driver's_License" => []
            ],
            "sba_products" => [
                "Completed_Application" => [], "Past_6_Months_of_Bank_Statements" => [], "Past_3_Years_of_Personal_&_Corporate_Tax_Returns" => [],
                $yearToDateProfitLoss => [],  $yearToDateProfitBalanceSheet => [], "Completed_Debt_Schedule" => [],
                "Personal_Financial_Statement" => [], "Signed_Contingent_Consulting_Retainer_Agreement" => [], "Driver's_License_Voided_Check" => [], "Miscellaneous_&_Formation_Documents" => []
            ]
        ];

        $documents = Documents::where('user_id', $userId)->get();
        if ($documents) {
            $all_docs = [];
            foreach ($documents as $document) {
                $all_docs[$document['type']][$document['file_group_name']][] = [
                    'document_id' => $document['id'],
                    'file_name' => $document['file_name'],
                    'file_path' => $document['file_path'],
                    'ocrolus_doc_verification_status' => $document['ocrolus_doc_verification_status'],
                    'ocrolus_book_summary_csv_path'   => $document['ocrolus_book_summary_csv_path']
                ];
            }

            foreach ($all_doc_type as $type => $rec_doc_type) {
                foreach ($rec_doc_type as $doc_type_name => $rec_doc) {
                    if (isset($all_docs[$type][$doc_type_name]) && !empty($all_docs[$type][$doc_type_name])) {
                        $all_doc_type[$type][$doc_type_name] = $all_docs[$type][$doc_type_name];
                    }
                }
            }
        }

        $content = [
            'Completed_Application' => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
            "Driver's_License" => "A driver's license or official form of identification is a necessary component to facilitate processing your loan request. BCCUSA and our partner banks take anti fraud measures very seriously. At times, a passport is a sufficient form of identification that can be produced in lieu of your driver's license. ",
            'Past_6_Months_of_Bank_Statements' => "Your corporate bank statements are a fundamental requirement for determining loan qualification. It is important to provide each and every page associated the month's full statement (even if it's a blank page). This protects against fraud and ensures we, and our bank partners, have an accurate portrayal of your cash flow.",
            'Signed_Contingent_Consulting_Retainer_Agreement'  => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
            'Past_3_Years_of_Personal_&_Corporate_Tax_Returns'  => 'Your Personal Tax Returns showcase your ability to service all your personal obligations via your household income. Every page of your return has a purpose. When submitting your personal tax returns for review, please ensure that all pages are present.',
            '2022_Year-to-date_(or_within_60_days_max)_Profit_&_Loss'  => " Your interim financials (profit & loss and balance sheet) provide a year-to-date view for banks to understand how your business is performing in the present year. In addition to your most recently filed corporate tax return, interim financials are an integral component for a banking institution to make a lending decision. Since these are unaudited financials, it's important to showcase as much strength as possible. Your BCCUSA at consultant will at times make suggestions for slight pivots that can be the difference between qualifying or not. This is value you can only receive from working with BCCUSA.",
            'Completed_Debt_Schedule' =>  "Your interim financials (profit & loss and balance sheet) provide a year-to-date view for banks to understand how your business is performing in the present year. In addition to your most recently filed corporate tax return, interim financials are an integral component for a banking institution to make a lending decision. Since these are unaudited financials, it's important to showcase as much strength as possible. Your BCCUSA at consultant will at times make suggestions for slight pivots that can be the difference between qualifying or not. This is value you can only receive from working with BCCUSA."
        ];

        $data['doc_type_title'] = ['expedited_products' => 'Expedited Products', 'sba_products' => 'SBA Products'];
        $data['all_documents'] = $all_doc_type;
        $data['content'] = $content;
        $data['ocrolus_csv_path'] = $ocrolusCSV;
        $data['showMenu'] = 1;
        $data['ocrolusCSVPath'] = 1;
        return ApiResponse::success($data, '', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type'              => 'required',
            'file_group_name'   => 'required',
            'file'              => 'required|file|mimes:pdf,jpeg,png,jpg, JPEG, PNG, JPG, MPEG, heif, heic, heif-sequence, heic-sequence', // File validation for PDF and images
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);
        }
        $type           = $request->type;
        $fileGroupName  = $request->file_group_name;
        $fileData = $request->file('file'); // Get the uploaded file
        $fileName = $fileData->getClientOriginalName();

        $existingDoc = Documents::where('user_id', auth()->user()->id)->where('file_name', $fileName)->first();
        if ($existingDoc) {
            return ApiResponse::error('Duplicate File, please choose different.', 409); // HTTP status code 409 for conflict
        }
        $path = 'users/' . auth()->user()->id . "/" . time() . '-' . preg_replace('/[^a-z0-9]/i', '_', $fileName);
        // Storage::disk('s3')->put($path, file_get_contents($fileData), 'public');
        Storage::disk('s3')->put($path, file_get_contents($fileData), ['ContentDisposition' => 'attachment']);

        $url = Storage::disk('s3')->url($path);

        if ($url) {
            $doc = Documents::create([
                'user_id'         => auth()->user()->id,
                'type'            => $type,
                'file_group_name' => $fileGroupName,
                'file_name'       => $fileName,
                'file_path'       => $url,
                'ocrolus_doc_page_count'=> 0

            ]);

            //add to ocrolus
            if (in_array($fileGroupName, array(
              'Past_6_Months_of_Bank_Statements',
              'Past_3_Years_of_Personal_&_Corporate_Tax_Returns',
              'Miscellaneous_&_Formation_Documents'
            )) || preg_match('/^\d{4}_Year-to-date_\(or_within_60_days_max\)_/', $fileGroupName)) {
              PostFilesToOcrolus::dispatch($doc);
            }
            $data['document_path'] = $url;

            return ApiResponse::success($data, 'Document uploaded successfully.', 200);
        } else {
            return ApiResponse::error('Oops! something went wrong!', 409); // HTTP status code 409 for conflict

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
