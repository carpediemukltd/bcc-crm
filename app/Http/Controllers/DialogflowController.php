<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Documents;
use App\Models\RequiredDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\SessionsClient;

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
        {
            $aArrayNotFound = [
                "No matching record was located. Kindly confirm that the email address entered matches the one used for your application.",
                "We couldn't find any records. Please double-check that the email address you've entered is the one you used for your application.",
                "Your record was not located in our system. Ensure that the email address you're entering is the correct one you used during your application.",
                "There's no record matching your search. Verify that the email address entered corresponds to the one you utilized for your application.",
                "We couldn't retrieve any records. Please make sure that the email address you've provided matches the one you employed for your application.",
                "Record not discovered. Please validate that the email address you've inputted is the same as the one you utilized in your application.",
                "We couldn't locate any records. Please cross-verify that the email address you've entered is the one associated with your application.",
                "No record found. Confirm that the email address you are entering is the one you used for your application.",
                "There is no record matching your query. Ensure that the email address you've entered corresponds to the one used during your application.",
                "Your record could not be found. Double-check that the email address you're inputting is the same one you used when applying.",
            ];
            return self::returnMessage($aArrayNotFound[rand(0,9)]);
        }

        $iRecordId          = $aUserExists->id;
        $aApplicationStatus = Deal::getApplicationStatus($iRecordId);
        if(sizeof($aApplicationStatus) <= 0)
            return self::returnMessage('Sorry, no application found. If you feel this is in error, please email TeamBccusa@BCCUSA.com and we will provide immediate assistance. If you have no already applied, please apply here <a href="https://bccusa.com/get-started-now/" target="_blank">https://bccusa.com/get-started-now/</a>');

        $sApplicationStatus = $aApplicationStatus[0]->title;
        $aReturnMessage = [
            "Your application has been located, and it is currently in a $sApplicationStatus status.",
            "I've discovered your application, and it's currently marked as $sApplicationStatus.",
            "Your application has been located, and at the moment, it's in a $sApplicationStatus state.",
            "I've come across your application, and its status is currently $sApplicationStatus.",
            "Your application has been found, and it's currently in a $sApplicationStatus condition.","
            I've located your application, and its status is presently marked as $sApplicationStatus.",
            "Your application has been identified, and it's in a state $sApplicationStatus.",
            "I've uncovered your application, and its current status is $sApplicationStatus.",
            "Your application has been located, and it is presently in a $sApplicationStatus status.",
            "I've detected your application, and it's currently in a $sApplicationStatus state."
        ];

        $iMessageIndex = rand(0,9);
        if($sApplicationStatus == "Document Collection")
            $aReturnMessage[$iMessageIndex] .= "<br>".self::getDocuments($iRecordId);

        return self::returnMessage($aReturnMessage[$iMessageIndex]);
    }
    public static function chat(Request $request)
    {
        $sMessage   = $request->message;
        $sSessionID = $request->sessionID;
        if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $sMessage))
            if(auth()->user()->email != $sMessage)
                return ["message" => "Unauthorized access to the information"];

        $bCheckAbusive = self::keywordBlock($sMessage);
        if($bCheckAbusive)
            return ["message" => $bCheckAbusive];

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
    public static function getDocuments($iUserId) : string
    {
        $aAllDocuments      = RequiredDocument::listDocuments();
        $aUploadDocuments   = Documents::getUploadedDocument($iUserId);

        $sDocumentMissing = "";
        foreach($aAllDocuments AS $iKey => $aValues)
            if (!in_array($aValues["file_group_name"], array_column($aUploadDocuments, 'file_group_name')))
                $sDocumentMissing .= "<br>".$aValues["document_name"];

        $sReturnMessage = "";
        if($sDocumentMissing)
            $sReturnMessage = "You have following missing documents".$sDocumentMissing."<br> Please upload your documents here <a href='https://dashboard.bccusa.com/user/documents/view' taget='_blank'>https://dashboard.bccusa.com/user/documents/view</a>";

        return $sReturnMessage;
    }

    private static function keywordBlock($sString)
    {
        $aArrayAbusiveWords = [
            "fuck",
            "shit",
            "cock",
            "asshole",
            "prick",
            "dick",
            "pussy",
            "bitch",
            "cunt",
            "shmuck",
            "schmuck",
        ];

        $aArrayReturn = [
            "Kindly refrain from using strong language. It makes it harder for me to help effectively. How can I assist you further?",
            "I strive to assist best when the language is kept clean. Could you please rephrase? What can I help with?",
            "To provide the best assistance, I'd appreciate if we could keep our conversation respectful. How may I help you?",
            "Using fewer expletives helps me understand and assist you better. Is there something specific you'd like to know?",
            "My ability to help is optimized when the language is kept civil. How can I assist you?",
            "Let's keep our conversation constructive. Avoiding expletives will help me serve you better. What do you need assistance with?",
            "I aim to be as helpful as possible, and clean language aids that. Do you have a question for me?",
            "Respectful dialogue ensures the best assistance from my end. How can I support you further?",
            "To ensure I understand you clearly, it's best to avoid strong language. How can I help you today?",
            "Please try to express your thoughts without expletives. It'll help me assist you more effectively. How can I help you?",
        ];

        $sString = strtolower($sString);
        foreach($aArrayAbusiveWords AS $iKey => $sWOrds)
            if(strpos($sString, $sWOrds) === 0 || strpos($sString, $sWOrds) !== false)
                return $aArrayReturn[rand(0,9)];

        return false;
    }
}
