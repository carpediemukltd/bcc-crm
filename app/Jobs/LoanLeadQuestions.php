<?php

namespace App\Jobs;

use App\Models\CustomLeadLog;
use App\Models\LoanLead;
use App\Models\LoanLeadDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LoanLeadQuestions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $loanLeadDetailJob;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(LoanLeadDetail $loanLeadDetailJob)
    {
        $this->loanLeadDetailJob = $loanLeadDetailJob;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $loanLeadDetail = LoanLeadDetail::whereId($this->loanLeadDetailJob->id)->first();
            $loanLead       = LoanLead::whereId($loanLeadDetail->loan_lead_id)->first();

            //update GHL contact
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

            $customFields['5ctJfSphIH12hCBBFk2P'] = $loanLeadDetail->business_duration;
            $customFields['D1b1NR8UNwNjEYaAtn2h'] = $loanLeadDetail->business_location;
            $customFields['0aBCCnUHqcD2Ncrre4m3'] = $loanLeadDetail->business_location_suit;
            $customFields['pNbA6RpC3Za0BIeOROKL'] = $loanLeadDetail->entity_type;
            $customFields['Xr3zsoQf0kNPR2hohO8N'] = $loanLeadDetail->owner_us_citizen;
            $customFields['kmsHkYVEIBycMhZ2Zbf3'] = $loanLeadDetail->is_your_revenue_more_than_150k;
            $customFields['h0i7drRQdJefWXD12pD0'] = $loanLeadDetail->is_your_fico_score_above_650;
            $customFields['RIYonara8h9Za60SrIsX'] = $loanLeadDetail->is_your_business_profitable_or_break_even;
            $customFields['2Z02mSzpzTgdfdl78xkH'] = $loanLeadDetail->are_your_clients_consumers_or_businesses;
            $customFields['F4WnsJBjcqkBH0eVupPw'] = $loanLeadDetail->do_you_have_commercial_accounts_receivables;
            $customFields['J6F01wgmfxUseem3BV2M'] = $loanLeadDetail->describe_your_business;
            $customFields['xamUSrUofvymIlkuhtx3'] = $loanLeadDetail->what_type_of_credit_facility_are_you_seeking;
            $customFields['UfcVIWoZOdY3EzsK43UU'] = $loanLeadDetail->tangible_assets;
            $customFields['zSbVFwG36rbSMfF1jMDQ'] = $loanLeadDetail->longterm_liabilities;
            $customFields['PFuPGYujpR4mdlqpoRLY'] = $loanLeadDetail->eligibility_result;

            if (count($customFields)) {
                $fieldsData['customField'] = $customFields;
            }
            $customTags[]        = 'bcc_lead_calculator';
            $customTags[]        = 'bcc_lead_calculator_after_questions_submission';
            $fieldsData['tags'] = $customTags;
           
            if (count($fieldsData)) {
                $url  = "https://rest.gohighlevel.com/v1/contacts/".$loanLead->ghl_contact_id;
                $post = $fieldsData;
                $headers = [
                    'Authorization: Bearer'.' '.env('GOHIGHLEVEL_API_KEY'),
                    'Content-Type: application/x-www-form-urlencoded'
                ];


                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                if (!empty($post)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                }
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

                // execute!
                $response = curl_exec($ch);

                $response = json_decode($response, true);
                if (count($response)) {
                    $type   = 'GoHighLevel Contact Update';
                    //contact created
                    if (isset($response['contact'])) {
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
                if (isset($status)) {
                    CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $exception, 'type' => $type, 'status'=>$status]);
                }
            }
            
            //update HubSpot deal
            if($loanLead->hubspot_deal_id){
                    $dealData = array(
                        'properties' =>
                        array(
                            array(
                                'value' => $loanLeadDetail->business_duration,
                                'name' => 'have_you_been_in_business_18__months_',
                            ),
                            array(
                                'value' =>$loanLeadDetail->business_location,
                                'name' => 'where_is_your_business_located_',
                            ),
                            array(
                                'value' => $loanLeadDetail->business_location_suit,
                                'name' => 'where_is_your_business_located__suit___apart__',
                            ),
                            array(
                                'value' => $loanLeadDetail->entity_type,
                                'name' => 'what_is_your_entity_type__corp__dba_etc__',
                            ),
                            array(
                                'value' => $loanLeadDetail->owner_us_citizen,
                                'name' => 'are_the_owners_us_citizens_',
                            ),
                            array(
                                'value' => $loanLeadDetail->is_your_revenue_more_than_150k,
                                'name' => 'is_your_annual_revenue_more_than_150k_',
                            ),
                            array(
                                'value' => $loanLeadDetail->is_your_fico_score_above_650,
                                'name' => 'is_your_fico_score_above_650_',
                            ),
                            array(
                                'value' => $loanLeadDetail->is_your_business_profitable_or_break_even,
                                'name' => 'is_your_business_profitable_or_break_even_',
                            ),
                            array(
                                'value' => $loanLeadDetail->are_your_clients_consumers_or_businesses,
                                'name' => 'are_your_client_s_consumers_or_businesses_',
                            ),
                            array(
                                'value' => $loanLeadDetail->do_you_have_commercial_accounts_receivables,
                                'name' => 'do_you_have_commercial_accounts_receivables_',
                            ),
                            array(
                                'value' => $loanLeadDetail->describe_your_business,
                                'name' => 'describe_your_business',
                            ),
                            array(
                                'value' => $loanLeadDetail->what_type_of_credit_facility_are_you_seeking,
                                'name' => 'what_type_of_credit_facility_are_you_seeking_',
                            ),
                            array(
                                'value' => $loanLeadDetail->tangible_assets,
                                'name' => 'please_list_tangible_assets_your_business_has_if_applicable',
                            ),
                            array(
                                'value' =>$loanLeadDetail->longterm_liabilities,
                                'name' => 'please_describe_long_term_liabilities_if_applicable',
                            ),
                            array(
                                'value' =>$loanLeadDetail->eligibility_result,
                                'name' => 'eligibility_result',
                            ),
                            array(
                                'value' => '8562059',
                                'name' => 'dealstage',
                            )
                                                      
                        ),
                    );
    
                    //deal in hubspot
                    $post_json = json_encode($dealData);
                    $endpoint = 'https://api.hubapi.com/deals/v1/deal/'.$loanLead->hubspot_deal_id.'?hapikey=' . env('HUBSPOT_API_KEY');
                    $ch = @curl_init();
                    // @curl_setopt($ch, CURLOPT_POST, true);
                    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
                    @curl_setopt($ch, CURLOPT_URL, $endpoint);
                    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    @curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $response = @curl_exec($ch);
                    $hubDeal = json_decode($response, TRUE);

                    if(!isset($hubDeal['dealId'])){
                        CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $status_code, 'type' => 'HubSpot Deal', 'status'=>'failed']);
                    }        
                    else{
                        CustomLeadLog::create(['loan_lead_id' => $loanLead->id, 'exception' => $response, 'type' => 'HubSpot Deal Update', 'status'=>'succeeded']);
                    }
                }

            //end hubspot deal
        
        
    }
}
