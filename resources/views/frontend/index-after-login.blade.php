@extends('layouts.guest')
@section('content')
<!--start quick search area here -->
	<section class="quick-search-banner text-center">
		<div class="container">
			<h2>Inspiring you to live a healthy lifestyle</h2>
			<h1 class="oswald-font">Do <span>work that aligns</span> with your heart</h1>
			<form>
				<div class="row">
					<aside class="col-lg-6">
						<div class="custom-selectbox">
							<select>
								<option>Select Your Goal..</option>
							</select>
						</div>
					</aside>
					<aside class="col-lg-6">
						<div class="custom-selectbox">
							<select>
								<option>Coach’s Personality & Training Style</option>
							</select>
						</div>
					</aside>
				</div>
					<a class="blue-btn" data-aos="fade-down" href="coaches.html">Search</a>
			</form>
		</div>
	</section>
<!--end quick search area here -->

<!--start categories area here -->
	<section class="categories-list grey-bg common-section">
		<div class="container">
			<div class="row">
				<aside class="col-sm-6">
					<div class="main-heading oswald-font">
						<h1>Categories</h1>
						<span class="divide-line"></span>
						<p>WHAT DO YOU NEED HELP TO FIND PERFECT COACH?</p>
					</div>
				</aside>
				<aside class="col-sm-6 text-right">
					<a href="{{route('category')  }}" class="oswald-font view-all-categories">view all categories<i class="fa fa-caret-right" aria-hidden="true"></i></a>
				</aside>
			</div>
			<div class="row">
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon1.png" alt="" />
						<p class="oswald-font">Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon2.png" alt="" />
						<p class="oswald-font">Holistic Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon3.png" alt="" />
						<p class="oswald-font">Wellness Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon4.png" alt="" />
						<p class="oswald-font">Primal/Paleo Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon1.png" alt="" />
						<p class="oswald-font">Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon2.png" alt="" />
						<p class="oswald-font">Holistic Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon3.png" alt="" />
						<p class="oswald-font">Wellness Health Coach</p>
					</a>
				</aside>
				<aside class="col-lg-3 col-sm-6">
					<a class="categories-icon-box" href="#">
						<img src="images/category-icon4.png" alt="" />
						<p class="oswald-font">Primal/Paleo Health Coach</p>
					</a>
				</aside>
			</div>
		</div>
	</section>
<!--start categories area here -->


<!--start top rated coach area here -->
	<section class="top-rated-coaches common-section">
		<div class="container">
			<div class="main-heading oswald-font">
				<h1>Top rated coaches</h1>
				<span class="divide-line"></span>
				<p>Meet some of the best top rated coaches</p>
			</div>
			<div class="screenshot_slider owl-carousel">
				<div class="item">
					<div class="top-coach-thumbs">
						<div class="coach-image-rating">
							<a href="#"><img src="images/coach-profile1.png" alt="" class="top-coach-profile" /></a>
							<ul class="raring-stars">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
							<p>(1.2k Reviews)</p>
						</div>
						<h2 class="oswald-font"><a href="#">Adam Smith</a> <img src="images/verified.png" alt="" /></h2>
						<p>Wellness Health Coach</p>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i>California, USA</p>
						<a href="trainer_profile.html" class="small-blue-btn">View Profile</a>
					</div>
				</div>
				<div class="item">
					<div class="top-coach-thumbs">
						<div class="coach-image-rating">
							<a href="#"><img src="images/coach-profile2.png" alt="" class="top-coach-profile" /></a>
							<ul class="raring-stars">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
							<p>(1.2k Reviews)</p>
						</div>
						<h2 class="oswald-font"><a href="#">Maria Roy</a> <img src="images/verified.png" alt="" /></h2>
						<p>Wellness Health Coach</p>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i>California, USA</p>
						<a href="trainer_profile.html" class="small-blue-btn">View Profile</a>
					</div>
				</div>
				<div class="item">
					<div class="top-coach-thumbs">
						<div class="coach-image-rating">
							<a href="#"><img src="images/coach-profile2.png" alt="" class="top-coach-profile" /></a>
							<ul class="raring-stars">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
							<p>(1.2k Reviews)</p>
						</div>
						<h2 class="oswald-font"><a href="#">Chritian</a> <img src="images/verified.png" alt="" /></h2>
						<p>Wellness Health Coach</p>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i>California, USA</p>
						<a href="trainer_profile.html" class="small-blue-btn">View Profile</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--end top rated coach area here -->
<hr class="line-divider"/>
<!--start how do they do area here -->
	<section class="how-do-they-do common-section">
		<div class="container">
			<div class="main-heading oswald-font text-center">
				<h1>HOW DO THEY DO</h1>
				<span class="divide-line"></span>
				<p>CHECK HOW BEST COACHES DO THEIR WORK</p>
			</div>
			<div class="row">
				<aside class="col-lg-6">
					<div class="best-coach-do-work best-coach-do-work-big" style="background-image:url(images/coach-img1.jpg);">
						<div class="best-coach-profile-bottom">
							<a href="trainer_profile.html"><img src="images/coach-profile2.png" alt="" class="top-coach-profile" /></a>
							<h3 class="oswald-font"><a href="#">Maria Roy</a> <img src="images/verified.png" alt="" /></h3>
							<p>Primal/Paleo Health Coach</p>
						</div>
					</div>
				</aside>
				<aside class="col-lg-6">
					<div class="best-coach-do-work best-coach-do-work-half" style="background-image:url(images/coach-img2.jpg);">
						<div class="best-coach-profile-bottom">
							<a href="trainer_profile.html"><img src="images/coach-profile1.png" alt="" class="top-coach-profile" /></a>
							<h3 class="oswald-font"><a href="#">Adam Smith</a> <img src="images/verified.png" alt="" /></h3>
							<p>Wellness Health Coach</p>
						</div>
					</div>
					<div class="best-coach-do-work best-coach-do-work-half" style="background-image:url(images/coach-img3.jpg);">
						<div class="best-coach-profile-bottom">
							<a href="trainer_profile.html"><img src="images/coach-profile3.png" alt="" class="top-coach-profile" /></a>
							<h3 class="oswald-font"><a href="#">Christain Shah</a> <img src="images/verified.png" alt="" /></h3>
							<p>Wellness Health Coach</p>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--end how do they do area here -->
<!--start how it work area here -->
	<section class="how-it-works common-section">
		<div class="container">
			<div class="main-heading oswald-font text-center">
				<h1>How it works</h1>
				<span class="divide-line"></span>
				<p>Check how then trainer work</p>
			</div>
			<div class="video-outer">
				<iframe width="100%" height="656" src="https://www.youtube.com/embed/9xwazD5SyVg?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</section>
<!--end how it work area here -->

<!--start real trainer real results area here -->
	<section class="real-trainer common-section">
		<div class="container">
			<h1>Real Trainers. Real Results.</h1>
			<h2>Start today.<br/>Do anywhere.</h2>
			<a href="get-started.html" class="green-btn">Find Your Coach</a>
			<a href="get-started.html" class="green-btn white-btn">Become a Coach</a>
		</div>
	</section>
<!--end real trainer real results area here -->
@endsection
