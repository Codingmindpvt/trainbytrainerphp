@extends('layouts.guest')
@section('content')
<!--start banner area here -->
<div class="contact-banner" style="background: url(./images/popular.png) no-repeat; background-size: cover; background-position: center;">
    <div class="blue-overlay">
        <div class="container">
            <div class="popular-box text-center">
                <h1 class="oswald-font">The Most Popular Online Classes</h1>
                <span class="divide-line"></span>
                <h3 class="oswald-font">If you're looking for a new classes to try, we've got you covered!</h3>
                <p class="my-3">On Train By Trainer you can find fitness coaches and exercise programs from all over the world. Just search, find and buy!</p>
                <p>We've looked through the most popular programs on Train By Trainer and compiled all of the information you need into one easy-to-read guide. You can find everything from the best workouts to do at home, specific equipment workouts you can do in the gym, or workouts that help to build your core strength. Whether you want something low impact or high intensity - there's a perfect program for everyone on this list.</p>
            </div>
        </div>
    </div>
</div>
<!--end banner area here -->

<!--start workout area here -->
<section class="workout-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex w-100 popular-main">
                    <ul id="tabsJustified" class="nav nav-pills flex-column w-50">
                        <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-capitalize">
                                <h2 class="oswald-font">Most Popular Home Workout Classes:</h2>
                            </a></li>
                        <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-capitalize active">
                                <h2 class="oswald-font">Most Popular Core Strength Classes:</h2>
                            </a></li>
                        <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-capitalize">
                                <h2 class="oswald-font">Most Popular Equipment Classes:</h2>
                            </a></li>
                        <li class="nav-item"><a href="" data-target="#messages2" data-toggle="tab" class="nav-link small text-capitalize">
                                <h2 class="oswald-font">Most Popular Block Classes:</h2>
                            </a></li>
                    </ul>
                    <div class="tab-content workout-box border rounded">
                        <div id="home1" class="tab-pane fade">
                            <div class="wrkout-profile">
                                <img src="images/class.png" alt="workout">
                            </div>
                            <div class="wrkout-content">
                                <span class="oswald-font wrk-p">$10</span><span class="oswald-font">/session</span>
                                <div class="rwview float-right">
                                    <span>6:00 AM - 10:00 PM</span>
                                </div>
                                <p class="oswald-font wrk-h">5 BARBELL WORKOUTS</p>
                                <p class="wrk-r">Have access to a barbell and want to make the most of it? There are so many workouts you can do...</p>
                            </div>
                        </div>
                        <div id="profile1" class="tab-pane fade active show">
                            <div class="wrkout-profile">
                                <img src="images/class.png" alt="workout">
                            </div>
                            <div class="wrkout-content">
                                <span class="oswald-font wrk-p">$10</span>
                                <div class="rwview float-right">
                                    <span class="wrk-str">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span>(1.2k Reviews)</span>
                                </div>
                                <p class="oswald-font wrk-h">5 BARBELL WORKOUTS</p>
                                <p class="wrk-r">Have access to a barbell and want to make the most of it? There are so many workouts you can do...</p>
                            </div>
                        </div>
                        <div id="messages1" class="tab-pane fade">
                            <div class="wrkout-profile">
                                <img src="images/class.png" alt="workout">
                            </div>
                            <div class="wrkout-content">
                                <span class="oswald-font wrk-p">$10</span>
                                <div class="rwview float-right">
                                    <span class="wrk-str">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span>(1.2k Reviews)</span>
                                </div>
                                <p class="oswald-font wrk-h">5 BARBELL WORKOUTS</p>
                                <p class="wrk-r">Have access to a barbell and want to make the most of it? There are so many workouts you can do...</p>
                            </div>
                        </div>
                        <div id="messages2" class="tab-pane fade">
                            <div class="wrkout-profile">
                                <img src="images/class.png" alt="workout">
                            </div>
                            <div class="wrkout-content">
                                <span class="oswald-font wrk-p">$10</span>
                                <div class="rwview float-right">
                                    <span class="wrk-str">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span>(1.2k Reviews)</span>
                                </div>
                                <p class="oswald-font wrk-h">5 BARBELL WORKOUTS</p>
                                <p class="wrk-r">Have access to a barbell and want to make the most of it? There are so many workouts you can do...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end workout area here -->


<!--start faq area here-->
<section class="faq-section">
		<div class="container">
  			<div class="row">
                <div class="col-md-12">
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                    Benefits of an Online Workout Classes
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-2">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                    What Workout Program Should You Do?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-3">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                    Best Workout Programs for Weight Loss
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                <div class="card-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-4">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                    Best Workout Programs for Muscle Gain
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                <div class="card-body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-5">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                    What are the Benefits of Cardio Strength Exercise Programs?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                <div class="card-body">
                                    <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-6">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                    Don't Own Any Gym Equipment? It's No Problem!
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                <div class="card-body">
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-7">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-7" data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                    Best home workout programs
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-8">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-8" data-aria-expanded="false" data-aria-controls="faqCollapse-8">
                                    Exercise Programs For the Elderly
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-8" class="collapse" aria-labelledby="faqHeading-8" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-9">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-9" data-aria-expanded="false" data-aria-controls="faqCollapse-9">
                                    Pre-Natal Exercises
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-9" class="collapse" aria-labelledby="faqCollapse-9" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-10">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-10" data-aria-expanded="false" data-aria-controls="faqCollapse-10">
                                    Post-Natal Exercises
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-10" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-11">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-11" data-aria-expanded="false" data-aria-controls="faqCollapse-11">
                                    Designed By Professional Personal Trainers
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-11" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-12">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-12" data-aria-expanded="false" data-aria-controls="faqCollapse-12">
                                    Fitness & Workouts Should Be Enjoyable
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-12" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header" id="faqHeading-13">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-13" data-aria-expanded="false" data-aria-controls="faqCollapse-13">
                                    Nutrition Needs To Be a Focus
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-13" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          	</div>
        </div>
    </section>
<!--ends faq area here-->
@endsection