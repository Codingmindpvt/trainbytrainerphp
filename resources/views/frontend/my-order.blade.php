@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi, Adam Smith!</h1>
            <p>View and edit personal details here</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="user-profile-left">
                    <li>
                         <a href="userprofile.html"><i class="fa fa-user mr-3" aria-hidden="true"></i> ACCOUNT INFORMATION</a>
                    </li>
                    <li>
                        <a href="my-order.html" class="active"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i> MY ORDERS</a>
                    </li>
                    <li>
                         <a href="downloadable-product.html"><i class="fa fa-download mr-3" aria-hidden="true"></i> MY DOWNLOADABLE PRODUCTS</a>
                    </li>
                    <li>
                         <a href="address-book.html"><i class="fa fa-address-book mr-3" aria-hidden="true"></i> ADDRESS BOOK</a>
                    </li>
                    <li>
                         <a href="my-review.html"><i class="fa fa-star mr-3" aria-hidden="true"></i> MY REVIEWS</a>
                    </li>
                    <li>
                        <a href="chat-notification.html"><i class="fa fa-comments mr-3" aria-hidden="true"></i> CHAT NOTIFICATIONS</a>
                   </li>
                   <li>
                        <a href="saved-card.html"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                   </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>My Orders</h3>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#programs" role="tab" data-toggle="tab">Programs</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#sessions" role="tab" data-toggle="tab">Sessions</a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane show in active" id="programs">
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                       
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="order-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                       
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="order-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                       
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="order-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                       
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="order-details.html">View Details</a>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="sessions">
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                        <p class="my-2">2 sessions booked</p>
                                        <h5 class="orange-response"><i class="fa fa-clock-o" aria-hidden="true"></i> Waiting for Steven response to accept or reject.</h5>
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Sessioned on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="session-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                        <p class="my-2">2 sessions booked</p>
                                        <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i> Steven accepted your session request.</h5>
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Sessioned on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="session-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                        <p class="my-2">2 sessions booked</p>
                                        <h5 class="red-response"><i class="fa fa-times" aria-hidden="true"></i> Steven rejected your session request.</h5>
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Sessioned on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="session-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    <img src="images/barbell.png" alt="">
                                    <div>
                                        <p>Order ID: 8668</p>
                                        <h3>5 Barbell Workouts</h3>
                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
                                        <p class="my-2">2 sessions booked</p>
                                        <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i> Steven accepted your session request.</h5>
                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Sessioned on:</p>
                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                                    <a href="session-details.html">View Details</a>
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