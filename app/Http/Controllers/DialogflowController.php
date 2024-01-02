<?php

namespace App\Http\Controllers;

use App\Models\ChatFeedback;
use App\Models\ChatLog;
use App\Models\ChatPotentialUser;
use App\Models\ChatScheduling;
use App\Models\Deal;
use App\Models\Documents;
use App\Models\RequiredDocument;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DialogflowController extends Controller
{
    const iBlockCheck       = 5;
    const aAllowFiles       = ["pdf", "xlsx", "docx"];
    private static $sStorageDisk = "s3";
    public function __construct()
    {
        putenv("GOOGLE_APPLICATION_CREDENTIALS=".public_path(env("GOOGLE_APPLICATION_CREDENTIALS")));
        if(in_array($_SERVER["HTTP_HOST"], ["127.0.0.1", "localhost"]))
            self::$sStorageDisk = "local";
    }
    public static function index(Request $request) : array
    {
        $sParameterFunction = "";
        try
        {
            $aParameterValue    = array_keys($request->queryResult["parameters"]);
            $sParameterFunction = $aParameterValue[0];

            $thisObj = new self;
            if(method_exists($thisObj, $sParameterFunction))
            {
                $aResponse = self::$sParameterFunction($request->queryResult["parameters"]);
                JotformController::createAPILogs($sParameterFunction, $request->all(), $aResponse, 2);
                return $aResponse;
            }
            throw new \Exception("Method not found");
        }
        catch(\Exception $e)
        {
            JotformController::createAPILogs($sParameterFunction, $request->all(), $e->getMessage(), 2);
            $sHTML = '<!DOCTYPE html>
                    <html>
                    <head>
                    </head>
                    <body>
                        <p style="font-size: 15px">
                            '.json_encode($request->all()).'
                            <br />
                            <br />
                            Response: '.$e->getMessage().'
                        </p>
                    </body>
                </html>
                ';
            self::sendEmail("Dialogflow Api Failed", $sHTML, ["muhammadjunaid@carpediem.team"]);
            return self::returnMessage($e->getMessage());
        }
    }
    private static function userApplicationStatus($aRequestParameters) : array
    {
        $sEmail = $aRequestParameters["userApplicationStatus"];
        $aUserExists = User::where("email", $sEmail)->get()->first();
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
            return self::returnMessage('Sorry, no application found. If you feel this is in error, please email TeamBccusa@BCCUSA.com and we will provide immediate assistance. If you have no already applied, please apply here <a class="applynow" href="https://dashboard.bccusa.com/user/documents/view?applynow=true" target="_blank">Apply Here</a>');

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
            $aReturnMessage[$iMessageIndex] .= "<br><br>".self::getDocuments($iRecordId, $sEmail);

        return self::returnMessage($aReturnMessage[$iMessageIndex]);
    }
    public static function chat(Request $request)
    {
        $aBlockedKeywords = [];
        try
        {
            $sMessage   = $request->message;
            $sSessionID = $request->sessionID;
            if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $sMessage))
                if(auth()->user()->email != $sMessage)
                    throw new \Exception("Unauthorized access to the information");

            $bCheckAbusive = self::keywordBlock($sMessage, $aBlockedKeywords);
            if($bCheckAbusive)
                throw new \Exception($bCheckAbusive);

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

            self::chatLog($sMessage, $fulfillmentText, $aBlockedKeywords);
            return ["message" => $fulfillmentText];
        }
        catch(\Exception $e)
        {
            self::chatLog($sMessage, $e->getMessage(), $aBlockedKeywords);
            return ["message" => $e->getMessage()];
        }
    }
    private static function returnMessage($sReturnMessage)
    {
        return ["fulfillmentText" => $sReturnMessage];
    }
    public static function getDocuments($iUserId, $sEmail, $bShowPrompt = true) : string
    {
        $aAllDocuments      = RequiredDocument::listDocuments();
        $aUploadDocuments   = Documents::getUploadedDocument($iUserId);

        $sDocumentMissing = "";
        foreach($aAllDocuments AS $iKey => $aValues)
            if (!in_array($aValues["file_group_name"], array_column($aUploadDocuments, 'file_group_name')))
            {
                if(!$bShowPrompt)
                {
                    $sDocumentMissing .= '<div class="custom-prompt" style="border-radius: 10px; color: black;
                                                background-color: #dDD;
                                                padding: 15px;
                                                text-align: center; margin-bottom: 5px">
                                            <h5>'.$aValues["document_name"].'</h5>
                                            <input type="hidden" value="'.base64_encode($sEmail).'" name="'.base64_encode("userEmail").'"/>
                                            <input type="file" multiple="" style="width: 75%" class="chat-file-upload" data-group-name="'.$aValues["file_group_name"].'" data-document-type="'.$aValues["document_type"].'" data-document-name="'.$aValues["document_name"].'"/>
                                        </div>';
                }
                else
                {
                    $sDocumentMissing .= "<br>".$aValues["document_name"];
                }
            }

        $sReturnMessage = "";
        if($sDocumentMissing)
        {
            $sReturnMessage = "<h4 align='center'>You have following missing documents</h4>" . $sDocumentMissing . "";
            if($bShowPrompt)
            {
                $sReturnMessage .= '<br><br><div class="custom-prompt" style="border-radius: 10px; color: black;
                                        background-color: #f8f9fa;
                                        padding: 10px;
                                        text-align: center;">
                                    <h5>Do you want to upload documents now?</h5>
                                    <input type="hidden" value="'.base64_encode($sEmail).'" name="'.base64_encode("userEmail").'"/>
                                    <button style="border-radius: 10px" class="btn btn-lg btn-success yes-docs-upload">Yes</button>
                                </div>
                                    ';
            }
        }

        return $sReturnMessage;
    }
    /**
     * @param string $sString
     * @param array $aBlockedKeywords
     * @return false|string
     */
    private static function keywordBlock(string $sString, array &$aBlockedKeywords)
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
                $aBlockedKeywords[] = $sWOrds;

        if(sizeof($aBlockedKeywords) > 0)
            return $aArrayReturn[rand(0,9)];
        return false;
    }
    /**
     * @param string $sMessage         "message sent by users"
     * @param string $sResponse        "Return from chatbot"
     * @param array $aBlockedKeywords "blocked keywords"
     * @return void
     */
    private static function chatLog(string $sMessage, string $sResponse, array $aBlockedKeywords) : void
    {
        $aUser      = auth()->user();
        $iUserId    = $aUser->id;
        if(sizeof($aBlockedKeywords) > 0)
        {
            $objChat = ChatPotentialUser::firstOrCreate(["user_id" => $iUserId], ["potential_count" => 0]);
            $objChat->potential_count = $objChat->potential_count + 1;
            if(($objChat->potential_count % self::iBlockCheck) == 0)
            {
                $sHTML = '<!DOCTYPE html>
                    <html>
                    <head>
                    </head>
                    <body>
                        <p style="font-size: 15px">
                            Team,
                            <br />
                            <br />
                            The following user, '.$aUser->first_name.' '.$aUser->last_name.' @ businessname, has continued to use profanity when conversing with the bot. Assigned representative, please take note.
                            <br />
                            <br />
                            Thank you,
                            <br />
                            <br />
                            Team BCCUSA Automation
                        </p>
                    </body>
                </html>
                ';

                $sArrayEmail = [
                    "muhammadjunaid@carpediem.team",
                    "mcarlucci@bccusa.com",
                    "kelly@bccusa.com",
                    "queenee@bccusa.com",
                    "jlapuz@bccusa.com",
                    "jsamaniego@bccusa.com"
                ];

                self::sendEmail('Aggressive Chatbot Usage Event', $sHTML, $sArrayEmail);
            }
            $objChat->save();
        }
        ChatLog::create([
            "user_id"           => $iUserId,
            "chat_message"      => $sMessage,
            "chat_response"     => $sResponse,
            "blocked_keywords"  => implode(",", $aBlockedKeywords)
        ]);
    }
    public static function sendEmail($sSubject, $sHTML, $aToEmail) : void
    {
        $objMailer = new PHPMailer(true);
        $objMailer->isSMTP();
        $objMailer->Host       = env("EMAIL_HOST");
        $objMailer->SMTPAuth   = true;
        $objMailer->Username   = env("EMAIL_USERNAME");
        $objMailer->Password   = env("EMAIL_PASSWORD");
        $objMailer->SMTPSecure = env("EMAIL_SMTP");
        $objMailer->Port       = env("EMAIL_PORT");
        $objMailer->setFrom(env("EMAIL_FROM"));

        foreach($aToEmail AS $iKey => $sEmail)
            $objMailer->addAddress($sEmail);

        $objMailer->isHTML(true);
        $objMailer->Subject = $sSubject;
        $objMailer->Body    = $sHTML;
        $objMailer->send();
    }
    public static function uploadDocsUsingChat(Request $request)
    {
        try
        {
            $sType  = $request->type;
            $sEmail = base64_decode($request->email);
            if($sType == "proceedUpload")
            {
                $iUserId = User::where("email", $sEmail)->get("id")->first();
                $iUserId = $iUserId->id;
                $sReturn = self::getDocuments($iUserId, $sEmail,false);
                return $sReturn;
            }
            else
            {
                DB::beginTransaction();
                $sDocumentType  = $request->documentType;
                $sFileGroupName = $request->fileGroupName;
                $iUserId        = auth()->user()->id;
                $aFiles         = $request->file('files');
                $aArrayRecordId = [];
                foreach($aFiles AS $iKey => $aFile)
                {
                    $aFileName = explode(".", $aFile->getClientOriginalName());
                    $sFileExtension = $aFileName[sizeof($aFileName) - 1];
                    if(!in_array($sFileExtension, self::aAllowFiles))
                        throw new \Exception($sFileExtension." file type you're trying to upload is not recognized. Use " . implode(", ", self::aAllowFiles) . " formats instead.");

                    $sFileName = $aFileName[0].".".$sFileExtension;
                    $iRecordId = Documents::insertGetId([
                        "user_id"           => $iUserId,
                        "type"              => $sDocumentType,
                        "file_group_name"   => $sFileGroupName,
                        "file_name"         => $sFileName,
                    ]);

                    $aArrayRecordId[$iRecordId] = [
                        "file" => $aFile,
                        "fileName" => $sFileName,
                        "filePath" => "users/$iUserId/".time()."-".$sFileName
                    ];
                }
                foreach($aArrayRecordId AS $iRecordId => $aFile)
                {
                    Storage::disk(self::$sStorageDisk)->put($aFile["filePath"], file_get_contents($aFile["file"]), ['ContentDisposition' => 'attachment']);
                    $sFilePath = Storage::disk(self::$sStorageDisk)->url($aFile["filePath"]);
                    Documents::where("id", $iRecordId)->update([
                        "file_path" => $sFilePath
                    ]);
                }
                DB::commit();
                return "1|Record updated successfully";
            }
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return "0|".$e->getMessage();
        }
    }
    public static function submitChatFeedback(Request $request)
    {
        try
        {
            $sType          = $request->type;
            $sChatMessage   = $request->chatMessage;
            $sChatResponse  = $request->chatResponse;
            $sFeedback      = $request->feedback;
            $sEmail         = base64_decode($request->email);
            $iUserId        = 0;

            $aUser = User::where("email", $sEmail)->get(["id", "phone_number"])->first();
            if($aUser)
                $iUserId = $aUser->id;

            ChatFeedback::create([
                "user_id"       => $iUserId,
                "email"         => $sEmail,
                "chat_message"  => $sChatMessage,
                "chat_response" => $sChatResponse,
                "feedback"      => $sFeedback,
                "feedback_type" => $sType,
            ]);

            return "1|Feedback saved successfully";
        }
        catch(\Exception $e)
        {
            return "0|".$e->getMessage();
        }
    }
    /**
     * @param $aParameters
     * @return array
     * @throws BindingResolutionException
     */
    private static function schedulingMethod($aParameters) : array
    {
        $sUserEmail         = $aParameters["userEmailAddress"];
        $sMeetingNote       = $aParameters["meetingNote"];
        $sSchedulingMethod  = strtolower($aParameters["schedulingMethod"]);

        $aSchedulingMethod  = [
            "by email"  => 1,
            "email"     => 1,
            "call"      => 2,
            "by call"   => 2,
            "sms"       => 3,
            "by sms"    => 3,
        ];

        $aUser = User::from("users AS U")->join("companies AS C", "C.id", "U.company_id")
            ->where("email", $sUserEmail)
            ->get(["U.id","U.first_name", "U.last_name", "U.phone_number", "C.name"])
            ->first();

        $sMeetingCode   = self::systemGeneratedCode("ChatScheduling", "meeting_code", "MS");

        $sClientName    = "Client";
        $iUserId        = 0;
        $sPhoneNumber   = "";
        $sCompanyName   = "";
        if($aUser)
        {
            $sPhoneNumber   = $aUser->phone_number;
            $iUserId        = $aUser->id;
            $sClientName    = $aUser->first_name . " " . $aUser->last_name;
            $sCompanyName   = "<br><br>Company Name: $aUser->name";
            $sPhoneNumber   = "<br>Phone Number: $sPhoneNumber";
        }

        ChatScheduling::create([
            "user_id"           => $iUserId,
            "meeting_code"      => $sMeetingCode,
            "scheduling_method" => $aSchedulingMethod[$sSchedulingMethod],
            "email"             => $sUserEmail,
            "status"            => 0,
            "meeting_note"      => $sMeetingNote
        ]);

        $aReturnMessage = [
            "Your meeting has been successfully scheduled, and a BCC agent will reach out to you shortly.",
            "The meeting you requested has been successfully booked, and you can expect to hear from a BCC agent shortly.",
            "We've successfully set up your meeting, and you'll receive a call from a BCC agent shortly.",
            "Your meeting has been scheduled with success, and you can anticipate contact from a BCC agent in the near future.",
            "Your meeting has been scheduled without a hitch. Expect a prompt response from a BCC agent.",
            "We've confirmed your meeting scheduling, and a BCC agent will be in touch shortly.",
            "Your requested meeting has been successfully arranged, and you can look forward to hearing from a BCC agent soon.",
            "The meeting you wanted to schedule has been arranged successfully, and a BCC agent will be contacting you soon.",
            "We've confirmed your meeting request, and a BCC agent will be in touch with you in the near future."
        ];

        $sHTML = '<!DOCTYPE html>
                    <html>
                    <head>
                    </head>
                    <body>
                        <p style="font-size: 15px">
                            Dear '.$sClientName.',
                            <br />
                            <br />
                            '.$aReturnMessage[rand(0,9)].'
                            <br />
                            <br />
                            Meeting Note: '.$sMeetingNote.'
                            <br />
                            <br />
                            Thank you,
                            <br />
                            <br />
                            Team BCCUSA Automation
                        </p>
                    </body>
                </html>
                ';

        $sArrayEmail = [
            $sUserEmail,
        ];

        if($aSchedulingMethod[$sSchedulingMethod] === 1)
            $sSchedulingMethod = "Via Email";
        else if($aSchedulingMethod[$sSchedulingMethod] === 2)
            $sSchedulingMethod = "Via Call";
        else
            $sSchedulingMethod = "Via SMS";

        self::sendEmail("Meeting Scheduling $sSchedulingMethod Confirmation", $sHTML, $sArrayEmail);

        $objLegalBusinessName = UserDetail::from("user_details AS UD")
            ->join("users AS U", "U.id", "UD.user_id")
            ->where("U.id", $iUserId)
            ->select("UD.data")
            ->get()
            ->toArray();

        $sLegalBusinessName = "";
        if(sizeof($objLegalBusinessName) > 0)
            $sLegalBusinessName = "<br>Legal Business Name: ".$objLegalBusinessName[0]["data"];

        $sUserEmail = "<br>Email: $sUserEmail";

        $sHTML = '<!DOCTYPE html>
                    <html>
                    <head>
                    </head>
                    <body>
                        <p style="font-size: 15px">
                            Team BCCUSA,
                            <br />
                            <br />
                            The following user has requested a meeting '.$sSchedulingMethod.$sCompanyName.$sLegalBusinessName.$sPhoneNumber.$sUserEmail.'
                            <br>
                            <br>
                            Please reach out to them to assist.
                            <br>
                            <br>
                            Thank you,
                            <br>
                            <br>
                            Lendotics CRM
                        </p>
                    </body>
                </html>
                ';

        $sArrayEmail = [
            "mcarlucci@bccusa.com",
            "muhammadjunaid@carpediem.team",
        ];

        self::sendEmail("Meeting Scheduling $sSchedulingMethod Confirmation", $sHTML, $sArrayEmail);

        return self::returnMessage($aReturnMessage[rand(0,9)]);
    }
    /**
     * @param string $sModelName    "Model of correspoding table from which the code will be fetched"
     * @param string $sColumnName   "Column name that contains code"
     * @param string $sSlug         "Slug that will be identification code"
     * @return string               "return system generated code such as MS1"
     * @throws BindingResolutionException
     */
    public static function systemGeneratedCode(string $sModelName,string $sColumnName,string $sSlug = "") : string
    {
        $objModel   = app()->make("App\Models\\$sModelName");
        $aData      = $objModel::orderBy("id", "desc")->limit(1)->get($sColumnName)->first();
        $sCode = 0;

        if($aData)
            $sCode = str_replace($sSlug, "", $aData->$sColumnName);

        return $sSlug.(++$sCode);
    }
    private static function uploadDocuments($aRequestParameters) : array
    {
        $sEmail = $aRequestParameters["userEmailAddress"];
        $aUser = User::where("email", $sEmail)->get("id")->first();
        if(!$aUser)
            return self::returnMessage("Sorry, record doesn't exists");

        $iUserId = $aUser->id;
        return self::returnMessage(self::getDocuments($iUserId, $sEmail, false));
    }
}
