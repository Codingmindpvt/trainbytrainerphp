<?php
namespace App\Traits;

use App\Models\SepaPayment;
trait SepaPaymentTrait
{
    public function savePaymentDetail($payment_detail,$user_id)
    {
        $sepaPayment =  SepaPayment::create([
                'payment_id' => $payment_detail->id ?? '',
                'amount' => $payment_detail->amount/100 ?? 0,
                'customer_id' => $payment_detail->customer ?? '',
                'user_id' => $user_id ?? 0,
                'city' => $payment_detail->charges->data[0]->billing_details->address->city ?? '',
                'country' => $payment_detail->charges->data[0]->billing_details->address->country ?? '',
                'line1' => $payment_detail->charges->data[0]->billing_details->address->line1 ?? '',
                'line2' => $payment_detail->charges->data[0]->billing_details->address->line2 ?? '',
                'postal_code' => $payment_detail->charges->data[0]->billing_details->address->postal_code ?? '',
                'state' => $payment_detail->charges->data[0]->billing_details->address->state ?? '',
                'email' => $payment_detail->charges->data[0]->billing_details->email ?? '',
                'name' => $payment_detail->charges->data[0]->billing_details->name ?? '',
                'phone' => $payment_detail->charges->data[0]->billing_details->phone ?? '',
                'bank_code' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->bank_code ?? '',
                'branch_code' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->branch_code ?? '',
                'fingerprint' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->fingerprint ?? '',
                'last4' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->last4 ?? '',
                'mandate' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->mandate ?? '',
                'payment_type' => $payment_detail->payment_method ?? '',
                'payment_method' => 'sepa_debit',
            ]);
            return $sepaPayment;
        }
}