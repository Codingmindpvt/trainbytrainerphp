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
				                     <a href="#" ><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Marketplace Dashboard</a>
				                </li>
				                <li>
				                    <a href="#"><i class="fa fa-user mr-3" aria-hidden="true"></i>Coach Profile</a>
				                </li>
				                <li>
				                     <a href="#" class="active"><i class="fa fa-cart-plus mr-3" aria-hidden="true"></i>New Products</a>
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

				<aside class="col-lg-8 marketplace-main-box varification-box">
					<div class="marketplace-header">
						<div class="info-profile-head head-edit-account p-0">
	                        <h3>Address Book</h3>
	                        <h4> &gt; Add New Class</h4>
                    	</div>
						<a href="" class="save-green-bt"><i class="fa fa-check" aria-hidden="true"></i> SAVE PROFILE</a>
					</div>
					<div class="sale-by-location">
					<div class="view-box">
						<p class="my-2 form-p">Class Image</p>
						<div class="upload-certificate-box-main">
							<!-- <div class="upload-certificate-box">
								<img src="images/upload.png" alt="upload">
							</div> -->
							<div class="upload-add ml-0">
								<input id="input-b3" name="input-b3[]" type="file" class="file" multiple 
        						data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
							</div>
						</div>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Class Categories</p>
						<div class="form-select">
							<select class="form-input" id="exampleFormControlSelect1">
						      <option>Select</option>
						      <option>2 year</option>
						      <option>3 year</option>
						      <option>4 year</option>
						      <option>5 year</option>
						    </select>
						</div>
						<p class="tag-line">This will appear under your name on your coach profile page. It will help clients get to know you better.</p>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Class Name</p>
						<input class="form-input" type="text" name="text">
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Class Description</p>
						<textarea class="form-input"></textarea>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Price Per Session (USD)</p>
						<input class="form-input" type="text" name="text">
						<p class="tag-line">Prices are currently listed in USD Dollars. Please also consider taxes and our standard commission (15%) when creating this price.</p>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Location of the Class</p>
						<input class="form-input" type="text" name="text">
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Tax Class</p>
						<div class="form-select">
							<select class="form-input" id="exampleFormControlSelect1">
						      <option>Select</option>
						      <option>2 year</option>
						      <option>3 year</option>
						      <option>4 year</option>
						      <option>5 year</option>
						    </select>
						</div>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Class Days</p>
						<div class="calendar calendar-first" id="calendar_first">
							<div class="calendar_header">
								<button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
								<h2>October 2021</h2>
								<button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
							</div>
							<div class="calendar_weekdays">
								<div style="color: rgb(68, 68, 68);">Sun</div>
								<div style="color: rgb(68, 68, 68);">Mon</div>
								<div style="color: rgb(68, 68, 68);">Tue</div>
								<div style="color: rgb(68, 68, 68);">Wed</div>
								<div style="color: rgb(68, 68, 68);">Thu</div>
								<div style="color: rgb(68, 68, 68);">Fri</div>
								<div style="color: rgb(68, 68, 68);">Sat</div>
							</div>
							<div class="calendar_content">
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="past-date">1</div>
								<div class="past-date">2</div>
								<div class="past-date">3</div>
								<div class="past-date">4</div>
								<div class="past-date">5</div>
								<div class="past-date">6</div>
								<div class="past-date">7</div>
								<div class="past-date">8</div>
								<div class="past-date">9</div>
								<div class="past-date">10</div>
								<div class="past-date">11</div>
								<div class="past-date">12</div>
								<div class="past-date">13</div>
								<div class="past-date">14</div>
								<div class="past-date">15</div>
								<div class="past-date">16</div>
								<div class="past-date">17</div>
								<div class="past-date">18</div>
								<div class="past-date">19</div>
								<div class="past-date">20</div>
								<div class="past-date">21</div>
								<div class="past-date">22</div>
								<div class="past-date">23</div>
								<div class="past-date">24</div>
								<div class="past-date">25</div>
								<div class="past-date">26</div>
								<div class="past-date">27</div>
								<div class="past-date">28</div>
								<div class="today" style="color: #fff;">29</div>
								<div>30</div>
								<div>31</div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
								<div class="blank"></div>
							</div>
						</div>
						<p class="tag-line">Hold Shift key from your keyboard to select multiple days.</p>
					</div>
					<div class="view-box">
						<p class="my-2 form-p">Results</p>
						<div class="form-row">
						    <div class="form-group col-md-6 clock-box">
							    <p class="tag-line">From</p>
							    <input class="form-input" type="text" name="text">
						    </div>
						    <div class="form-group col-md-6 clock-box">
						    	<p class="tag-line">To</p>
								<input class="form-input" type="text" name="text">
						    </div>
					 	</div>
					</div>
					<div class="profile-btm-btn">
						<a href="#" class="blue-btn oswald-font my-3">SAVE Program</a>
					</div>
					</div>
				</aside>
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection