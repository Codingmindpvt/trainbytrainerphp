<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use App\Models\Booking;
use DateInterval;
use DateTime;
use Auth;
use Carbon;
use Illuminate\Console\Command;
use Stripe;
use App\Traits\SepaPaymentTrait;

class SepaDirectDebit extends Command
{
    use SepaPaymentTrait;
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


    


        $schedules = Booking::with('coach_class','user','schedule')->where('booking_date', '!=', null)->where('status',2)->get();

        foreach ($schedules as $schedule) {


            $date = $this->getDateAfterthirtyDay($schedule->booking_date); //date after 1 month from booking date.



            if ($this->getDiffBetweenTwoDate($date) && isset($schedule->user->customer_id) && $schedule->user->payment_method != '') {


                $payment_detail = $stripe->paymentIntents->create(
                    [
                        'payment_method_types' => ['sepa_debit'],
                        'amount' => $schedule->coach_class->price*100,
                        'currency' => 'eur',
                        'customer' => $schedule->user->customer_id,
                        'payment_method' => $schedule->user->payment_method,
                        'confirm' => true,
                    ]
                );
                $this->savePaymentDetail($payment_detail,$schedule->user_id);
               

            }
            $schedule->booking_date =  date('Y-m-d H:i:s');
            $schedule->save();
        }


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