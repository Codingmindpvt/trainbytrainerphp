@extends('layouts.guest')
@section('content')
<!--start quick search area here -->
<section class="quick-search-banner text-center">
    <div class="container">
        <h2>Inspiring you to live a healthy lifestyle</h2>
        <h1 class="oswald-font">Do <span>work that aligns</span> with your heart</h1>
        <form method="get" action={{ route('coaches') }}>
            <div class="row">
                <aside class="col-lg-6" data-aos="fade-down">
                    <div class="custom-selectbox">
                        <select name="filter_category">
                            <option value="">All Categories</option>
                            @foreach ($categorie as $category)
                            <option value="{{ @$category->id }}">{{ @$category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <aside class="col-lg-6" data-aos="fade-down">
                    <div class="custom-selectbox">
                        <select name="filter_personality">
                            <option value="">All Personality and Training</option>
                            @foreach ($trainingStyles as $trainingStyle)
                            <option value="{{ @$trainingStyle->id }}">{{ @$trainingStyle->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
            </div>
            <input type="submit" class="blue-btn" value="Search" data-aos="fade-down">

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
                <a href="{{route('category')  }}" class="oswald-font view-all-categories">view all categories<i
                        class="fa fa-caret-right" aria-hidden="true"></i></a>
            </aside>
            @endif
        </div>


        <div class="row">

            @forelse ($categories as $category)
            <aside class="col-lg-3 col-sm-6" data-aos="fade-down">
                <a class="categories-icon-box" href="{{ route('coaches', ['filter_category'=>$category->id]) }}">
                    @if(!empty(@$category->image_file))
                    <img src="{{asset('public/'.@$category->image_file) }}" />
                    @else
                    <img src="{{asset('public/images/category-default.png') }}" class="category-default" />
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
            @foreach ($coach as $item)
            @if (!$item['user_count'])


            <div class="item">
                <div class="top-coach-thumbs">

                    <div class="coach-image-rating">

                        <img src="{{ asset('public/images/default-image.png') }}" class="img-fluid img-rounded" />

                        <p class="review-rate">
                        <div class="rating">
                            <div class="rateyo" data-rateyo-rating="0" data-rateyo-num-stars="5"></div>
                        </div>

                        <ul class="raring-stars review-rate">


                            (0 Reviews)</p>

                    </div>
                    <h2 class=" oswald-font">Adam Paul</h2>

                    <p> TrainByTrainer
                    </p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> California,Usa</p>



                    <a href="" class="small-blue-btn">View Profile</a>

                </div>
            </div>
            @else
            <div class="item">
                <div class="top-coach-thumbs">

                    <div class="coach-image-rating">
                        @if (!empty(@$item->profile_image))
                        <img src="{{ asset('public/' . @$item->profile_image) }}" class="img-fluid img-rounded" />
                        @else
                        <img src="{{ asset('public/images/default-image.png') }}" class="img-fluid img-rounded" />
                        @endif
                        <p class="review-rate">
                        <div class="rating">
                            <div class="rateyo"
                                data-rateyo-rating="{{!empty(@$item['average_rating']) ? @$item['average_rating'] :0}}"
                                data-rateyo-num-stars="5"></div>
                        </div>

                        <ul class="raring-stars review-rate">


                            ({{number_format($item['user_count'])}} Reviews)</p>

                    </div>
                    <h2 class=" oswald-font">{{ ucwords(@$item['first_name'] . ' ' . @$item['last_name']) }}
                        @if(isset($item['coach_badge_status']) && !empty($item['coach_badge_status']) &&
                        $item['coach_badge_status'] == 'C')
                        <img src="{{ url('/') }}/public/images/verified2.png" alt="image" class="img-fluid">
                        @endif
                    </h2>
                    <p>{{ !empty(@$item['coach_detail']['title']) ? @$item['coach_detail']['title'] : '' }}
                    </p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ @$item->state->name }}.
                        {{ @$item->country->name }}</p>



                    <a href="{{  route('coaches.profile', @$item['id']) }}" class="small-blue-btn">View Profile</a>

                </div>
            </div>
            @endif


            @endforeach
        </div>

    </div>
</section>
<!--end top rated coach area here -->
<hr class="line-divider" />
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
    <a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile2.png" alt=""
            class="top-coach-profile" /></a>
    <h3 class="oswald-font"><a href="#">Maria Roy</a> <img src="{{url('/')}}/public/images/verified.png" alt="" /></h3>
    <p>Primal/Paleo Health Coach</p>
</div>
</div>
</div>
</aside>
<aside class="col-lg-6">
    <div class="best-coach-do-work-top-box">
        <div class="best-coach-do-work best-coach-do-work-half"
            style="background-image:url({{url('/')}}/public/images/coach-img2.jpg);" data-aos="fade-down">
            <div class="best-coach-profile-bottom">
                <a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile1.png" alt=""
                        class="top-coach-profile" /></a>
                <h3 class="oswald-font"><a href="#">Adam Smith</a> <img src="{{url('/')}}/public/images/verified.png"
                        alt="" /></h3>
                <p>Wellness Health Coach</p>
            </div>
        </div>
        <div class="best-coach-do-work best-coach-do-work-half"
            style="background-image:url({{url('/')}}/public/images/coach-img3.jpg);">
            <div class="best-coach-profile-bottom">
                <a href="{{  route('trainer_profile')}}"><img src="{{url('/')}}/public/images/coach-profile3.png" alt=""
                        class="top-coach-profile" /></a>
                <h3 class="oswald-font"><a href="#">Christain Shah</a> <img
                        src="{{url('/')}}/public/images/verified.png" alt="" /></h3>
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
            <iframe width="100%" height="656" src="{{url('/')}}/public/videos/pilates.mp4" title="TrainByTrainer"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>
</section>
<!--end how it work area here -->

<!--start real trainer real results area here -->
<section class="real-trainer common-section">
    <div class="container">
        <h1>Real Trainers. Real Results.</h1>
        <h2>Start today.<br />Do anywhere.</h2>
        @if(!empty(Auth::id()))
        @else
        <a href="{{ route('signup') }}" class="green-btn">Find Your Coach</a>
        <a href="{{ route('signup') }}" class="green-btn white-btn">Become a Coach</a>

        @endif


    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function() {
    $(".rateyo").rateYo({
        readOnly: true,
        starWidth: "18px",
        spacing: "2px",
    });
    $("#rateYo").rateYo({
        fullStar: true,
        starWidth: "35px",
        spacing: "4px",
        //normalFill: '#f0f0f0',
        ratedFill: '#F29E20',
        onSet: function(rating, rateYoInstance) {
            $('#inpt_rating').val(rating);
        }
    });
});
</script>
<!--end real trainer real results area here -->
@endsection