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

				<aside class="col-lg-8">
					<div class="user-profle-right-side marketplace-main-box">
	                    <div class="info-profile-head head-edit-account">
	                        <h3>My Orders</h3>
	                        <h4> &gt; 5 Barbell Workouts</h4>
	                    </div>
	                    <hr>
	                    <div class="order-id-purchase">
	                        <p><span>Order ID:</span> 8668</p>
	                        <p><span>Ordered on:</span>  Oct 4, 2021  10:01 AM</p>
	                     </div>
	                     <h5 class="orange-response mx-4 my-3"><i class="fa fa-clock-o" aria-hidden="true"></i> Waiting for Steven response to accept or reject.</h5>
	                    <div class="details-order-image">
	                        <img src="images/barbell.png" alt="" class="mr-3">
	                        
	                        <div class="detail-order-content order-new-chat">
	                            <h2>5 Barbell Workouts</h2>
	                            <h5>$10</h5>
	                            <b>Order by</b>
	                            <div class="order-by-box">
	                            	<div class="order-by-img">
	                            		<img src="images/user-all.png" alt="user">
	                            		<p>Jack smith</p>
	                            	</div>
	                            </div>
	                            <a class="profile-chta-bt" href="">OPEN CHAT</a>
	                            <div class="review-btn-section accept-reject-update">
				                	<a href="#" class="small-blue-btn approve">Accept</a>
				                	<a href="#" class="small-blue-btn reject">Reject</a>
				                </div>
	                        </div>
	                    </div><hr>
	                    <div class="info-profile-head session-classes-main">
                        	<h3>Selected Sessions</h3><br>
                        	<div class="session-classes">
                        		<a href="#">Mon (Oct 4)  6:00 AM</a>
                        		<a href="#">Tue (Oct 5)  6:00 AM</a>
                        	</div>
			        	</div>
	                    <div class="product-downloadable-area">
	                        <hr>
	                        <div class="row">
	                            <div class="col-md-6">
	                                <h4>Billing Address</h4>
	                                <div class="Billing Address-box">
	                                    <h6>Adam Smith</h6>
	                                    <p>202 Main Town, Dolphin Tower
	                                        Los Angeles, California, 190001
	                                        USA
	                                    </p>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <h4>Payment Method</h4>
	                                <div class="Billing Address-box">
	                                    <h6>Credit Card</h6>
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
	                            </div>
	                        </div>                 
	                    </div>
	                    <div class="info-profile-head">
                        	<h3>Previous Programs Order by Jack Smith</h3>
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
				</aside>
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
  @endsection