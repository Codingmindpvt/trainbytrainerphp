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
            <h1 class="oswald-font">{{Auth::user()->first_name." ".Auth::user()->last_name}}</h1>
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

            <aside class="col-lg-8">
                <div class="user-profle-right-side marketplace-main-box">
                    <div class="info-profile-head head-edit-account">
                        <h3>My Order History</h3>
                        <h4> &gt; Order Class Detail</h4>
                    </div>
                    <hr>
                    <div class="order-id-purchase">
                        <p><span>Booking ID:</span> {{"#".$session->id}}</p>
                        <p><span>Booked on:</span> {{ date_format(date_create($session->booking_date),"M d, Y H:i A")}}
                        </p>
                    </div>
                    <div class="details-order-image">
                        @if(!empty($session['coach_class']['image']))
                        <img src="{{asset('public/class/'.$session['coach_class']['image'])}}" class="mr-3" alt="">
                        @else
                        <img src="{{asset('public/images/default-image-file-o.png')}}" class="mr-3" alt="">
                        @endif

                        <div class="detail-order-content order-new-chat">
                            <h2>{{$session['coach_class']['name']}}</h2>
                            <h5>{{DEFAULT_CURRENCY.$session['coach_class']['price']}}/Session</h5>
                            <b>Order by</b>
                            <div class="order-by-box">
                                <div class="order-by-img">
                                    @if($session['user']['profile_image'])
                                    <img src="{{asset('public/'.$session['user']['profile_image'])}}" alt="user">
                                    @else
                                    <img src="{{asset('public/images/user-all.png')}}" alt="user">
                                    @endif
                                    <p>{{ucwords($session['user']['first_name']." ".$session['user']['last_name'])}}</p>
                                </div>
                            </div>
                            <p></p>
                            <p class="mb-4">Need to strengthen your core? There are so many workouts
                                you can do that focus on these muscles. These are
                                functional fitness workouts that focus on core strength
                                exercises... <a href="">View Full Details</a></p>
                            <a href="" class="open-chat" data-toggle="modal" data-target="#submit"
                                data-dismiss="modal">CANCEL SESSIONS</a>
                            <p class="note-order"><b>Note*-</b> You can cancel a booked session 48 hours in advance,
                                after
                                that cancel booking button will be disable.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="info-profile-head session-classes-main">
                        <h3>Selected Sessions</h3><br>
                        <div class="session-classes">
                            <span>{{$session['schedule']['from_time']}}</span> -
                            <span>{{$session['schedule']['to_time']}}</span>
                        </div>
                    </div>
                    <div class="product-downloadable-area">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Address</h4>
                                <div class="Billing Address-box">
                                    <h6> {{ucwords($session['user']['first_name']." ".$session['user']['last_name'])}}
                                    </h6>
                                    <p> {{ucwords($session['user']['address'])}}
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <h4>Payment Method</h4>
                                <div class="Billing Address-box">
                                    <h6>Payment ID</h6>
                                    <p>XXXX-XXXX-XXXX-5567
                                    </p>
                                </div>
                            </div>
                            <div class="offset-6 col-md-6">
                                <div class="total-amount-area billing-payment-area">
                                    <h3>TOTAL AMOUNT</h3>

                                    <div class="cart-total">
                                        <p>Cart Total</p>
                                        <p>$60</p>
                                    </div>
                                    <div class="cart-total">
                                        <p>Tax(5%)</p>
                                        <p>$5</p>
                                    </div>
                                    <hr>
                                    <div class="cart-total">
                                        <h5>Order Total</h5>
                                        <p>$63</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                    <div class="info-profile-head">
                        <h3>Other Classes</h3>
                    </div>
                    <hr>
                    @forelse( $otherBookings as $serial_no=>$booking)

                    <div class="my-oders-list">
                        <div class="image-product-tb">
                            @if(!empty($booking['coach_class']['image']))
                            <img src="{{asset('public/class/'.$booking['coach_class']['image'])}}" alt="">
                            @else
                            <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                            @endif
                            <div>
                                <p>Booking ID: {{'#'.$booking->id}}</p>
                                <h3>{{$booking['coach_class']['name']}}</h3>
                                <h6 class="doller-ten">{{DEFAULT_CURRENCY.$booking['coach_class']['price']}}
                                    <b>/Session</b><span>Booked By:
                                        {{ucwords($booking['user']['first_name']." ".$booking['user']['last_name'])}}</span>
                                </h6>
                            </div>
                        </div>
                        <div class="purchase-date">
                            <p> Booked on: </p>
                            <p class="mb-2">{{ date_format(date_create($booking->booking_date),"M d, Y H:i A")}}
                            </p>
                            <div class="view-accept-reject-bt">
                                <a href="{{route('coach.order-class-detail',$booking->id)}}">View Details</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="blank-para">No Data Found!!</p>
                    @endforelse
                    <hr>
                    {{$otherBookings->links()}}
                </div>
            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection