<?php

namespace App\Http\Controllers;

use App\Models\Deals;
use App\Models\User;
use Illuminate\Http\Request;

class DialogflowController extends Controller
{
    public static function index(Request $request) : array
    {
        try
        {
            $aParameterValue    = array_keys($request->queryResult["parameters"]);
            $sParameterFunction = $aParameterValue[0];

            $thisObj = new self;
            if(method_exists($thisObj, $sParameterFunction))
                return self::$sParameterFunction($request->queryResult["parameters"]);

            throw new \Exception("Method not found");
        }
        catch(\Exception $e)
        {
            return ["FulfillmentText" => $e->getMessage()];
        }
    }

    private static function BankEmailAddress($aRequestParameters) : array
    {
        try
        {
            $aUserExists = User::where("email", $aRequestParameters["BankEmailAddress"])->get()->first();
            if(!$aUserExists)
                throw new \Exception("Record not found");

            $iRecordId  = $aUserExists->id;
            $sFirstName = $aUserExists->first_name;
            $sLastName  = $aUserExists->last_name;

            $aApplicationStatus = Deals::getApplicationStatus($iRecordId);
            if(sizeof($aApplicationStatus) <= 0)
                throw new \Exception("Sorry, no open application found. For more details please email on mjunaud292@gmail.com");

            $sMessage = "Dear $sFirstName $sLastName your application status is ".$aApplicationStatus[0]->title." stage";

            return ["fulfillmentText" => $sMessage];
        }
        catch(\Exception $e)
        {
            return ["fulfillmentText" => $e->getMessage()];
        }
    }
}
