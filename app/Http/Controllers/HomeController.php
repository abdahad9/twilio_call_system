<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TwilioPhoneNumbers;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    protected $twilio;
    function __construct()
    {
        // $this->middleware(['owner']);
            $sid = config('twilio.sid');
            $token = config('twilio.token');
            $this->twilio = new Client($sid, $token);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phoneNumbers = TwilioPhoneNumbers::all();
        if(count($phoneNumbers) > 0)
        {
            
        }
        else
        {
            $phoneNumbers = $this->twilio->incomingPhoneNumbers
            ->read([], 20);
            foreach($phoneNumbers as $phone){     
                $number = new TwilioPhoneNumbers();
                $number->phoneNumber = $phone->phoneNumber;
                $number->friendlyName = $phone->friendlyName;
                $number->sid = $phone->sid;

                $number->save();
            }
        }
        return view('home',compact('phoneNumbers'));
    }
}
