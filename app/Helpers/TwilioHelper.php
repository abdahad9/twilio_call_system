<?php
namespace App\Helpers;
use Twilio\Rest\Client;

class TwilioHelper {
	/* function __construct()
    {
        // $this->middleware(['owner']);
            $sid = config('twilio.sid');
            $token = config('twilio.token');
            $this->twilio = new Client($sid, $token);
    } */

	function getAvilableNumber($array,$type=null)
	{
		try {
			$sid = config('twilio.sid');
            $token = config('twilio.token');
            // dd($sid,$token);
            $twilio = new Client($sid, $token);
			//$twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
			if($type && $type == 'tollfree'){
				$local = $twilio->availablePhoneNumbers("US")
	                ->tollFree
	                ->read($array, 20);
			}else{
				$local = $twilio->availablePhoneNumbers("US")
	                ->local
	                ->read($array, 20);
			}
			return $local;
		} catch (\Exception $e) {
			// dd($e);
			return false;
		}
	}

	function getNumberDetail($phonesid)
	{
		try{
			$sid = config('twilio.sid');
	        $token = config('twilio.token');
			$twilio = new Client($sid, $token);

			$incoming_phone_number = $twilio->incomingPhoneNumbers($phonesid)
                                ->fetch();
            return $incoming_phone_number;
        }catch(\Exception $e){
        	dd($e);
			return false;
		}
	}

	function getActiveNumber()
	{
		try{
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$phoneNumbers = $twilio->incomingPhoneNumbers
            ->read([], 20);
            return $phoneNumbers;
		}catch(\Exception $e){
			return false;
		}
	}

	function purchaseNumber($array)
	{
		try {
        	$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$incoming_phone_number = $twilio->incomingPhoneNumbers
                               		 ->create($array);
            return $incoming_phone_number;
        } catch (\Exception $e) {
        	//return false;
        	return array( 'status' => 'error', 'error' => json_encode($e->getMessage()));
        }
	}

	function fnDeleteNumber($sid)
	{
		try {
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$twilio->incomingPhoneNumbers($sid)
       				->delete();
            return true;
		} catch (\Exception $e) {
			return false;
			//return array( 'status' => 'error', 'error' => json_encode($e->getMessage()));
		}
	}

	public function numberUpdate($phone_id,$array)
	{
		try {
			// $objSetting = getTwilioAccess();
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);

			$incoming_phone_number = $twilio->incomingPhoneNumbers($phone_id)
			                                ->update($array);
			return true;
			//print($incoming_phone_number->friendlyName);
		} catch (\Exception $e) {
			return false;
		}
	}

	public function getCallData($callsid)
	{
		try {
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$call = $twilio->calls($callsid)
               ->fetch();
            return $call->duration;
        } catch (\Exception $e) {
			return false;
		}
	}

	function createCall($number, $twilioNumber, $callArray)
	{
		try {
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$call = $twilio->calls
               ->create($number, // to
                        $twilioNumber, // from
                        $callArray
               );
            return $call;
		} catch (\Exception $e) {
			return $e->getMessage();
			//return array( 'status' => 'error', 'error' => json_encode($e->getMessage()));
		}
	}

	function updateCall($callsid, $updateArray)
	{
		try {
			$sid = config('twilio.sid');
            $token = config('twilio.token');
			$twilio = new Client($sid, $token);
			$call = $twilio->calls($callsid)
               ->update($updateArray);
            return true;
		} catch (\Exception $e) {
			return $e->getMessage();
			//return array( 'status' => 'error', 'error' => json_encode($e->getMessage()));
		}
	}
}
