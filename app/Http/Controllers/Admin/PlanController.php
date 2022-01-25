<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Helpers\StripeHelper;
use App\User;
use App\Models\Subscription;
use App\Models\Transaction;
use Mail;

class PlanController extends Controller
{
    public function index()
    {
        return view('admin.plan.index');
    }

    public function signupThankYou()
    {
        return view('auth.signup_thankyou');
    }

    public function checkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user){
            $valid = ['valid' => false ];
        } else {
            $valid = ['valid' => true ];
        }
        return response()->json($valid);
    }

    public function store(Request $request)
    {
        $stripe = new StripeHelper();
        $arrProduct = array(
            'name' => $request->title,
            'type' => 'service',
        );
       
        $product = $stripe->createProduct($arrProduct);
        if($product){
            $arrPlan = array(
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'interval' => 'month',
                'product' => $product,
            );
            $activeplan = $stripe->createPlan($arrPlan);
            if($activeplan){
                $plan = new Plan;
                $plan->title = $request->title;
                $plan->prod_id = $product;
                $plan->plan_id = $activeplan;
                $plan->amount = $request->amount;
                $plan->description = $request->description;
                $plan->total_number = $request->total_number;
                $plan->calling_minute = $request->calling_minute;
                $plan->save();

                $request->session()->flash('success', 'Plan added successfully!');
                return redirect()->route('plan.');

            }else{
                $request->session()->flash('error', 'Plan not added!');
                return back();
            }
        }else{
            $request->session()->flash('error', 'Plan not added!');
            return back();
        }
    }

    public function show(Plan $plan)
    {
        $data['plan'] = $plan;
        return view('admin.plan.view',$data);
    }

    public function getAll()
    {
        return datatables(Plan::query())->toJson();
    }

    public function create()
    {
        return view('admin.plan.create');
    }

    public function signup()
    {
        $data['plans'] = Plan::all();
        return view('auth.signup', $data);
    }

    public function register(Request $request)
    {
        $stripe = new StripeHelper;
        $arrUser = [
            'description' => 'Customer for Telefeo',
            'email' => $request->email,
            'name' => $request->name
        ];
        $stripe = new StripeHelper();
        $customer = $stripe->createCustomer($arrUser);
        if($customer){
            $user = new User;
            $user->customer = $customer;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->role = 'user';
            $payment = $stripe->createPaymentMethod($customer,$request->token);
            if($payment){
                $plan = Plan::find($request->plan);
                $subscribe = $stripe->createSubscription($customer,$plan->plan_id,$payment);
                if($subscribe){
                    $user->subscription = $subscribe;
                    $user->call_minute = $plan->calling_minute;
                    $user->remaining_call_minute = $plan->calling_minute;
                    $user->password = bcrypt($request->password);
                    $user->save();
                    $sub = new Subscription;
                    //dd($plan);
                    $sub->subscription = $subscribe;
                    $sub->user_id = $user->id;
                    $sub->plan_id = $plan->id;
                    $sub->status = 'active';
                    $sub->amount = $plan->amount;
                    $sub->total_minute = $plan->calling_minute;
                    $sub->total_number = $plan->total_number;
                    $sub->starting_date = date('Y-m-d');
                    // $sub->voicemail_charge = $plan->voicemail_charge;
                    // $sub->phone_number = $plan->phone_number;
                    $sub->save();

                    try{
                        $mail_to = $user->email;
                        $details = [
                            'name' => $user->name,
                            'email' => $user->email,
                            'type' => 'user'
                        ];
                        Mail::to($mail_to)->send(new \App\Mail\SignupMail($details));


                        $details['type'] = 'admin';
                        $mail_to = 'support@notetakerpro.com';
                        Mail::to($mail_to)->send(new \App\Mail\SignupMail($details));
                    
                    }catch(\Throwable $e){
                        \Log::info('Call status.', ['id' => $e->getMessage()]);
                        // dd($e);
                    }
                }
            }
        }
        return redirect('signup-thank-you');
    }

    public function stripeWebhook(Request $request)
    {
        if($request->type == 'charge.failed'){
            $status = 'failed';
        }else{
            $status = 'success';
        }
        //dd($status);
        $stripe = new StripeHelper();
        $invoice = $stripe->getIncoice($request->data['object']['invoice']);
        //Log::info('response addon', [$invoice]);
        //return $invoice->subscription;
        $payment = new Transaction;
        $subscription = false;
        if($invoice){
            $subscription = Subscription::where('subscription',$invoice->subscription)->first();
            
            $subscription_data = $stripe->getSubscription($invoice->subscription);
            $timestamp = $subscription_data->current_period_end;
            $next_payment_date = date('Y-m-d',$timestamp);

            $billing_date = date('Y-m-d',$subscription_data->current_period_start);

            $payment->subscription = $invoice->subscription;
            $payment->start_date = $billing_date;
            $payment->end_date = $next_payment_date; 

            $subscription->next_date = $next_payment_date;
            if($status == 'failed'){
                $unsubscribe = $stripe->subscriptionDelete($invoice->subscription);
                $subscription->status = 'inactive'; 
            }
            $subscription->save();
        }
        if($subscription){
           $payment->user_id = $subscription->user_id;
           if($status == 'success'){
                $user = User::where('customer',$request->data['object']['customer'])->first();
                if($user){
                     $user->remaining_call_minute =  $user->call_minute;
                     $user->save();
                }  
           }
        }else{
           if($request->data['object']['object'] == 'charge'){
                $user = User::where('customer_id',$request->data['object']['customer'])->first();
                if($user){
                    $payment->user_id = $user->id; 
                    if($status == 'success'){
                        $user->bal_credits = $user->bal_credits + (($request->data['object']['amount'])/100);
                        $user->save();
                    }
                }  
            } 
        }
        $payment->status = $status;
        $payment->evt_id = $request->id;
        $payment->invoice = $request->data['object']['invoice']; 
        $payment->amount = ($request->data['object']['amount'])/100; 
        $payment->tx_id = $request->data['object']['balance_transaction'];

        $payment->payment_method = $request->data['object']['payment_method'];
        $payment->last4 = $request->data['object']['payment_method_details']['card']['last4'];

        $payment->exp_year = $request->data['object']['payment_method_details']['card']['exp_year'];
        $payment->exp_month = $request->data['object']['payment_method_details']['card']['exp_month'];
        $payment->brand = $request->data['object']['payment_method_details']['card']['brand']; 
        $payment->save();
        return response()->json('',200);
    }
}
