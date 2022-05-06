<?php

namespace App\Http\Controllers\Calls;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\TwiML\VoiceResponse;
use Twilio\Rest\Client;
// use Twilio\TwiML;
use Mail;
use App\Models\TwilioPhoneNumbers;
use App\Models\CallForwardNumber;

class CallController extends Controller
{
    /**
     * Process a new call
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newCall(Request $request)
    { 
        \Log::info(json_encode($request->all()));
        //TwilioPhoneNumbers
        $response = new VoiceResponse();

        $fromNumber = $request->input('from_number');
        $tNumber = CallForwardNumber::where('phoneNumber', $fromNumber)->with('user')->first();
        if($tNumber && $tNumber->user->remaining_call_minute > 0){
            $callerIdNumber = config('services.twilio')['number'];
            $server = $request->input('server');
            
            $pin = $request->input('pin');
            $participant_id = $request->input('participant_id');
            $zoom_pin= $pin.'wwwwww#wwwwww'.$participant_id;

            // dd($callerIdNumber,$fromNumber,$pin,$request->input('phoneNumber'));

            $dial = $response->dial(null, ['record' => 'record-from-answer','callerId'=>$fromNumber]);
            $phoneNumberToDial = $request->input('phoneNumber');

            if (isset($phoneNumberToDial)) {
                if($server == 'google_meets'){
                    $dial->number($phoneNumberToDial,['sendDigits'=>$pin]);
                }else{
                    $dial->number($phoneNumberToDial,['sendDigits'=>$zoom_pin]);
                }
            } else {
                $dial->client('support_agent');
            }
        }else{
            $response->say('Your calling minutes are over');
        }
        // \Log::info($response);

        return $response;
    }
     public function generateNewCall(Request $request)
    {
       return view('calls.new-call');
    }
    public function incomming(Request $request)
    {
        \Log::info(json_encode($request->all()));
         $twiml = new VoiceResponse();
          $twiml->say('we are not available right now');

        // $twiml->redirect('https://demo.twilio.com/docs/voice.xml',['method' => 'POST']);
         // $twiml->reject();
         return $twiml;
        //  $response = new VoiceResponse();
        // $response->say('Hello Qaisar!', ['voice' => 'woman', 'language' => 'en-EN']);
    }

    
}
