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
            return self::returnMessage($e->getMessage());
        }
    }
    private static function userApplicationStatus($aRequestParameters): array
    {
        $aUserExists = User::where("email", $aRequestParameters["userApplicationStatus"])->get()->first();
        if(!$aUserExists)
            return self::returnMessage("Record not found");

        $iRecordId          = $aUserExists->id;
        $aApplicationStatus = Deal::getApplicationStatus($iRecordId);
        if(sizeof($aApplicationStatus) <= 0)
            return self::returnMessage("Sorry, no application found. If you feel this is in error, please email TeamBccusa@BCCUSA.com and we will provide immediate assistance. If you have no already applied, please apply here <a href='https://bccusa.com/sba-lending/' target='_blank'>https://bccusa.com/sba-lending/</a>");

        $sApplicationStatus = $aApplicationStatus[0]->title;
        $aReturnMessage = [
            "Your application has been located, and it is currently in a $sApplicationStatus status.",
            "I've discovered your application, and it's currently marked as $sApplicationStatus.",
            "Your application has been located, and at the moment, it's in a $sApplicationStatus state.",
            "I've come across your application, and its status is currently $sApplicationStatus.",
            "Your application has been found, and it's currently in a $sApplicationStatus condition.","
            I've located your application, and its status is presently marked as $sApplicationStatus.",
            "Your application has been identified, and it's in a state $sApplicationStatus $sApplicationStatus.",
            "I've uncovered your application, and its current status is $sApplicationStatus.",
            "Your application has been located, and it is presently in a pending status.",
            "I've detected your application, and it's currently in a $sApplicationStatus state."
        ];

        $iMessageIndex = rand(0,9);
        return self::returnMessage($aReturnMessage[$iMessageIndex]);
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

    private static function returnMessage($sReturnMessage)
    {
        return ["fulfillmentText" => $sReturnMessage];
    }
}
