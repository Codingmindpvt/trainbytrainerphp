@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
@include('frontend.nav._alertSection')

<!--end varification div area here -->

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View and edit COACH Review details here</p> --}}
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if(Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>
            <aside class="col-lg-8 marketplace-main-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">Reviews</h3>
                    <ul class="nav nav-pills mb-3 active-pending-box" id="pills-tab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link" id="pills-coach-tab" data-toggle="pill" href="#pills-coach" role="tab"
                                aria-controls="pills-coach" aria-selected="true">Class</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-program-tab" data-toggle="pill" href="#pills-program"
                                role="tab" aria-controls="pills-program" aria-selected="false">Program</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <aside class="col-lg-12">
                        <div class="sale-by-location main-y-start-box">
                            <div class="main-y-stars">
                                <h4 class="oswald-font">Overall Ratings</h4>
                                <div class="rating">
                                    <div class="rateyo" data-rateyo-rating="{{@$avgRating}}" data-rateyo-num-stars="5">
                                    </div>
                                </div><span>({{round(@$avgRating, 1)}})</span>
                            </div>

                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active in show" id="pills-coach" role="tabpanel"
                                aria-labelledby="pills-coach-tab">
                                <div class="row">
                                    <aside class="col-lg-12">
                                        @forelse(@$coachReview as $review)
                                        <div class="review-view coach-review-view-new">
                                            <div class="rating">
                                                <div class="rateyo" data-rateyo-rating="{{@$review['star']}}"
                                                    data-rateyo-num-stars="5"></div>
                                            </div>
                                            <h5>{{strtoupper(@$review['title'])}}</h5>
                                            <span class="traiend-date">
                                                <br>Reviewed on:
                                                {{date_format(date_create($review['created_at']),"d M, Y h:i A")}}</span>
                                            <?php
                                            $string = $review['description'];

                                            // if(strlen($string) >= 50)
                                            // {
                                            if (strlen($string) >= 100) {
                                                echo substr($string, 0, 100) . '<span class="read_more" style="color:blue;">Read More</span>' . '<span class="show_read_more" style="display:none;">' . substr($string, 50) . '</span>' . "<span class='show_less' style='color:blue;display:none;'>Show Less</span>";
                                            }
                                            ?>

                                            <div class="review-section-main">
                                                <div class="image-product-tb review-page-box">
                                                    @if(@$review['users']['profile_image'])
                                                    <img src="{{asset('public/'.@$review['users']['profile_image']) }}"
                                                        alt="man" class="mr-3">
                                                    @else
                                                    <img src="{{asset('public/images/default-image.png') }}" alt="man"
                                                        class="mr-3">
                                                    @endif
                                                    <div class="content-man">
                                                        <h6>{{strtoupper(@$review['users']['first_name']." ".@$review['users']['last_name'])}}
                                                        </h6>
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            {{ @$review['users']['address']}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--<div class="review-btn-section">
                                                    <a href="#" class="small-blue-btn approve" data-toggle="modal"
                                                        data-target="{{'#coach_'.@$review['id']}}">Raise Dispute</a>
                                                </div>-->

                                                <!-- The Modal edit product -->
                                                <div class="modal" id="{{'coach_'.@$review['id']}}">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content coach_section">

                                                            <!-- Modal Header -->
                                                            <!-- <div class="modal-header">
                                                                <h4 class="modal-title">RAISE DISPUTE (COACH)</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                             -->

                                                            <!-- Modal body -->
                                                            <div class="modal-body write-review-modal mb-4">
                                                                <img src="images/yes.png" alt="icon"> -->
                                                                <p class="text-left">Reason</p>
                                                                <input id="id" type="hidden" name="id"
                                                                    value="{{ @$review['id']}}">
                                                                <textarea id="reason" class="form-input mb-3"
                                                                    name="reason"
                                                                    placeholder="Enter your reason...">{{ @$review['reason']}}</textarea>

                                                                <button class="cancel-yes coach_reason">Submit</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- The Modal edit product -->
                                            </div>
                                        </div>
                                        @empty
                                        <p class="blank-para">No Data Found!!</p>
                                        @endforelse
                                    </aside>
                                </div>
                            </div>
                            <div class="tab-pane fade active" id="pills-program" role="tabpanel"
                                aria-labelledby="pills-program-tab">
                                <div class="row">
                                    <aside class="col-lg-12">
                                        @forelse(@$programReview as $review)
                                        <div class="review-view coach-review-view-new">
                                            <div class="rating">
                                                <div class="rateyo" data-rateyo-rating="{{@$review['star']}}"
                                                    data-rateyo-num-stars="5"></div>
                                            </div>
                                            <h5>{{strtoupper(@$review['title'])}}</h5>
                                            <span class="traiend-date">
                                                <br>Reviewed on:
                                                {{date_format(date_create($review['created_at']),"d M, Y h:i A")}}</span>
                                                <br/>
                                            <?php
                                            $string = $review['description'];

                                            // if(strlen($string) >= 50)
                                            // {
                                            if (strlen($string) >= 100) {
                                                echo substr($string, 0, 100) . '<span class="read_more_program" style="color:blue;">Read More</span>' . '<span class="show_read_more_program" style="display:none;">' . substr($string, 50) . '</span>' . "<span class='show_less_program' style='color:blue;display:none;'>Show Less</span>";
                                            }
                                            ?>

                                            <!-- <p>{{@$review['description']}}</p> -->


                                            <div class="review-section-main">
                                                <div class="image-product-tb review-page-box">


                                                    @if(@$review['users']['profile_image'])
                                                    <img src="{{asset('public/'.@$review['users']['profile_image']) }}"
                                                        alt="man" class="mr-3">
                                                    @else
                                                    <img src="{{asset('public/images/default-image.png') }}" alt="man"
                                                        class="mr-3">
                                                    @endif
                                                    <div class="content-man">
                                                        <h6>{{strtoupper(@$review['users']['first_name']." ".@$review['users']['last_name'])}}
                                                        </h6>
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            {{ @$review['users']['address']}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- <div class="review-btn-section">
                                                    <a href="#" class="small-blue-btn approve" data-toggle="modal"
                                                        data-target="{{'#program_'.@$review['id']}}">Raise Dispute</a>
                                                </div>
-->
                                                <!-- The Modal edit product -->
                                                <div class="modal" id="{{'program_'.@$review['id']}}">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content program_section">

                                                            <!-- Modal Header -->
                                                            <!-- <div class="modal-header">
                                                                <h4 class="modal-title">RAISE DISPUTE (PROGRAM)</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                             -->

                                                            <!-- Modal body -->
                                                            <div class="modal-body write-review-modal mb-4">
                                                                <!-- <img src="images/yes.png" alt="icon"> -->
                                                                <p class="text-left">Reason</p>
                                                                <input id="id" type="hidden" name="id"
                                                                    value="{{ @$review['id']}}">
                                                                <textarea id="reason" class="form-input mb-3"
                                                                    name="reason"
                                                                    placeholder="Enter your reason...">{{ @$review['reason']}}</textarea>
                                                                <button
                                                                    class="cancel-yes program_reason">Submit</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- The Modal edit product -->
                                            </div>
                                        </div>
                                        @empty
                                        <p class="blank-para">No Data Found!!</p>
                                        @endforelse
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function() {

    $('.read_more').on('click', function() {
        $('.read_more').hide();
        $('.show_less').show();
        $('.show_read_more').toggle();
    });
    $('.show_less').on('click', function() {
        $('.read_more').show();
        $('.show_less').hide();
        $('.show_read_more').hide();
    });

    $('.read_more_program').on('click', function() {
        $('.read_more_program').hide();
        $('.show_less_program').show();
        $('.show_read_more_program').toggle();
    });
    $('.show_less_program').on('click', function() {
        $('.read_more_program').show();
        $('.show_less_program').hide();
        $('.show_read_more_program').hide();
    });
    $(".rateyo").rateYo({
        readOnly: true,
        starWidth: "18px",
        spacing: "2px",
    });
});
$(document).ready(function() {

    $('.coach_reason').on('click', function() {
        var thisData = this;
        var id = $(this).closest(".coach_section").find("#id").val();
        var reason = $(this).closest(".coach_section").find("#reason").val();
        $.ajax({
            url: "{{ route('coach.review_reason') }}",
            data: {
                id: id,
                reason: reason
            },
            type: 'GET',
            success: function(data) {
                SwalOverlayColor();
                swal({
                    title: data.status,
                    text: data.message,
                })
                $(thisData).closest(".coach_section").find(".close").trigger("click");
            }
        });
    });

    $('.program_reason').on('click', function() {
        var thisData = this;
        var id = $(this).closest(".program_section").find("#id").val();
        var reason = $(this).closest(".program_section").find("#reason").val();
        $.ajax({
            url: "{{ route('coach.review_reason') }}",
            data: {
                id: id,
                reason: reason
            },
            type: 'GET',
            success: function(data) {
                SwalOverlayColor();
                swal({
                    title: data.status,
                    text: data.message,
                })
                $(thisData).closest(".program_section").find(".close").trigger("click");
            }
        });
    });

});
</script>
@endsection