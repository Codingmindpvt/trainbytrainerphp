@extends('layouts.guest')
@section('content')
<!-- whishlist-section start here -->
<section class="whishlist-page-banner">
    <div class="whishlist-title">
        <h2>MY WISHLIST</h2>
        <h6>MY FAVORITE COACHES AND PROGRAMS LIST</h6>
    </div>
</section>
<!-- whishlist-section end here -->
<section class="whishlist-tab-section">
    <div class="coach-tab">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist" id="wishlistTabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#programs" role="tab" data-toggle="tab">
                        @if (count($getWishList) == 1)
                        <p>{{ count($getWishList) }} Coach</p>
                        @else
                        <p>{{ count($getWishList) }} Coaches</p>
                        @endif
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#sessions" role="tab" data-toggle="tab">
                        @if (count($getProgramWishList) == 1)
                        <p>{{ count($getProgramWishList) }} Program</p>
                        @else
                        <p>{{ count($getProgramWishList) }} Programs</p>
                        @endif
                    </a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#classes" role="tab" data-toggle="tab">
                        @if (count($getClassWishList) == 1)
                        <p>{{ count($getClassWishList) }} Class</p>
                        @else
                        <p>{{ count($getClassWishList) }} Classes</p>
                        @endif
                    </a>

                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active show" id="programs">
                @forelse ($getWishList as $item)

                <div class="coaches-info">

                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2">
                            @if (!empty(@$item['users']->profile_image))
                            <img src="{{ asset('public/' . @$item['users']->profile_image) }}"
                                class="img-fluid img-rounded" />
                            @else
                            <img src="{{ asset('public/images/default-image.png') }}" class="img-fluid img-rounded" />
                            @endif
                        </div>
                        <div class="col-lg-8 col-md-10">
                            <div class="coach-information">
                                <h2>{{ (isset($item['users']['first_name'])) ? ucwords(@$item['users']['first_name'] . ' ' . @$item['users']['last_name']) : "-----" }}
                                    @if(isset($item['users']['coach_badge_status']) &&
                                    !empty($item['users']['coach_badge_status']) &&
                                    $item['users']['coach_badge_status'] == 'C')
                                    <span><img src="{{ url('/') }}/public/images/verified2.png" alt="image"
                                            class="img-fluid">Certified</span>
                                    @endif
                                </h2>
                                <ul>
                                    <li><b>{{ !empty(@$item['users']['coach_detail']['price_range'])? @$item['users']['coach_detail']['price_range']: '-----' }}</b>
                                    </li>
                                    <li>-</li>
                                    <li>{{ !empty(@$item['users']['coach_detail']['title']) ? @$item['users']['coach_detail']['title'] : '-----' }}
                                    </li>
                                    <li>-</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{ @$item['users']->state->name }}.
                                        {{ @$item['users']->country->name }}</li>
                                </ul>
                                <p class="review-rate">
                                <?php $reviewDetail = $item->getReviewAndRatingCoach($item['users']['id']); ?>
                                        <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] :0}}" data-rateyo-num-stars="5"></div>
                                    </div>({{ count(@$reviewDetail['review_list']) }} Reviews)</p>
                                <ul class="gain-category">
                                    <?php $categories = (explode(",",@$item['users']['coach_detail']['categories']));
                                          $someCategories = array_slice($categories, 0, 4);
                                          $countAnotherCategories = (count($categories) - 4);
                                          foreach($someCategories as $category){
                                            ?>
                                    <li>{{ @$item['users']->getCategoryName($category) }}</li>
                                    <?php
                                          }
                                          if($countAnotherCategories > 0 ){
                                            ?>
                                    <a href="{{ route('coaches.profile', @$item['users']['id']) }}">
                                        <li class="two-more">{{ '+' . $countAnotherCategories }}</li>
                                    </a>
                                    <?php
                                          }
                                          ?>
                                </ul>
                                <p class="mt-2">
                                    {{ !empty(@$item['users']['coach_detail']['bio'])? substr(@$item['users']['coach_detail']['bio'], 0, 250) . ' ...': '-----' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 button-section">

                            <input type="hidden" id="coach_id" value="{{ @$item['users']['id'] }}">
                            <input type="hidden" id="user_id"
                                value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                            <input type="hidden" id="type" value="{{ $wishList->isTypeCoach() }}">
                            <a href="{{ route('coaches.profile', @$item['users']['id']) }}" class="view-profile-bt">VIEW
                                PROFILE</a>
                            @if (Auth::check() && Auth::user()->id)
                            @if (@$item['users']->getWishList(@$item['users']['id']))
                            <span class="view-save-bt-red remove_from_wishlist">
                                <i class="fa fa-heart" aria-hidden="true"></i> SAVED
                            </span>
                            @else
                            <div class="button-wrapper">
                                <span id="wishList" class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i> SAVE</span>
                            </div>
                            @endif
                            @else
                            <span class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                SAVE</span>
                            @endif

                            {{-- <a href="{{ !empty(@$item['users']['coach_detail']['instagram_url']) ? @$item['users']['coach_detail']['instagram_url'] : '#' }}"
                            class="view-insta-bt"><i class="fa fa-instagram" aria-hidden="true"></i>
                            INSTAGRAM</a> --}}

                            <!-- social image condition start -->
                            <div class="social-area">
                                <?php
                                            $facebook_url = $item['users']['coach_detail']['facebook_url'];
                                            $twitter_url = $item['users']['coach_detail']['twitter_url'];
                                            $pinterest_url = $item['users']['coach_detail']['pinterest_url'];
                                            $youtube_url = $item['users']['coach_detail']['youtube_url'];
                                            $instagram_url = $item['users']['coach_detail']['instagram_url'];

                                            if (!empty($item['users']['coach_detail']['facebook_url'])) {
                                                echo " <a href='$facebook_url' target='_blank'>
                                                                                <img src='public/images/fb.svg' alt='svg'>
                                                                            </a>";
                                            }
                                            if (!empty($item['users']['coach_detail']['twitter_url'])) {
                                                echo " <a href='$twitter_url' target='_blank'>
                                                                                 <img src='public/images/twitter.svg' alt='svg'>
                                                                             </a>";
                                            }
                                            if (!empty($item['users']['coach_detail']['pinterest_url'])) {
                                                echo " <a href='$pinterest_url' target='_blank'>
                                                                                 <img src='public/images/pint.svg' alt='svg'>
                                                                             </a>";
                                            }
                                            if (!empty($item['users']['coach_detail']['youtube_url'])) {
                                                echo " <a href='$youtube_url' target='_blank'>
                                                                                 <img src='public/images/youtube.svg' alt='svg'>
                                                                             </a>";
                                            }
                                            if (!empty($item['users']['coach_detail']['instagram_url'])) {
                                                echo " <a href='$instagram_url' target='_blank'>
                                                                                 <img src='public/images/insta.svg' alt='svg'>
                                                                             </a>";
                                            } else {
                                                echo '';
                                            }

                                            ?>






                            </div>
                            <!-- social image condition End -->
                        </div>
                    </div>

                </div>
                @empty
                <div class="row">
                    <div class="col-md-12">
                        <div class="blank-para">No Data Found!!</div>
                    </div>
                </div>

                @endforelse
                <div class="d-flex justify-content-center">

                    {{ $getWishList->links() }}

                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade " id="sessions">
                <div class="row">
                    @forelse ($getProgramWishList as $item)

                    <div class="col-md-4">

                        <div class="program-one">
                            <div class="button-section">
                                <input type="hidden" id="program_id" value="{{ @$item['coach_program']['id'] }}">
                                <input type="hidden" id="coach_id" value="{{ @$item['users']['id'] }}">
                                <input type="hidden" id="user_id"
                                    value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeProgram() }}">
                                {{-- @if (Auth::check() && Auth::user()->id)
                                      @if (@$item->getWishList(@$item['id'])) --}}

                                <span class="view-save-bt-red remove_from_wishlist">

                                    <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                            </div>
                            <!-- <a href="" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</a> -->
                            <a href="{{ route('program-detail',$item['coach_program']['id']) }}">
                                <div class="barbell-image">
                                    @if (!empty(@$item['coach_program']['image_file']))
                                    <img src="{{ asset('public/' . $item['coach_program']['image_file']) }}"
                                        class="img-circle profile_image_small" />
                                    @else
                                    <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                        class="img-circle profile_image_small" />
                                    @endif
                                </div>
                                <div class="barberll-content">
                                    <div class="doller-review" >
                                        <h4>{{ DEFAULT_CURRENCY . @$item['coach_program']['price'] }}</h4>
                                        <p class="review-rate">

                                        <?php $reviewDetail = $item->getReviewAndRatingProgram($item['coach_program']['id']); ?>
                                        <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] :0}}" data-rateyo-num-stars="5"></div>
                                    </div>

                                                 ({{ count(@$reviewDetail['review_list']) }} Reviews)</p>
                                    </div>show
                                    <h3> {{ ucfirst(@$item['coach_program']['program_name']) }}</h3>
                                    <p> {{ ucfirst(@$item['coach_program']['description']) }}</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    @empty
                    <div class="col-md-12">
                        <div class="blank-para">No Data Found!!</div>
                    </div>

                    @endforelse
                    <div class="d-flex justify-content-center">

                        {{ $getProgramWishList->links() }}

                    </div>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="classes">
                <div class="row">
                    @forelse ($getClassWishList as $item)

                    <div class="col-md-4">

                        <div class="program-one">
                            <div class="button-section">
                                <input type="hidden" id="class_id" value="{{ @$item['coach_class']['id'] }}">
                                <input type="hidden" id="coach_id" value="{{ @$item['users']['id'] }}">
                                <input type="hidden" id="user_id"
                                    value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeClass() }}">
                                {{-- @if (Auth::check() && Auth::user()->id)
                                      @if (@$item->getWishList(@$item['id'])) --}}

                                <span class="view-save-bt-red remove_from_wishlist">

                                    <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                            </div>
                            <!-- <a href="" class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</a> -->
                            <a href="{{ route('classes-detail',$item['coach_class']['id']) }}">
                                <div class="barbell-image">
                                    @if (!empty(@$item['coach_class']['image']))
                                    <img src="{{ asset('public/class/' . $item['coach_class']['image']) }}"
                                        class="img-circle profile_image_small" />
                                    @else
                                    <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                        class="img-circle profile_image_small" />
                                    @endif
                                </div>
                                <div class="barberll-content">
                                    <div class="doller-review">
                                        <h4>{{ DEFAULT_CURRENCY . @$item['coach_class']['price'] }}</h4>
                                        <p class="review-rate">
                                        <?php $reviewDetail = $item->getReviewAndRatingClass($item['coach_class']['id']); ?>
                                        <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] :0}}" data-rateyo-num-stars="5"></div>
                                    </div>

                                                 ({{ count(@$reviewDetail['review_list']) }} Reviews)</p>
                                    </div>show
                                    <h3> {{ ucfirst(@$item['coach_class']['name']) }}</h3>
                                    <p> {{ ucfirst(@$item['coach_class']['description']) }}</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    @empty
                    <div class="col-md-12">
                        <div class="blank-para">No Data Found!!</div>
                    </div>

                    @endforelse
                    <div class="d-flex justify-content-center">

                        {{ $getClassWishList->links() }}

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {


    $(document).on('click', '.remove_from_wishlist', function() {

        var thisData = $(this);
        var program_id = $(this).closest(".button-section").find("#program_id").val();
        var class_id = $(this).closest(".button-section").find("#class_id").val();
        var coach_id = $(this).closest(".button-section").find("#coach_id").val();
        var user_id = $(this).closest(".button-section").find("#user_id").val();
        var type_tab = $(this).closest(".button-section").find("#type").val();

        $.ajax({
            url: "{{ route('remove-to-wishlist') }}",

            data: {
                user_id: user_id,
                class_id: class_id,
                coach_id: coach_id,
                type: type_tab,
                program_id: program_id
            },

            type: 'GET',
            success: function(data) {
                SwalOverlayColor();
                swal({
                    title: data.status,
                    text: data.message,
                }).then(function() {
                    //var locatn = window.location.href
                    //var arr_locatn = locatn.split("#");
                    if (type_tab == "P") {

                        window.location.href = app_url + "/my-wishlist#sessions"
                        location.reload();
                    } else if (type_tab == "CL") {

                        window.location.href = app_url + "/my-wishlist#classes"
                        location.reload();
                    } else {
                        //window.location.href= arr_locatn+"#programs";
                        window.location.href = app_url + "/my-wishlist#programs"
                        location.reload();


                    }

                });


            }
        });
    });

});
</script>

<script>
    $(function() {
        $(".rateyo").rateYo({
            readOnly: true,
            starWidth: "18px",
            spacing: "2px",
        });
    });
    $(document).ready(function() {

        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
            // localStorage.removeItem('activeTab');
        }

        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });

        var activeTab = localStorage.getItem('activeTab');

        if(activeTab){
            $('#wishlistTabs a[href="' + activeTab + '"]').tab('show');
        }
    })
</script>
@endsection
