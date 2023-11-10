<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Company;
use App\Models\User;
use App\Models\UserOwner;
use App\Models\UserDetails;
use App\Models\CustomField;
use App\Models\Deal;
use App\Models\Pipeline;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use App\Models\Stage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JotFormController extends Controller
{
   
    public function handleJotformWebhook(Request $request)
    {
        // Get the "rawRequest" JSON string from the request data
        $rawRequest = $request->input('rawRequest');

        // Parse the "rawRequest" JSON string into a PHP array
        $jsonData = json_decode($rawRequest, true);

        // Check if the parsing was successful
        if ($jsonData === null) {
            return response()->json(['message' => 'Error parsing rawRequest JSON data'], 400);
        }

        $formId      = $request->formID;
        $fields      = array();
        $hasDealData = false;
        if ($formId == '222756540184053') {

            // Access and process the specific data you need
            $firstName = $jsonData['q3_name']['first'];
            $lastName =  $jsonData['q3_name']['last'];
            $phone = $jsonData['q5_phone']['full'];
            $email = $jsonData['q4_email'];
            $legalBusiness = $jsonData['q6_legal_business'];
            $useOfFunds = $jsonData['q8_once_approved'];
            $estimatedFICOScore = $jsonData['q13_estimated_fico'];
            $historyTracking = $jsonData['q17_history_tracking'];

            $fields = array(
                "Legal Business Name" => $legalBusiness,
                "Once Approved, Use of Funds" => $useOfFunds,
                "Estimated FICO Score" => $estimatedFICOScore,
                "History Tracking" => serialize($historyTracking),
            );
        }
        if ($formId == '231903466626459') {

            $nameArr =  explode(" ", $jsonData['q6_legalBusiness6']);
            $firstName  = $nameArr[0] ?? 'Misc';
            $lastName   = $nameArr[1] ?? 'User';
            $email      = $jsonData['q10_email'];
            $phone      = $jsonData['q88_phoneNumber'];

            //other form data
            $fields = array(
                "Legal Business Name" => $jsonData['q6_legalBusiness6'],
                "Amount Requested" => $jsonData['q9_amountRequested'],
                "Business Address" => $jsonData['q11_businessAddress']['addr_line1'] . " " . $jsonData['q11_businessAddress']['addr_line2'],
                "Business City" => $jsonData['q11_businessAddress']['city'],
                "Business State" => $jsonData['q11_businessAddress']['state'],
                "Business Zip Code" => $jsonData['q11_businessAddress']['postal'],
                "Business Structure/Type" => $jsonData['q12_businessStructuretype'],
                "Industry Type" => $jsonData['q14_industryType'],
                "Business Start Date" => $jsonData['q63_businessStart63']['year'] . "-" . $jsonData['q63_businessStart63']['month'] . "-" . $jsonData['q63_businessStart63']['day'],
                "Monthly Revenue" => $jsonData['q13_monthlyRevenue'],
                "TaxID Number" => $jsonData['q17_taxId'],
                "Business Website" => $jsonData['q78_businessWebsite'],
                "Monthly Business Rent Amount" => $jsonData['q97_businessWebsite97'],
                "Officer Name" => $jsonData['q21_officerownerName']['first'] . " " . $jsonData['q21_officerownerName']['last'],
                "Owner Email" => $jsonData['q10_email'],
                "SSN" => $jsonData['q25_ssn'],
                "Home Address" => $jsonData['q26_homeAddress']['addr_line1'] . " " . $jsonData['q26_homeAddress']['addr_line2'],
                "Home City" => $jsonData['q26_homeAddress']['city'],
                "Home State" => $jsonData['q26_homeAddress']['state'],
                "Home Zip Code" => $jsonData['q26_homeAddress']['postal'],
                "Date of Birth" => $jsonData['q30_dateOf']['year'] . "-" . $jsonData['q30_dateOf']['month'] . "-" . $jsonData['q30_dateOf']['day'],
                "US Citizen" => $jsonData['q80_usCitizen'],
                "Second Owner Yes/No" => $jsonData['q120_doYou'],
            );

            if (isset($jsonData['q120_doYou']) && strtolower($jsonData['q120_doYou']) == 'yes') {
                $second_owner = array(
                    "Second Officer Name" => $jsonData['q49_secondOwner']['first'] . " " . $jsonData['q49_secondOwner']['last'],
                    "2nd Officer Email" => $jsonData['q34_email34'],
                    "2nd Officer SSN" => $jsonData['q35_ssn35'],
                    "2nd Officer Home Address" => $jsonData['q36_homeAddress36']['addr_line1'] . " " . $jsonData['q36_homeAddress36']['addr_line2'],
                    "2nd Officer Home City" => $jsonData['q36_homeAddress36']['city'],
                    "2nd Officer Home State" => $jsonData['q36_homeAddress36']['state'],
                    "2nd Officer Home Zip Code" => $jsonData['q36_homeAddress36']['postal'],
                    "2nd Officer Date of Birth" => $jsonData['q40_dateOf40']['year'] . "-" . $jsonData['q40_dateOf40']['month'] . "-" . $jsonData['q40_dateOf40']['day'],
                    "2nd Officer US Citizen" => $jsonData['q81_ownerUs81'],
                );
                $fields = array_merge($fields, $second_owner);
            }
            $hasDealData = true;
        }
        if ($formId == '230735614227453') {
            //Preliminary Application BCCUSA-FB Ads

            $nameArr =  explode(" ", $jsonData['q6_legalBusiness6']);
            $firstName  = $nameArr[0] ?? 'Misc';
            $lastName   = $nameArr[1] ?? 'User';
            $email      = $jsonData['q10_email'];
            $phone      = $jsonData['q7_businessNumber']['phone'];

            $fields = array(
                "Legal Business Name" => $jsonData['q6_legalBusiness6'],
                "Amount Requested" => $jsonData['q9_amountRequested'],
                "Business Address" => $jsonData['q11_businessAddress']['addr_line1'] . " " . $jsonData['q11_businessAddress']['addr_line2'],
                "Business City" => $jsonData['q11_businessAddress']['city'],
                "Business State" => $jsonData['q11_businessAddress']['state'],
                "Business Zip Code" => $jsonData['q11_businessAddress']['postal'],
                "Business Structure/Type" => $jsonData['q12_businessStructuretype'],
                "Industry Type" => $jsonData['q14_industryType'],
                "Business Start Date" => $jsonData['q63_businessStart63']['year'] . "-" . $jsonData['q63_businessStart63']['month'] . "-" . $jsonData['q63_businessStart63']['day'],
                "Monthly Revenue" => $jsonData['q13_monthlyRevenue'],
                "TaxID Number" => $jsonData['q17_taxId'],
                "Business Website" => $jsonData['q78_businessWebsite'],
                "Monthly Business Rent Amount" => $jsonData['q91_businessWebsite91'],
                "Officer Name" => $jsonData['q21_officerownerName']['first'] . " " . $jsonData['q21_officerownerName']['last'],
                "Owner Email" => $jsonData['q24_email24'],
                "SSN" => $jsonData['q25_ssn'],
                "Home Address" => $jsonData['q26_homeAddress']['addr_line1'] . " " . $jsonData['q26_homeAddress']['addr_line2'],
                "Home City" => $jsonData['q26_homeAddress']['city'],
                "Home State" => $jsonData['q26_homeAddress']['state'],
                "Home Zip Code" => $jsonData['q26_homeAddress']['postal'],
                "Date of Birth" => $jsonData['q30_dateOf']['year'] . "-" . $jsonData['q30_dateOf']['month'] . "-" . $jsonData['q30_dateOf']['day'],
                "US Citizen" => $jsonData['q80_usCitizen'],
                "Second Officer Name" => $jsonData['q32_secondOfficerowner']['first'] . " " . $jsonData['q32_secondOfficerowner']['last'],
                "2nd Officer Email" => $jsonData['q34_email34'],
                "2nd Officer SSN" => $jsonData['q35_ssn35'],
                "2nd Officer Home Address" => $jsonData['q36_homeAddress36']['addr_line1'] . " " . $jsonData['q36_homeAddress36']['addr_line2'],
                "2nd Officer Home City" => $jsonData['q36_homeAddress36']['city'],
                "2nd Officer Home State" => $jsonData['q36_homeAddress36']['state'],
                "2nd Officer Home Zip Code" => $jsonData['q36_homeAddress36']['postal'],
                "2nd Officer Date of Birth" => $jsonData['q40_dateOf40']['year'] . "-" . $jsonData['q40_dateOf40']['month'] . "-" . $jsonData['q40_dateOf40']['day'],
                "2nd Officer US Citizen" => $jsonData['q81_ownerUs81'],
            );
        }
        //create user & company if do not exist
        $company = Company::first();
        if (!$company) {
            $company = Company::create(['name' => 'BCCUSA']);
        }
        $companyId  = $company->id;
        $user = User::where('email', $email)->first();
        $data['password'] = Hash::make('BCCUSA.COM');
        if (!$user) {
            $user = User::create([
                'first_name'    => $firstName,
                'last_name'     => $lastName,
                'email'         => $email,
                'phone_number'  => $phone,
                'role'          => 'user',
                'company_id'    => $companyId,
                'password'      => Hash::make('BCCUSA.COM')
            ]);
        }
        if (is_array($fields) && count($fields) > 0) {
            foreach ($fields as $field => $value) {
                if (!empty($value))
                    self::saveCustomFieldData($user->id, $field, $value);
            }
        }
        //add deal
        if ($hasDealData) {
            $pipeline = Pipeline::firstOrNew(['company_id' => $companyId], ['title' => $company->name]);
            $pipeline->save();

            $owner = User::whereRole('owner')->orderBy('id', 'ASC')->whereCompanyId($companyId)->first();
            $stage = Stage::whereTitle('Document Collection')->firstOr(Stage::orderBy('id', 'ASC')->first());

            // Create deal
            $dealData = [
                'title' => $jsonData['q6_legalBusiness6'] ?? $user->first_name,
                'user_id' => $user->id,
                'pipeline_id' => $pipeline->id,
                'stage_id' => $stage->id,
                'amount' => $jsonData['q9_amountRequested'],
                'deal_owner' => $owner->full_name,
                'lead_source' => 'contact',
                'depositing_institution' => 'unknown',
                'state' => $jsonData['q11_businessAddress']['state'] ?? 'unknown',
                'submitted_bank' => 'unknown',
                'sub_type' => 'unknown',
            ];

            Deal::create($dealData);

            // Create activity
            Activity::create([
                'moduleName'    => 'Deal',
                'user_id'       => $owner->id,
                'contact_id'    => $user->id,
            ]);
        }


        // For testing, you can return a response
        return response()->json(['message' => 'Webhook data received and processed successfully']);
    }

    private static function saveCustomFieldData($user_id, $field, $data)
    {
        $custom_field = CustomField::firstOrCreate(
            ["title" =>  $field],
            ["title" =>  $field, "type" => "contact", "visible" => 0],
        );

        UserDetails::updateOrCreate(
            ['user_id' => $user_id, 'deal_id' => 0, 'custom_field_id' => $custom_field->id],
            ['data' => $data]
        );
    }
}
