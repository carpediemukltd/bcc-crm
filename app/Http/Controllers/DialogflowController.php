<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\SessionsClient;

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

            $aApplicationStatus = Deal::getApplicationStatus($iRecordId);
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
    public static function chat(Request $request)
    {
        $sMessage   = $request->message;
        $sSessionID = $request->sessionID;

        if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $sMessage))
            if(auth()->user()->email != $sMessage)
                return ["message" => "Unauthorized email address"];

        $objSessionsClient = new SessionsClient([
            'credentials' => public_path(env("DIALOGFLOW_ACCESS_KEY"))
        ]);

        $sSession = $objSessionsClient->sessionName(env("DIALOGFLOW_PROJECTID"), $sSessionID);

        $objTextInput = new TextInput();
        $objTextInput->setText($sMessage);
        $objTextInput->setLanguageCode('en-US');

        $objQueryInput = new QueryInput();
        $objQueryInput->setText($objTextInput);
        $objResponse = $objSessionsClient->detectIntent($sSession, $objQueryInput);

        $fulfillmentText = $objResponse->getQueryResult()->getFulfillmentText();
        $objSessionsClient->close();

        return ["message" => $fulfillmentText];
    }
}
