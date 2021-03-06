<?php

namespace App\Http\Controllers\Calls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\CallNote;
use App\Models\BlockList;
use App\CallLog;
use App\Models\TwilioPhoneNumbers;
use App\Models\CallForwardNumber;
use DB;
use Mail;
use Auth;
use App\User;

class CallTrackingController extends Controller
{
    public function report(Request $request)
    {
        $phonenumber = $request->get('phonenumber');
			// Find your Account Sid and Auth Token at twilio.com/console
			// and set the environment variables. See http://twil.io/secure
			// $sid = config('twilio.sid');
			// $token = config('twilio.token');
			// $twilio = new Client($sid, $token);
			// $now = new \DateTime();
			// $date = new \DateTime();
			// $now->modify('-1 hours');
			// $formatted_date = $now->format('Y-m-d H:i:s');
			// $date = new \DateTime($formatted_date);
            //  if($request->url)
            //     {   
            //          $calls = $twilio->calls
            //             ->getPage($request->url);//'startDate'=>$date->format(\DateTime::RFC822)
            //             return view('calls.report',compact('calls'));
            //     }
			// $calls = $twilio->calls
            //     ->page(['direction' => 'outbound-api'], 20);//'startDate'=>$date->format(\DateTime::RFC822)

                $calls = DB::table('call_logs')
                ->where('call_from', $phonenumber)
                ->where('user_id', Auth::id())
                ->orderBy('id', 'DESC')
                ->get();

                // dd($calls);  



                // dd($calls = $twilio->calls
                // ->getPage($calls->getNextPageUrl()));//'startDate'=>$date->format(\DateTime::RFC822)
			// dd($calls->nextPage());
            // dd($callss);

    	return view('calls.report',compact('calls'));
    }
    public function calllogs(Request $request)
    {
        $mail_to = config('mail.to');
        $sid = config('services.twilio')['accountSid'];
        $token = '31b5ccf8aa1cca5177b956c54d4cfb4b';
        $twilio = new Client($sid, $token);

        $callsid = $request->all('CallSid')['CallSid'];

        $calls = $twilio->calls->page(['direction' => 'outbound-api'], 20);

        $CallLogs = new CallLog();
        $minutes = 0;
        $from = false;
        foreach ( $calls as $call ) {
            if ( $call->parentCallSid == $callsid ) {
                $CallLogs->call_from = $call->from;
                $CallLogs->call_to = $call->to;
                $CallLogs->duration = $call->duration;
                $CallLogs->time = $call->dateCreated;
                $CallLogs->status = $call->status;
                $CallLogs->call_sid = $call->parentCallSid;

                $details = [
                    // 'phonenumber' => '1212',
                    'datetime' =>  $call->dateCreated,
                    'CallDuration' => $call->duration,
                    'to' => $call->to,
                    'from' => $call->from,
                    'sid' =>  $call->parentCallSid,  
                ];
                $seconds = $call->duration;
                $minutes = intval($seconds/60);
                if($seconds > $minutes * 60){
                    $minutes = $minutes + 1;
                }
                $from = $call->from;
                $tnumber = CallForwardNumber::where('phoneNumber', $from)->first();
                if($from){
                    if($tnumber && $tnumber->user_id){
                        $user = User::find($tnumber->user_id);
                        if($user){
                            $user->remaining_call_minute = $user->remaining_call_minute - $minutes;
                            $user->save();
                        }
                        $CallLogs->user_id = $tnumber->user_id;
                    }
                }
                
            }
        }
        $recordings = $twilio->recordings->read(array('callSid' => $callsid), 50);
            foreach ( $recordings as $record ) {
                $CallLogs->recording_sid = $record->sid;
            }

        $CallLogs->save();

        try{
            Mail::to($mail_to)->send(new \App\Mail\MyTestMail($details));
            \Log::info('Email sent');
            \Log::info('call save in database');
        }catch(\Throwable $e){
            \Log::info('Call status.', ['id' => $e->getMessage()]);
            // dd($e);
        }
        
        return response()->json('success', 200);
    }
    public function choosenumber(Request $request)
    {
        $phoneNumbers = CallForwardNumber::where('user_id', Auth::id())->get();
        return view('calls.choosenumber',compact('phoneNumbers'));
    }



    public function blockByCampaign(Request $request)
    {
        // dd($request->to);
        $block = BlockList::where('from',$request->from)->first();
        if (!$block) {
            $block = new BlockList();
        }
        $block->to =$request->to; 
        $block->from =$request->from; 
        $block->by_campaign =true; 
        $block->by_system =false;
        $block->save(); 
    }
     public function blockBySystem(Request $request)
    {
        $block = BlockList::where('from',$request->from)->first();
        if (!$block) {
            $block = new BlockList();
        }
        $block->to =$request->to; 
        $block->from =$request->from; 
        $block->by_campaign =true; 
        $block->by_system =true;
        $block->save(); 
    }
    public function notes(Request $request)
    {
    	$note = CallNote::where('call_sid',$request->call_sid)->first();
        if (!$note) {
            $note = new CallNote();
        }
    	$note->call_sid = $request->call_sid;
		$note->call_id = $request->call_sid;
		$note->phone_number = $request->phone_number;
		$note->note = $request->note;
		$note->save();

    }
    public function viewNotes(Request $request)
    {
    	$note = CallNote::where('call_sid',$request->call_sid)->first();
    	if($note)
    	{
    		echo $note->note;
    	}
    }
}

