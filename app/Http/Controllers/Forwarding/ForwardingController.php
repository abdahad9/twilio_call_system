<?php

namespace App\Http\Controllers\Forwarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TwilioHelper;
use App\Models\CallForwardNumber;
use App\Models\TwilioPhoneNumbers;
use Twilio\TwiML\VoiceResponse;
use Illuminate\Support\Facades\Log;
use App\Models\CallForwardLog;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use App\User;

class ForwardingController extends Controller
{
    public function __construct(TwilioHelper $twilioHelper)
    {
        $this->twilioHelper=$twilioHelper;
    }

    public function index()
    {
        $forwardNumbercount = CallForwardNumber::where('user_id',Auth::id())->count();
        // $TwilioNumbercount = TwilioPhoneNumbers::where('user_id',Auth::id())->count();
        $data['number_count'] = $forwardNumbercount ;
        //$data['calllogs'] = CallForwardLog::all();
        $data['numbers'] = CallForwardNumber::where('user_id',Auth::id())->get();
        return view('forwarding.index',$data);
    }

    public function getCallChart(Request $request)
    {
        $end = date('Y-m-d', strtotime($request->enddate . ' +1 day'));
        if($request->number){
            $numbers = CallForwardNumber::whereIn('phoneNumber',$request->number)->where('user_id',Auth::id())->pluck('phoneNumber');
        }else{
            $numbers = CallForwardNumber::where('user_id',Auth::id())->pluck('phoneNumber');
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
                  ->where('user_id',Auth::id())
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
                  ->where('user_id',Auth::id())
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
        return datatables(CallForwardNumber::where('user_id',Auth::id()))->toJson();
    }
    public function updateNumberStatus(Request $request)
    {
        $number = CallForwardNumber::find($request->id);
        $number->number_status = $request->number_status;
        $number->save();
        return back();
    }

    public function commonCallLog($request)
    {
        $end = date('Y-m-d', strtotime($request->enddate . ' +1 day'));

        if($request->number){
            $logsData = CallForwardLog::whereIn('twilio_number',$request->number)->latest('call_forward_logs.created_at');
        }else{
            $logsData = CallForwardLog::latest('call_forward_logs.created_at');
        }
        if($request->type == 'month'){
            $logsData = $logsData->whereYear('call_forward_logs.created_at', $request->year);
        }else{
            $logsData = $logsData->whereBetween('call_forward_logs.created_at', [$request->startdate, $end]);
        }
        return $logsData->with('call_forward_number')->select('call_forward_logs.*')->where('call_forward_logs.user_id',Auth::id());
    }

    public function logExport(Request $request)
    {
        $logsData = $this->commonCallLog($request);
        $results = $logsData->get();
        $data = [];
        $data[] = array('Sr. No.','Tracking Number','Start Timer','Duration','Contact');
        $i = 1;
        foreach($results as $call){
            $data[] = [$i++, $call->call_forward_number->friendlyName,  $call->created_at, $call->duration.'s',$call->number ];
        }
        return response()->json($data);
    }

    public function get_all_calllogs(Request $request)
    {   
        $logsData = $this->commonCallLog($request);
        return datatables($logsData)->toJson();
    }

    public function edit($id)
    {
        $data['twilio_number'] = CallForwardNumber::where('id',$id)->where('user_id',Auth::id())->first();
        return view('forwarding.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $twilio_number = CallForwardNumber::where('id',$id)->where('user_id',Auth::id())->first();
        $arrUpdate = [
            'friendlyName' => $request->friendlyName,
            "statusCallback" => route('forwarding.call-status'),
            "voiceUrl" => route('forwarding.incomming')
        ];
        $purchaseNumber = $this->twilioHelper->numberUpdate($twilio_number->sid, $arrUpdate);
        // $purchaseNumber = true;
        if($purchaseNumber){
            $twilio_number->friendlyName = $request->friendlyName;
            $twilio_number->number_of_ring = $request->number_of_ring;
            // if else condition
            //if($request->forward_to){
                $twilio_number->forward_to = $request->forward_to;
            //}
            if($request->recording_status && $request->recording_status == 'on'){
                // dd($request->recording_status);
                $twilio_number->recording_status = 'true';
                
            }else{
                $twilio_number->recording_status = 'false';
                // $twilio_number->forward_to = null;
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
            //var_dump($purchaseNumber);die;
            // $purchaseNumber = (object)['sid' => 'xxxxxxxxxx22322232xxxxxxxx', 'friendlyName' => 'dssfdsfsf'];
            if($purchaseNumber){
                $number = new CallForwardNumber;
                $number->phoneNumber = $value;
                $number->sid = $purchaseNumber->sid;
                $number->friendlyName = $purchaseNumber->friendlyName;
                $number->number_status = 'true';
                $number->user_id = Auth::id();
                $is_save = $number->save();

                try{
                    $mail_to = 'support@notetakerpro.com';
                    $details = [
                        'datetime' => date('Y-m-d H:i:s'),
                        'number' => $value,
                        'sid' => $purchaseNumber->sid,
                        'user' => Auth::user()->email,
                    ];
                    Mail::to($mail_to)->send(new \App\Mail\NumberPurchase($details));
                }catch(\Throwable $e){
                        \Log::info('Call status.', ['id' => $e->getMessage()]);
                }
            }else{
                $request->session()->flash('success', 'Number purchased successfully!');
                return back();
            }
        }
        $request->session()->flash('success', 'Number purchased successfully!');
        return back();
    }


    public function incomming(Request $request)
    {
        $findNumber = CallForwardNumber::where('phoneNumber',$request->To)->with('user')->first();
        if($findNumber && $findNumber->number_status == 'true' && $findNumber->user->remaining_call_minute > 0){
            $call = CallForwardLog::where('call_sid', $request->CallSid)->first();
            if(!$call){
                $call = new CallForwardLog;
            }
            $call->number = $request->From;
            $call->twilio_number = $request->To;
            $call->user_id = $findNumber->user_id;
            $call->type = 'inbound';
            $call->call_sid = $request->CallSid;
            $call->save();
            $response = new VoiceResponse();
            if($findNumber && $findNumber->number_status == 'true'){
                /* */
                if($findNumber->number_of_ring){
                    $timeout = (( 5 * $findNumber->number_of_ring ) - 5);
                }else{
                    $timeout = 10;
                }

                if($findNumber->forward_to){
                    $dial = $response->dial('');
                    $arrDial = [
                        'startConferenceOnEnter' => 'true', 
                        'endConferenceOnExit' => 'true'
                    ];
                    if($findNumber->recording_status && $findNumber->recording_status == 'true'){
                        $arrDial['record'] = 'record-from-start';
                        $arrDial['recordingStatusCallback'] = url('forwarding/recording?call_action=recording');
                    }
                    $call->DialCallSid = $findNumber->id.'_'.date('Ymdhis');
                    $call->save();
                    $dial->conference($call->DialCallSid, $arrDial);
                    $arrCall = [
                        "method" => "POST",
                        "statusCallback" => url('forwarding/forward-status?callid='.$call->id.'&forward_id='.$findNumber->id),
                        "statusCallbackMethod" => "POST",
                        "timeout" => 25,
                        "url" => url('forwarding/forward-call?callid='.$call->id.'&forward_id='.$findNumber->id)
                    ];
                    $call = $this->twilioHelper->createCall($findNumber->forward_to, $findNumber->phoneNumber, $arrCall);
                    Log::info('Call status.', ['id' => $call]);
                    
                    /*$arrDial = [
                        'action' => url('forwarding/call-status?call_action=true'), 
                        'method' => 'POST', 
                        'timeout' => $timeout
                    ];
                    if($findNumber->recording_status && $findNumber->recording_status == 'true'){
                        $arrDial['record'] = 'record-from-ringing-dual';
                        $arrDial['recordingStatusCallback'] = url('forwarding/recording?call_action=recording');
                    }
                    if($findNumber->whisper_message){
                        $response->say($findNumber->whisper_message);
                    }
                    $response->dial('+1'.$findNumber->forward_to, $arrDial);*/
                }else{
                    if($findNumber && $findNumber->voicemail){
                        $response->play(asset($findNumber->voicemail));
                    }else{
                        $response->say('Please leave a message at the beep.Press the star key when finished.');
                    }   
                    $response->record([
                        'action' => url('forwarding/recording?call_action=voicemail'),
                        'method' => 'POST', 'finishOnKey' => '*'
                    ]);
                }
            }
            return response($response, 200)->header('Content-Type', 'text/xml');
        }else{
            $response = new VoiceResponse();
            return response($response, 200)->header('Content-Type', 'text/xml');
        }
    }

    public function forwardStatus(Request $request)
    {
        Log::info('Call status.', ['forwardStatus' => $request->all()]);
        $response = new VoiceResponse();
        if($request->CallStatus == 'busy' || $request->CallStatus == 'no-answer'){
            $call = CallForwardLog::where('id', $request->callid)->first();
            try{
                $mail_to = config('mail.to');
                $details = [
                    'CallDuration' => $request->CallDuration,
                    'phonenumber' => $request->From,
                    'datetime' => date('Y-m-d H:i:s'),
                    'sid' => $request->CallSid, 
                    'f_name' => $call->call_forward_number->friendlyName,
                    'status' => $request->CallStatus,
                    'caller' => $request->To,
                    'type' => 'call'
                ];
                $responseData = Mail::to($mail_to)->send(new \App\Mail\Callforward($details));
                $user = User::find($call->user_id);
                if($user){
                    Mail::to($user->email)->send(new \App\Mail\Callforward($details));
                }
                
            }catch(\Throwable $e){
                Log::info('Call status.', ['id' => $e->getMessage()]);
                // dd($e);
            } 
            $findNumber = CallForwardNumber::where('id',$request->forward_id)->first();
            if($findNumber && $findNumber->voicemail){
                $xml = '<Response><Play>'.asset($findNumber->voicemail).'</Play><Record action="'.url('forwarding/recording?call_action=voicemail').'" method="POST" maxLength="20" finishOnKey="*" /></Response>';
            }else{
                $xml = '<Response><Say>Please leave a message at the beep.Press the star key when finished.</Say><Record action="'.url('forwarding/recording?call_action=voicemail').'" method="POST" maxLength="20" finishOnKey="*" /></Response>';
            } 
            
            $updateArray = [ "twiml" => $xml ];
            $call = $this->twilioHelper->updateCall($call->call_sid, $updateArray);
            Log::info('call update.', ['id' => $call]);
        }
        //Log::info('Call status.', ['id' => $call]);
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function forwardCall(Request $request)
    {
        $response = new VoiceResponse();
        $findNumber = CallForwardNumber::where('id',$request->forward_id)->first();
        if($findNumber){
            $say = $response->say('Hey, ');
            $say->break_(['strength' => 'x-weak', 'time' => '1000ms']);
            $say->prosody($findNumber->whisper_message, ['rate' => '85%']);
            // $response->say($findNumber->whisper_message);
            $call = CallForwardLog::where('id', $request->callid)->first();
            $arrDial = [
                'startConferenceOnEnter' => 'true', 
                'endConferenceOnExit' => 'true'
            ];
            $dial = $response->dial('');
            $dial->conference($call->DialCallSid, $arrDial);
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function callStatus(Request $request)
    {
        Log::info('Call status.', ['id' => $request->all()]);
        $response = new VoiceResponse();
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

                $seconds = $request->CallDuration;
                $minutes = intval($seconds/60);
                if($seconds > $minutes * 60){
                    $minutes = $minutes + 1;
                }
                if($call->user_id){
                    $user = User::find($call->user_id);
                    if($user){
                        $user->remaining_call_minute = $user->remaining_call_minute - $minutes;
                        $user->save();
                    }
                }
            }
            $call->save();
        }
        if($request->call_action){
            /*if($request->call_action && $request->call_action == 'true'){
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
            }*/
        }else{
            if($call && $call->voicemail){
                try{
                    $mail_to = config('mail.to');
                    $details = [
                        'CallDuration' => $call->duration,
                        'phonenumber' => $call->number,
                        'datetime' => $call->created_at,
                        'sid' => $call->call_sid, 
                        'f_name' => $call->call_forward_number->friendlyName,
                        'status' => $call->status,
                        'phonenumber' => $call->twilio_number,
                        'caller' => $call->number,
                        'type' => 'voicemail'
                    ];
                    $responseData = Mail::to($mail_to)->send(new \App\Mail\Callforward($details));
                    $user = User::find($call->user_id);
                    if($user){
                        Mail::to($user->email)->send(new \App\Mail\Callforward($details));
                    }
                }catch(\Throwable $e){
                    Log::info('Call status.', ['id' => $e->getMessage()]);
                    // dd($e);
                }
            }
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function recording(Request $request)
    {
        Log::info('Call recording.', ['id' => $request->all()]);
        $call = CallForwardLog::where('call_sid', $request->CallSid)->with('call_forward_number')->first();
        $response = new VoiceResponse();
        if($request->call_action && $request->call_action == 'voicemail'){
            $call->voicemail_id = $request->RecordingSid;
            $call->voicemail = $request->RecordingUrl;
            $call->save();
        }else{
            // call status code
            $call->recording_sid = $request->RecordingSid;
            $call->recording = $request->RecordingUrl;
            $call->save();
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function removeVoicemail($id)
    {
        $number = CallForwardNumber::find($id);
        $number->voicemail = null;
        $number->save();
        return back();
    }
}
