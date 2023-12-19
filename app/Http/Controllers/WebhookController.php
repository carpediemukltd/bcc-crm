<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KixieLog;

class WebhookController extends Controller
{
    public function webhookKixieCall(Request  $request){
        $call_details = $request->data->callDetails;
        $call_data = $request->data;
        $data = [
            'business_id' => $call_details->businessid,
            'call_date' => $call_details->calldate,
            'from_number' => $call_details->fromnumber,
            'to_number' => $call_details->tonumber,
            'duration' => $call_details->duration,
            'call_type' => $call_details->calltype,
            'call_status' => $call_details->callstatus,
            'recording_url' => $call_details->recordingurl,
            'recordings_id' => $call_details->recordingsid,
            'disposition' => $call_details->disposition,
            'callerid_name' => $call_details->calleridName,
            'email' => $call_details->email,
            'destination_name' => $call_details->destinationName,
            'answer_date' => $call_details->answerDate,
            'callend_date' => $call_details->callEndDate,
            'crmlink' => $call_details->crmlink,
            'contact_id' => $call_details->contactid,
            'number' => $call_data->number,
            'customer_number' => $call_data->customernumber,
            'business_number' => $call_data->businessnumber,
        ];

        $kixie_logs = new KixieLog();
        $kixie_logs->type = 'call';
        $kixie_logs->data = serialize($data);
        $kixie_logs->save();
    }

    public function webhookKixieSms(Request  $request){
        $sms_data = $request->data;
        $data = [
            'from' => $sms_data->from,
            'customer_number' => $sms_data->customernumber,
            'to' => $sms_data->to,
            'business_number' => $sms_data->businessnumber,
            'direction' => $sms_data->direction,
            'message' => $sms_data->message,
            'contact' => [
                            'deal' =>
                                [
                                    'stage' => $sms_data->contact->deal->stage,
                                    'title' => $sms_data->contact->deal->title,
                                    'value' => $sms_data->contact->deal->value,
                                ],
                            'contact' =>
                                [
                                    'phone' =>  $sms_data->contact->contact->phone,
                                    'city' => $sms_data->contact->contact->city,
                                    'name' => $sms_data->contact->contact->name,
                                    'email' => $sms_data->contact->contact->email,
                                ],
                            'device' =>
                                [
                                    'isactive' => $sms_data->contact->device->isactive
                                ]
                         ]
        ];

        $kixie_logs = new KixieLog();
        $kixie_logs->type = 'sms';
        $kixie_logs->data = serialize($data);
        $kixie_logs->save();
    }
}
