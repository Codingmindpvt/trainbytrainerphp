@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
	<section class="profesional-common-box">
		<div class="container">
			<p><img src="images/notify.png"  class="mr-2" alt="notify">You are currently not verified. <a href="#"><span>Click here</span></a> or on the verification tab to verify yourself as a professional fitness coach.
		</div>
	</section>
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
					<div class="user-profle-right-side">
	                    <div class="info-profile-head">
	                        <h3>Account Information</h3>
	                        <a href="account-edit.html"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT INFORMATION</a>
	                    </div>
	                    <hr>
	                    <div class="profile-content-box">
	                        <img src="images/user.png" alt="" class="mr-3">
	                        
	                        <div class="profile-content-text">
	                            <h2>Adam Smith</h2>
	                            <p>adam_smith007@gmail.com</p>
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
	                    </div>
	                    <div class="change-pass-area">
	                        <h3>Change Password</h3>

	                        <form>
	                            <div class="form-group">
	                              <label for="formGroupExampleInput">Current Password</label>
	                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Password">
	                            </div>
	                            <div class="form-group">
	                              <label for="formGroupExampleInput2">New Password</label>
	                              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
	                            </div>
	                            <div class="form-group">
	                                <label for="formGroupExampleInput2">Confirm New Password</label>
	                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
	                            </div>
	                            <button type="button" class="sign-bt">SUBMIT</button>
	                        </form>
	                    </div>
	                </div>
				</aside>
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection