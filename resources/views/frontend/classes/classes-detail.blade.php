@extends('layouts.guest')




@section('content')

<style>
.swiper {
    width: inherit;
    height: inherit;
}

.schedule-view {
    margin-top: 0px !important;
    border-top: 0;
}

.schedule-view .nav-link {
    display: block;
    padding: 1.5rem 2rem;
}

.swiper-button-next {
    position: absolute !important;
    top: 57px !important;
    right: -50px !important;
    background-color: #fff;
    border-radius: 50px;
}

.swiper-button-prev {
    position: absolute !important;
    top: 55px !important;
    left: -24px !important;
    background-color: #fff;
    border-radius: 50px;
}
</style>

<div class="coaches-name">
    <div class="container">
        <h6><span>Classes</span> > {{ ucwords($class_detail->name) }}</h6>
    </div>
</div>


<section class="grow-page mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 grow-box-img">
                @if (isset($class_detail->image) && !empty($class_detail->image))
                <img src="{{ asset('public/class/' . $class_detail->image) }}" alt="gorw">
                @else
                <img src="{{ asset('public/images/default-banner.png') }}" alt="class">
                @endif
                <!-- <img src="images/grow.png" alt="gorw"> -->
            </div>
            <div class="col-lg-6">
                <div class="grow-page-content">
                    <h1>{{ ucwords($class_detail->name) }}</h1>
                    <h3 class="mt-2">
                        {{ isset($class_detail['price']) && !empty($class_detail['price']) ? DEFAULT_CURRENCY . $class_detail->price : '-----' }}
                        <span class="session-title">/session</span>
                        <span class="steve-mark ml-2">
                            {{ isset($class_detail['program_user']['first_name']) && !empty($class_detail['program_user']['first_name']) ? strtoupper(@$class_detail['program_user']['first_name'] . ' ' . @$class_detail['program_user']['last_name']) : '-----' }}</span>
                    </h3>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $class_detail->address }}</p>

                    <ul class="gain-category">
                        @if (isset($class_detail->category->title) && !empty($class_detail->category->title))
                        <li> {{ ucwords($class_detail->category->title) }}</li>
                        @else

                        @endif
                    </ul>
                    <p>
                        {{ isset($class_detail->description) && !empty($class_detail->description) ? ucwords($class_detail->description) : '-----' }}
                    </p>
                </div>
                <div class="two-arrow">
                    <div class="swiper-button-next"> <img class="right-arrow"
                            src="{{ asset('public/images/right-arrow.png') }}"></div>
                    <div class="swiper-button-prev"><img class="left-arrow"
                            src="{{ asset('public/images/left-arrow.png') }}"></div>
                </div>




                {{-- @isset($dateByDay)
                        @foreach (array_slice($dateByDay, 7, 7) as $item)

                            @php print_r($item['date']) ; @endphp

                        @endforeach

                    @endisset --}}

                <div class="swiper mySwiper ad-result-1 mt-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="schedule-view">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @isset($dateByDay)
                                    <?php $ff = true; ?>
                                    @foreach (array_slice($dateByDay, 0, 7) as $key => $item)
                                    <li class="nav-item loop">
                                        <?php
                                                    $class = '';
                                                    if (in_array($class_detail->id, $item['classes']) && $ff) {
                                                    $class = 'active';
                                                    $ff = false;
                                                    } else {
                                                    $class = '';
                                                    }
                                                    ?>
                                        <a class="nav-link test oswald-font {{ $class }}" id="home{{ $key + 1 }}-tab"
                                            data-id="{{ $key + 1 }}" data-toggle="tab" href="#home{{ $key + 1 }}"
                                            role="tab" aria-controls="sun" aria-selected="true">@php
                                            print_r($item['day']) ; @endphp<br><span
                                                style="font-weight: 300; text-transform: uppercase;">@php
                                                print_r($item['date']) ; @endphp</span></a>
                                    </li>

                                    @endforeach

                                    @endisset


                                </ul>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="schedule-view">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @isset($dateByDay)
                                    @foreach (array_slice($dateByDay, 7, 7) as $key => $item)
                                    <li class="nav-item">
                                        <a class="nav-link oswald-font" id="home{{ $key + 8 }}-tab" data-toggle="tab"
                                            href="#home{{ $key + 8 }}" role="tab" aria-controls="sun"
                                            aria-selected="true">@php print_r($item['day']) ; @endphp<br><span
                                                style="font-weight: 300; text-transform: uppercase;">@php
                                                print_r($item['date']) ; @endphp</span></a>
                                    </li>

                                    @endforeach

                                    @endisset
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="schedule-view">
                    <div class="tab-content view-box-area" id="myTabContent">


                        @isset($dateByDay)
                        @foreach ($dateByDay as $key => $item)
                        <div class="tab-pane fade " id="home{{ $key + 1 }}" role="tabpanel"
                            aria-labelledby="home{{ $key + 1 }}-tab">
                            @isset($item['data'])
                            @foreach ($item['data'] as $detail)
                            @php
                            $booking_status = $detail['booking']['status'] ?? '';
                            $booking_date = $detail['booking']['booking_date'] ?? '';
                            @endphp

                            <div class="row py-2">
                                <aside class="col-md-3">
                                    <h3><?php print_r($detail['class']['name']); ?></h3>
                                    <p><?php print_r($detail['from_time']); ?> -
                                        <?php print_r($detail['to_time']); ?></p>
                                    <a class="text-left">@php print truncateString($detail['class']['description'] ??
                                        '', 20, false) . "\n"; @endphp</a>
                                </aside>

                                <aside class="col-md-3">
                                    <p style="font-weight: bold;">Seats Available</p>
                                    <p class="attendee_limit_{{ $detail['id'] }}">@php

                                        $afterBookingAttendeesCount =
                                        $class_detail->checkAttendeesCount(@$item['actual_date'],@$class_detail['id']);
                                        if(isset($afterBookingAttendeesCount) && !empty($afterBookingAttendeesCount)){
                                        print_r($detail['class']['attendees_limit'] - $afterBookingAttendeesCount);
                                        }else{
                                        print_r($detail['class']['attendees_limit']);
                                        }
                                        @endphp</p>

                                </aside>
                                <aside class="col-md-3">
                                    <p style="font-weight: bold;">Location</p>
                                    <p> <i class="fa fa-map-marker" aria-hidden="true"></i> @php
                                        print_r($detail['class']['address']) ; @endphp
                                    </p>
                                </aside>
                                <aside class="col-md-3">
                                    <p class="error booking_error"></p>

                                    <?php $check_booking_request =
                                                        check_sch_booking($item['actual_date'], $detail['id'], $class_detail->id);
                                                        ?>

                                    <?php $booked = booked($item['actual_date'], $detail['id'],
                                                        $class_detail->id); ?>
                                    @if ($booked)
                                    <a class="blue-btn oswald-font my-3 text-light" data-id="{{ $detail['id'] }}"
                                        data-date="@php print_r($item['actual_date']); @endphp">
                                        Booked </a>
                                    @else
                                    @if (isset($detail['class']['attendees_limit']))
                                    @if ($check_booking_request)
                                    <a class="blue-btn oswald-font my-3 text-light" data-id="{{ $detail['id'] }}"
                                        data-date="@php print_r($item['actual_date']); @endphp">request
                                        sent</a>
                                    @else
                                    <a class="blue-btn oswald-font my-3 text-light book_now"
                                        data-id="{{ $detail['id'] }}"
                                        data-date="@php print_r($item['actual_date']); @endphp">
                                        Book </a>
                                    @endif

                                    @endif
                                    @endif

                                </aside>
                            </div>
                            @endforeach

                            @endisset
                            @if(count($item['data']) == 0)
                            <center>
                                <h5>No Records Found</h5>
                            </center>
                            @endempty

                        </div>
                        @endforeach


                        @endisset



                    </div>
                </div>

                {{-- <div class="add-filter grow-filter">
                        <ul>
                            <li>Mon (Oct 4)  6:00 AM <i class="fa fa-times" aria-hidden="true"></i></li>
                            <li>Tue (Oct 5)  6:00 AM <i class="fa fa-times" aria-hidden="true"></i></li>
                        </ul>
                    </div> --}}
                {{-- <button type="button" class="open-chat mt-4" data-toggle="modal" data-target="#reviewaaa">Book Session ({{DEFAULT_CURRENCY.$class_detail->price}})</button>
                --}}
            </div>
        </div>
    </div>
</section>
<section class="adam-classes mt-5">
    <div class="container">
        <h2 class="adam-name before-line">
            {{ strtoupper(@$class_detail['program_user']['first_name'] . ' ' . @$class_detail['program_user']['last_name']) }}
            CLASSES</h2>
        <p class="mt-2 mb-4" style="font-family: 'Oswald';">Discover programs from this coach, download them straight
            away and follow them in your own time.</p>

        <div class="row">
            @if (count($otherClass) > 0)



            @foreach ($otherClass as $item)

            <div class="col-md-4">
                <div class="program-one">
                    @if (!empty(Auth::id()))
                    <a href="" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i>
                        SAVE</a>

                    @else
                    <a href="{{ route('login') }}" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i>
                        SAVE</a>

                    @endif
                    <a href="{{ route('classes-detail',$item->id) }}">
                        <div class="barbell-image button-section">
                            <input type="hidden" id="class_id" value="{{ @$item['id'] }}">
                            <input type="hidden" id="coach_id" value="{{ @$item['program_user']['id'] }}">
                            <input type="hidden" id="user_id"
                                value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                            <input type="hidden" id="type" value="CL">
                            @if (Auth::check() && Auth::user()->id)
                            @if (@$item['program_user']->getClassWishList(@$item['id']))
                            <div class="button-wrapper">
                                <span class="view-save-bt-red remove_from_wishlist">
                                    <i class="fa fa-heart" aria-hidden="true"></i> SAVED
                                </span>
                            </div>
                            @else
                            <div class="button-wrapper">
                                <span id="wishList" class="view-save-bt add_to_wishlist">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE
                                </span>
                            </div>
                            @endif
                            @else
                            <span class="view-save-bt">
                                @if(!empty(Auth::id()))
                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>

                            @else
                            <a href="{{route('login')}}"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                SAVE</span></a>

                            @endif
                            @endif
                            <input type="hidden" name="" value="$item->image">
                            @if (!empty(@$item->image))
                            <img src="{{ asset('public/class/' . @$item->image) }}"
                                class="img-circle profile_image_small" />
                            @else
                            <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                class="img-circle profile_image_small" />
                            @endif

                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>{{ DEFAULT_CURRENCY . @$item['price'] }}</h4>
                            </div>
                            <h3>{{ @$item['name'] }}</h3>
                            <p>{{ @$item['description'] }}</p>
                        </div>
                </div>
            </div>
            </a>
            @endforeach
            @else
            <p class="blank-para">No record Found!</p>
            @endif

        </div>

        {{-- <p class="text-center"><a class="program-chat" href="">VIEW PROGRAMS (20)</a></p> --}}
    </div>
</section>

<!-- start review area -->
<section id="coach-review-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="adam-name before-line">
                    {{ strtoupper(@$class_detail['program_user']['first_name'] . ' ' . @$class_detail['program_user']['last_name']) }}
                    REVIEW</h2>

                <?php $reviewDetail = $class_detail->getReviewAndRatingDetail(@$class_detail['id']); ?>
                {{-- <p class="mt-2 mb-4" style="font-family: 'Oswald';">111Discover programs from this coach, download them
                    straight away and follow them in your own time.</p> --}}
                <div class="review-rate">
                    <div class="rating">
                        <div class="rateyo"
                            data-rateyo-rating="{{ !empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] : 0 }}"
                            data-rateyo-num-stars="5"></div>
                    </div>
                    ({{ count(@$reviewDetail['review_list']) }} Reviews)
                </div>
            </div>
            <div class="col-md-4">
                <div class="write-review text-center">
                    <!-- <h6 class="mb-4">Have you been coached by {{ strtoupper(@$class_detail['name']) }}?</h6> -->
                    @if (!empty(Auth::id()))
                    <button type="button" class="open-chat" data-toggle="modal" data-target="#review">
                        @if(!empty(@$myReviewDetail['description']) && !empty(Auth::id()))
                        UPDATE A REVIEW

                        @else
                        WRITE A REVIEW

                        @endif
                    </button>

                    @else
                    <a href="{{ route('login') }}"><button type="button" class="open-chat">WRITE A
                            REVIEW</button></a>

                    @endif

                </div>
            </div>
        </div>
        <hr class="my-5">
        @forelse($reviewList as $reviewData)
        <div class="review-view">

            <p class="review-rate">
            <div class="rating">
                <div class="rateyo" data-rateyo-rating="{{ $reviewData['star'] }}" data-rateyo-num-stars="5">
                </div>
            </div>
            </p>
            <h5>{{ strtoupper($reviewData->title) }}</h5>
            <!-- <span class="traiend-date">Date Trained: {!! date('M Y', strtotime($reviewData->trained_date)) !!}</span> -->


            <?php
                $string = $reviewData['description'];

                // if(strlen($string) >= 50)
                // {
                    if (strlen($string) >= 1 && strlen($string) <=399) {
                        echo substr($string, 0, 399)   ;
                    }
                if (strlen($string) >= 399) {
                    echo substr($string, 0, 399) . '<span class="read_more_class" style="color:blue;">Read More</span>' . '<span class="show_read_more_class" style="display:none;">' . substr($string, 399) . '</span>' . '<span class="show_less_class" style="color:blue; display:none;" style="color:blue;">Show Less</span>';
                }
                ?>
            <div class="review-man-image">
                @if (!empty(@$reviewData['users']['profile_image']))
                <img src="{{ asset('public/' . $reviewData['users']['profile_image']) }}" alt="man"
                    class="round-image-user-rating mr-3">
                @else
                <img src="{{ asset('public\images\default-image.png') }}" alt="man"
                    class="round-image-user-rating mr-3">
                @endif
                <div class="content-man">
                    <h6>{{ strtoupper(@$reviewData['users']['first_name'] . ' ' . @$reviewData['users']['last_name']) }}
                    </h6>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ @$reviewData['users']['address'] }}

                    </p>

                </div>
            </div>
        </div>
        @empty

        <p class="blank-para">No Data Found!</p>
        @endforelse


        <!-- start pagination -->
        <!-- <nav aria-label="Page navigation example">
                                                                                                                                                             </nav> -->
        <!-- end pagination -->

    </div>
</section>

<!-- The Modal give review -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="modal" id="review">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    @if(!empty($myReviewDetail['description']))
                    UPDATE A REVIEW

                    @else
                    WRITE A REVIEW

                    @endif
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body write-review-modal">
                <p>You're reviewing:</p>
                <h2>{{ strtoupper(@$class_detail['name']) }}</h2>
                <p class="mt-4">Select Stars</p>
                <!--end star -->
                <!-- <span class="give-star"><i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                                                                                                                                                                    -->

                <form id="frm" class="review_validate text-left">
                    @csrf
                    <!-- coach id -->
                    <input type="hidden" name="rate_for" value="{{ $class_detail->id }}">


                    <input type="hidden" name="rate_for_class_id" value="{{ $class_detail->id }}">
                    <input type="hidden" name="rate_for_coach_id" value="{{ @$class_detail['created_by'] }}">
                    <!-- {{ @$programs['id'] }} -->
                    <!-- stars section start -->

                    <div id="rateYo"
                        data-rateyo-rating="{{ !empty(@$myReviewDetail['star']) ? @$myReviewDetail['star'] : '' }}"
                        data-rateyo-num-stars="5"></div>
                    <input type="hidden" id="inpt_rating" value="2" name="star">
                    <!-- value="{{ @$myReviewDetail['star'] }}" -->
                    <!-- star section end -->
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control form-input" id="formGroupExampleInput" name="title"
                            value="{{ !empty(@$myReviewDetail['title']) ? @$myReviewDetail['title'] : '' }}"
                            placeholder="Enter Title Line">

                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea class="form-control" required name="description" id="exampleFormControlTextarea1"
                            rows="4"
                            placeholder="Enter Description">{{ !empty(@$myReviewDetail['description']) ? @$myReviewDetail['description'] : '' }}</textarea>
                    </div>
                    <!-- @if (!empty(Auth::id()))
                    <button type="button" class="open-chat" data-toggle="modal" data-target="#review">WRITE A
                        REVIEW</button>

                    @else
                    <a href="{{ route('login') }}"><button type="button" class="open-chat">WRITE A
                            REVIEW</button></a>

                    @endif -->

                    <button type="submit" class="sign-bt" name="submit" id='frmSubmit'>
                        @if(!empty(@$myReviewDetail['description']) && !empty(Auth::id()))
                        UPDATE
                        @else
                        SUBMIT
                        @endif
                    </button>
                    <!-- <input type="submit" class="sign-bt" value="SUBMIT" name="submit" id='frmSubmit'> -->

                </form>

            </div>

        </div>
    </div>
</div>

@include('frontend.classes.tabs.modals.invalid_payment')
@include('frontend.classes.tabs.modals.booking_modal')
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



$(document).ready(function() {

    $(".loop").each(function(el) {
        if ($(this).find('.test').hasClass('active')) {
            var id = $(this).find('.test').data('id');
            var prevId = id - 1;
            $('#home' + prevId + '-tab').click();
            $('#home' + id + '-tab').click();
        }

    });

    $(".review_validate").validate({
        rules: {
            star: "required",
            title: "required",
            description: "required",

        },
        messages: {
            star: "Please enter your Review",
            title: "Please enter your title",
            description: "Please enter your description",


        }
    });


    $("#frm").submit(function(e) {

        e.preventDefault(); // prevent actual form submit
        if (!$(".review_validate").valid()) {
            return false;
        }

        $('#btn').attr('disabled', true);
        $('#btn').attr('value', "please wait....");
        //alert('Test');
        $.ajax({
            url: "{{ url('review_submit_class') }}",
            data: $('#frm').serialize(),
            type: 'post',
            success: function(result) {
                //console.log(result);

                $('#message').html(result.msg);
                $('#frm')['0'].reset(); //form data reset
                $('#btn').attr('disabled', true);
                $('#btn').attr('value', "Submitted wait....");

                window.location.href =
                    "{{ route('classes-detail',@$class_detail->id) }}#review";
                location.reload();
            }
        });
    });
});




$('.book_now').on('click', function() {
    var $this = $(this);
    var _token = "{{ csrf_token() }}";
    var class_id = "{{ $class_detail->id }}";
    var id = $(this).data('id');
    var date = $(this).data('date');
    $.ajax({
        url: "{{ route('book.class.schedule') }}",
        data: {
            data: {
                date: date
            },
            _token: _token
        },
        type: 'post',
        success: function(result) {
            if (result.type == 'invalid_bank') {
                $('#invalidModal').find('#_class_id').val(class_id)
                $('#invalidModal').modal('show');
            }
            if (result.status) {
                console.log(result);
                $('#bookingModal').find('.actual_booking_date').val(result.date);
                $('#bookingModal').find('#_class_id').val(class_id)
                $('#bookingModal').find('#sch_id').val(id)
                $('#bookingModal').modal('show');
            }
        },
        error: function(error) {
            $('.error').html('')
            if (error.responseJSON.message === 'Unauthenticated.') {
                $this.parent().find('.booking_error').css('color', 'red').html(
                    'Please sign in user account if you book a schedule.');
            }
        }
    });
})
$('.book_my_session').on('click', function(e) {
    e.preventDefault();
    var class_id = $('#bookingModal').find('#_class_id').val()
    var sch_id = $('#bookingModal').find('#sch_id').val()
    var _token = "{{ csrf_token() }}";
    var actual_date = $('#bookingModal').find('.actual_booking_date').val()

    $.ajax({
        url: "{{ route('book.schedule') }}",
        data: {
            schedule_id: sch_id,
            class_id: class_id,
            booking_date: actual_date,
            _token: _token
        },
        type: 'post',
        success: function(result) {
            if (result.status) {
                $('.book_value_' + sch_id).prop('disabled', true);
                $('.book_value_' + sch_id).html('Request Sent')
                $('#bookingModal').modal('hide')
                //var attendee = parseInt($('.attendee_limit_' + sch_id).html()) - 1;
                var attendee = parseInt($('.attendee_limit_' + sch_id).html());
                $('.attendee_limit_' + sch_id).html(attendee)
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        },
        error: function(error) {
            $('.error').html('')
            if (error.responseJSON.message === 'Unauthenticated.') {
                $this.parent().find('.booking_error').css('color', 'red').html(
                    'Please sign in user account if you book a schedule.');
            }
        }
    });
})
</script>

<script>
var swiper = new Swiper(".mySwiper.ad-result-1", {
    slidesPerView: 1,
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

<!-- The Modal give review end -->
<script>
$(document).ready(function() {
    $(document).on('click', '.add_to_wishlist', function() {

        var thisData = $(this);
        var class_id = $(this).closest(".button-section").find("#class_id").val();
        var coach_id = $(this).closest(".button-section").find("#coach_id").val();
        var user_id = $(this).closest(".button-section").find("#user_id").val();
        var type = $(this).closest(".button-section").find("#type").val();
        $.ajax({
            url: "{{ route('add-to-wishlist') }}",
            data: {
                user_id: user_id,
                coach_id: coach_id,
                class_id: class_id,
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
        var class_id = $(this).closest(".button-section").find("#class_id").val();
        var coach_id = $(this).closest(".button-section").find("#coach_id").val();
        var user_id = $(this).closest(".button-section").find("#user_id").val();
        var type = $(this).closest(".button-section").find("#type").val();
        $.ajax({
            url: "{{ route('remove-to-wishlist') }}",
            data: {
                user_id: user_id,
                coach_id: coach_id,
                class_id: class_id,
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
@endsection