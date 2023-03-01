<?php

namespace App\Jobs;

use App\Models\CustomLeadLog;
use App\Models\LoanLead as ModelsLoanLead;
use App\Models\LoanLeadDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LoanLead implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $loanLeadHere;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ModelsLoanLead $loanLead)
    {
        $this->loanLeadHere = $loanLead;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // die;
        $loanLead = ModelsLoanLead::whereId($this->loanLeadHere->id)->first();
        if ($loanLead) {
            $customFields = array();
            //Add data to GHL

            //contact fields
            $fieldsData['firstName']    = $loanLead->first_name;
            $fieldsData['lastName']     = $loanLead->last_name;
            $fieldsData['email']        = $loanLead->email;
            $fieldsData['phone']        = $loanLead->phone;

            //custom fields
            $customFields['W2D9bX4pzfTwIClAFo51'] = $loanLead->referral_source;
            $customFields['Kk5Ap5PaMAHa6CcEASgA'] = $loanLead->promo;
            $customFields['OV8N8CGUaPNfJUnTeZBp'] = $loanLead->loan_type_sub;
            $customFields['F3jeEiw76TPoGZmrlOuu'] = $loanLead->loan_amount;
            $customFields['jTWbQRO4IxTRF7FRicS9'] = $loanLead->monthly_payment;
            $customFields['utB2txg6OpbN0AC8OVOC'] = $loanLead->loan_term;
            $customFields['HIAbisVhsNGFosfE0E0y'] = $loanLead->interest_rate;
            $customFields['A1adzMRjpTWqHztBiXnq'] = $loanLead->apr_with_fees;
            $customFields['M8sIQ4WMfLS6H8dboIgM'] = env('APP_URL').'/iframe/update-application-documents/'.$loanLead->uuid;
            

            if (count($customFields)) {
                $fieldsData['customField'] = $customFields;
            }
            $customTags[]        = 'bcc_lead_calculator';
            $fieldsData['tags'] = $customTags;
            if (count($fieldsData)) {
                $url  = 'https://rest.gohighlevel.com/v1/contacts/';
                $post = $fieldsData;
                $headers = [
                    'Authorization: Bearer'.' '.env('GOHIGHLEVEL_API_KEY'),
                    'Content-Type: application/x-www-form-urlencoded'
                ];


                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                if (!empty($post)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                }

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                // execute!
                $response = curl_exec($ch);

                $response = json_decode($response, true);
                if (isset($response) && !empty($response)) {
                    $type   = 'GoHighLevel Contact';
                    //contact created
                    if (isset($response['contact'])) {
                        $contactId = $response['contact']['id'];
                        ModelsLoanLead::whereId($loanLead->id)->update(['ghl_contact_id' => $contactId]);
                        $exception  = '';
                        $status     = 'succeeded';
                    }
                    //general error msg
                    elseif (isset($response['msg'])) {
                        $exception  = $response['msg'];
                        $status     = 'failed';
                    } else {
                        $exception  = $response;
                        $status     = 'failed';
                    }
                }
                // close the connection, release resources used
                curl_close($ch);
                // return $response;
            }

            if (isset($status)) {
                CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $exception, 'type' => $type, 'status'=> $status]);
            }

            //hubspot
            $arr = array(
                'properties' => array(
                    array(
                        'property' => 'email',
                        'value' => $loanLead->email
                    ),
                    array(
                        'property' => 'firstname',
                        'value' => $loanLead->first_name
                    ),
                    array(
                        'property' => 'lastname',
                        'value' => $loanLead->last_name
                    ),
                    array(
                        'property' => 'phone',
                        'value' => $loanLead->phone
                    ),
                    array(
                        'property' => 'hubspot_owner_id',
                        'value' => '62211426'
                    ),
                    array(
                        'property' => 'upload_documents_url',
                        'value' => env('APP_URL').'/iframe/update-application-documents/'.$loanLead->uuid
                    )
                )
            );
            $post_json = json_encode($arr);
            $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . env('HUBSPOT_API_KEY');
            $ch = @curl_init();
            @curl_setopt($ch, CURLOPT_POST, true);
            @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
            @curl_setopt($ch, CURLOPT_URL, $endpoint);
            @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = @curl_exec($ch);
            $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $hubContact = json_decode($response, TRUE);
            @curl_close($ch);
            //$curl_errors = curl_error($ch);
            if($status_code != 200){
                CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $response, 'type' => 'HubSpot Contact']);
            }
            else{
                if (isset($hubContact['vid'])) {
                    list($msec, $sec)   = explode(' ', microtime());
                    $timeInMiliSeconds  = $sec.substr($msec, 2, 3); 
                    $timeInMiliSeconds = $timeInMiliSeconds+864000000;
                    //update loan lead model
                    ModelsLoanLead::whereId($loanLead->id)->update(['hubspot_contact_id' => $hubContact['vid']]);
                    $dealData = array(
                        'associations' => array('associatedVids' => array($hubContact['vid'])),
                        'properties' =>
                        array(
                            array(
                                'value' => $loanLead->first_name." ".$loanLead->last_name,
                                'name' => 'dealname',
                            ),
                            array(
                                'value' => '8562058',
                                'name' => 'dealstage',
                            ),
                            array(
                                'value' => 'default',
                                'name' => 'pipeline',
                            ),
                            array(
                                'value' => '62211426',
                                'name' => 'hubspot_owner_id',
                            ),
                            array(
                                'value' => $timeInMiliSeconds,
                                'name' => 'closedate',
                            ),
                            array(
                                'value' => $loanLead->loan_amount,
                                'name' => 'amount',
                            ),
                            array(
                                'value' => 'newbusiness',
                                'name' => 'dealtype',
                            ),
                            array(
                                'value' => $loanLead->promo,
                                'name' => 'calculator___promo_code',
                            ),
                            array(
                                'value' => $loanLead->referral_source,
                                'name' => 'referral_source',
                            ),
                            array(
                                'value' => $loanLead->loan_type_sub,
                                'name' => 'calculator___loan_type',
                            ),
                            array(
                                'value' => $loanLead->monthly_payment,
                                'name' => 'calculator___monthly_payment',
                            ),
                            array(
                                'value' => $loanLead->loan_term,
                                'name' => 'calculator___loan_term',
                            ),
                            array(
                                'value' => $loanLead->interest_rate,
                                'name' => 'calculator___interest_rate',
                            ),
                            array(
                                'value' =>$loanLead->apr_with_fees,
                                'name' => 'calculator___apr_with_fees',
                            )                           
                        ),
                    );
    
                    //deal in hubspot
                    $post_json = json_encode($dealData);
                    $endpoint = 'https://api.hubapi.com/deals/v1/deal?hapikey=' . env('HUBSPOT_API_KEY');
                    $ch = @curl_init();
                    @curl_setopt($ch, CURLOPT_POST, true);
                    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
                    @curl_setopt($ch, CURLOPT_URL, $endpoint);
                    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $response = @curl_exec($ch);
                    $hubDeal = json_decode($response, TRUE);

                    if(!isset($hubDeal['dealId'])){
                        CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $status_code, 'type' => 'HubSpot Deal', 'status'=>'failed']);
                    }
                    else{
                        ModelsLoanLead::whereId($loanLead->id)->update(['hubspot_deal_id' => $hubDeal['dealId']]);
                    }
                }  
            }
        }
    }
}
