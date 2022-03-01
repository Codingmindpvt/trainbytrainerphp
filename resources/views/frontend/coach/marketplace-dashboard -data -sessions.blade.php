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
				<h1 class="oswald-font">Hi, Adam Smith!</h1>
				<span class="divide-line"></span>
				<p class="oswald-font light-text">View and edit COACH OR personal details here</p>
			</div>
		</div>
	</section>
<!--end banner area here -->

<!--start my profile no date area here-->
	<section class="marketplace-section">
		<div class="container">
			<div class="row">
				<aside class="col-lg-4">
					<div class="profile-status-chat">
						<div class="profile-status-box">
							<h6>PROFILE STATUS <i class="fa fa-question-circle" aria-hidden="true"></i></h6>
							<label class="switch">
								<input type="checkbox" checked>
								<span class="slider round"></span>
							  </label>
						</div>
						<div class="profile-status-box">
							<h6>CHAT <i class="fa fa-question-circle" aria-hidden="true"></i></h6>
							<label class="switch">
								<input type="checkbox" checked>
								<span class="slider round"></span>
							  </label>
						</div>
					</div>
					<div class="coach-details-tab">
						<ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link linking active show" href="#coach" role="tab" data-toggle="tab" aria-selected="true">Coach Details</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link linking" href="#personal" role="tab" data-toggle="tab" aria-selected="false">Personal Details</a>
                        </li>
                    </ul>
					</div>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane in active show" id="coach">
							<ul class="user-profile-left">
				                <li>
				                     <a href="#" class="active"><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Marketplace Dashboard</a>
				                </li>
				                <li>
				                    <a href="#"><i class="fa fa-user mr-3" aria-hidden="true"></i>Coach Profile</a>
				                </li>
				                <li>
				                     <a href="#"><i class="fa fa-cart-plus mr-3" aria-hidden="true"></i>New Products</a>
				                </li>
				                <li>
				                     <a href="#"><i class="fa fa-archive mr-3" aria-hidden="true"></i>My Products List</a>
				                </li>
				                <li>
				                     <a href="#"><i class="fa fa-file-text mr-3" aria-hidden="true"></i>My Transactions List</a>
				                </li>
				                <li>
				                    <a href="#"><i class="fa fa-credit-card mr-3" aria-hidden="true"></i>Payment Methods</a>
				               </li>
				               <li>
				                    <a href="#"><i class="fa fa-clock-o mr-3" aria-hidden="true"></i>My Order History</a>
				               </li>
				               <li>
				                    <a href="#"><i class="fa fa-address-book mr-3" aria-hidden="true"></i>Customers</a>
				               </li>
				               <li>
				                    <a href="saved-card.html"><i class="fa fa-star mr-3" aria-hidden="true"></i>REVIEWS</a>
				               </li>
				               <li>
				                    <a href="#"><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Verification</a>
				               </li>
				               <li>
				                    <a href="#"><i class="fa fa-address-card mr-3" aria-hidden="true"></i>Certificated / Diplomas</a>
				               </li>  
				            </ul>
				        </div>
				        <div role="tabpanel" class="tab-pane" id="personal">
				            <ul class="user-profile-left" >
			                    <li>
			                         <a href="userprofile.html" class="active"><i class="fa fa-user mr-3" aria-hidden="true"></i> ACCOUNT INFORMATION</a>
			                    </li>
			                    <li>
			                        <a href="my-order.html"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i> MY ORDERS</a>
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
					</div>
				</aside>

				<aside class="col-lg-8 marketplace-main-box">
					<div class="marketplace-header">
					<h3 class="oswald-font">Marketplace Dashboard</h3>
					</div>
					<div class="row">
						<aside class="col-lg-8">
							<div class="sale-by-location">
							<h4 class="oswald-font">Sales By Locations</h4>
								<div class="view-box">
									<p class="pr-2">Year
									<div class="form-select">
		    							<select class="form-input" id="exampleFormControlSelect1">
									      <option>year</option>
									      <option>2 year</option>
									      <option>3 year</option>
									      <option>4 year</option>
									      <option>5 year</option>
									    </select>
									</div>
									</p>
								</div>
							</div>
							<div class="sales-by-location-map">
								<div id="container"></div>
							</div>
							<div class="sale-by-location">
							<h4 class="oswald-font">Sales Stats</h4>
								<div class="view-box">
									<p class="pr-2">Year
									<div class="form-select">
		    							<select class="form-input" id="exampleFormControlSelect1">
									      <option>year</option>
									      <option>2 year</option>
									      <option>3 year</option>
									      <option>4 year</option>
									      <option>5 year</option>
									    </select>
									</div>
									</p>
								</div>
							</div>
							<div class="sales-by-location-map">
								<figure class="highcharts-figure">
	  								<div id="container-1"></div>
								</figure>
							</div>
						</aside>
						<aside class="col-lg-4">
							<div class="main-lifetime">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font text-center">Sales Stats</h4>
								</div>
									<h5 class="oswald-font my-3 text-center">$98,532</h5>
							</div>
							<div class="main-lifetime">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Top Selling Products</h4>
								</div>
									<p class="mb-2"><span>1</span>
									<b>5 Barbell Workouts</b><br>202 times sold</p>
									<p class="mb-2"><span>2</span>
									<b>Best workouts plan fo...</b><br>202 times sold</p>
									<p class="mb-2"><span>3</span>
									<b>Yoga Fitness </b><br>202 times sold</p>
							</div>
							<div class="main-lifetime">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Top Selling Category</h4>
								</div>
									<p class="mb-2"><span>1</span>
									<b>Weight Loss</b></p>
									<p class="mb-2"><span>2</span>
									<b>Muscle Gain</b></p>
									<p class="mb-2"><span>3</span>
									<b>Yoga</b></p>
							</div>
						</aside>
	
						<aside class="col-lg-12">
							<div class="user-profle-right-side">
			                    <div class="info-profile-head">
			                        <h3>My Orders</h3>
			                        <ul class="nav nav-tabs" role="tablist">
			                            <li class="nav-item">
			                              <a class="nav-link active show" href="#programs" role="tab" data-toggle="tab" aria-selected="true">Programs</a>
			                            </li>
			                            <li class="nav-item">
			                              <a class="nav-link" href="#sessions" role="tab" data-toggle="tab" aria-selected="false">Sessions</a>
			                            </li>
			                        </ul>
			                    </div>
                    			<hr>

			                    <div class="tab-content">
			                        <div role="tabpanel" class="tab-pane in active show" id="programs">
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
			                            </div><hr>
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
			                            </div><hr>
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
			                            </div><hr>
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
			                                        <!-- <h5 class="orange-response"><i class="fa fa-clock-o" aria-hidden="true"></i> Waiting for Steven response to accept or reject.</h5> -->
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <div class="main-acc-rej-btn">
				                                    <a href="session-details.html">View Details</a>
				                                    <div class="review-btn-section">
									                	<a href="#" class="small-blue-btn approve">Accept</a>
									                	<a href="#" class="small-blue-btn reject">Reject</a>
									                </div>
								            	</div>
			                                </div>
			                            </div><hr>
			                            <div class="my-oders-list">
			                                <div class="image-product-tb">
			                                    <img src="images/barbell.png" alt="">
			                                    <div>
			                                        <p>Order ID: 8668</p>
			                                        <h3>5 Barbell Workouts</h3>
			                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
			                                        <p class="my-2">2 sessions booked</p>
			                                        <!-- <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i> Steven accepted your session request.</h5> -->
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <div class="main-acc-rej-btn">
				                                    <a href="session-details.html">View Details</a>
				                                    <div class="review-btn-section">
									                	<a href="#" class="small-blue-btn approve">Accept</a>
									                	<a href="#" class="small-blue-btn reject">Reject</a>
									                </div>
								            	</div>
			                                </div>
			                            </div><hr>
			                            <div class="my-oders-list">
			                                <div class="image-product-tb">
			                                    <img src="images/barbell.png" alt="">
			                                    <div>
			                                        <p>Order ID: 8668</p>
			                                        <h3>5 Barbell Workouts</h3>
			                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
			                                        <p class="my-2">2 sessions booked</p>
			                                        <!-- <h5 class="red-response"><i class="fa fa-times" aria-hidden="true"></i> Steven rejected your session request.</h5> -->
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <div class="main-acc-rej-btn">
				                                    <a href="session-details.html">View Details</a>
				                                    <div class="review-btn-section">
									                	<a href="#" class="small-blue-btn approve">Accept</a>
									                	<a href="#" class="small-blue-btn reject">Reject</a>
									                </div>
								            	</div>
			                                </div>
			                            </div><hr>
			                            <div class="my-oders-list">
			                                <div class="image-product-tb">
			                                    <img src="images/barbell.png" alt="">
			                                    <div>
			                                        <p>Order ID: 8668</p>
			                                        <h3>5 Barbell Workouts</h3>
			                                        <h6 class="doller-ten">$10 <b>/Session</b><span>Steven Topalovic</span></h6>
			                                        <p class="my-2">2 sessions booked</p>
			                                       <!--  <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i> Steven accepted your session request.</h5> -->
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <div class="main-acc-rej-btn">
				                                    <a href="session-details.html">View Details</a>
				                                    <div class="review-btn-section">
									                	<a href="#" class="small-blue-btn approve">Accept</a>
									                	<a href="#" class="small-blue-btn reject">Reject</a>
									                </div>
								            	</div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>

                			</div>
						</aside>
						<aside class="col-lg-12">
							<div class="info-profile-head">
			                    <h3>My Orders</h3>
			                 </div><hr>
							<div class="review-view">
				                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
				                <h5>GREAT GUY AND GREAT COACH!</h5>
				                <span class="traiend-date">Date Trained: Jul 2021 <br>Reviewed on: 10:10 PM</span>
				                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
				                    to work with him if you're looking to increase your health and fitness levels.</p>
				                <div class="review-section-main">
					                <div class="review-man-image">
					                    <img src="images\man.png" alt="man" class="mr-3">
					                    <div class="content-man">
					                        <h6>GEOFF MEASEY</h6>
					                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
					                    </div>
					                </div>
					                <div class="review-btn-section">
					                	<a href="#" class="small-blue-btn approve">Approve</a>
					                	<a href="#" class="small-blue-btn reject">Reject</a>
					                </div>
				            	</div>
				            </div><hr>
				            <div class="review-view">
				                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
				                <h5>GREAT GUY AND GREAT COACH!</h5>
				                <span class="traiend-date">Date Trained: Jul 2021 <br>Reviewed on: 10:10 PM</span>
				                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
				                    to work with him if you're looking to increase your health and fitness levels.</p>
				                <div class="review-section-main">
					                <div class="review-man-image">
					                    <img src="images\man.png" alt="man" class="mr-3">
					                    <div class="content-man">
					                        <h6>GEOFF MEASEY</h6>
					                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
					                    </div>
					                </div>
					                <div class="review-btn-section">
					                	<a href="#" class="small-blue-btn approve">Approve</a>
					                	<a href="#" class="small-blue-btn reject">Reject</a>
					                </div>
				            	</div>
				            </div><hr>
				            <div class="review-view">
				                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
				                <h5>GREAT GUY AND GREAT COACH!</h5>
				                <span class="traiend-date">Date Trained: Jul 2021 <br>Reviewed on: 10:10 PM</span>
				                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
				                    to work with him if you're looking to increase your health and fitness levels.</p>
				                <div class="review-section-main">
					                <div class="review-man-image">
					                    <img src="images\man.png" alt="man" class="mr-3">
					                    <div class="content-man">
					                        <h6>GEOFF MEASEY</h6>
					                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
					                    </div>
					                </div>
					                <div class="review-btn-section">
					                	<a href="#" class="small-blue-btn approve">Approve</a>
					                	<a href="#" class="small-blue-btn reject">Reject</a>
					                </div>
				            	</div>
				            </div>
						</aside>
						<aside class="col-lg-12">
							<div class="review-btn">
								<a href="#" class="blue-btn oswald-font w-50">View all reviews</a>
							</div>
						</aside>
					</div>
				</aside>

				
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection