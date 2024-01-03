<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KixieLog;

class WebhookController extends Controller
{
    public function webhookKixieCall(Request  $request){
        $call_details = $request->data['callDetails'];
        $call_data = $request->data;
        $data = [
            'business_id' => $this->checkField($call_details['businessid']),
            'call_date' => $this->checkField($call_details['calldate']),
            'from_number' => $this->checkField($call_details['fromnumber']),
            'to_number' => $this->checkField($call_details['tonumber']),
            'duration' => $this->checkField($call_details['duration']),
            'call_type' => $this->checkField($call_details['calltype']),
            'call_status' => $this->checkField($call_details['callstatus']),
            'recording_url' => $this->checkField($call_details['recordingurl']),
            'recordings_id' => $this->checkField($call_details['recordingsid']),
            'disposition' => $this->checkField($call_details['disposition']),
            'callerid_name' => $this->checkField($call_details['calleridName']),
            'email' => $this->checkField($call_details['email']),
            'destination_name' => $this->checkField($call_details['destinationName']),
            'answer_date' => $this->checkField($call_details['answerDate']),
            'callend_date' => $this->checkField($call_details['callEndDate']),
            'crmlink' => $this->checkField($call_details['crmlink']),
            'contact_id' => $this->checkField($call_details['contactid']),
            'number' => $this->checkField($call_data['number']),
            'customer_number' => $this->checkField($call_data['customernumber']),
            'business_number' => $this->checkField($call_data['businessnumber']),
        ];

        $kixie_logs = new KixieLog();
        $kixie_logs->type = 'call';
        $kixie_logs->data = serialize($data);
        $kixie_logs->save();
    }

    public function webhookKixieSms(Request  $request){
        $sms_data = $request->data;
        $data = [
            'from' => $this->checkField($sms_data['from']),
            'customer_number' => $this->checkField($sms_data['customernumber']),
            'to' => $this->checkField($sms_data['to']),
            'business_number' => $this->checkField($sms_data['businessnumber']),
            'direction' => $this->checkField($sms_data['direction']),
            'message' => $this->checkField($sms_data['message']),
            'message_date' => $this->checkField($sms_data['messageDate']),
            'contact' => []
        ];

        if(isset($sms_data['contact']['deal']) && count($sms_data['contact']['deal']) > 0){
            $data['contact']['deal'] = [
                'stage' => $this->checkField($sms_data['contact']['deal']['stage']),
                'title' => $this->checkField($sms_data['contact']['deal']['title']),
                'value' => $this->checkField($sms_data['contact']['deal']['value']),
            ];
        }

        if(isset($sms_data['contact']['contact']) && count($sms_data['contact']['contact']) > 0){
            $data['contact']['contact'] = [
                [
                    'phone' =>  $this->checkField($sms_data['contact']['contact']['phone']),
                    'city' => isset($sms_data['contact']['contact']['city']) ? $sms_data['contact']['contact']['city'] : '',
                    'name' => $this->checkField($sms_data['contact']['contact']['name']),
                    'email' => $this->checkField($sms_data['contact']['contact']['email']),
                ]
            ];
        }

        $kixie_logs = new KixieLog();
        $kixie_logs->type = 'sms';
        $kixie_logs->data = serialize($data);
        $kixie_logs->save();
    }

    public function checkField($field){
        return isset($field) ? $field : '';
    }
}
