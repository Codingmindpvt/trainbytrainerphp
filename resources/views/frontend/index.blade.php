@extends('layouts.guest')
@section('content')
<!--start quick search area here -->
	<section class="quick-search-banner text-center">
		<div class="container">
			<h2>Inspiring you to live a healthy lifestyle</h2>
			<h1 class="oswald-font">Do <span>work that aligns</span> with your heart</h1>
			<form>
				<div class="row">
					<aside class="col-lg-6" data-aos="fade-down">
						<div class="custom-selectbox">
							<select>
								<option>Select Your Goal..</option>
							</select>
						</div>
					</aside>
					<aside class="col-lg-6" data-aos="fade-down">
						<div class="custom-selectbox">
                            <select  name="personality_and_training[]"
                                        required>
                                        @foreach ($trainingStyles as $trainingStyle)
                                            <option value="{{ @$trainingStyle->id }}">{{ @$trainingStyle->title }}</option>
                                        @endforeach
                                    </select>
						</div>
					</aside>
				</div>
				<a href="coaches.html">
					<a class="blue-btn" data-aos="fade-down" href="{{ route('coaches', ['pat_id'=>$trainingStyle->id]) }}">Search</a>
				</a>
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

				 @if($category_count>8)
				<aside class="col-sm-6 text-right">
					<a href="{{route('category')  }}" class="oswald-font view-all-categories">view all categories<i class="fa fa-caret-right" aria-hidden="true"></i></a>
				</aside>
				 @endif
			</div>


			<div class="row">

				@forelse ($categories as $category)
				<aside class="col-lg-3 col-sm-6" data-aos="fade-down">
					<a class="categories-icon-box" href="{{ route('coaches', ['cat_id'=>$category->id]) }}">
						@if(!empty(@$category->image_file))
			               	<img src="{{asset('public/'.@$category->image_file) }}"/>
			            @else
			               	<img src="{{asset('public/images/category-default.png') }}" class="category-default"/>
			           	@endif
						<p class="oswald-font">{{ $category->title }}</p>
					</a>
				</aside>
				@empty
				    <p class="blank-para">No Records</p>
				@endforelse

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
                            @if (!empty(@$coach->profile_image))
                            <img src="{{ asset('public/' . @$coach->profile_image) }}"
                                class="img-fluid img-rounded" />
                        @else
                            <img src="{{ asset('public/images/default-image.png') }}"
                                class="img-fluid img-rounded" />
                        @endif

							 <ul class="raring-stars">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
							<p>(1.2k Reviews)</p>

                        </div>
						{{ ucwords(@$coach['first_name'] . ' ' . @$coach['last_name']) }}
                        @if(isset($coach['coach_badge_status']) && !empty($coach['coach_badge_status']) && $coach['coach_badge_status'] == 'C')
                        <span><img
                                src="{{ url('/') }}/public/images/verified2.png" alt="image"
                                class="img-fluid">Certified</span>
                        @endif</h2>
						<p>{{ !empty(@$coach['coach_detail']['title']) ? @$coach['coach_detail']['title'] : '' }}
                        </p>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ @$coach->state->name }}.
                            {{ @$coach->country->name }}</p>
						<a href="{{  route('coaches.profile', @$coach['id']) }}" class="small-blue-btn">View Profile</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--end top rated coach area here -->
<hr class="line-divider"/>
{{-- <!--start how do they do area here -->
	<section class="how-do-they-do common-section">
		<div class="container">
			<div class="main-heading oswald-font text-center">
				<h1>HOW DO THEY DO</h1>
				<span class="divide-line"></span>
				<p>CHECK HOW BEST COACHES DO THEIR WORK</p>
			</div>
			<div class="row">
				<aside class="col-lg-6">
					<div class="best-coach-do-work-top-box" data-aos="fade-right">
						<div class="best-coach-do-work best-coach-do-work-big" style="background-image:url({{url('/')}}/public/images/coach-img1.jpg);">
							<div class="best-coach-profile-bottom">
								<a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile2.png" alt="" class="top-coach-profile" /></a>
								<h3 class="oswald-font"><a href="#">Maria Roy</a> <img src="{{url('/')}}/public/images/verified.png" alt="" /></h3>
								<p>Primal/Paleo Health Coach</p>
							</div>
						</div>
					</div>
				</aside>
				<aside class="col-lg-6">
					<div class="best-coach-do-work-top-box">
						<div class="best-coach-do-work best-coach-do-work-half" style="background-image:url({{url('/')}}/public/images/coach-img2.jpg);" data-aos="fade-down">
							<div class="best-coach-profile-bottom">
								<a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile1.png" alt="" class="top-coach-profile" /></a>
								<h3 class="oswald-font"><a href="#">Adam Smith</a> <img src="{{url('/')}}/public/images/verified.png" alt="" /></h3>
								<p>Wellness Health Coach</p>
							</div>
						</div>
						<div class="best-coach-do-work best-coach-do-work-half" style="background-image:url({{url('/')}}/public/images/coach-img3.jpg);">
							<div class="best-coach-profile-bottom">
								<a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile3.png" alt="" class="top-coach-profile" /></a>
								<h3 class="oswald-font"><a href="#">Christain Shah</a> <img src="{{url('/')}}/public/images/verified.png" alt="" /></h3>
								<p>Wellness Health Coach</p>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--end how do they do area here --> --}}
<!--start how it work area here -->
	<section class="how-it-works common-section">
		<div class="container">
			<div class="main-heading oswald-font text-center">
				<h1>How it works</h1>
				<span class="divide-line"></span>
				<p>Check how then trainer work</p>
			</div>
			<div class="video-outer" data-aos="fade-down">
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
            @if(!empty(Auth::id()))
        @else
        <a href="{{ route('signup') }}" class="green-btn">Find Your Coach</a>
        <a href="{{ route('signup') }}" class="green-btn white-btn">Become a Coach</a>

        @endif


		</div>
	</section>
<!--end real trainer real results area here -->
@endsection
