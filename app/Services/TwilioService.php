<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{

    public function sendSms($toPhoneNumber, $message)
    {
        $twilioPhoneNumber  = env('TWILIO_NUMBER');
        $twilioSid          = env('TWILIO_SID');
        $twilioToken        = env('TWILIO_AUTH_TOKEN');
        $client             = new Client($twilioSid, $twilioToken);
        // Remove spaces from the phone number
        $toPhoneNumber = str_replace(' ', '', $toPhoneNumber);
        try {
            $client->messages->create(
                $toPhoneNumber,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
