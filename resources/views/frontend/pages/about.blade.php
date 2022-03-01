@extends('layouts.guest')
@section('content')
        <!-- whishlist-section start here -->
        <section class="about-page-banner">
            <div class="whishlist-title">
                <h2>ABOUT US</h2>
                <h6>We Offer healthier lifestyle.</h6>
            </div>   
        </section>

        <!-- adout us area start here -->
        <section class="fitness-community">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content-fitness-community">
                            <h3>EMPOWERING THE GLOBAL FITNESS COMMUNITY
                                BY ENABLING YOU TO EFFORTLESSLY CONNECT
                                WITH EACH OTHER
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-fitness-community">
                            <img src="public/images/about.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- adout us area end here -->

        <!-- experience area start here -->
        <section class="experience-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-experience-area">
                            <h3>Over 20 Years of Experience</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of
                                type and scrambled it to make a type specimen
                                book. 
                            </p>
                            <a href="">Find Your Coach</a>
                        </div>
                    </div>
                    <div class="col-md-8 align-self-center">
                        <div class="value-experience-area">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="total-profile-coaches text-center">
                                        <img src="{{url('/')}}/public/images/gym1.png" alt="gym">
                                        <h4>2.5K</h4>
                                        <p>Coaches Profile</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="total-profile-coaches text-center">
                                        <img src="{{url('/')}}/public/images/gym2.png" alt="gym">
                                        <h4>10.3K</h4>
                                        <p>Fitness Programs</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="total-profile-coaches text-center">
                                        <img src="{{url('/')}}/public/images/heart-beat.png" alt="gym">
                                        <h4>2M+</h4>
                                        <p>Workout Sessions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- experience area end here -->


        <!-- become a coach start here -->
        <section class="become-coach">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-become-coach-area">
                            <img src="{{url('/')}}/public/images/purpose.png" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="content-become-coach-area">
                           <h3>A COACH FOR EVERY PURPOSE</h3>   
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type.
                            </p>
                            <a class="become-bt" href="">Become a Coach</a>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
            </div>
        </section>
        <!-- become a coach end here -->

        <section class="become-coach">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="content-become-coach-area">
                           <h3>YOUR LOCATION SHOULD NEVER BE A BARRIER</h3>   
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-become-coach-area">
                            <img src="{{url('/')}}/public/images/run.png" alt="image">
                        </div>
                    </div>
                </div>
                <p class="text-center mt-3"><a class="find-coach-bt" href="">Find Your Coach</a> <a class="become-bt" href="">Find A Program</a></p>
            </div>
        </section>

        <section class="train-by-trainer">
            <div class="container">
                <h3>WHY TRAIN BY TRAINERS</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/clock.png" alt="clock">
                            <h4>24 HOUR<br> ACCESS</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/train1.png" alt="clock">
                            <h4>WORKOUT THE WAY
                                YOU WANT</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/train2.png" alt="clock">
                            <h4>UNLIMITED ACCESS TO THE
                                BEST TRAINERS & PROGRAMS</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/train3.png" alt="clock">
                            <h4>PERSONAL TRAINERS
                                IN YOUR POCKET</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/train4.png" alt="clock">
                            <h4>COACHES WHO SPECIALISE
                                IN WHAT YOU WANT</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="access-area">
                            <img src="{{url('/')}}/public/images/train5.png" alt="clock">
                            <h4>COMPARE TRAINERS &<br>
                                COACHES IN THE ONE PLACE</h4>
                        </div>
                    </div>
                </div>
            </div>

        </section>

       <!--start footer area here -->
@endsection