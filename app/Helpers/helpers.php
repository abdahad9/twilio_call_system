<?php // Code within app\Helpers\Helper.php
namespace App\Helpers;
use Config;
use Illuminate\Support\Str;
use App\LogActivity;
use Request;
use Twilio\Rest\Client;
use App\Models\TwilioPhoneNumbers;
class Helper
{
    public static function getTwillioAccountFriendlyName($phone)
    {
    // Find your Account Sid and Auth Token at twilio.com/console
    // and set the environment variables. See http://twil.io/secure
    // $sid = config("twilio.sid");
    // $token = config("twilio.token");
    // $twilio = new Client($sid, $token);

    // $account = $twilio->api->v2010->accounts($sid)
    //                               ->fetch();
    $account = TwilioPhoneNumbers::where('phoneNumber','=',$phone)->first();

    return $account;
         
    }
 
}
