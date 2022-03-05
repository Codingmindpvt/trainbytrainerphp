@extends('layouts.guest')
@section('content')
 <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
     <style type="text/css">
        html
        {
            scroll-padding-top:143px;
            scroll-behavior: smooth;
        }
    </style>
      <div class="coaches-name">
          <div class="container">

              <h6><span><a href="{{ route('coaches')}}" class="active-program">Coaches</span></a>   > {{@$userProfile->getFullName()}}</h6>
          </div>
      </div>
    <section class="coach-profile-banner">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse($userProfile->getAllCoachImages(@$userProfile['coach_detail']['id']) as $images)
                    <div class="swiper-slide"><img src="{{asset('public/'.$images['image_file'])}}"></div>
                    @empty
                    <div class="swiper-slide"><img src="{{asset('public/images/no.png')}}"></div>
                    @endforelse
                   <!--  <div class="swiper-slide no-more-images"><img src="{{asset('public/images/no.png')}}"></div> -->
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- Swiper end-->
    </section>

    <section class="coach-result">
        <div class="container">
            <ul class="coach-result-tab">
                <li>
                    <a href="#overview-area" class="active">Overview</a>
                </li>
                <li>
                    <a href="#coach-result-area" >Results</a>
                </li>
                <li>
                    <a href="#coach-program-area" >Programs</a>
                </li>
                <li>
                    <a href="#coach-review-area" >Reviews</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- overview-area start -->
    <section id="overview-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="coach-information">
                        <h2 class="adam-name"> {{@$userProfile->getFullName()}}
                            <!-- <span><img src="{{asset('public/images/verified2.png')}}" alt="image" class="img-fluid">Certified</span> -->
                            </h2>
                         <div class="insta-save save-btn">
                                <input type="hidden" id="coach_id" value="{{@$userProfile['coach_detail']['user_id'] }}">
                                <input type="hidden" id="user_id" value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeCoach() }}">
                                  @if(Auth::check() && Auth::user()->id)
                                <div class="span_button">
                                    @if(@$userProfile->getWishList(@$userProfile['coach_detail']['user_id']))
                                        <button class="view-save-bt-red remove_from_wishlist" >
                                            <i class="fa fa-heart" aria-hidden="true"></i> SAVED
                                        </button>
                                        @else
                                            <button id="wishList" class="view-save-bt add_to_wishlist">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE
                                            </button>
                                        @endif

                                </div>
                                @else

                                @if(!empty(Auth::id()))
                                <button class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</button>

                            @else
                                <a href="{{route('login')}}"> <button class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</button></a>

                            @endif


                                @endif
                            <!-- <a href="" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</a> -->


                            <?php
                                $facebook_url = $userProfile['coach_detail']['facebook_url'];
                                $twitter_url = $userProfile['coach_detail']['twitter_url'] ;
                                $pinterest_url = $userProfile['coach_detail']['pinterest_url'];
                                $youtube_url = $userProfile['coach_detail']['youtube_url'];
                                $instagram_url = $userProfile['coach_detail']['instagram_url'];

                                if (!empty($userProfile['coach_detail']['facebook_url'])) {
                                    echo " <a href='$twitter_url' target='_blank'>
                                        <img src='http://198.211.110.165/trainbytrainerphp/public/images/fb.svg' alt='svg'>
                                    </a>";

                                }
                                if(!empty($userProfile['coach_detail']['twitter_url'])) {
                                    echo " <a href='$twitter_url' target='_blank'>
                                     <img src='http://198.211.110.165/trainbytrainerphp/public/images/twitter.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($userProfile['coach_detail']['pinterest_url'])) {
                                    echo " <a href='$pinterest_url' target='_blank'>
                                     <img src='http://198.211.110.165/trainbytrainerphp/public/images/pint.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($userProfile['coach_detail']['youtube_url'])) {
                                    echo " <a href='$youtube_url' target='_blank'>
                                     <img src='http://198.211.110.165/trainbytrainerphp/public/images/youtube.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($userProfile['coach_detail']['instagram_url'])) {
                                    echo " <a href='$instagram_url' target='_blank'>
                                     <img src='http://198.211.110.165/trainbytrainerphp/public/images/insta.svg' alt='svg'>
                                 </a>";
                                 }
                                else {
                                echo "";
                                }

                                ?>

                            <!--
                                <a href="#">
                                    <img src="{{ asset('public/images/fb.svg') }}" alt="svg">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('public/images/twitter.svg') }}" alt="svg">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('public/images/pint.svg') }}" alt="svg">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('public/images/youtube.svg') }}" alt="svg">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('public/images/insta.svg') }}"  alt="svg">
                                </a>
    -->

                            {{--  <a href="{{ !empty(@$userProfile['coach_detail']['instagram_url']) ? @$userProfile['coach_detail']['instagram_url'] : '#' }}" class="view-insta-bt"><i class="fa fa-instagram" aria-hidden="true"></i> INSTAGRAM</a>  --}}
                        </div>
                        <ul>
                            <li><b>{{ !empty(@$userProfile['coach_detail']['price_range']) ? @$userProfile['coach_detail']['price_range'] : "-----" }}</b></li>
                            <li>-</li>
                            <li>{{ !empty(@$userProfile['coach_detail']['title']) ? @$userProfile['coach_detail']['title'] : "-----" }}</li>
                            <li>-</li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>  {{ @$userProfile->state->name}}.{{  @$userProfile->country->name}}</li>
                        </ul>
                    <div class="review-rate mb-2">
                    <?php $reviewDetail = $userProfile->getReviewAndRatingDetail(@$userProfile['coach_detail']['user_id']); ?>

                                        <div class="rateyo" data-rateyo-rating="{{ !empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] : 0 }}" data-rateyo-num-stars="5">" data-rateyo-num-stars="5"></div>



                                    ({{count(@$reviewList)}}  Reviews)</div>

                    <span>
                        {{ strtoupper(@$programs['program_user']['first_name'] . ' ' . @$programs['program_user']['last_name']) }}</span>

                </p>
                    <ul class="gain-category">
                                <?php $categories = (explode(",",@$userProfile['coach_detail']['categories']));
                                  foreach($categories as $category){
                                    ?>
                                    <li>{{@$userProfile->getCategoryName($category)}}</li>
                                   <?php
                                  }
                                ?>
                    </ul>
                    <p class="mt-2 mb-4">{{ !empty(@$userProfile['coach_detail']['bio']) ? @$userProfile['coach_detail']['bio'] : "-----" }}</p>

                    </div>
                    <a class="open-chat" href="{{route('chat',$userProfile['coach_detail']['user_id'] )}}">OPEN CHAT</a>
                    {{-- <a href="{{ route('program-detail',$program->id) }}"> --}}
                    <a class="program-chat" href="#coach-program-area">VIEW PROGRAMS <!-- (20) --></a>
                </div>
                <div class="col-md-4">
                    <div class="personality-style">
                        <h4>PERSONALITY & TRAINING STYLE</h4>
                        <ul>
                            <?php $trainingStyles = (explode(",",@$userProfile['coach_detail']['personality_and_training']));
                            ?>
                                  @forelse($trainingStyles as $trainingStyle)

                                    <li>{{@$userProfile->getTrainingStyleName($trainingStyle)}}</li>

                                  @empty
                                  <p class="blank-para">No Data Found!</p>
                                  @endforelse

                        </ul>
                        <hr>

                        <h4 class="mt-4">LANGUAGES</h4>
                        <ul>
                            <?php $languages = (explode(",",@$userProfile['coach_detail']['languages'])); ?>
                                @forelse($languages as $language)
                                    <li>{{$language}}</li>
                                @empty
                                <p class="blank-para">No Data Found!</p>
                                @endforelse

                        </ul>
                        <hr>

                        <h4 class="mt-4">EDUCATION</h4>
                        <div class="main-education" >
                            @if(!empty(@$userProfile['coach_detail']['id']))
                        @foreach($userProfile->getAllEducation(@$userProfile['coach_detail']['id']) as $education)
                        <div class="education-box">
                        <h5>{{strtoupper($education['title'])}}</h5>
                        <h6>{{$education['completion_year']}}</h6>
                        <h6>{{ucwords($education['institute'])}}</h6>
                         </div>

                         @endforeach
                        </div>
                         @else
                         <p class="no-record-placeholder">This Coach doesn't currently have any education listed. If you want to know more about their qualifications, please reach out to them through the Open Chat button.</p>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- overview-area end -->

        <!-- result area start -->
        <section id="coach-result-area">
            <div class="container">
                <h2 class="adam-name before-line">{{strtoupper(@$userProfile->getFullName())}} RESULTS</h2>
                <div class="two-arrow">
                    <div class="swiper-button-next"> <img class="right-arrow" src="{{asset('public/images/right-arrow.png')}}"></div>
                    <div class="swiper-button-prev"><img class="left-arrow" src="{{asset('public/images/left-arrow.png')}}"></div>
                </div>
                <p class="mt-2 mb-4" style="font-family: 'Oswald';">View the results of people who have been trained by this coach.</p>

                <div class="swiper mySwiper ad-result">
                    <div class="swiper-wrapper">
                    @forelse($userProfile->getAllCoachResults(@$userProfile['coach_detail']['id']) as $result)

                    <div class="swiper-slide">
                        <div class="result-slider">
                            <div class="slide-image">
                                <img src="{{asset('public/'.$result['image_file'])}}" alt="gym">
                            </div>
                            <div class="slider-content text-center">
                                <h3>{{$result['title']}}</h3>
                                <p class="review-rate"><?php
                                            $review = (object)['rate' => $result['star']];
                                                    for ($i = 0; $i < 5; ++$i) {
                                                        echo '<i class="fa fa-star' , ($review->rate <= $i ? '-o' : '') , '" aria-hidden="true"></i>';
                                                    } ?></p>
                                <p>{{substr($result['description'],0,60)}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="blank-para">No Data Found!</p>
                    @endforelse

                    </div>
                </div>
            </div>
        </section>
        <!-- result area end -->

        <!-- programs area start -->
       <section id="coach-program-area">
            <div class="container">
                <h2 class="adam-name before-line">{{strtoupper(@$userProfile->getFullName())}} PROGRAMS</h2>
                <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download them straight away and follow them in your own time.</p>
                <div class="row">

                    @php

                    $allCoachPrograms = $userProfile->getAllCoachPrograms($userProfile['id']);

                    @endphp
                    @forelse($allCoachPrograms['details'] as $program)

                    <div class="col-md-4">
                        <div class="program-one">
                             <div class="button-section">
                                <input type="hidden" id="program_id" value="{{ @$program['id'] }}">
                                <input type="hidden" id="coach_id" value="{{ @$program['user_id'] }}">
                                <input type="hidden" id="user_id" value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeProgram() }}">
                                @if (Auth::check() && Auth::user()->id)
                                @if (@$userProfile->getProgramWishList(@$program['id']))
                                        <span>
                                            <span class="view-save-bt-red remove_from_wishlist_program">
                                                <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                                        </span>
                                    @else
                                        <span>
                                            <span class="view-save-bt add_to_wishlist_program">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                        </span>
                                    @endif

                                @else
                                    <span class="view-save-bt">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                @endif
                            </div>
                            {{-- <a  class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</a> --}}
                            <a href="{{ route('program-detail',$program->id) }}">
                            <div class="barbell-image">
                                @if(!empty($program['image_file']))
                                <img src="{{asset('public/'.$program['image_file'])}}" alt="gym">
                                @else
                                <img src="{{asset('public/images/default-image-file-o.png')}}" alt="gym">
                                @endif
                            </div>
                            <div class="barberll-content">
                                <div class="doller-review">
                                    <h4>{{DEFAULT_CURRENCY.$program['price']}}</h4>

                                    <?php $reviewDetail = $program->getReviewAndRatingDetail($program['id']);?>
                                    <p class="review-rate">

                                    @switch(@$reviewDetail['avg_rating'])
                                @case(1)
                                <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                                @break

                                @case(2)
                                 <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                                @break

                                @case(3)
                                <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>
                                @break

                                @case(4)
                                 <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                                @break

                                @case(5)
                                <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                                @break

                                @default
                                <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>                                @endswitch



                                        ({{ count(@$reviewDetail['review_list']) }} Reviews)</p></p>
                                </div>
                                <h3>{{ strtoupper($program['program_name'])}}</h3>
                                <p>{{$program['short_description']}}</p>


                            </div>
                        </a>
                        </div>

                    </div>
                    @empty
                    <p class="blank-para">No Data Found!</p>
                    @endforelse
                      <div class="d-flex justify-content-center">

                        {{--  {{ $otherPogram->links()}}  --}}

                    </div>
                </div>

                {{--  @if($allCoachPrograms['detailCount'] > 3)
                <p class="text-center m-5"><a href="{{route('programs')}}" class="program-chat">VIEW ALL PROGRAMS</a></p>
                @endif  --}}
            </div>
        </section>

        <!-- end program area -->

        <!-- start review area -->
       <!-- <section id="coach-review-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="adam-name before-line">{{strtoupper(@$userProfile->getFullName())}} REVIEW</h2>
                        <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download them straight away and follow them in your own time.</p>
                        <p class="review-rate">
                        <div class="rating">

                        <div class="rateyo" data-rateyo-rating="5" data-rateyo-num-stars="5"></div>
                    </div>({{count(@$reviewList)}} Reviews)</p>
                    </div>

                </div>
                <hr class="my-5">
                 @forelse(@$reviewList as $reviewData)
                 <div class="review-view">
                    <div class="rating">
                        <div class="rateyo" data-rateyo-rating="{{ $reviewData['star'] }}" data-rateyo-num-stars="5"></div>
                    </div>
                    <h5>{{strtoupper($reviewData->title)}}</h5>
                    <span class="traiend-date">Date Trained: {!! date('M Y', strtotime($reviewData->trained_date)) !!} </span>
                    <p>{{$reviewData->description}}</p>
                    <div class="review-man-image">
                        @if(!empty(@$reviewData['users']['profile_image']))
                        <img src="{{asset('public/'.$reviewData['users']['profile_image'])}}" alt="man" class="round-image-user-rating mr-3">
                        @else
                        <img src="{{asset('public\images\default-image.png')}}" alt="man" class="round-image-user-rating mr-3">
                        @endif
                        <div class="content-man">
                            <h6>{{strtoupper(@$reviewData['users']['first_name']." ".@$reviewData['users']['last_name'])}}</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{@$reviewData['users']['address']}}

                        </p>

                        </div>
                    </div>
                </div>
                @empty
                <p class="blank-para">No Data Found!</p>
                 @endforelse


                <!-- start pagination -->
                <!-- <nav aria-label="Page navigation example">
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
                </nav> -->
                <!-- end pagination -->

            </div>
        </section>
        <!-- The Modal review sign in end -->



        <!-- The Modal give review -->


    <!-- The Modal give review end -->
    <!-- The Modal give review submit -->
    <div class="modal" id="submit">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">REVIEW SUBMITTED</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body write-review-modal">
            <img src="images/check.svg" alt="icon">
            <p>Your review submitted successfully.</p>
            </div>

        </div>
        </div>
    </div>
    <!-- The Modal give review submit end -->

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var selector = '.coach-result-tab li a';

            $(selector).on('click', function(){
                $(selector).removeClass('active');
                $(this).addClass('active');
            });
        </script>
   <!--  <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween:0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    </script> -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 0,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },

             breakpoints: {
                0: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        575: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
         767: {
          slidesPerView: 4,
          spaceBetween: 0,
        },
        991: {
          slidesPerView: 4,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 0,
        },
      }
        });
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
       $(document).on('click', '.add_to_wishlist', function() {
    var thisData = $(this);
    var coach_id = $(this).parent().parent().find("#coach_id").val();
    var user_id = $(this).parent().parent().find("#user_id").val();
    var type = $(this).parent().parent().find("#type").val();
    $.ajax({
        url: "{{ route('add-to-wishlist') }}",
        data: {
            user_id: user_id,
            coach_id: coach_id,
            type: type
        },
        type: 'GET',
        success: function(data) {
            SwalOverlayColor();
            swal({
                title: data.status,
                text: data.message,
            })
            thisData.parent().html(
                '<span class="view-save-bt-red remove_from_wishlist"><i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>'
            );

            // $(thisData).closest(".button-section").find("#wishList").remove();
            // location.reload();
        }
    });
 });
// Remove coach from wishlist   6/01/2022   by tarun saini
$(document).on('click', '.remove_from_wishlist', function() {
    var thisData = $(this);
    var coach_id = $(this).parent().parent().find("#coach_id").val();
    var user_id = $(this).parent().parent().find("#user_id").val();
    var type = $(this).parent().parent().find("#type").val();

    $.ajax({
        url: "{{ route('remove-to-wishlist') }}",
        data: {
            user_id: user_id,
            coach_id: coach_id,
            type: type
        },
        type: 'GET',
        success: function(data) {
            SwalOverlayColor();
            swal({
                title: data.status,
                text: data.message,
            })
            thisData.parent().html(
                '<span class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>'
            );

        }
    });
});

});

</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

    $(document).on('click', '.add_to_wishlist_program', function() {

        var thisData = $(this);
        var program_id = $(this).closest(".button-section").find("#program_id").val();
        var coach_id = $(this).closest(".button-section").find("#coach_id").val();
        var user_id = $(this).closest(".button-section").find("#user_id").val();
        var type = $(this).closest(".button-section").find("#type").val();
        $.ajax({
            url: "{{ route('add-to-wishlist') }}",
            data: {
                user_id: user_id,
                program_id: program_id,
                coach_id: coach_id,
                type: type
            },
            type: 'GET',
            success: function(data) {

                SwalOverlayColor();
                swal({
                    title: data.status,
                    text: data.message,
                })


                thisData.parent().html(
                    '<span class="view-save-bt-red remove_from_wishlist_program"><i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>'
                );
            }
        });
    });
    // Remove coach from wishlist   6/01/2022   by tarun saini
    $(document).on('click', '.remove_from_wishlist_program', function() {

        var thisData = $(this);
        var program_id = $(this).closest(".button-section").find("#program_id").val();
        var coach_id = $(this).closest(".button-section").find("#coach_id").val();
        var user_id = $(this).closest(".button-section").find("#user_id").val();
        var type = $(this).closest(".button-section").find("#type").val();

        $.ajax({
            url: "{{ route('remove-to-wishlist') }}",
            data: {

                user_id: user_id,
                program_id: program_id,
                coach_id: coach_id,
                type: type
            },
            type: 'GET',
            success: function(data) {
                SwalOverlayColor();
                swal({
                    title: data.status,
                    text: data.message,
                })
                thisData.parent().html(
                    '<span class="view-save-bt add_to_wishlist_program"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>'
                );

            }
        });

    });
});
    </script>
    <script>


$(function () {
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
            onSet: function (rating, rateYoInstance) {
                $('#inpt_rating').val(rating);
            }
        });
    });
    </script>
@endsection
