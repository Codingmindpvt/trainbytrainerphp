@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
<!-- <section class="profesional-common-box">
      <div class="container">
       <p><img src="images/notify.png"  class="mr-2" alt="notify">You are currently not verified. <a href="#"><span>Click here</span></a> or on the verification tab to verify yourself as a professional fitness coach.
      </div>
     </section> -->
<!--end varification div area here -->

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi,{{Auth::user()->first_name." ".Auth::user()->last_name}}{!!
                certifiedUser() !!}</h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View and edit COACH Program details here</p> --}}
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if (Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>
            <aside class="col-lg-8 marketplace-main-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">My Transactions List</h3>
                </div>

                <div class=" name-date-box-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="seller-earning-box">
                                <div class="earning-text-count">
                                    @php
                                    $amountArr = [];
                                    @endphp
                                    @foreach($transactions as $totalEarning)
                                    @php
                                    $amountArr[] = $totalEarning['payment']['amount'];
                                    @endphp
                                    @endforeach
                                    @php
                                    $taxValue = number_format((float)(( 5 * array_sum($amountArr)) /
                                    100), 2, '.',
                                    '');
                                    $subTotal = (array_sum($amountArr));
                                    $commissionTotal = number_format((float)(( $commission['commission_percent'] *
                                    array_sum($amountArr)) /
                                    100), 2, '.',
                                    '');

                                    @endphp
                                    <h2>{{ !empty($subTotal) ? DEFAULT_CURRENCY.$subTotal : 0}}</h2>
                                    <p>Total Seller earning<br>
                                        (base currency)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="seller-earning-counting-box">
                                <div class="total-sale-count text-center">
                                    <h4>{{ !empty($subTotal) ? DEFAULT_CURRENCY.$subTotal : 0}}
                                    </h4>
                                    <p>Total Sale</p>
                                </div>
                                @php
                                @php

                                @endphp
                                <div class="total-tax-count text-center">
                                    <h4> - {{ !empty($subTotal) ?   DEFAULT_CURRENCY.number_format((float)(( 5 * $subTotal) / 100), 2, '.',
                                    '') : 0}}
                                    </h4>
                                    <p>Tax</p>
                                </div>
                                <div class="total-commision-count text-center">
                                    <h4>-
                                        {{ (!empty($commissionTotal) && $commissionTotal > 0) ? DEFAULT_CURRENCY.$commissionTotal : 0}}
                                    </h4>
                                    <p>Commission</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="search" class="form-control searchBox" placeholder="Search Here">
                        </div>
                    </div>

                </div>
                <div class="coach-product-list-table">
                    <div class="table-responsive cart-table-box">
                        <table class="table myDataTable">
                            <thead>
                                <tr>
                                    <th scope="col">TRANSACTION ID</th>
                                    <th scope="col">FROM</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)

                                <tr>
                                    <td>{{ $transaction['order_id']}}</td>
                                    <td>{{ (isset($transaction['payment']['user']['first_name'])) ? $transaction['payment']['user']['first_name']." ".$transaction['payment']['user']['last_name'] : "-----"}}
                                    </td>
                                    <td>{{ (isset($transaction['program']['program_name'])) ? $transaction['program']['program_name'] : "-----"}}
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($transaction['created_at']) )}}</td>
                                    <td>{{ (isset($transaction['program']['price'])) ? DEFAULT_CURRENCY.$transaction['program']['price'] : "-----"}}
                                    </td>
                                </tr>
                                @empty
                                <p class="blank-para">No Record Found!!</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-count-box">
                        {{ $transactions->links() }}

                        <!-- end pagination -->
                    </div>
                </div>

            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
@endsection