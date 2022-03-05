<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PaymentDetail;
use App\Models\User;
use App\Models\SepaPayment;
use Auth;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Traits\SepaPaymentTrait;
use App\Models\OrderList;

class StripePaymentController extends Controller
{
    use SepaPaymentTrait;
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
       // dd($request->all());
        $price = $request->price;
        $type = $request->type ?? '';
        $class_id = $request->class_id ?? '';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
            // $intent = $stripe->paymentIntents->create(
            //     [
            //         'amount' => (float) $price * 100,
            //         'currency' => 'eur',
            //         'payment_method_types' => ['ideal'],
            //         'customer' => Auth::user()->customer_id,
            //         'setup_future_usage' => 'off_session',
            //     ]
            // );
            $payment_detail = $stripe->paymentIntents->create(
                [
                    'payment_method_types' => ['sepa_debit'],
                    'amount' => (float) $price * 100,
                    'currency' => 'eur',
                    'customer' =>  Auth::user()->customer_id,
                    'payment_method' =>  Auth::user()->payment_method,
                    'confirm' => true,
                ]
            );
            $savePaymentDetail = $this->savePaymentDetail($payment_detail,Auth::user()->id);
            if(isset($savePaymentDetail)){
                $programIds = Cart::where('user_id', Auth::user()->id)->pluck("program_id");
                foreach($programIds as $program_id){
                    $orderList = new OrderList();
                    $orderList->program_id = $program_id;
                    $orderList->sepa_payment_id = $savePaymentDetail->id;
                    $orderList->order_id = uniqid();
                    $orderList->save();
                }
                user::where("id", Auth::id())->update(["account_link" => User::ACCOUNT_LINKED]);
                Cart::where('user_id', Auth::user()->id)->delete();
                notify()->success('success, Your Order Placed Succesfully.');
                return redirect()->route('cart');

            }else{
                notify()->error('payment failed');
                return redirect()->route('cart'); 
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            dd($e->getMessage());
            notify()->error('Error,' . $e->getMessage());
            return redirect()->back();
        }
        
    }

    public function stripeCheckoutDetail()
    {
                $programs = Cart::where('user_id', Auth::user()->id)->pluck("program_id");
                $payment = new PaymentDetail();
                $payment->user_id = Auth::user()->id;
                $payment->order_id = 1;
                $payment->transection_id = $request->payment_intent;
                $payment->price = $price[0] / 100;
                $payment->status = 'success';
                $payment->program_ids = $programs ?? json_decode($programs);
                $payment->save();
                if ($payment->save()) {
                    user::where("id", Auth::id())->update(["account_link" => User::ACCOUNT_LINKED]);
                    Cart::where('user_id', $payment->user_id)->delete();

                }
               

                return redirect()->route('cart');
            }

        

    
}