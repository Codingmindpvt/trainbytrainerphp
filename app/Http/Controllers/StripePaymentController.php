<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PaymentDetail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($price)
    {
        return view('stripe', compact("price"));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $stripeSecretKey = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Stripe\Charge::create([
            "amount" => (float) $request->price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);

        if ($data->status == "succeeded") {
            $programs = Cart::where('user_id', Auth::user()->id)->pluck("program_id");
            $payment = new PaymentDetail();
            $payment->user_id = Auth::user()->id;
            $payment->transection_id = $data->id;
            $payment->price = $request->price;
            $payment->program_ids = $programs ?? json_decode($programs);
            $payment->save();
            if ($payment->save()) {
                Cart::where('user_id', $payment->user_id)->delete();
            }
            Session::flash('success', 'Payment successful!');
        } else {
            Session::flash('error', 'Payment failed!');
        }
        return back();
    }

    public function stripeIdeal(Request $request)
    {
        $price = $request->price;
        $type = $request->type ?? '';
        $class_id = $request->class_id ?? '';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
            $intent = $stripe->paymentIntents->create(
                [
                    'amount' => (float) $price * 100,
                    'currency' => 'eur',
                    'payment_method_types' => ['ideal'],
                    'customer' => Auth::user()->customer_id,
                    'setup_future_usage' => 'off_session',
                ]
            );

        } catch (\Stripe\Exception\ApiErrorException $e) {
            dd($e->getMessage());
            notify()->error('Error,' . $e->getMessage());
            return redirect()->back();
        }
        // dd($intent);
        return view('frontend.stripe-ideal', ['intent' => $intent, 'price' => $price, 'type' => $type, 'class_id' => $class_id]);
    }

    public function stripeCheckoutDetail(Request $request)
    {
        // print_r($request->all());die;
        // $stripe = new \Stripe\StripeClient(
        //     env('STRIPE_SECRET')
        // );
        // $dd = $stripe->paymentIntents->retrieve('pi_3KTgEAJIOxYZNW8v0hr8ErKq', []);

        // dd($dd);
        $price = explode('-', $request->price);

        if ($request->redirect_status == "succeeded") {
            if ($price[1] == 'payment') {
                user::where("id", Auth::id())->update(["account_link" => User::ACCOUNT_LINKED]);
                return redirect()->route('classes-detail', $price[2]);
            } else {

                $programs = Cart::where('user_id', Auth::user()->id)->pluck("program_id");
                $payment = new PaymentDetail();
                $payment->user_id = Auth::user()->id;
                $payment->order_id = 1;
                $payment->transection_id = $request->payment_intent;
                $payment->price = $price[0] / 100;
                $payment->status = $request->redirect_status;
                $payment->program_ids = $programs ?? json_decode($programs);
                $payment->save();
                if ($payment->save()) {
                    user::where("id", Auth::id())->update(["account_link" => User::ACCOUNT_LINKED]);
                    Cart::where('user_id', $payment->user_id)->delete();

                }
                notify()->success('success, Payment successful.');

                return redirect()->route('cart');
            }

        } else {
            notify()->error('Error, Payment failed.');
            return redirect()->route('cart');
        }
        //return back();

    }
}