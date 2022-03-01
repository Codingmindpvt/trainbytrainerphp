<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use DateInterval;
use DateTime;
use Illuminate\Console\Command;
use Stripe;

class SepaDirectDebit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'direct:sepa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for deduct payment after 1 month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        // $detail = $stripe->setupIntents->create(
        //     ['payment_method_types' => ['ideal'], 'customer' => 'cus_L6f1b3NZdqx6uT']
        // );
        // $ddd = $stripe->setupIntents->retrieve(
        //     'seti_1KTg86JIOxYZNW8vUvZ24KdF',
        //     ['expand' => ['latest_attempt']]
        // );
        // dd($ddd);
        // dd();

        $payment_detail = $stripe->paymentIntents->create(
            [
                'payment_method_types' => ['sepa_debit'],
                'amount' => 1099,
                'currency' => 'eur',
                'customer' => 'cus_L6f1b3NZdqx6uT',
                'payment_method' => 'pm_1KTgpFJIOxYZNW8vBudR65zG',
                'confirm' => true,
            ]
        );

        dd($payment_detail);

        $schedules = Schedule::with('class', 'user')->where('booked_at', '!=', null)->get();

        // $details = $stripe->paymentIntents->create(
        //     [
        //         'amount' => 1099,
        //         'currency' => 'eur',
        //         'payment_method_types' => ['ideal'],
        //         'customer' => 'cus_L6f1b3NZdqx6uT',
        //         'setup_future_usage' => 'off_session',
        //     ]
        // );

        // $details = $stripe->paymentIntents->retrieve($details->id, []);
        // dd($details);

        // foreach ($schedules as $schedule) {
        //     $payment_at = $schedule->payment_at;
        //     $date = $this->getDateAfterthirtyDay($schedule->payment_at);
        //     $payment_at = date("Y-m-d", strtotime($payment_at));

        //     if ($this->getDiffBetweenTwoDate($date) && isset($schedule->user->customer_id) && $schedule->user->customer_id != '') {

        //         $payment_detail = $stripe->paymentIntents->create(
        //             [
        //                 'payment_method_types' => ['sepa_debit'],
        //                 'amount' => 1099,
        //                 'currency' => 'eur',
        //                 'customer' => $schedule->user->customer_id,
        //                 'payment_method' => 'pm_1KTgNeJIOxYZNW8vWqRazDT7',
        //                 'confirm' => true,
        //             ]
        //         );
        //         SepaPayment::create([
        //             'payment_id' => $payment_detail->id ?? '',
        //             'amount' => $payment_detail->amount ?? 0,
        //             'customer_id' => $payment_detail->customer ?? '',
        //             'user_id' => $schedule->user_id ?? 0,
        //             'city' => $payment_detail->charges->data[0]->billing_details->address->city ?? '',
        //             'country' => $payment_detail->charges->data[0]->billing_details->address->country ?? '',
        //             'line1' => $payment_detail->charges->data[0]->billing_details->address->line1 ?? '',
        //             'line2' => $payment_detail->charges->data[0]->billing_details->address->line2 ?? '',
        //             'postal_code' => $payment_detail->charges->data[0]->billing_details->address->postal_code ?? '',
        //             'state' => $payment_detail->charges->data[0]->billing_details->address->state ?? '',
        //             'email' => $payment_detail->charges->data[0]->billing_details->email ?? '',
        //             'name' => $payment_detail->charges->data[0]->billing_details->name ?? '',
        //             'phone' => $payment_detail->charges->data[0]->billing_details->phone ?? '',
        //             'bank_code' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->bank_code ?? '',
        //             'branch_code' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->branch_code ?? '',
        //             'fingerprint' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->fingerprint ?? '',
        //             'last4' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->last4 ?? '',
        //             'mandate' => $payment_detail->charges->data[0]->payment_method_details->sepa_debit->mandate ?? '',
        //             'payment_type' => $payment_detail->payment_method ?? '',
        //             'payment_method' => 'sepa_debit',
        //         ]);

        //     }
        // }

        // $methods = $stripe->paymentMethods->all([
        //     'customer' => 'cus_L6f1b3NZdqx6uT',
        //     'type' => 'sepa_debit',
        // ]);

        // foreach ($methods as $method) {
        //     dd($method->toArray());
        // }
        $ddd = $stripe->setupIntents->retrieve(
            'seti_1KTgoJJIOxYZNW8vFONWbHJw',
            ['expand' => ['latest_attempt']]
        );

        dd($ddd);
        // $session = $stripe->checkout->sessions->create([
        //     'payment_method_types' => ['sepa_debit'],
        //     'mode' => 'setup',
        //     'customer' => 'cus_L6f1b3NZdqx6uT',
        //     'success_url' => URL('/') . '/trainbytrainerphp/verify-sepa-debit',
        //     'cancel_url' => 'https://example.com/cancel',
        // ]);

        //seti_1KTgoJJIOxYZNW8vFONWbHJw
        dd($session);
        // $name = "Vikas Joshi";
        // $email = "vikasjoshi1392@gmail.com";
        // $iban = 'DE89370400440532013000';
        // $amount = 20;

        // $source = $stripe->paymentMethods->create([
        //     'type' => 'sepa_debit',
        //     'sepa_debit' => ['iban' => $iban],
        //     'billing_details' => [
        //         'name' => $name,
        //         'email' => $email,
        //     ],
        // ]);
        // $stripe->paymentMethods->attach(
        //     $source->id,
        //     ['customer' => 'cus_L6f1b3NZdqx6uT']
        // );

    }
    public function getDateAfterthirtyDay($date)
    {
        $date = new DateTime($date); // Y-m-d
        $date->add(new DateInterval('P31D'));
        return $date->format('Y-m-d');

    }

    public function getDiffBetweenTwoDate($date1)
    {

        $date2 = date('Y-m-d');

        // date into dateTimestamp
        $dateTimestamp1 = strtotime($date1);
        $dateTimestamp2 = strtotime($date2);

        if ($dateTimestamp1 == $dateTimestamp2) {
            return true;
        } else {
            return false;

        }

    }
}