@extends('layouts.guest')
@section('content')
        <!-- whishlist-section start here -->
        <section class="blog-page-banner">
            <div class="whishlist-title">
                <h2>OUR BLOGS</h2>
                <h6>FITNESS RALATED TALKS FROM TRAIN BY TRAINERS</h6>
            </div>
        </section>



        <!-- blog page slider area start -->
        <section class="blog-slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Swiper -->
                        <div class="swiper mySwiper blog-box">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide blog-slide-image">
                                    <img src="{{url('/')}}/public/images/blog-girl.png">
                                    <div class="blog-slider-content">
                                        <p>May 17, 2021   |   Challenges   |   by Train By Trainers</p>
                                        <h2>4 Week Fitness Challenge with Annabella
                                            Gutman</h2>
                                            <p>Are you ready to get fit? It's time for a 4 week fitness challenge! Get ready to have fun, while your...</p>
                                            <a href="">Read More.</a>
                                    </div>
                                </div>
                                <div class="swiper-slide blog-slide-image"><img src="public/images/coach3.png">
                                    <div class="blog-slider-content">
                                        <p>May 17, 2021   |   Challenges   |   by Train By Trainers</p>
                                        <h2>4 Week Fitness Challenge with Annabella
                                            Gutman</h2>
                                            <p>Are you ready to get fit? It's time for a 4 week fitness challenge! Get ready to have fun, while your...</p>
                                            <a href="">Read More.</a>
                                    </div></div>
                            </div>
                            <div class="swiper-button-next blog-bt-slide"></div>
                            <div class="swiper-button-prev blog-bt-slide"></div>
                        </div>
                        <!-- Swiper end-->
                    </div>
                    <div class="col-md-4">
                            <div class="blog-category-search">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SEARCH</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search posts here">
                                    <button type="submit" class="btn btn-primary">SEARCH</button>
                                  </div>
                            </div>
                            <div class="blog-category-search mt-4 pb-0  ">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CATEGORIES</label>
                                   <ul>
                                       <li> <a href="">Coaches & Trainers</a></li>
                                       <li><a href="">Weight Loss</a></li>
                                       <li><a href="">Supplements</a></li>
                                       <li><a href="">Programs</a></li>
                                       <li><a href="">Muscle Gain</a></li>
                                       <li><a href="">Food & Drink</a></li>
                                       <li><a href="">Focus</a></li>
                                       <li><a href="">Challenges</a></li>
                                   </ul>
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog page slider area end -->

        <!-- blog list area start -->
        <section class="blog-list-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-1.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>Why turmeric?</h4>
                                <h6>By- Claire Evans   |   May 10, 2021</h6>
                                <p>Caffe latte, soy latte and almond and coconut milk
                                    lattes… The offering seems to be endless</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-2.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>What Can I Add To My Water To Make It
                                    Taste Better?
                                    </h4>
                                <h6>By- Claire Evans   |   Food & Drink   |   May 10, 2021</h6>
                                <p>It may feel like liquid gold after a workout, but let’s
                                    be honest, water all day every day can just...</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-3.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>How to make time to exercise</h4>
                                <h6>By- Claire Evans   |   Foucs   |   May 10, 2021</h6>
                                <p>If feeling like not having enough time is the main
                                    reason stopping you from exercising,</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-1.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>Why turmeric?</h4>
                                <h6>By- Claire Evans   |   May 10, 2021</h6>
                                <p>Caffe latte, soy latte and almond and coconut milk
                                    lattes… The offering seems to be endless</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-2.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>What Can I Add To My Water To Make It
                                    Taste Better?
                                    </h4>
                                <h6>By- Claire Evans   |   Food & Drink   |   May 10, 2021</h6>
                                <p>It may feel like liquid gold after a workout, but let’s
                                    be honest, water all day every day can just...</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                <img src="public/images/blog-3.png" alt="img">
                            </div>
                            <div class="blog-img-content">
                                <h4>How to make time to exercise</h4>
                                <h6>By- Claire Evans   |   Foucs   |   May 10, 2021</h6>
                                <p>If feeling like not having enough time is the main
                                    reason stopping you from exercising,</p>
                                    <p class="text-center"><a href="blog-details.html">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog list area end -->
 @endsection
