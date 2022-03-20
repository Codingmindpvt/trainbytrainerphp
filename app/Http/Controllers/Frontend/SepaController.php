<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Redirect;
use Session;
use Auth;
use App\Models\Cart;
use App\Models\OrderList;
class SepaController extends Controller
{

    public $stripe;
    public function __construct(){
        $this->stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
    }
    public function verifySepaDebit(Request $request)
    {

       $intent = Session::get('intent');
        $payment = $this->stripe->setupIntents->retrieve(
            $intent,
            ['expand' => ['latest_attempt']]
        );
        $user  = User::find(auth()->user()->id);
        $user->payment_method = $payment->payment_method;
        if($user->save()){
            notify()->success('Account detail added successfully.');
            return redirect()->route('cart');
        }else {
            Session::flash('error', 'Payment failed!');
        }
        return back();
    }

    public function webhookVerifySepaDebit(Request $request)
    {
        Log::info($request->all());

    }
    public function verifyDirectPayment()
    {
        // $stripe = new \Stripe\StripeClient(
        //     env('STRIPE_SECRET')
        // );
        $session = $this->stripe->checkout->sessions->create([
            'payment_method_types' => ['sepa_debit'],
            'mode' => 'setup',
            'customer' => auth()->user()->customer_id,
            'success_url' => URL('/') . '/verify-sepa-debit',
            'cancel_url' => 'https://example.com/cancel',
        ]);
        //

        Session::put('intent', $session->setup_intent);

        return Redirect::to($session->url);

    }
}
