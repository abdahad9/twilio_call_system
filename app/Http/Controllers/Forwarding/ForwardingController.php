<?php

namespace App\Http\Controllers\Forwarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TwilioHelper;
use App\Models\CallForwardNumber;
class ForwardingController extends Controller
{
    public function __construct(TwilioHelper $twilioHelper)
    {
        $this->twilioHelper=$twilioHelper;
    }
    
    public function index()
    {
        $data['numbers'] = CallForwardNumber::all();
        return view('forwarding.index',$data);
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
        $response = new VoiceResponse();
        $findNumber = CallForwardNumber::where('phoneNumber',$request->To)->first();
        if($findNumber && $findNumber->number_status == 'true'){
            if($findNumber->whisper_message){
                $response->say($findNumber->whisper_message);
            }
            if($findNumber->forward_to){
                $response->dial($findNumber->forward_to, ['action' => url('call-status?call_action=true'), 'method' => 'POST']);
            }
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function callStatus(Request $request)
    {
        $response = new VoiceResponse();
        if($request->call_action && $request->call_action == 'true'){
            if($request->CallStatus == 'busy' || $request->CallStatus == 'no-answer'){
                $findNumber = CallForwardNumber::where('phoneNumber',$request->To)->first();
                if($findNumber && $findNumber->voicemail){
                    $response->play(asset($findNumber->voicemail));
                }else{
                    $response->say('Please leave a message at the beep.Press the star key when finished.');
                }   
                $response->record(['action' => url('call-status?call_action=voicemail'),
                    'method' => 'POST', 'finishOnKey' => '*']);
            }
        }else if($request->call_action && $request->call_action == 'voicemail'){
            // voice mail code 
        }else{
            // call status code
        }
        return response($response, 200)->header('Content-Type', 'text/xml');
    }
}
