@extends('layouts.guest')
@section('content')
<!--start varification div area here -->
	 @include('frontend.nav._alertSection')
<!--end varification div area here -->

<!--start banner area here -->
	<section class="common-light-header">
		<div class="container">
			<div class="popular-box text-center">
				<h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
				<span class="divide-line"></span>
				{{-- <p class="oswald-font light-text">View and edit COACH OR personal details here</p> --}}
			</div>
		</div>
	</section>
<!--end banner area here -->

<!--start my profile no date area here-->
	<section class="marketplace-section">
		<div class="container">
			<div class="row">
				<aside class="col-lg-4">
					@if(Auth::check() && Auth::user()->role_type == 'C')
					<!-- start coach sidebar here -->

				                @include('frontend.nav._coachSideBar')

				    <!-- end coach sidebar here -->
				    @else
				    <!-- start sidebar here -->

				                @include('frontend.nav._sidebar')

				    <!-- end sidebar here -->
				    @endif
				</aside>

				<aside class="col-lg-8 marketplace-main-box">
					<div class="marketplace-header">
					<h3 class="oswald-font">Marketplace Dashboard</h3>
					</div>
					<br/>
					<div class="row">
						<aside class="col-lg-8">
						<div class="row">
							<div class="col-md-6">
								<div class="seller-earning-box">
									<div class="earning-text-count">
										<h2>$92,412</h2>
										<p>Total Seller</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="seller-earning-box">
									<div class="earning-text-count">
										<h2>$92,412</h2>
										<p>Total Seller</p>
									</div>
								</div>
							</div>
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
			                              <a class="nav-link" href="#sessions" role="tab" data-toggle="tab" aria-selected="false">Classes</a>
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
			                                    <a href="latest-order.html">View Details</a>
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
			                                    <a href="latest-order.html">View Details</a>
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
			                                    <a href="latest-order.html">View Details</a>
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
			                                    <a href="latest-order.html">View Details</a>
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
			                            </div><hr>
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
			                                    <a href="latest-order -session.html">View Details</a>
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
			                                        <h5 class="red-response"><i class="fa fa-times" aria-hidden="true"></i> Steven rejected your session request.</h5>
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <a href="latest-order -session.html">View Details</a>
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
			                                        <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i> Steven accepted your session request.</h5>
			                                    </div>
			                                </div>
			                                <div class="purchase-date">
			                                    <p>Sessioned on:</p>
			                                    <p class="mb-3">Oct 4, 2021  10:01 AM</p>
			                                    <a href="latest-order -session.html">View Details</a>
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
					             {{-- <div class="review-btn-section">
					                	 <a href="#" class="small-blue-btn approve" data-toggle="modal" data-target="#submit-edit">Raise Dispute</a>
					                </div> --}}
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
					                {{-- <div class="review-btn-section">
					                 <a href="#" class="small-blue-btn approve" data-toggle="modal" data-target="#submit-edit">Raise Dispute</a>
					                </div> --}}
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
					                {{-- <div class="review-btn-section">
					                	 <a href="#" class="small-blue-btn approve" data-toggle="modal" data-target="#submit-edit">Raise Dispute</a>
					                </div> --}}
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
	<script src="js/countrySelect.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("fixed_header");
	var sticky = header.offsetTop;

	function myFunction() {
	  if (window.pageYOffset-200 > sticky) {
	    header.classList.add("sticky");
	  } else {
	    header.classList.remove("sticky");
	  }
	}
</script>

<script>
	 var owl = $('.screenshot_slider').owlCarousel({
	    loop: true,
	    responsiveClass: true,
	    nav: true,
	    margin: 0,
	    autoplayTimeout: 4000,
	    smartSpeed: 400,
	    center: true,
	    navText:['<img src="images/left-arrow.png">', '<img src="images/right-arrow.png">'],
	    responsive: {
	        0: {
	            items: 1,
	            center: false
	        },
	        767: {
	        	items: 1,
	        	center: false
	        },
	        991: {
	            items: 2,
	            center: false
	        },
	        1200: {
	            items: 3
	        }
	    }
	});

	 $("#mobile-view-search").click(function() {
	 	$(".header-search-input").slideToggle();
	 });

	/****************************/

	jQuery(document.documentElement).keydown(function (event) {

	    // var owl = jQuery("#carousel");

	    // handle cursor keys
	    if (event.keyCode == 37) {
	       // go left
	      owl.trigger('prev.owl.carousel', [400]);
	      //owl.trigger('owl.prev');
	    } else if (event.keyCode == 39) {
	       // go right
	        owl.trigger('next.owl.carousel', [400]);
	       //owl.trigger('owl.next');
	    }

	});
	 $("#country_selector").countrySelect({
  		defaultCountry:"us"
	});

</script>
<!--hide show condition when some click on button-->
	<script>
	        $(document).ready(function(){
	        $("#form").click(function(){
	          $("#form-show").show(50);
	        });
	       });

	        $(document).ready(function(){
	        $("#form-1").click(function(){
	          $("#form-show-1").show(50);
	        });
	       });

	         $(document).ready(function(){
	        $("#cvv-1").click(function(){
	          $("#cvv-v1").show(50);
	        });
	        $("#cvv-2").click(function(){
    		$("#cvv-v1").hide(50);
  			});
	       });

	          $(document).ready(function(){
	        $("#cvv-2").click(function(){
	          $("#cvv-v2").show(50);
	        });
	        $("#cvv-3").click(function(){
    		$("#cvv-v2").hide(50);
  			});
	       });

	         $(document).ready(function(){
	        $("#cvv-3").click(function(){
	          $("#cvv-v3").show(50);
	        });
	        $("#form-1").click(function(){
    		$("#cvv-v3").hide(50);
  			});
	       });

	</script>
	<script type="text/javascript">
Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/world-population-density.json', function (data) {

  // Prevent logarithmic errors in color calulcation
  data.forEach(function (p) {
    p.value = (p.value < 1 ? 1 : p.value);
  });

  // Initialize the chart
  Highcharts.mapChart('container', {

    chart: {
      map: 'custom/world'
    },

    title: {
      text: ''
    },

    mapNavigation: {
      enabled: true,
      buttonOptions: {

      }
    },



    colorAxis: {
      min: 1,
      max: 1000,
      type: 'logarithmic'
    },

    series: [{
      data: data,
      joinBy: ['iso-a3', 'code3'],
      name: 'Population density',
      states: {
        hover: {
          color: '#a4edba'
        }
      }
    }]
  });
});
	</script>
	<script type="text/javascript">
		Highcharts.getJSON(
  'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/range.json',
  function (data) {

    Highcharts.chart('container-1', {

      chart: {
        type: 'arearange',
        zoomType: 'x',
        scrollablePlotArea: {
          minWidth: 300,
          scrollPositionX: 1
        }
      },

      xAxis: {
        type: 'datetime',
        accessibility: {
          rangeDescription: 'Range: Jan 1st 2017 to Dec 31 2017.'
        }
      },

      yAxis: {
        title: {
          text: null
        }
      },
     legend: {
        enabled: false
      },

      series: [{
        name: 'Temperatures',
        data: data
      }]

    });
  }
);
	</script>
<!--ends my profile no date area here-->
@endsection
