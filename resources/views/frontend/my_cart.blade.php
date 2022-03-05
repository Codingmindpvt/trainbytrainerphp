@extends('layouts.guest')
@section('content')
<section class="my-cart-page">
    <div class="container">
        <div class="my-cart-heading text-center">
            <h2><span>MY CART</span></h2>
            @if(count($cartDetail) == 1)
            <p>{{ count($cartDetail) }} Item in my Cart</p>
            @else
            <p>{{ count($cartDetail) }} Items in my Cart</p>
            @endif
        </div>
        @if(count($cartDetail)>0)
        <div class="table-responsive cart-table-box">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">IMAGE & PRODUCT</th>
                        <th scope="col">PRODUCT TYPE</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">SUBTOTAL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach(@$cartDetail as $cart)
                    <tr>
                        <td>
                            <div class="image-product-tb">
                                @if(!empty(@$cart['program']['image_file']))
                                <img src="{{ asset('public/'.@$cart['program']['image_file']) }}" alt="">
                                @else
                                <img src="{{ asset('public/images/default-image-file-o.png') }}" alt="">
                                @endif
                                <div>
                                    <h3>{{ strtoupper(@$cart['program']['program_name']) }}</h3>
                                    <span>{{ ucwords(@$cart->getCoachName(@$cart['program']['user_id'])) }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{!! @$cart->getType() !!}</td>
                        <td>{{ DEFAULT_CURRENCY.@$cart['price'] }}</td>
                        <td>{{ DEFAULT_CURRENCY.@$cart['price'] }}</td>
                        <td>
                            <a href="{{ route('remove-cart-item',$cart['id']) }}" class=" delete-new-bt sureDelete"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="offset-7 col-5">
                <div class="total-amount-area">
                    <h3>TOTAL AMOUNT</h3>

                    <div class="cart-total">
                        <p>Sub Total</p>
                        <p>{{DEFAULT_CURRENCY.$cart->getSubTotal($sum)}}</p>
                    </div>
                    <div class="cart-total">
                        <p>Tax(5%)</p>
                        <p>{{DEFAULT_CURRENCY.$cart->getTaxAmount()}}</p>
                    </div>
                    <hr>
                    <?php
                    $totalprice=$cart->getGrandTotal();
                   ?>
                    <div class="cart-total">
                        <h5>Grand Total</h5>
                        <p>{{DEFAULT_CURRENCY.$cart->getGrandTotal()}}</p>
                    </div>
                    @if(Auth::check() && Auth::user()->payment_method)
                    <form method="post" id="proceedPaymentForm" action="{{ route('stripe-ideal') }}">
                        @csrf
                        <input type="hidden" name="price" value="{{$totalprice}}">
                        <input type="submit" id="proceedPayment" class="sign-bt mb-0" value="PROCEED TO PAYMENT" />
                    </form></br>
                    @else
                    <a href="{{route('verify.direct.payment')}}" id="setupDirectDebit"><button
                            class="sign-bt mb-0">Setup for Direct Debit</button></a>
                    @endif
                    <!-- <a href="{{ route('coach.checkout') }}" class="sign-bt mb-0">PROCEED TO PAYMENT1</a> -->

                </div>
            </div>
        </div>
        @else
        <p class="blank-para">No Data Found!!</p>
        @endif
    </div>
</section>
@endsection