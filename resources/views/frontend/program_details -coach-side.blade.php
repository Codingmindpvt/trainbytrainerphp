@extends('layouts.guest')
@section('content')
      <div class="coaches-name">
          <div class="container">
              <h6><span>Programs</span>  >  5 Barbell Workouts</h6>
          </div>
      </div>
    <section class="coach-profile-banner">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="images/barbell.png"></div>
                    <div class="swiper-slide"><img src="images/info.png"></div>
                    <div class="swiper-slide no-more-images"><img src="images/no.png"></div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- Swiper end-->
    </section>

    <section class="coach-result">
        <div class="container">
            <ul>
                <li>Overview</li>
                <li>Results</li>
                <li>Programs(20)</li>
                <li>Reviews</li>
            </ul>
        </div>
    </section>

    <!-- overview-area start -->
    <section id="overview-area">
        <div class="container"> 
            <div class="row">
				<aside class="col-lg-4"> 
                    <div class="profile-status-chat">
                        <div class="profile-status-box">
                            <h6>PROGRAM DISABLE/ENALBE</h6>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>  
                </aside>
            </div>                     
            <div class="coach-information mt-3">
                <h2 class="adam-name mb-3">5 Barbell Workouts</h2>
                <div class="insta-save">
                    <a href="" class="class-detail-edit-bt"   data-toggle="modal" data-target="#submit-edit" > <i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a>
                    <a href="" class="class-detail-delete-bt"   data-toggle="modal" data-target="#submit-delete" >DELETE <i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                <p class="review-rate mb-3"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> (1.2k Reviews) <span>Steven Topalovic</span></p>
                <ul class="gain-category">
                    <li> Weight Loss</li>
                    <li> Muscle Gain</li>
                    <li> Body Building</li>
                    <li> Strength & Conditioning</li>
                    <li> Body Building</li>
                    <li> Strength & Conditioning</li>
                    
                </ul>
                <p class="mt-2 mb-4">Need to strengthen your core? There are so many workouts you can do that focus on these muscles. These are functional fitness workouts that focus on core
                    strength exercises mixed with higher heart rate movements to give you a full-body workout and strengthen your overall body. The workouts are all slightly
                    different with varied ways of getting through them. Enjoy the challenge!</p>
            </div>

            <div class="faq-area">
                <ul class="faq-list">
                    <li>
                        <h4 class="faq-heading"> HOW I'VE PROGRAMMED THESE WORKOUTS </h4>
                        <p class="read faq-text">
                            These are all functional workouts that focus on your core muscles. They also include other exercises to give you a complete workout at the same time.
                        </p>
                    </li>
                    <li>
                        <h4 class="faq-heading"> WORKOUT EXAMPLE </h4>
                        <p class="read faq-text">
                            These are all functional workouts that focus on your core muscles. They also include other exercises to give you a complete workout at the same time.
                        </p>
                    </li>
                    <li>
                        <h4 class="faq-heading">LOOKS CAN BE DECEIVING </h4>
                        <p class="read faq-text">
                            These are all functional workouts that focus on your core muscles. They also include other exercises to give you a complete workout at the same time.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="product-downloadable-area p-3">
                <h4>Downloadable Products</h4>
                <div class="cart-download-update">
                    <div class="image-product-tb  mb-3">
                        <img src="images/pdf.png" alt="">
                        <div>
                            <p>Product Title Here</p>
                           <a href="">Download</a>
                        </div>
                    </div>
                    <div class="image-product-tb mb-4 ml-4">
                        <img src="images/doc.png" alt="">
                        <div>
                            <p>Product Title Here</p>
                           <a href="">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- overview-area end -->

    <!-- result area start -->
    <section id="coach-result-area">
        <div class="container">
            <h2 class="adam-name before-line">ADAM RESULTS</h2>
            <div class="two-arrow">
                <div class="swiper-button-next"> <img class="right-arrow" src="images/right-arrow.png"></div>
                <div class="swiper-button-prev"><img class="left-arrow" src="images/left-arrow.png"></div>
            </div>
            <p class="mt-2 mb-4" style="font-family: 'Oswald';">View the results of people who have been trained by this coach.</p>
            
            <div class="swiper mySwiper ad-result">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="result-slider">
                        <div class="slide-image">
                            <img src="images/diff1.png" alt="gym">
                        </div>
                        <div class="slider-content text-center">
                            <h3>8 week transformation.</h3>
                            <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                            <p>training 5 days a week and following a
                                weekly updated meal plan.</p>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                      <div class="result-slider">
                        <div class="slide-image">
                            <img src="images/diff1.png" alt="gym">
                        </div>
                        <div class="slider-content text-center">
                            <h3>8 week transformation.</h3>
                            <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                            <p>training 5 days a week and following a
                            weekly updated meal plan.</p>
                        </div>
                      </div>
                  </div>

                  <div class="swiper-slide">
                      <div class="result-slider">
                        <div class="slide-image">
                            <img src="images/diff1.png" alt="gym">
                        </div>
                        <div class="slider-content text-center">
                            <h3>8 week transformation.</h3>
                            <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                            <p>training 5 days a week and following a
                            weekly updated meal plan.</p>
                        </div>
                       </div>
                   </div>

                   <div class="swiper-slide">
                    <div class="result-slider">
                      <div class="slide-image">
                          <img src="images/diff1.png" alt="gym">
                      </div>
                      <div class="slider-content text-center">
                          <h3>8 week transformation.</h3>
                          <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                          <p>training 5 days a week and following a
                          weekly updated meal plan.</p>
                      </div>
                     </div>
                 </div>
                  
                </div>
              </div>
        </div>
    </section>

    <!-- result area end -->

    <!-- customers area start -->
    <section id="coach-result-area">
        <div class="container">
           <h2 class="adam-name before-line">CUSTOMERS</h2>
           <p class="mt-2 mb-4" style="font-family: 'Oswald';">LIST OF CUSTOMERS WHO HAVE PURCHASED THE PROGRAM</p>
           <div class="row">
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
           </div>
           <div class="row my-3">
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
                <aside class="col-md-4">
                    <div class="cutomers-main-box">
                        <img src="images/use.png" alt="use">
                        <div class="customers-main-content">
                            <h5 class="oswald-font">Jackma Roy</h5>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                            <span>Purchased on: Oct 10, 2021</span>
                        </div>
                    </div>
                </aside>
           </div>
           <nav aria-label="Page navigation example">
                <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">&lt;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- customers area end -->
    
    <!-- start review area -->
    <section id="coach-review-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="adam-name before-line">ADAM PROGRAMS</h2>
                    <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download them straight away and follow them in your own time.</p>
                    <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> (1.2k Reviews)</p>
                </div>
                <div class="col-md-4">
                    <div class="write-review text-center">
                        <h6 class="mb-4">Have you been coached by Adam?</h6>
                        <button type="button" class="open-chat" data-toggle="modal" data-target="#review">WRITE A REVIEW</button>
                    </div>
                </div>
            </div>
            <hr class="my-5">
            <div class="review-view">
                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained: Jul 2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
                    to work with him if you're looking to increase your health and fitness levels.</p>
                <div class="review-man-image">
                    <img src="images\man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                    </div>
                </div>
            </div>
            <div class="review-view">
                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained: Jul 2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
                    to work with him if you're looking to increase your health and fitness levels.</p>
                <div class="review-man-image">
                    <img src="images\man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                    </div>
                </div>
            </div>
            <div class="review-view">
                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained: Jul 2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
                    to work with him if you're looking to increase your health and fitness levels.</p>
                <div class="review-man-image">
                    <img src="images\man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                    </div>
                </div>
            </div>
            <div class="review-view">
                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained: Jul 2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
                    to work with him if you're looking to increase your health and fitness levels.</p>
                <div class="review-man-image">
                    <img src="images\man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                    </div>
                </div>
            </div>
            <div class="review-view">
                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained: Jul 2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's reliable, friendly and caring. I would encourage you
                    to work with him if you're looking to increase your health and fitness levels.</p>
                <div class="review-man-image">
                    <img src="images\man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                    </div>
                </div>
            </div>
           
            <!-- start pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">&#60</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">&#62</a></li>
                </ul>
            </nav>
            <!-- end pagination -->
            
        </div>
    </section>
@endsection