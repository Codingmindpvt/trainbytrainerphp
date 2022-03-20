@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">


        <div class="user-name-tag text-center m-5">
            <h1>Hi, {{ucwords(@$user->first_name." ".@$user->last_name)}} {!! certifiedUser() !!}</h1>
            {{-- <p>View and edit personal details here</p> --}}
        </div>
        <div class="row">

            <div class="col-md-4">

                @if(Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif

            </div>
            <div class="col-md-8">

                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>My Reviews </h3>
                    </div>

                    <!-- ////////////////// -->
                    <div class="info-profile-head">
                        <h6>Program Reviews List</h6>
                    </div>


                    @forelse($programReviewlist as $coachReview)
                    <div class="my-review-main js-dynamic-height" data-maxheight="100">
                        <div class="image-product-tb review-page-box">
                            @if(!empty(@$coachReview['program']['profile_image']))
                            <img src="{{asset('public/'.@$coachReview['coach']['profile_image'])}}" alt="">
                            @else
                            <img src="{{asset('public/images/default-image.png')}}" alt="">
                            @endif
                            <div>
                                <h3>{{@$coachReview['program']['first_name']}}</h3>
                                <p>{{@$coachReview['program']['address']}}</p>
                                <p class="review-rate">
                                <div class="rating">
                                    <div class="rateyo"
                                        data-rateyo-rating="{{!empty(@$coachReview['star']) ? @$coachReview['star'] : 0}}"
                                        data-rateyo-num-stars="5"></div>
                                </div>
                                </p>
                                <h6 class="mb-2">{{@$coachReview['title']}}</h6>
                                <p>hello</p>
                                <?php
                                $class_string = $coachReview['description'] ;

                                     // if(strlen($string) >= 50)
                                // {
                                    if (strlen($class_string) >= 1 && strlen($class_string) <= 210) {
                                        echo substr($class_string, 0, 210);
                                    }
                                    if (strlen($class_string) >= 210) {
                                        echo substr($class_string, 0, 210).'<span class="read_more_program">Read More</span>' . '<p class="show_read_more_program" style="display:none;">' . substr($class_string, 50) . '</p>'. "<span class='show_less_program' style='display:none;'>Show Less</span>";
                                    }
                                    ?>
                                  
                                </p>

                            </div>
                        </div>
                      
                    </div>

                    @empty
                    <p class="blank-para"> Buy the exciting program from Coaches and review it now !!</p>
                    @endforelse
                   
       {{$programReviewlist->links()}}
                    <!-- //////////////////////////// -->
                    <hr>
                    <div class="info-profile-head">
                        <h6>Class Reviews List</h6>
                    </div>


                    @forelse($classReviewlist as $coachReview)              

                    <div class="my-review-main">
                        <div class="image-product-tb review-page-box">
                        @if(!empty(@$coachReview['coach']['profile_image']))
                            <img src="{{asset('public/'.@$coachReview['coach']['profile_image'])}}" alt="">
                            @else
                            <img src="{{asset('public/images/default-image.png')}}" alt="">
                            @endif
                            <div>
                            <h3>{{@$coachReview['class']['first_name']}}First NAME</h3>
                                <p>{{@$coachReview['class']['address']}}</p>
                                <p class="review-rate">
                                <div class="rateyo"
                                        data-rateyo-rating="{{!empty(@$coachReview['star']) ? @$coachReview['star'] : 0}}"
                                        data-rateyo-num-stars="5"></div>
                                
                                </p>
                               <h6 class="mb-2">{{@$coachReview['title']}}</h6>
                               <p></p>
                               <?php
                                $class_string = $coachReview['description'] ;

                                if (strlen($class_string) >= 1 && strlen($class_string) <= 210) {
                                    echo substr($class_string, 0, 210);
                                }
                                if (strlen($class_string) >= 210) {
                                    echo substr($class_string, 0, 210).'<span class="read_more_class">Read More</span>'.'<p  class="show_read_more_class" style=" display:none;">'.substr($class_string, 210).'</p>'. "<span class='show_less_class' style='display:none;'>Show Less</span>";
                                }
                                ?>
                               
                               
                            </div>
                        </div>
                       
                    </div>

                    @empty
                       <p class="blank-para">Book the exciting classes from Coaches and review it now !!</p>
                    @endforelse
                    {{$classReviewlist->links()}}
                    <!-- start pagination -->
                    <!-- <nav aria-label="Page navigation example">
                            <ul class="pagination pb-5">
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
            </div>
        </div>
    </div>
</section>


<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>    -->


<script src="{{url('public/js/show-hide-text.js')}}"></script>
<script>
var th = new showHideText('.my-message', {
    charQty: 100,
    ellipseText: "...",
});
</script>
<script>
$(function() {
    $('.read_more_class').on('click', function() {
        $(this).hide();
        $(this).parent().find('.show_less_class').show();
        $(this).parent().find('.show_read_more_class').toggle();
    });
    $('.show_less_class').on('click', function() {
        $(this).parent().find('.read_more_class').show();
        $(this).hide();
        $(this).parent().find('.show_read_more_class').hide();
    });

    $('.read_more_program').on('click', function() {
        $(this).hide();
        $(this).parent().find('.show_less_program').show();
        $(this).parent().find('.show_read_more_program').toggle();
    });
    $('.show_less_program').on('click', function() {
        $(this).parent().find('.read_more_program').show();
        $(this).hide();
        $(this).parent().find('.show_read_more_program').hide();
    });

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
@endsection
