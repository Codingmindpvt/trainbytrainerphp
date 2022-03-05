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
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head head-edit-account">
                        <h3>My Orders</h3>
                        <h4> > Order Program Detail</h4>
                    </div>
                    <hr>
                    <div class="order-id-purchase">
                        <p><span>Order ID:</span> {{ isset($order['order_id']) ? "#".$order['order_id'] : "-----"}}</p>
                        <p><span>Purchased on:</span>
                            {{ isset($order['created_at']) ? date_format(date_create($order->created_at),"M d, Y H:i A") : "-----"}}
                        </p>
                    </div>
                    <div class="details-order-image">
                        @if(!empty($order['program']['image_file']))
                        <img src="{{asset('public/'.$order['program']['image_file'])}}" alt="" class="mr-3">
                        @else
                        <img src="{{asset('public/images/default-image-file-o.png')}}" alt="" class="mr-3">
                        @endif

                        <div class="detail-order-content">
                            <h2>{{ isset($order['program']['program_name']) ? $order['program']['program_name'] : "-----"}}
                            </h2>
                            <h5>{{isset($order['program']['program_name']) ? DEFAULT_CURRENCY.$order['program']['price'] : "-----"}}<span>
                                    {{isset($order['payment']['user']['first_name']) ? ucwords($order['payment']['user']['first_name']." ".$order['payment']['user']['last_name']) : "-----"}}</span>
                            </h5>
                            <!-- <a class="profile-chta-bt" href="">OPEN CHAT</a> -->
                            <!-- <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                    aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i
                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                    aria-hidden="true"></i> (1.2k Reviews)</p> -->

                            <p>{{isset($order['program']['description']) ? $order['program']['description'] : "-----"}}
                            </p>
                        </div>
                    </div>
                    <div class="product-downloadable-area">
                        <hr>
                        <h4>Downloadable Products</h4>
                        @php
                        $documents = isset($order['program']['program_image']) ? $order['program']['program_image'] :
                        [];
                        @endphp
                        @forelse($documents as $document)
                        <div class="image-product-tb  mb-3">
                            <div class="upload-certificate-box" data-toggle="modal"
                                data-target="{{'#'.$document['id']}}">
                                <img src="{{asset('public/images/certificate.png')}}" class="profile_picture"
                                    alt="upload">
                                <!-- <iframe src="{{ asset('public/' . $document->image_file) }}" width="100%" height="100px" class="profile_picture"></iframe> -->
                            </div> &nbsp
                            <!-- The Modal start -->
                            <div class="modal fade" id="{{$document['id']}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">View Document</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <iframe src="{{ asset('public/' . $document->image_file) }}" width="100%"
                                                height="700px" class="profile_picture"></iframe>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- The Modal end -->

                            <div>
                                <p>{{ucwords($document['title'])}}</p>
                                <a href="">Download</a>
                            </div>
                        </div>
                        @empty
                        <p class="blank-para">No Data Found!</p>
                        @endforelse
                        <hr>
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <h4>Billing Address</h4>
                                <div class="Billing Address-box">
                                    <h6>{{-- ucwords($order['payment']['user']['first_name']."".$order['payment']['user']['last_name']) --}}
                                    </h6>
                                    <p>{{-- ucwords($order['payment']['user']['address']) --}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Payment Method</h4>
                                <div class="Billing Address-box">
                                    <h6>Payment ID</h6>
                                    <p>{{-- $order['payment']['payment_id'] --}}
                                    </p>
                                </div>
                            </div> -->
                            <div class="offset-6 col-md-6">
                                <div class="total-amount-area billing-payment-area">
                                    <h3>TOTAL AMOUNT</h3>

                                    <div class="cart-total">
                                        <p>Cart Total</p>
                                        <p>{{isset($order['program']['price']) ? DEFAULT_CURRENCY.($order['payment']->getSubTotal($order['program']['price'])) : "-----"}}
                                        </p>
                                    </div>
                                    <div class="cart-total">
                                        <p>Tax(5%)</p>
                                        <p>{{ isset($order['program']['price']) ? DEFAULT_CURRENCY.$order['payment']->getTaxAmount() : "-----"}}
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="cart-total">
                                        <h5>Order Total</h5>
                                        <p>{{isset($order['program']['price']) ? DEFAULT_CURRENCY.$order['payment']->getGrandTotal() : "-----"}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection