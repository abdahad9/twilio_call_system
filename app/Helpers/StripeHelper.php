<?php 
namespace App\Helpers;
use Log;

class StripeHelper {

	function __construct()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }


	function createCustomer($array)
	{
		try {
			$cusCreate = \Stripe\Customer::create($array);
			return $cusCreate->id;
		} catch (\Exception $e) {
			Log::error('create customer', ['error' => $e->getMessage()]);
			return false;
		}
	}


	function createProduct($array)
	{
		try {
			$cusCreate = \Stripe\Product::create($array);
			return $cusCreate->id;
		} catch (\Exception $e) {
			Log::error('create product', ['error' => $e->getMessage()]);
			return false;
		}
	}

	function createPlan($array)
	{
		try {
			$planCreate = \Stripe\Plan::create($array);
			return $planCreate->id;
		} catch (\Exception $e) {
			Log::error('create plan', ['error' => $e->getMessage()]);
			return false;
		}
	}

	function createPaymentMethod($customer,$cardToken)
	{
		try {
			$paymentMEthod =  \Stripe\Customer::createSource(
	          $customer,
	            ['source' => $cardToken]
	        );
	        return $paymentMEthod->id;
		} catch (\Exception $e) {
			Log::error('create payment method', ['error' => $e->getMessage()]);
			return false;
		}
	}

	function createSubscription($customer,$plan,$source = null)
	{
		//dd($customer,$plan,$source);
		$array = array( 
			'customer' => $customer, 
			'items' => [['plan' => $plan]]
		);
		if($source){
			$array['default_source'] = $source;
		}
		try {
			$Subscription = \Stripe\Subscription::create($array);
	        return $Subscription->id;
		} catch (\Exception $e) {
			Log::error('create subscription', ['error' => $e->getMessage()]);
			return $e->getMessage();
		}
		
	}


	function getCard($customer)
	{
		try {
			$cards =  \Stripe\Customer::allSources(
			  $customer,
			  ['object' => 'card', 'limit' => 20]
			);
		return $cards;
		} catch (\Exception $e) {
			Log::error('create subscription', ['error' => $e->getMessage()]);
			return false;
		}
		
	}

	public function subscriptionDelete($subscription_data)
	{
		try {
			$subscription = \Stripe\Subscription::retrieve(
			  $subscription_data
			);
			$subscription->delete();
			return true;	
		} catch (\Exception $e) {
			Log::error('delete subscription', ['error' => $e->getMessage()]);
			return false;
		}
		
	}

	public function getSubscription($subscription_data)
	{
		try {
			$subscription = \Stripe\Subscription::retrieve(
							  $subscription_data
							);
			return $subscription;	
		} catch (\Exception $e) {
			Log::error('delete subscription', ['error' => $e->getMessage()]);
			return false;
		}
	}

	public function getAllSubscription($subscription_data)
	{
		try {
			$items = \Stripe\SubscriptionItem::all([
			  'subscription' => $subscription_data,
			]);
			return $items;
		} catch (\Exception $e) {
			Log::error('get All subscription', ['error' => $e->getMessage()]);
			return false;
		}
		
	}


	public function allIncoice($invoice)
	{
		try {
			$invoice2 = \Stripe\Invoice::all([
				'limit' => 3,
				'subscription' => $invoice
			]);
			return $invoice2;
		} catch (\Exception $e) {
			Log::error('get Invoice', ['error' => $e->getMessage()]);
			return false;
		}
	}

	public function getSubscriptionItem($sub_item)
	{
		try {
			$subItem = \Stripe\SubscriptionItem::retrieve(
			  $sub_item
			);
			return $subItem;
		} catch (\Exception $e) {
			Log::error('get sub item', ['error' => $e->getMessage()]);
			return false;
		}
	}

	public function getIncoice($invoice)
	{
		try {
			$subItem = \Stripe\Invoice::retrieve(
			  $invoice
			);
			return $subItem;
		} catch (\Exception $e) {
			Log::error('get invoice', ['error' => $e->getMessage()]);
			return false;
		}
	}

	public function stripeWebHook()
	{
		try {
			$webhooks = \Stripe\WebhookEndpoint::create([
			  'url' => url('api/stripe-response'),
			  'enabled_events' => [
			    'charge.failed',
			    'charge.succeeded',
			  ],
			]);
			return $webhooks;
		} catch (\Exception $e) {
			Log::error('web hooks', ['error' => $e->getMessage()]);
			return false;
		}
		
	}


	public function addCharge($amount,$card,$cus,$name)
	{
		try {
			$array = [
			  'amount' => $amount * 100,
			  'currency' => 'usd',
			  'source' => $card,
			  'description' => 'Add Charge from '. $name,
			];
			if($cus){
				$array['customer'] = $cus;
			}
			$webhooks = \Stripe\Charge::create(
				$array
			);
			return $webhooks;
		} catch (\Exception $e) {
			Log::error('add Charge', ['error' => $e->getMessage()]);
			//return $e->getMessage();
			return false;
		}
	}


	 /*function Resubcribe()
	{

		$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
		$stripe->subscriptions->update(
			'sub_JAoeRoNwngz91k',
			"status"="canceled"
		);
	}*/

	 


	
}