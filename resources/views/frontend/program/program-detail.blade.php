@extends('layouts.guest')
@section('content')
    <style type="text/css">
        html {
            scroll-padding-top: 153px;
            scroll-behavior: smooth;
        }

    </style>
    <div class="coaches-name">
        <div class="container">
            <h6><span><a href="{{ route('programs') }}" class="active-program">Programs ></a></span>
                {{ @$programs['program_name'] }}</h6>

        </div>
    </div>
    <section class="coach-profile-banner">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <div class="slide-image">
                    @if (!empty(@$programs->image_file))
                        <img src="{{ asset('public/' . @$programs->image_file) }}"
                            class="img-circle profile_image_small" />
                    @else
                        <img src="{{ asset('public/images/default-image-file-o.png') }}"
                            class="img-circle profile_image_small" />
                    @endif
                    {{-- <div class="swiper-slide"><img src="public/images/info.png"></div>
                    <div class="swiper-slide no-more-images"><img src="public/images/no.png"></div> --}}
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
                    <a href="#coach-result-area">Results</a>
                </li>
                <li>
                    <a href="#coach-program-area">Programs</a>
                </li>
                <li>
                    <a href="#coach-review-area">Reviews</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- overview-area start -->
    <section id="overview-area">
        <div class="container">
            <div class="coach-information">
                <h2 class="adam-name mb-3"> {{ ucfirst(@$programs->program_name) }}</h2>
                <div class="insta-save">
                    <div class="button-section">
                        <input type="hidden" id="program_id" value="{{ @$programs['id'] }}">
                        <input type="hidden" id="coach_id" value="{{ @$programs['user_id'] }}">
                        <input type="hidden" id="user_id"
                            value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                        <input type="hidden" id="type" value="{{ $wishList->isTypeProgram() }}">
                        @if (Auth::check() && Auth::user()->id)
                            @if (@$coach->getProgramWishList(@$programs['id']))
                                <span>
                                    <span class="view-save-bt-red remove_from_wishlist">
                                        <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                                </span>
                            @else
                                <span>
                                    <span class="view-save-bt add_to_wishlist">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                </span>
                            @endif

                        @else
                            <span class="view-save-bt">
                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                        @endif
                    </div>

                    <!-- <a href="" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</a> -->
                    <div class="buy_now_section">
                        <input type=hidden id="user_id" value="{{ Auth::id() }}">
                        <input type=hidden id="program_id" value="{{ @$programs['id'] }}">
                        <input type=hidden id="price" value="{{ @$programs['price'] }}">
                        @if(!empty(@$cartItem['user_id']) && !empty(@$cartItem['program_id']))
                        <a href="{{ route('cart') }}" class="open-chat ml-3">GO TO CART</a>
                        @else
                        <span class="open-chat ml-3 buy_now"> BUY NOW {{ DEFAULT_CURRENCY.@$programs['price'] }}</span>
                        @endif

                </div>
            </div>
                <p class="review-rate mb-3">

                <div class="rating">
                <?php $reviewDetail = $programs->getReviewAndRatingDetail(@$programs['id']); ?>
                @if(!empty($reviewDetail['avg_rating']))
                                        <div class="rateyo" data-rateyo-rating="{{@$reviewDetail['avg_rating'] }}" data-rateyo-num-stars="5"></div>

                            @else
                            <div class="rateyo" data-rateyo-rating="0" data-rateyo-num-stars="5"></div>

                            @endif
                                      
                                    </div>({{count(@$reviewList)}} Reviews)</p>

                    <span>
                        {{ strtoupper(@$programs['program_user']['first_name'] . ' ' . @$programs['program_user']['last_name']) }}!</span>
                </p>
                <ul class="gain-category">
                    <?php $categories = (explode(",",@$programs['categories']));
                    foreach($categories as $category){
                      ?>
                    <li>{{ @$coach->getCategoryName($category) }}</li>
                    <?php
                    }
                    ?>

                </ul>
                <p class="mt-2 mb-4"> {{ ucfirst(@$programs['description']) }}</p>

            @if (count(@$programs['program_inside']) > 0)
                <div class="faq-area">
                    <ul class="faq-list">
                        @foreach ($programs['program_inside'] as $item)
                            <li>
                                <h4 class="faq-heading">{{ ucfirst(@$item['title']) }} </h4>
                                <p class="read faq-text">
                                    {{ ucfirst(@$item['description']) }}
                                </p>
                            </li>
                        @endforeach

                    </ul>
                </div>
            @endif
        </div>
    </section>

    <!-- overview-area end -->

    <!-- result area start -->
    <section id="coach-result-area">
        <div class="container">
            <h2 class="adam-name before-line">
                {{ strtoupper(@$programs['program_user']['first_name'] . ' ' . @$programs['program_user']['last_name']) }}
                RESULTS</h2>
            <div class="two-arrow">
                <div class="swiper-button-next"> <img class="right-arrow" src="public/images/right-arrow.png"></div>
                <div class="swiper-button-prev"><img class="left-arrow" src="public/images/left-arrow.png"></div>
            </div>
            <p class="mt-2 mb-4" style="font-family: 'Oswald';">View the results of people who have been trained by
                this coach.</p>

            <div class="swiper mySwiper ad-result">
                <div class="swiper-wrapper">
                    @if (count($programs['program_result']) > 0)
                        @foreach ($programs['program_result'] as $item)
                            <div class="swiper-slide">

                                <div class="result-slider">
                                    <div class="slide-image">

                                        @if (!empty(@$item->image_file ?? ''))
                                            <img src="{{ asset('public/' . @$item->image_file ?? '') }}"
                                                class="img-circle profile_image_small" />
                                        @else
                                            <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                                class="img-circle profile_image_small" />
                                        @endif
                                    </div>
                                    <div class="slider-content text-center">
                                        <h3>{{ ucfirst(@$item['title']) ?? ''}}</h3>

                                        <p class="review-rate"> <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$item['certificate']) ? @$item['certificate'] : 0}}" data-rateyo-num-stars="5"></div>
                                    </div></p>
                                        <p>{{ ucfirst(@$item['description']) ?? '' }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else  <p class="blank-para">No record Found!</p>
                    @endif



                </div>
            </div>


        </div>
        </div>
    </section>

    <!-- result area end -->

    <!-- programs area start -->
    <section id="coach-program-area">
        <div class="container">
            <h2 class="adam-name before-line">
                {{ strtoupper(@$programs['program_user']['first_name'] . ' ' . @$programs['program_user']['last_name']) }}
                PROGRAMS</h2>
            <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download them
                straight away and follow them in your own time.</p>
            <div class="row">
                @if (count($otherPogram) > 0)
                    @foreach ($otherPogram as $item)
                    <div class="col-md-4">
                        <div class="program-one">
                            <div class="button-section">
                                <input type="hidden" id="program_id" value="{{ @$item['id'] }}">
                                <input type="hidden" id="coach_id" value="{{ @$item['user_id'] }}">
                                <input type="hidden" id="user_id" value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeProgram() }}">
                                @if (Auth::check() && Auth::user()->id)
                                    @if (@$coach->getProgramWishList(@$item['id']))
                                        <span>
                                            <span class="view-save-bt-red remove_from_wishlist">
                                                <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                                        </span>
                                    @else
                                        <span>
                                            <span class="view-save-bt add_to_wishlist">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                        </span>
                                    @endif

                                @else
                                    <span class="view-save-bt">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                @endif
                            </div>


                            <a href="{{ route('program-detail',$item->id) }}">
                            <div class="barbell-image">
                                @if (!empty(@$item->image_file))
                                    <img src="{{ asset('public/' . @$item->image_file) }}"
                                        class="img-circle profile_image_small" />
                                @else
                                    <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                        class="img-circle profile_image_small" />
                                @endif
                            </div>
                            <div class="barberll-content">
                                <div class="doller-review">
                                    <h4>{{ DEFAULT_CURRENCY.@$item['price'] }}</h4>
                                     <?php $reviewDetail = $item->getReviewAndRatingDetail($item['id']);?>
                                    <p class="review-rate"><div class="rating">
                                        <div class="rateyo" data-rateyo-rating="4" data-rateyo-num-stars="5"></div>
                                        <!-- {{@$reviewDetail_new['avg_rating'] }} -->
                                    </div> ({{ count(@$reviewDetail['review_list']) }} Reviews)</p>
                                </div>
                                <h3> {{ ucfirst(@$item['program_name']) }}</h3>
                                <p> {{ ucfirst(@$item['description']) }}</p>
                            </div>
                            </a>
                        </div>
                     </div>
                     @endforeach
                    @else
                    <p class="blank-para">No record Found!</p>
                @endif
            </div>
            <div class="d-flex justify-content-center">

                {{ $otherPogram->links()}}

            </div>

        </div>
    </section>

    <!-- end program area -->

    <!-- start review area -->
    <section id="coach-review-area">
        <div class="container">

            <div class="row">

                <div class="col-md-8">
                    <!-- <h2 class="adam-name before-line">  {{ strtoupper(@$programs['program_user']['first_name'] . ' ' . @$programs['program_user']['last_name']) }} REVIEWS</h2> -->
                    <!-- <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download -->
                        <!-- them straight away and follow them in your own time.</p> -->


                       <!-- <?php $reviewDetail = $programs->getReviewAndRatingDetail(@$programs['id']); ?> -->

                    <!-- <p class="review-rate"><div class="rating"> -->

                                        <!-- <div class="rateyo" data-rateyo-rating="{{@$reviewDetail['avg_rating'] }}" data-rateyo-num-stars="5"></div> -->

                                        <!-- <div class="rateyo" data-rateyo-rating="5" data-rateyo-num-stars="5"></div> -->
                                    <!-- </div> -->

                                    <!-- ({{ count(@$reviewDetail['review_list']) }} Reviews)</p> -->

                </div>
                <div class="col-md-4">
                    <div class="write-review text-center">

                        <h6 class="mb-4"></h6>
                        @if(!empty(Auth::id()))
                                <button type="button" class="open-chat" data-toggle="modal" data-target="#review">WRITE A REVIEW</button>

                            @else
                                <a href="{{route('login')}}"><button type="button" class="open-chat">WRITE A REVIEW</button></a>

                            @endif
                    </div>
                </div>
            </div>

            <hr class="my-5">
            <div class="review-view">

               <!-- <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                        aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                        aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                </p>
                <h5>GREAT GUY AND GREAT COACH!</h5>
                <span class="traiend-date">Date Trained:jul2021</span>
                <p>I've known Steven for over 5 years and in that time he's been a great fitness coach and friend. He's
                    reliable, friendly and caring. I would encourage you to work with him if you're looking to increase your
                    health and fitness level</p>
                <div class="review-man-image">
                    <img src="images/man.png" alt="man" class="mr-3">
                    <div class="content-man">
                        <h6>GEOFF MEASEY</h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</p>
                    </div>
                </div>
                -->

                <!--fatch review program start-->

                @forelse($reviewList as $reviewData)

                
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
                <!-- <p class="blank-para">No Data Found!</p> -->
                 @endforelse
                <!--fatch review program End-->

            </div>




        </div>
    </section>


     <!-- The Modal give review -->


     <div class="modal" id="review">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">WRITE A REVIEW</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body write-review-modal">
            <p>You're reviewing:</p>
            <h2>{{ strtoupper(@$programs['program_name']) }}</h2>
            <p class="mt-4">Select Stars</p>
           <!--end star -->
            <!-- <span class="give-star"><i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                -->

            <form id="frm" class="review_validate" >
            @csrf
                <!-- coach id -->
            <!-- <input type="hidden" name="rate_for" value="{{@$programs['id']}}">-->
            <input type="hidden" name="rate_for_program_id" value="{{@$programs['id']}}">
            <input type="hidden" name="rate_for_coach_id" value="{{@$programs['id']}}">
            <!-- stars section start -->
            <div id="rateYo" data-rateyo-rating="{{!empty(@$myReviewDetail['star']) ? @$myReviewDetail['star'] : 0}}" data-rateyo-num-stars="5"></div>
            <input type="hidden" id="inpt_rating" name="star" value="{{@$myReviewDetail['star']}}">
            <!-- star section end -->
                <div class="form-group">
                <label for="formGroupExampleInput">Title</label>
                <input type="text" class="form-control form-input" id="formGroupExampleInput" name="title"   placeholder="Enter Title Line" >
                <!-- value="{{@$myReviewDetail['title']}}" -->
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea class="form-control" required name="description"  id="exampleFormControlTextarea1" rows="4" placeholder="Enter Description"></textarea>
                <!-- {{!empty(@$myReviewDetail['description'])? @$myReviewDetail['description'] : ""}} -->
                </div>

                <!--div class="form-group">
                    <label for="formGroupExampleInput2">Trained Date</label>
                    <input type="date" class="form-control" value="{{@$myReviewDetail['trained_date']}}" name="trained_date" id="formGroupExampleInput2" placeholder="Enter Date" required>
                </div-->


            <input type="submit" class="sign-bt" value ="SUBMIT" name="submit" id='frmSubmit'>

            </form>

            </div>

        </div>
        </div>
    </div>
    <!-- The Modal give review end -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            spaceBetween: 0,
            navigation: {
                coach
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper.ad-result", {
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        $('.faq-heading').click(function() {

            $(this).parent('li').toggleClass('the-active').find('.faq-text').slideToggle();
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


    $().ready(function() {

              $(".review_validate").validate({
              rules: {
                  star: "required",
                  title: "required",
                  description: "required",
                //   trained_date: "required",
              },
              messages: {
                  star: "Please enter your Review",
                  title: "Please enter your title",
                  description: "Please enter your description",
                //   trained_date: "Please enter your date",

              }
          });

    $(".review_validate").validate({
        rules: {
            title: "required",
            description: "required",
            trained_date: "required",
        },
        messages: {
            title: "Please enter your title",
            description: "Please enter your description",
            trained_date: "Please enter your date",

        }
    });

    $("#frm").submit(function(e) {

    e.preventDefault(); // prevent actual form submit
    if(!$(".review_validate").valid()){
        return false;
    }

    $('#btn').attr('disabled',true);
    $('#btn').attr('value',"please wait....");
        //alert('Test');
        $.ajax({
            url:"{{url('review_submit_program')}}",
            data:$('#frm').serialize(),
            type:'post',
            success:function(result){
                //console.log(result);

                $('#message').html(result.msg);
                $('#frm')['0'].reset();//form data reset
                $('#btn').attr('disabled',true);
                $('#btn').attr('value',"Submitted wait....");

                window.location = "{{ route('program-detail',@$programs->id) }}"
            }
        });
    });
});
    </script>

<script>
$(document).ready(function(){

  $(document).on('click', '.buy_now', function() {

    var thisData = $(this);
    var program_id = $(this).parent().find("#program_id").val();
    var user_id = $(this).parent().find("#user_id").val();
    var price = $(this).parent().find("#price").val();
    $.ajax({
      url:"{{ route('add-to-cart') }}",
      data:{user_id:user_id, program_id:program_id, price:price},
      type:'GET',
      success:function(data) {
        SwalOverlayColor();
        swal({
          title: data.status,
          text: data.message,
        })
        thisData.parent().html('<a href="{{ route("cart") }}" class="open-chat ml-3">GO TO CART</a>');
      }
    });
  });
});
</script>

<script>
$(document).on('click', '.add_to_wishlist', function() {
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
                '<span class="view-save-bt-red remove_from_wishlist"><i class="fa fa-heart" aria-hidden="true"></i>SAVED</span>'
            );
        }
    });
});
// Remove coach from wishlist   6/01/2022   by tarun saini
$(document).on('click', '.remove_from_wishlist', function() {

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
                '<span class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>SAVE</span>'
            );

        }
    });

});
</script>

@endsection
