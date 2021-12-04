<?php

namespace App\Http\Controllers\Forwarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TwilioHelper;
use App\Models\CallForwardNumber;
use Twilio\TwiML\VoiceResponse;
use Illuminate\Support\Facades\Log;
use App\Models\CallForwardLog;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;

class ForwardingController extends Controller
{
    public function __construct(TwilioHelper $twilioHelper)
    {
        $this->twilioHelper=$twilioHelper;
    }

    public function index()
    {
        $data['calllogs'] = CallForwardLog::all();
        $data['numbers'] = CallForwardNumber::all();
        return view('forwarding.index',$data);
    }

    public function getCallChart(Request $request)
    {
        $end = date('Y-m-d', strtotime($request->enddate . ' +1 day'));
        if($request->number){
            $numbers = CallForwardNumber::whereIn('phoneNumber',$request->number)->pluck('phoneNumber');
        }else{
            $numbers = CallForwardNumber::pluck('phoneNumber');
        }
        $dates = array();
        $dateSets = [];
        $arrCommonData = [];
        if($request->type == 'month'){
            $dates = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
            ];
            for ($i = 0; $i < 12; $i++) {
                $arrCommonData[] = 0;
            }

            foreach($numbers as $number){
                $logs = CallForwardLog::select(DB::raw('count(id) as count, MONTH(created_at) as month'))
                  ->groupBy('month')
                  ->where('twilio_number',$number)
                  ->whereYear('created_at', $request->year)
                  ->get();
                
                $numberData = $arrCommonData;
                foreach ($logs as $com) {
                    $numberData[$com->month - 1] = $com->count;
                }
                $r = rand(0,255);
                $g = rand(0,255);
                $b = rand(0,255);
                $dateSets[] = [
                    'label' => $number,
                    'borderWidth' => 1,
                    'borderColor' => 'rgb('.$r.', '.$g.', '.$b.')',
                    'data' => $numberData
                ];
            }
        }else{
            $labels = [];
            $current = strtotime($request->startdate);
            $last = strtotime($request->enddate);
            $step = '+1 day';
            $output_format = 'Y-m-d';
            while( $current <= $last ) {
                $dates[] = date($output_format, $current);
                $current = strtotime($step, $current);
            }
            
            $callLogs = [];
            foreach($dates as $date){
                $arrCommonData[] = 0;
            }

            foreach($numbers as $number){
                $logs = CallForwardLog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                  ->groupBy('date')
                  ->where('twilio_number',$number)
                  ->whereBetween('created_at', [$request->startdate, $end])
                  ->get();
                
                $numberData = $arrCommonData;
                foreach ($logs as $log) {
                    $newDate = $log->date;
                    if( in_array( $newDate ,$dates ) ){
                        $numberData[array_search ($newDate, $dates)] = $log->count;
                    }
                }
                $r = rand(0,255);
                $g = rand(0,255);
                $b = rand(0,255);
                $dateSets[] = [
                    'label' => $number,
                    'borderWidth' => 1,
                    'borderColor' => 'rgb('.$r.', '.$g.', '.$b.')',
                    'data' => $numberData
                ];
            }
        }
        
        
        return response()->json([
            'labels' => $dates,
            'datasets' => $dateSets
        ]);
    }

    public function get_all(Request $request)
    {   
        return datatables(CallForwardNumber::query())->toJson();
    }
    public function updateNumberStatus(Request $request)
    {
        $number = CallForwardNumber::find($request->id);
        $number->number_status = $request->number_status;
        $number->save();
        return back();
    }

    public function logExport(Request $request)
    {
        $end = date('Y-m-d', strtotime($request->enddate . ' +1 day'));

        if($request->number){
            $logsData = CallForwardLog::whereIn('twilio_number',$request->number);
        }else{
            $logsData = CallForwardLog::where('id','<>',0);
        }
        if($request->type == 'month'){
            $logsData = $logsData->whereYear('created_at', $request->year);
        }else{
            $logsData = $logsData->whereBetween('created_at', [$request->startdate, $end]);
        }
        $results = $logsData->get();
        $data = [];
        $data[] = array('Sr. No.','Tracking Number','Start Timer','Duration','Contact');
        $i = 1;
        foreach($results as $call){
            $data[] = [$i++, $call->twilio_number,  $call->created_at, $call->duration.'s',$call->number ];
        }
        return response()->json($data);
    }

    public function get_all_calllogs(Request $request)
    {   
        $end = date('Y-m-d', strtotime($request->enddate . ' +1 day'));

        if($request->number){
            $logsData = CallForwardLog::whereIn('twilio_number',$request->number);
        }else{
            $logsData = CallForwardLog::where('id','<>',0);
        }
        if($request->type == 'month'){
            $logsData = $logsData->whereYear('created_at', $request->year);
        }else{
            $logsData = $logsData->whereBetween('created_at', [$request->startdate, $end]);
        }
        return datatables($logsData)->toJson();
    }

    public function edit($id)
    {
        $data['twilio_number'] = CallForwardNumber::find($id);
        return view('forwarding.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $twilio_number = CallForwardNumber::find($id);
        $arrUpdate = [
            'friendlyName' => $request->friendlyName
        ];
        $purchaseNumber = $this->twilioHelper->numberUpdate($twilio_number->sid, $arrUpdate);
        if($purchaseNumber){
            $twilio_number->friendlyName = $request->friendlyName;
            $twilio_number->number_of_ring = $request->number_of_ring;
            // if else condition
            if($request->recording_status && $request->recording_status == 'on'){
                $twilio_number->recording_status = 'true';
                $twilio_number->forward_to = $request->forward_to;
            }else{
                $twilio_number->recording_status = 'false';
                $twilio_number->forward_to = null;
            }
            $twilio_number->whisper_message = $request->whisper_message;
            if($request->file('voicemail')){
                $file = $request->file('voicemail');
                $destinationPath = 'uploads';
                $voicemailName = date('Ymdhis').'_'.$file->getClientOriginalName();
                $file->move($destinationPath,$voicemailName);
                $twilio_number->voicemail = 'uploads/'.$voicemailName;
            }
            $twilio_number->save();
            $request->session()->flash('success', 'Number updated successfully!');
        }else{
            $request->session()->flash('error', 'Number not updated!');
        }
        return redirect('forwarding');
    }
    public function getTwilioNumbers(Request $request)
    {
        $arrNumber = [
            'voiceEnabled' => true, 
            'smsEnabled' => true,
            'areaCode' => $request->area_code
        ];
        $numbers = $this->twilioHelper->getAvilableNumber($arrNumber, $request->type);
        // dd($numbers);
        $arrNumbers = array();
        if($numbers){
            foreach($numbers as $number){
                $arrNumbers[] = $number->phoneNumber;
            }
        }
        return response()->json($arrNumbers);
    }

    public function purchaseNumbers(Request $request)
    {
        // $value = $request->phone_number;
        foreach ($request->addnumber as $key => $value) {
            $arrNumber = array(
                "phoneNumber" => $value,
                "statusCallback" => route('forwarding.call-status'),
                "voiceUrl" => route('forwarding.incomming')
            );
            $purchaseNumber = $this->twilioHelper->purchaseNumber($arrNumber);
            // dd($purchaseNumber);
            if($purchaseNumber){
                $number = new CallForwardNumber;
                $number->phoneNumber = $value;
                $number->sid = $purchaseNumber->sid;
                $number->friendlyName = $purchaseNumber->friendlyName;
                $number->number_status = 'true';
                $is_save = $number->save();
            }
        }
        $request->session()->flash('success', 'Number purchased successfully!');
        return back();
    }


    public function incomming(Request $request)
    {
        $findNumber = CallForwardNumber::where('phoneNumber',$request->To)->first();
        if($findNumber && $findNumber->number_status == 'true'){
            $call = CallForwardLog::where('call_sid', $request->CallSid)->first();
            if(!$call){
                $call = new CallForwardLog;
            }
            $call->number = $request->From;
            $call->twilio_number = $request->To;
            $call->type = 'inbound';
            $call->call_sid = $request->CallSid;
            $call->save();
            $response = new VoiceResponse();
            
            if($findNumber && $findNumber->number_status == 'true'){
                if($findNumber->whisper_message){
                    $response->say($findNumber->whisper_message);
                }
                if($findNumber->number_of_ring){
                    $timeout = (( 5 * $findNumber->number_of_ring ) - 5);
                }else{
                    $timeout = 10;
                }
                if($findNumber->forward_to){
                    $response->dial('+1'.$findNumber->forward_to, ['action' => url('forwarding/call-status?call_action=true'), 'method' => 'POST', 'timeout' => $timeout]);
                }
            }
            return response($response, 200)->header('Content-Type', 'text/xml');
        }else{
            $response = new VoiceResponse();
            return response($response, 200)->header('Content-Type', 'text/xml');
        }
    }

    public function callStatus(Request $request)
    {
        $call = CallForwardLog::where('call_sid', $request->CallSid)->first();
        if($call){
            if($request->CallStatus){
                $call->status = $request->CallStatus;
            }
            if($request->DialCallSid){
                $call->DialCallSid = $request->DialCallSid;   
                $call->DialCallStatus = $request->DialCallStatus;   
                $call->DialCallDuration = $request->DialCallDuration;   
            }
            if($request->CallDuration){
                $call->duration = $request->CallDuration;
            }
            $call->save();
        }
        // Log::info('Call Status.', ['id' => $request->all()]);
        $response = new VoiceResponse();
        if($request->call_action && $request->call_action == 'true'){
            if($request->DialCallStatus == 'busy' || $request->DialCallStatus == 'no-answer'){
                $findNumber = CallForwardNumber::where('phoneNumber',$request->To)->first();
                if($findNumber && $findNumber->voicemail){
                    $response->play(asset($findNumber->voicemail));
                }else{
                    $response->say('Please leave a message at the beep.Press the star key when finished.');
                }   
                $response->record(['action' => url('forwarding/recording?call_action=voicemail'),
                    'method' => 'POST', 'finishOnKey' => '*']);
            }
        }else if($request->call_action && $request->call_action == 'voicemail'){
            // voice mail code 
        }else{
            // call status code
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function recording(Request $request)
    {
        // Log::info('Call recording.', ['id' => $request->all()]);
        $call = CallForwardLog::where('call_sid', $request->CallSid)->first();
        $response = new VoiceResponse();
        if($request->call_action && $request->call_action == 'voicemail'){
            $call->voicemail_id = $request->RecordingSid;
            $call->voicemail = $request->RecordingUrl;
            $call->save();
        }else{
            // call status code
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }
}
