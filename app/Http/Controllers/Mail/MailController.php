<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function mail(Request $request)
    { 
        \Log::info(json_encode($request->all()));
         $mail_to = config('mail.to');

        // if($request->all('CallStatus')['CallStatus'] == 'completed'){
            // $phonenumber = $request->all('Caller')['Caller'];
            // $datetime = $request->all('Timestamp')['Timestamp'];
            // $CallDuration = $request->all('CallDuration')['CallDuration'];
            // $to = $request->all('To')['To'];
            // $from = $request->all('From')['From'];
            // $sid = $request->all('CallSid')['CallSid'];

            $details = [
                'phonenumber' => '1212',
                'datetime' => '1212',
                'CallDuration' => '1212',
                'to' => '1212',
                'from' => '1212',
                'sid' =>  'aadas',

            ];
            
            // \Log::info($details);
            Mail::to('abdahad9@gmail.com')->send(new \App\Mail\MyTestMail($details));
            \Log::info('Email sent');

        // }
  
        // $details = [
        //     'phonenumber' => '123456',
        //     'datetime' => 'Thu, 01 Apr 2021 18:18:32 +0000',
        //     'CallDuration' => '20',
        //     'from'=>'1325',
        //     'to' => '000',
        //     'sid' => 'CA50a201af0c13dca9957c72c3a160b3b4',
        // ];
        
        // return view('Mail.twillioMail',compact('details'));
        // \Mail::to($mail_to)->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email is Sent.......");

    }
}
