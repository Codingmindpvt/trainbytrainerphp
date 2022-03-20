@extends('layouts.admin.inner')
@section('content')
<section class="transaction-area">
    <div class="container">
        <div class="row">
            <aside class="col-md-12">
                <h2>Transaction Details</h2>
            </aside>
            <aside class="col-md-6">
                <p>Order ID: {{ isset($transaction['order_id']) ? '#' . $transaction['order_id'] : '-----' }}</p>
            </aside>
            <aside class="col-md-6">
                <p>Puchased On: {{ isset($transaction['created_at'])? date_format(date_create($transaction->created_at), 'M d, Y H:i A'): '-----' }}</p>
            </aside>
            <aside class="col-md-4 my-3">
                <div class="transation-img">
                     @if (!empty($transaction['program']['image_file']))
                       <img src="{{ asset('public/' . $transaction['program']['image_file']) }}" alt=""
                           class="">
                   @else
                       <img src="{{ asset('public/images/default-image-file-o.png') }}" alt="" class="">
                   @endif
                </div>
            </aside>
            <aside class="col-md-8 my-3">
             <div class="transation-content">
          <h2>{{ isset($transaction['program']['program_name']) ? $transaction['program']['program_name'] : '-----' }}
          </h2>
          <h5>{{ isset($transaction['program']['program_name'])? DEFAULT_CURRENCY . $transaction['program']['price']: '-----' }}<span>
                  {{ isset($transaction['payment']['user']['first_name'])? ucwords($transaction['payment']['user']['first_name'] . ' ' . $transaction['payment']['user']['last_name']): '-----' }}</span>
          </h5>
          <p>{{ isset($transaction['program']['description']) ? $transaction['program']['description'] : '-----' }}
          </p>
        </div>
            </aside>
        </div>
        <div class="row my-2">
            <aside class="col-md-12">
                <h2 class="my-2">Buyer Payment Information</h2>
            </aside>
            <aside class="col-md-4">
                <h4 class="oswald-font">Billing Address</h4>
                <div class="buyer-info">
                    <p class="oswald-font">{{ isset($transaction['payment']['user']['first_name'])? ucwords($transaction['payment']['user']['first_name'] . '' . $transaction['payment']['user']['last_name']): '-----' }}</p>
                    <p>{{ isset($transaction['payment']['user']['address'])? ucwords($transaction['payment']['user']['address']): '-----' }}
             </p>
                </div>
            </aside>
            <aside class="col-md-4">
                <h4 class="oswald-font">Payment Method</h4>
                <div class="buyer-info">
                    <p class="oswald-font">Payment ID</p>
                    <p>{{ @$transaction['payment']['payment_id'] }}</p>
                </div>
            </aside>
            <aside class="col-md-4">
                <h4 class="oswald-font">Billing Address</h4>
                <div class="buyer-info">
                    <p class="oswald-font">Adam Phillipse</p>
                    <div class="amount-main">
                        <div class="amount-box">
                            <p>Cart Total</p>
                            <p>Tax 5%</p>
                        </div>
                        <div class="amount-box">
                            <p>{{isset($transaction['program']['price']) ? DEFAULT_CURRENCY.($transaction['payment']->getSubTotal($transaction['program']['price'])) : "-----"}}
                            </p>
                            <p>{{ isset($transaction['program']['price']) ? DEFAULT_CURRENCY.$transaction['payment']->getTaxAmount() : "-----"}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="amount-main my-2">
                        <p><b>Order Total</b></p>
                        <p>{{isset($program['program']['price']) ? DEFAULT_CURRENCY.$program['payment']->getGrandTotal() : "-----"}}</p>
                    </div>
                </div>
            </aside>
        </div>
            <div class="row my-2">
            <aside class="col-md-12">
                <h2 class="my-2">Coach Payment Information</h2>
            </aside>
            <aside class="col-md-4">
                <h4 class="oswald-font">Billing Address</h4>
                <div class="buyer-info">
                    <p class="oswald-font">{{ isset($transaction['program']['program_user']['first_name'])? ucwords($transaction['program']['program_user']['first_name'] .' ' .$transaction['program']['program_user']['last_name']): '-----' }}</p>
                    <div class="amount-main">
                        <div class="amount-box">
                            <p>Cart Total</p>
                            <p>Admin Commission ({{ isset($commission['commission_percent']) ? $commission['commission_percent'] . '%' : '0%' }})</p>
                        </div>
                        <div class="amount-box">
                            <p>{{ isset($transaction['program']['price'])? DEFAULT_CURRENCY . $transaction['payment']->getSubTotal($transaction['program']['price']): '-----' }}</p>
                            <p>{{ isset($transaction['program']['price'])? DEFAULT_CURRENCY . $transaction['payment']->getCommissionAmount($transaction['program']['price']): '-----' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="amount-main my-2">
                        <p><b>Order Total</b></p>
                        <p>{{ isset($transaction['program']['price'])? DEFAULT_CURRENCY . $transaction['payment']->getCommissionGrandTotal($transaction['program']['price']): '-----' }}</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
