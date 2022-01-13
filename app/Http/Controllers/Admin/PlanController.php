<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Helpers\StripeHelper;

class PlanController extends Controller
{
    public function index()
    {
        return view('admin.plan.index');
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
                'interval' => 'day',
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
        // $stripe = new StripeHelper;
        // $arrUser = [
        //     'description' => 'Customer for Telefeo',
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     'phone' => $request->phone_number,
        // ];
        // $stripe = new StripeHelper();
        // $customer = $stripe->createCustomer($arrUser);
        dd($request->All());
        /*
        add role, customer, subscription, call_minute
        add new table for subscription
            - userid, planid, subscription id, plan details, total minute, used minute
        add new table for transection history
        */
    }
}
