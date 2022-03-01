@extends('layouts.guest')
@section('content')

@if(!empty(Auth::user()->status=='C'))
<!--start varification div area here -->
	<section class="profesional-common-box">
		<div class="container">
			<p><img src="images/notify.png"  class="mr-2" alt="notify">You are currently not verified. <a href="#"><span>Click here</span></a> or on the verification tab to verify yourself as a professional fitness coach.
		</div>
	</section>
<!--end varification div area here -->
@endif
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
				                     <a href="marketplace-dashboard.html"class="active"><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Marketplace Dashboard</a>
				                </li>
				                <li>
				                    <a href="coach-profiel.html"><i class="fa fa-user mr-3" aria-hidden="true"></i>Coach Profile</a>
				                </li>
				                <li>
				                     <a href="add-new-product.html"><i class="fa fa-cart-plus mr-3" aria-hidden="true"></i>New Products</a>
				                </li>
				                <li>
				                     <a href="My-product-list"><i class="fa fa-archive mr-3" aria-hidden="true"></i>My Products List</a>
				                </li>
				                <li>
				                     <a href="my-transactions.html"><i class="fa fa-file-text mr-3" aria-hidden="true"></i>My Transactions List</a>
				                </li>
				                <li>
				                    <a href="payment-method.html"><i class="fa fa-credit-card mr-3" aria-hidden="true"></i>Payment Methods</a>
				               </li>
				               <li>
				                    <a href="order-history.html"><i class="fa fa-clock-o mr-3" aria-hidden="true"></i>My Order History</a>
				               </li>
				               <li>
				                    <a href="customer.html"><i class="fa fa-address-book mr-3" aria-hidden="true"></i>Customers</a>
				               </li>
				               <li>
				                    <a href="reviews.html"><i class="fa fa-star mr-3" aria-hidden="true"></i>REVIEWS</a>
				               </li>
				               <li>
				                    <a href="varification.html"><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Verification</a>
				               </li>
				               <li>
				                    <a href="certified.html"><i class="fa fa-address-card mr-3" aria-hidden="true"></i>Certificated / Diplomas</a>
				               </li>  
				            </ul>
				        </div>
				        <div role="tabpanel" class="tab-pane" id="personal">
				            <ul class="user-profile-left" >
			                    <li>
			                         <a href="my-profile-personal.html" class="active"><i class="fa fa-user mr-3" aria-hidden="true"></i> ACCOUNT INFORMATION</a>
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
									<h4 class="oswald-font">Sales Stats</h4>
								</div>
									<h5 class="oswald-font my-3">$0.00</h5>
							</div>
							<div class="main-lifetime">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Top Selling Products</h4>
								</div>
									<p>No Product Found</p>
							</div>
							<div class="main-lifetime">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Top Selling Category</h4>
								</div>
									<p>No Category Found</p>
							</div>
						</aside>
						<aside class="col-lg-12 top-selling-box">
							<div class="sale-by-location">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Top Selling Category</h4>
								</div>
								<p class="my-2">No Category Found</p>
							</div>
							<div class="sale-by-location">
								<div class="lifetime-sales-box">
									<h4 class="oswald-font">Latest Comments & Reviews</h4>
								</div>
								<p class="my-2">No Comment & Review Available</p>
							</div>
						</aside>
					</div>
				</aside>

				
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection