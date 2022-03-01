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

				<aside class="col-lg-8 marketplace-main-box varification-box">
					<div class="marketplace-header">
					<h3 class="oswald-font">My Order History</h3>
					</div>
					<div class="name-date-box-area">
						<div class="row">
							<div class="col-md-3">
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Search By Order Id">
							</div>
							<div class="col-md-3">
								<i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="From">
							</div>
							<div class="col-md-3">
								<i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="To">
							</div>
						</div>
					</div>
					<div class="user-profle-right-side">
						<div class="info-profile-head">
							<h3>Orders</h3>
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
								  <a class="nav-link active" href="#programs" role="tab" data-toggle="tab">Programs</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="#sessions" role="tab" data-toggle="tab">Classes</a>
								</li>
							</ul>
						</div>
						<hr>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane show in active" id="programs">
							@foreach($orders as $order)
							@php
								$order_id = ltrim($order['program_ids'],"[");
								$order_id = rtrim($order_id,"]");
								$programs = (explode(",",@$order_id));
							@endphp
								
								@foreach($programs as $key=>$program)
								@php
								$programDetail = @$order->getProgramDetail($program);
								@endphp
									@if(isset($programDetail))
									<div class="my-oders-list">
										<div class="image-product-tb">
											@if(!empty($programDetail['image_file']))
											<img src="{{asset('public/'.$programDetail['image_file'])}}" alt="">
											@else
											<img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
											@endif
											<div>
												<p>{{"Order ID: #".$order->id}}</p>
												<h3>{{ucwords(@$programDetail['program_name'])}}</h3>
												<h6 class="doller-ten">{{DEFAULT_CURRENCY.$order->price}} <b>/Session</b><span>Order By: {{ucwords($order->users->first_name." ".$order->users->last_name)}}</span></h6>

											</div>
										</div>
										<div class="purchase-date">
											<p>Purchased on:</p>
											<p class="mb-2">{{$order->created_on}}</p>
											<a href="order-details.html">View Details</a>
										</div>
									</div>
									@endif
								@endforeach
								
							@endforeach


								<div class="pagination-count-box p-4">
									 <!-- start pagination -->
										<nav aria-label="Page navigation example">
										{{$orders->links()}}
										</nav>
										<!-- end pagination -->
								</div>

							</div>

							<div role="tabpanel" class="tab-pane fade" id="sessions">
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-accept-bt">ACCEPT</button>
											<button type="button" class="view-reject-bt">REJECT</button>
										</div>
									</div>
								</div>
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-accept-bt">ACCEPT</button>
											<button type="button" class="view-reject-bt">REJECT</button>
										</div>
									</div>
								</div>
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-accept-bt">ACCEPT</button>
											<button type="button" class="view-reject-bt">REJECT</button>
										</div>
									</div>
								</div>
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-accept-bt">ACCEPT</button>
											<button type="button" class="view-reject-bt">REJECT</button>
										</div>
									</div>
								</div>
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-accepted-bt"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button>
										</div>
									</div>
								</div>
								<div class="my-oders-list">
									<div class="image-product-tb">
										<img src="images/barbell.png" alt="">
										<div>
											<p>Order ID: 8668</p>
											<h3>5 Barbell Workouts</h3>
											<h6 class="doller-ten">$10 <b>/Session</b><span>Order By: Jack Smith</span></h6>
											<p class="my-2">2 sessions booked</p>

										</div>
									</div>
									<div class="purchase-date">
										<p>Ordered on:</p>
										<p class="mb-2">Oct 4, 2021  10:01 AM</p>
										<div class="view-accept-reject-bt">
											<a href="session-order-history.html">View Details</a>
											<button type="button" class="view-rejected-bt"><i class="fa fa-times" aria-hidden="true"></i> Rejected</button>
										</div>
									</div>
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
