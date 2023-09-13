<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase\Part;
use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\IntentsClient;
use Google\Cloud\Dialogflow\V2\Intent;
use Illuminate\Support\Facades\Http;

class DialogflowController extends Controller
{
    public function __construct()
    {
        putenv("GOOGLE_APPLICATION_CREDENTIALS=".public_path(env("GOOGLE_APPLICATION_CREDENTIALS")));
    }

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
    private static function userApplicationStatus($aRequestParameters) : array
    {
        $aUserExists = User::where("email", $aRequestParameters["userApplicationStatus"])->get()->first();
        if(!$aUserExists)
            return self::returnMessage("Record not found");

        $iRecordId          = $aUserExists->id;
        $aApplicationStatus = Deal::getApplicationStatus($iRecordId);
        if(sizeof($aApplicationStatus) <= 0)
            return self::returnMessage('Sorry, no application found. If you feel this is in error, please email TeamBccusa@BCCUSA.com and we will provide immediate assistance. If you have no already applied, please apply here <a href="https://bccusa.com/sba-lending/" target="_blank">https://bccusa.com/sba-lending/</a>');

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
            'credentials' => public_path(env('GOOGLE_APPLICATION_CREDENTIALS'))
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

    public static function createIntent()
    {
        try
        {
            self::curl();
            die();
//            $intentsClient  = new IntentsClient();
//            $parent         = "projects/".env("DIALOGFLOW_PROJECTID")."/agent";
//
//            $trainingPhrase1 = new TrainingPhrase();
//            $part1           = new Part();
//            $trainingPhrase2 = new TrainingPhrase();
//            $part2           = new Part();
//
//            $part1->setText('Training phrase 1');
//            $trainingPhrase1->setParts([$part1]);
//            $part2->setText('Training phrase 2');
//            $trainingPhrase2->setParts([$part2]);
//
//            $intent = new Intent([
//                'display_name' => 'Your Intent Name',
//                'training_phrases' => [$trainingPhrase1, $trainingPhrase2],
//            ]);
//
//            $response = $intentsClient->createIntent($parent, $intent);
//            $intentsClient->close();
//            echo 'Intent created: ' . $response->getName();
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
    private static function curl($sURL = "https://api.rytr.me/v1/languages", $sType = "GET")
    {
        $aHeaders = [
            'Authentication: Bearer VNZGDFTF3Y1AGDFO3FNZL',
            'Content-Type: application/json'
        ];

        if($sType == "POST")
            $aResponse = Http::post($sURL, [
                "headers" => $aHeaders,
                "data" => []
            ]);
        else
            $aResponse = Http::withHeaders($aHeaders)->get($sURL);

        print_r(json_decode($aResponse));
    }
}
