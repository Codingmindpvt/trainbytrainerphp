@extends('layouts.guest')
@section('content')
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
				                     <a href="#"><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Marketplace Dashboard</a>
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
				                    <a href="#"  class="active"><i class="fa fa-address-book mr-3" aria-hidden="true"></i>Customers</a>
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
					<div class="user-profle-right-side">
	                    <div class="info-profile-head head-edit-account">
	                        <h3>Customers</h3>
	                        <h4> &gt;  Jackma Roy</h4>
	                    </div>
	                    <hr>
	                    <div class="profile-content-box text-content-copy-profile">
	                        <img src="images/use.png" alt="" class="mr-3">
	                        
	                        <div class="profile-content-text">
	                            <h2>Jackma Roy</h2>
	                            <p>jackma_roy007@gmail.com</p>
	                            <div class="row mt-3">
	                                <div class="col-6">
	                                    <p class="phone-head">Phone Number</p>
	                                    <p>+1 9876543210
	                                </p></div>
	                                <div class="col-6">
	                                    <p class="phone-head">Country</p>
	                                    <p>USA</p>
	                                </div>
	                            </div>
	                        </div>
                            <a href="" class="profile-new-view-bt">VIEW PROFILE</a>
	                    </div>
                        
                        <div class="customer-profile-previous-order">
                            <div class="info-profile-head">
                                <h3>Previous Classes by Jack Smith</h3>
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
	                </div>
				</aside>
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection