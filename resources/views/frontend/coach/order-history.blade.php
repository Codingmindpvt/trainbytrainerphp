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
            <h1 class="oswald-font">Hi,{{Auth::user()->first_name." ".Auth::user()->last_name}}!{!!
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

            <aside class="col-lg-8 marketplace-main-box varification-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">My Order History</h3>
                </div>
                <div class="name-date-box-area">
                    <div class="row">
                        <form id="searchProductList" class="product-search" action="{{ route('coach.my-order-list') }}"
                            method="GET">
                            <input type="search" class="form-control" placeholder="Search By Name" name="search" />
                            <button type="submit" class="search-btn-icn"></button>
                            <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        </form>
                    </div>
                </div>
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>Orders</h3>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#sessions" role="tab" data-toggle="tab">Classes</a>
                            </li> &nbsp
                            <li class="nav-item">
                                <a class="nav-link" href="#programs" role="tab" data-toggle="tab">Programs</a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="programs">
                            @forelse($orders as $order)
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    @if(!empty($order['program']['image_file']))
                                    <img src="{{asset('public/'.$order['program']['image_file'])}}" alt="">
                                    @else
                                    <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                                    @endif
                                    <div>
                                        <p>{{"Order ID: #".$order->order_id}}</p>
                                        <h3>{{ucwords(@$order['program']['program_name'])}}</h3>
                                        <h6 class="doller-ten">{{DEFAULT_CURRENCY.$order['program']['price']}}
                                            <b></b><span>Order By:
                                                {{isset($order['payment']['user']['first_name']) ? ucwords($order['payment']['user']['first_name']." ".$order['payment']['user']['last_name']) : "----"}}</span>
                                        </h6>

                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-2">{{ date_format(date_create($order->created_at),"M d, Y H:i A")}}</p>
                                    <a href="{{route('coach.order-program-detail',$order->id)}}">View Details</a>
                                </div>
                            </div>
                            @empty
                            <p class="blank-para"> No Data Found!!</p>
                            @endforelse


                            <div class="pagination-count-box p-4">
                                <!-- start pagination -->
                                <nav aria-label="Page navigation example">
                                    {{$orders->links()}}
                                </nav>
                                <!-- end pagination -->
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane show in active" id="sessions">
                            @forelse( $classBookings as $serial_no=>$booking)

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
                                        @if($booking['status'] == '0')
                                        <br><span class="badge badge-danger">
                                            REJECTED
                                        </span>
                                        @elseif($booking['status'] == '2')
                                        <br><span class="badge badge-success">
                                            ACCEPTED
                                        </span>
                                        @else
                                        <button type="button" title="Accept" value="2" id="{{$booking->id}}"
                                            class="view-accept-bt accept-booking-request accept_request_{{$booking->id}}">
                                            ACCEPT
                                        </button>
                                        <button type="button" title="Reject" value="0" id="{{$booking->id}}"
                                            class="view-reject-bt reject-booking-request reject_request_{{$booking->id}}">
                                            REJECT
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="blank-para">No Data Found!!</p>
                            @endforelse
                            {{$classBookings->links()}}
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.accept-booking-request').on('click', function() {
    let alert_msg = "Are you sure you want to accept this booking request.";
    var booking_status = this.value;
    var booking_id = this.id;
    if (confirm(alert_msg) == true) {
        if (booking_status == 2) {
            var token = '{{ csrf_token() }}';
            var url = "{{route('booking.accept-booking-request')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: booking_id,
                    _token: token
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    } else {
        return false;
    }
});

$('.reject-booking-request').on('click', function() {
    let alert_msg = "Are you sure you want to reject this booking request.";
    var booking_status = this.value;
    var booking_id = this.id;
    if (confirm(alert_msg) == true) {
        if (booking_status == 0) {
            var token = '{{ csrf_token() }}';
            var url = "{{route('booking.reject-booking-request')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: booking_id,
                    _token: token
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    } else {
        return false;
    }

});
</script>
@endsection