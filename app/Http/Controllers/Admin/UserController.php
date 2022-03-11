<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserIp;
use App\Helpers\TwilioHelper;
use App\Models\TwilioPhoneNumbers;
use App\Models\CallForwardNumber;

class UserController extends Controller
{
    public function __construct(TwilioHelper $twilioHelper)
    {
        $this->twilio=$twilioHelper;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function show(User $user)
    {
        $activeNumbers = $this->twilio->getActiveNumber();
        $numbers = [];
        $forwardNumbers = CallForwardNumber::pluck('phoneNumber')->whereNotNull('user_id')->toArray();
        $avilabalNumbers = [];
        foreach($activeNumbers as $phone){  
            $avilabalNumbers[] =  $phone->phoneNumber; 
            if(!in_array($phone->phoneNumber, $forwardNumbers)){
                $numbers[] = [
                    'phoneNumber' => $phone->phoneNumber,
                    'friendlyName' => $phone->friendlyName,
                    'sid' => $phone->sid
                ];
            } 
        }

        // $databaseNumbers = CallForwardNumber::pluck('phoneNumber')->toArray();
        // foreach($databaseNumbers as $dNumber){
        //     if(!in_array($dNumber, $avilabalNumbers)){
        //         CallForwardNumber::where('phoneNumber', $dNumber)->delete();
        //     }
        // }

        $twilio_phone_numbers = CallForwardNumber::where('user_id',null)->get();

        foreach($twilio_phone_numbers as $tpNumber){
            $numbers[] = [
                    'phoneNumber' => $tpNumber->phoneNumber,
                    'friendlyName' => $tpNumber->friendlyName,
                    'sid' => $tpNumber->sid
                ];
        }
        $data['forward_numbers'] = $forwardNumbers;
        $data['numbers'] = $numbers;
        // dd($data['numbers']);
        $data['user'] = $user;
        // dd($data['user']->sub);
        $data['assign_numbers']  = CallForwardNumber::where('user_id',$user->id)->get();
        $data['user_ips'] = UserIp::where('user_id',$user->id)->paginate(3);
        return view('admin.user.view', $data);
    }

    public function getAll(Request $request)
    {
        $user = User::where('role', 'user');
        if($request->status == 'all'){
            // return datatables(->with('subscription'))->toJson();
        }else{
            $user->where('status', $request->status);
        }
        if($request->sortby == 'signup'){
            $user->orderBy('created_at', 'desc');
        }else{
            $user->with(array('subscription' => function($query) {
                $query->orderBy('next_date', 'desc');
            }));
            //$user->orderBy('created_at', 'desc');
        }
        if($request->q && $request->q != ''){
            $q = $request->q;
            $user->where(function($query) use ($q){
                $query->where('email','like', $q)
                ->orWhere('name', 'like', '%' . $q . '%');
            });
        }

        if($request->startdate && $request->enddate && $request->startdate != '' && $request->enddate != ''){
            $from = $request->startdate;
            $to = $request->enddate;
            $user->whereBetween('created_at', [$from, $to]);
        }
        return datatables($user->with('subscription'))->toJson();
        
    }

    public function assignNumber(Request $request)
    {
        $getNumber = $this->twilio->getNumberDetail($request->sid);
        if($getNumber){
            $arrNumber = array(
                "statusCallback" => route('forwarding.call-status'),
                "voiceUrl" => route('forwarding.incomming')
            );
            $purchaseNumber = $this->twilio->numberUpdate($request->sid, $arrNumber);
            $twilioNumber = CallForwardNumber::where('phoneNumber',$getNumber->phoneNumber)->first();
            if($twilioNumber){
                $twilioNumber->friendlyName = $getNumber->friendlyName;
                $twilioNumber->user_id = $request->user_id;
                $twilioNumber->sid = $request->sid;
                $twilioNumber->phoneNumber = $getNumber->phoneNumber;
                $twilioNumber->number_status = 'true';
                $twilioNumber->save();
            }else{
                $number = new CallForwardNumber;
                $number->phoneNumber = $getNumber->phoneNumber;
                $number->sid = $request->sid;
                $number->friendlyName = $getNumber->friendlyName;
                $number->number_status = 'true';
                $number->user_id = $request->user_id;
                $is_save = $number->save();
            }
        }
        // dd($getNumber, $request->sid);
        // if($getNumber){
            
        //     $twilioNumber = TwilioPhoneNumbers::where('user_id',$getNumber->phoneNumber)->first();
        //     if($twilioNumber){
        //         $twilioNumber->friendlyName = $getNumber->friendlyName;
        //         $twilioNumber->user_id = $request->user_id;
        //         $twilioNumber->save();
        //     }else{
        //         $number = new TwilioPhoneNumbers();
        //         $number->phoneNumber = $getNumber->phoneNumber;
        //         $number->friendlyName = $getNumber->friendlyName;
        //         $number->sid = $getNumber->sid;
        //         $number->user_id = $request->user_id;
        //         $number->save();
        //     }
        // }
        return redirect('user/show/'.$request->user_id);
    }

    public function unassignNumber(User $user, CallForwardNumber $twilio_phone_numbers)
    {
        $twilio_phone_numbers->user_id = null;
        $twilio_phone_numbers->save();
        return redirect('user/show/'.$user->id);
    }

    public function changeStatus(User $user, $status)
    {
        $user->status = $status;
        $user->save();
        return redirect('user/show/'.$user->id);
    }
}
