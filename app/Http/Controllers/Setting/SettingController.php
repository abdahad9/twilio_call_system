<?php

namespace App\Http\Controllers\Setting;

use App\Models\SurveySetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SendEmailRequest;
use Illuminate\Support\Facades\DB;
use Session, Cache;
use Twilio\Rest\Client;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Facades\Log;
use Artisan,Mail,File,Config;
use App\Models\BackupHistory;
use App\PreTripQuestionnaire;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use App\Models\TwilioPhoneNumbers;
use App\Models\CallForwardNumber;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $twilio;
    function __construct()
    {
        // $this->middleware(['owner']);
            $sid = config('services.twilio')['accountSid'];
            $token = '31b5ccf8aa1cca5177b956c54d4cfb4b';
            $this->twilio = new Client($sid, $token);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function index()
    {
        return view('setting.index');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSiteSetting(Request $request)
    {
//        $this->validateForm($request);

         $input = $request->all();
            // $this->validateGenral($request);
            // dd($input['config']);

        $setting = Setting::where('key', 'site')->first();
        // Storing images
        // $logo = $request->file('config')['logo'];
        // dd($request->file('config')['logo'] == false);

        if (array_key_exists("logo",$input['config'])) {

            $img = $request->file('config')['logo'];
            $path = Storage::disk('public')->put('/',$img);
            $input['config']['logo']=$path;    
            }
        else if (array_key_exists("favicon",$input['config'])) {

                $img = $request->file('config')['favicon'];
                $path = Storage::disk('public')->put('/',$img);
                $input['config']['favicon']=$path;    
            }
        else if (array_key_exists("profile",$input['config'])) {

                $img = $request->file('config')['profile'];
                $path = Storage::disk('public')->put('/',$img);
                $input['config']['profile']=$path;    
            }

            // if ($request->file('favicon') ? $request->file('favicon')->isValid() : false) {
            //     dd("favicon");
            //     $path = storeImage($request->file('favicon'),'favicon', 'favicon');
            //     $input['config']['favicon']=$path;    
            // }

        $setting->updateConfig($input['config']);

        $request->session()->flash('success', 'Updated successfully!');
        return back();
    }

    
    public function addnewnumber(Request $request){
          $newnumber = $request->get('number');
          $friendlyname = $request->get('friendlyname');
    
          $incoming_phone_number = $this->twilio->incomingPhoneNumbers
                                ->create(["phoneNumber" => $newnumber]);

         $number = new CallForwardNumber();
         $number->sid = $incoming_phone_number->sid;
         $number->phoneNumber = $newnumber;
         $number->friendlyName = $incoming_phone_number->friendlyName;

         $number->save();


        return response()->json('success', 200);
                                                             
        }

    public function updatefriendlyname(Request $request){

    $incomingPhoneNumbers = $this->twilio->incomingPhoneNumbers
    ->read(["phoneNumber" => '+'.$request->get('phonenumber')], 20);

    foreach ($incomingPhoneNumbers as $record) {
     $phone_number_sid = $record->sid;
    }

      $incoming_phone_number = $this->twilio->incomingPhoneNumbers($phone_number_sid)
                                ->update([
                                             "friendlyName" => $request->get('friendlyName'),
                                         ]
                                );

                                DB::table('call_forward_numbers')
                                ->where('phoneNumber','+'.$request->get('phonenumber'))
                                // ->where('userid',auth()->user()->id)
                                ->update(['friendlyName' => $incoming_phone_number->friendlyName]);

    return response()->json('success', 200);
                                                         
    }
    
    /**
     * @param Request $request
     */
    public function validateForm(Request $request)
    {
        $validations = [];
        if ($request->has('enable_sales_tax')) {
            $request['enable_sales_tax'] = 1;
        } else {
            $request->merge([
                'enable_sales_tax' => 0
            ]);
        }
        foreach ($request->except('_token', 'guide_module') as $key => $value) {
            if ($value == 1 || $value == 0) {
                $validations[$key] = 'required|boolean';
            }
        }
        $this->validate($request, $validations);
    }


 

    // /**
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function showMail()
    // {
    //     $setting = Setting::where('key', 'mail')->first();
    //     $config = $setting->config;

    //     return view('setting.mail', compact('setting', 'config'));
    // }


    // public function updateMail(Request $request)
    // {
    //     $input = $request->all();

    //     if ($input['config']['driver'] == 'mailgun') {
    //         $this->validateMailgun($request);
    //     }

    //     if ($input['config']['driver'] == 'smtp') {
    //         $this->validateSMTP($request);
    //     }

    //     $setting = Setting::where('key', 'mail')->first();
    //     $setting->updateConfig($input['config']);

    //     Session::flash('success', "Settings were updated successfully");

    //     return back();
    // }

    // public function sendEmail(SendEmailRequest $request)
    // {

    //     // Create array of data 
    //     $emailData = [
    //         'action' => 'email', // view , email
    //         'template' => 'emails.simple',
    //         'subject' => 'Test Email',
    //         'to' => $request->get('to'),
    //         'toName' => $request->get('to'),
    //         'emailContent' => [
    //             'message' => $request->get('message'),
    //         ]
    //     ];
    //     // send email 
    //     $sent = sendEmail($emailData);

    //     if ($sent) {
    //         Session::flash('success', "Email sent successfully!");
    //         return back();

    //     } else {
    //         Session::flash('error', "Email sending failed!");
    //         return back()->withInput();

    //     }
    // }

    // public function showGeneral()
    // {
    //     $setting = Setting::where('key', 'general')->first();

    //     $config = $setting->config;

    //     \Cache::forget('general');

    //     return view('setting.general', compact('setting', 'config'));
    // }


    public function updateGeneral(Request $request)
    {
        $input = $request->all();

        $this->validateGenral($request);

        $setting = Setting::where('key', 'general')->first();
        // Storing image
            if ($request->file('logo') ? $request->file('logo')->isValid() : false) {
                
                $path = storeImage($request->file('logo'),'logo', 'logo');
                $input['config']['logo']=$path;    
            }

        $setting->updateConfig($input['config']);



        //$this->saveImage($request, $setting);

        Session::flash('success', "Settings were updated successfully");

        return back();
    }

    public function validateGenral($request)
    {

        $rules = [
            'config.logo' => 'required',
            'config.favicon' => 'required',
        ];

        $this->validate($request, $rules);

    }

    public function validateMailgun($request)
    {

        $rules = [
            'config.from.name' => 'required',
            'config.from.address' => 'required|email',
            'config.secret' => 'required',
            'config.domain' => 'required',
        ];

        $this->validate($request, $rules);

    }


    public function validateSMTP($request)
    {

        $rules = [
            'config.host' => 'required',
            'config.port' => 'required|numeric',
            'config.username' => 'required',
            'config.password' => 'required',
            'config.from.name' => 'required',
            'config.from.address' => 'required|email',
        ];

        $this->validate($request, $rules);

        // return view('setting.mailSetting');

    }
    public function mailSetting(Request $request)
    {     
        $messages = [];
        $error = null;

        $setting = Setting::query()->where('key', 'mail')->first();

        if (!$setting) {
            return view('setting.mailSetting', compact('mailSetting', 'messages', 'error'));
        }

        $mailSetting = (object)@$setting->config;

        return view('setting.mailSetting', compact('mailSetting', 'messages', 'error'));
    }

    public function storemailSetting(Request $request)
    {
        // dd($request->config);
        $rules = [
            'config.host' => 'required',
            'config.port' => 'required|numeric',
            'config.username' => 'required',
            'config.password' => 'required',
            'config.from.name' => 'required',
            'config.from.address' => 'required|email',
            'config.to' => 'required|email',
        ];
        
        $this->validate($request, $rules);
        // dd($request->config);
        $setting = Setting::query()->firstOrNew([
            'key' => 'mail',
            'view_name' => 'settings.mail',
            'title' => 'Mail Settings',
        ]);

        $setting->updateConfig($request->config);

        $request->session()->flash('success', 'Settings saved.');
        return back();

        return view('setting.mailSetting');
    }

    /**
     * @return mixed
     */
    public function twilioSetting()
    {
        $messages = [];
        $error = null;

        $setting = Setting::query()->where('key', 'twilio')->first();

        if (!$setting) {
            return view('setting.twilio', compact('twilioSetting', 'messages', 'error'));
        }

        $twilioSetting = (object)@$setting->config;

        /*try {
            $client = new Client(@$twilioSetting->sid, @$twilioSetting->token);
            // Get Recent Calls
            foreach ($client->account->messages->read() as $key => $call) {

                $dateCreated = (array)$call->dateCreated;

                $messages[$key]['from'] = $call->from;
                $messages[$key]['to'] = $call->to;
                $messages[$key]['body'] = $call->body;
                $messages[$key]['date'] = date('m/d/Y  H:s', strtotime($dateCreated['date']));
                $messages[$key]['status'] = $call->status;

                //$time = $call->startTime->format("Y-m-d H:i:s");
                //echo "Call from $call->from to $call->to body: $call->body \n";
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }*/

        return view('setting.twilio', compact('twilioSetting', 'messages', 'error'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeTwilioSetting(Request $request)
    {
        $this->validate($request, [
            'config.sid' => 'required',
            'config.token' => 'required',
            'config.from' => 'required',
        ]);

        $setting = Setting::query()->firstOrNew([
            'key' => 'twilio',
            'view_name' => 'settings.twilio',
            'title' => 'Twilio Settings',
        ]);

        $setting->updateConfig($request->config);

        $request->session()->flash('success', 'Settings saved.');
        TwilioPhoneNumbers::truncate();
        return back();
    }


    public function showGateway($value = '')
    {
        $setting = Setting::where('key', 'gateway')->first();

        $config = @$setting->config;


        return view('setting.gateway', compact('setting', 'config'));
    }


    public function showGatewayAdmin($value = '')
    {
        $setting = Setting::where('key', 'gateway')->first();

        $config = @$setting->config;


        return view('setting.gateway-admin', compact('setting', 'config'));
    }


    public function updateGateway(Request $request)
    {
        $input = $request->all();
       //return $input['config'];
       //$this->validateGateway($request);

       $setting = Setting::where('key','gateway')->first();
       if (!$setting) {
           $setting=new Setting;
           $setting->key='gateway';
           $setting->view_name='settings.gateway';
           $setting->config=[];
           $setting->save();

       } else {
           # code...
       }
       
       
        $setting->updateConfig($input['config']);

        Session::flash('success', "Settings were updated successfully");

        return back();
    }


    public function validateGateway($request)
    {

        $rules = [
            'config.mode' => 'required|in:0,1',
            'config.mode' => 'required',
        ];

        $this->validate($request, $rules);

    }

    /**
     * @param Request $request
     * @param $user
     */
    public function logoUpdate(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);


        try {

            $old_path = null;
            $configs = is_array($setting->config) ? $setting->config : array();

            if (isset($configs['logo'])) {
                $old_path = $configs['logo'];
            }

            $path = storeImage($request->file('logo'), 'general_logo');
            $configs = array_merge($configs, ['logo' => $path]);

            $setting->updateConfig($configs);

            // Need to delete old logo which was having before
            if ($old_path) {
                \Storage::disk('public')->delete($old_path);
            }

            $request->session()->flash('success', "Logo updated successfully.");
            return back();
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return back();
        }
    }

    public function destroy_email($setting_id, $email = "")
    {
        $setting = Setting::find($setting_id);

        $success = $setting->removeEmail($email)->save();

        return response()->json('success', 200);
    }

    public function twilioSend( Request $request )
    {
        $phone =  $request->get('phone');
        $message =  $request->get('message'); 

        $sms_service = new \App\Services\TwilioSmsService; 

        $response  =  $sms_service->sendSMS($phone, $message );
        
        if ($response['status']) {
           return response()->json('success', 200);
        }

        return response()->json('error', 500);
        
    }
    public function twilioNumbers()
    {
        $phoneNumbers = CallForwardNumber::all();

        if(count($phoneNumbers) > 0)
        {

        }
        else
        {
            $phoneNumbers = $this->twilio->incomingPhoneNumbers
            ->read([], 20);
            foreach($phoneNumbers as $phone){
                $number = new CallForwardNumber();
                $number->phoneNumber = $phone->phoneNumber;
                $number->friendlyName = $phone->friendlyName;
                $number->sid = $phone->sid;

                $number->save();
            }
        }

        $local = $this->twilio->availablePhoneNumbers("US")
                ->local
                ->read(["areaCode" => 510], 20);

        return view('setting.twilio.phonenumbers',compact(['phoneNumbers','local']));
    }
}
