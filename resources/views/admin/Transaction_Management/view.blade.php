@extends('layouts.admin.inner')
@section('content')
<section class="content_area">
    <div class="container-fluid">
    <h2 class="order-content">Transaction Details</h2>
        <div class="transaction-main">
        <div class="row">
            <aside class="col-md-12">
                <h2 class="order-content">Order Details</h2>
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

          <h2 class="order-content"><span>Program Name:</span> {{ isset($transaction['program']['program_name']) ? $transaction['program']['program_name'] : '-----' }}
          </h2>
          <span>Price:</span>
          <span class="price">{{ isset($transaction['program']['program_name'])? DEFAULT_CURRENCY . $transaction['program']['price']: '-----' }}</span><br>
          <span>Buyer Name:</span>
                  <span>{{ isset($transaction['payment']['user']['first_name'])? ucwords($transaction['payment']['user']['first_name'] . ' ' . $transaction['payment']['user']['last_name']): '-----' }}</span><br>

                  <p> <span class="mr-3">Description:</span> <td>
                    <?php
                    $string = $transaction['program']['description'];
                    if (strlen($string) >= 1 && strlen($string) <= 399) {
                        echo substr($string, 0, 399);
                    }
                    if (strlen($string) >= 399) {
                        echo substr($string, 0, 399) . '<span class="read_more_class" style="color:blue;">Read More</span>' . '<span class="show_read_more_class" style="display:none;">' . substr($string, 399) . '</span>' . '<span class="show_less_class" style="color:blue; display:none;" style="color:blue;">Show Less</span>';
                    }
                    ?>
                </td>
        </div>
            </aside>
        </div>
        <div class="row my-2 buyer-box">
            <aside class="col-md-12">
                <h2 class="my-2 order-content">Buyer Payment Information:<!-- <span class="oswald-font ml-3">{{ isset($transaction['payment']['user']['first_name'])? ucwords($transaction['payment']['user']['first_name'] . '' . $transaction['payment']['user']['last_name']): '-----' }}</span> --></h2>
            </aside>
            <aside class="col-md-4">
                <h4 class="oswald-font">Billing Address</h4>
                <div class="buyer-info">
                    <p class="oswald-font">{{ isset($transaction['payment']['user']['first_name'])? ucwords($transaction['payment']['user']['first_name'] . '' . $transaction['payment']['user']['last_name']): '-----' }}<span> last Name </span></p>
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

                <div class="buyer-info">
                    <h4 class="oswald-font">TOTAL AMOUNT</h4>
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
                        <p>{{isset($transaction['program']['price']) ? DEFAULT_CURRENCY.$transaction['payment']->getGrandTotal() : "-----"}}</p>
                    </div>
                </div>
            </aside>
        </div>
            <div class="row my-2 buyer-box">
            <aside class="col-md-12">
                <h2 class="my-2 order-content">Coach Payment Information:<span class="oswald-font ml-3">{{ isset($transaction['program']['program_user']['first_name'])? ucwords($transaction['program']['program_user']['first_name'] .' ' .$transaction['program']['program_user']['last_name']): '-----' }}</span></h2>
            </aside>
            <aside class="col-md-4">

                <div class="buyer-info">
                    <h4 class="oswald-font">TOTAL AMOUNT</h4>
                    <div class="amount-main">
                        <div class="amount-box">
                            <p>Cart Total</p>
                            <p>Admin Commission ({{ isset($commission['commission_percent']) ? $commission['commission_percent'] . '%' : '0%' }})

                            </p>
                        </div>
                        <div class="amount-box">
                            <p>{{ isset($transaction['program']['price'])? DEFAULT_CURRENCY . $transaction['payment']->getSubTotal($transaction['program']['price']): '-----' }}

                            </p>
                            <p>{{ isset($commission['commission_percent'])? DEFAULT_CURRENCY . $transaction['payment']->getCommissionAmount($commission['commission_percent']): '-----' }}</p>
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
    </div>
@endsection
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {

        $('.read_more_class').on('click', function() {
    $(this).hide();
    $(this).parent().find('.show_less_class').show();
    $(this).parent().find('.show_read_more_class').toggle();
    });
    $('.show_less_class').on('click', function() {
        $(this).parent().find('.read_more_class').show();
        $(this).hide();
        $(this).parent().find('.show_read_more_class').hide();
    });


    })
</script>
