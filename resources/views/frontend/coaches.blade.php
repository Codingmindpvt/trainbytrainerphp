@extends('layouts.guest')
@section('content')
    <!-- coaches banner area start here -->
    <section class="coaches-banner cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h5>Best coaches for your growth.</h5>
                    <h1>Find Your Fitness Coaches</h1>
                </div>
                <div class="col-md-5 text-right">
                    <img src="{{ url('/') }}/public/images/coaches.png" alt="coach" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    {{-- Filter Section --}}

    <div class="filter-show-box">
        <div class="container">
            <h6>Filters</h6>
            <p role="button" aria-expanded="false" aria-controls="collapseExample" id="ShowToggle">+ Show Filters</p>
        </div>
    </div>


    @php
    $show_filter = '';
    if (isset($_GET['filter_category'])) {
        $category_ids = explode(',', $_GET['filter_category'] ?? []);
        $show_filter = 'show';
    }
    if (isset($_GET['filter_price'])) {
        $price_ids = explode(',', $_GET['filter_price'] ?? []);
        $show_filter = 'show';
    }

    if (isset($_GET['filter_gender'])) {
        $gender_ids = explode(',', $_GET['filter_gender'] ?? []);
        $show_filter = 'show';
    }

    if (isset($_GET['filter_rating'])) {
        $rating_ids = explode(',', $_GET['filter_rating'] ?? []);
        $show_filter = 'show';
    }

    if (isset($_GET['filter_country'])) {
        $country_ids = explode(',', $_GET['filter_country'] ?? []);
        $show_filter = 'show';
    }

    if (isset($_GET['filter_personality'])) {
        $personality_ids = explode(',', $_GET['filter_personality'] ?? []);
        $show_filter = 'show';
    }
    @endphp

    {{-- By Vikas --}}


    @include('frontend.coach_filter_tab.index')

    {{-- By Vikas --}}



    <div id="dynamictabstrp"></div>
    <section class="coaches-list ">
        <div class="container">
            <div class="coaches-list-heading">
                <h6>{{ @$coach_count }} Coaches</h6>
                {{-- <p><i class="fa fa-heart" aria-hidden="true"></i> SAVED</p> --}}
                <div class="select-box" data-aos="fade-down">
                    {{-- <i class="fa fa-angle-down select-down" aria-hidden="true"></i> --}}
                    {{-- <select class="custom-select-box custom-select-md filter-select">
                        <option selected>SORT BY</option>
                        <option value="1">SORT BY</option>
                    </select> --}}
                </div>
            </div>
            <div >

                @forelse ($users as $item)
                    <div class="coaches-info" >

                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-2">
                                @if (!empty(@$item->profile_image))
                                    <img src="{{ asset('public/' . @$item->profile_image) }}"
                                        class="img-fluid img-rounded" />
                                @else
                                    <img src="{{ asset('public/images/default-image.png') }}"
                                        class="img-fluid img-rounded" />
                                @endif
                            </div>
                            <div class="col-lg-8 col-md-10">
                                <div class="coach-information">
                                    <h2>{{ ucwords(@$item['first_name'] . ' ' . @$item['last_name']) }}
                                        @if(isset($item['coach_badge_status']) && !empty($item['coach_badge_status']) && $item['coach_badge_status'] == 'C')
                                        <span><img
                                                src="{{ url('/') }}/public/images/verified2.png" alt="image"
                                                class="img-fluid">Certified</span>
                                        @endif</h2>
                                    <ul>
                                        <li><b>{{ !empty(@$item['coach_detail']['price_range']) ? @$item['coach_detail']['price_range'] : '' }}</b>
                                        </li>
                                        <li>-</li>
                                        <li>{{ !empty(@$item['coach_detail']['title']) ? @$item['coach_detail']['title'] : '' }}
                                        </li>
                                        <li>-</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ @$item->state->name }}.
                                            {{ @$item->country->name }}</li>
                                    </ul>
                                    <input type="hidden" name="rate_for_coach_id"
                                        value="{{ !empty(@$item['coach_detail']['user_id']) ? @$item['coach_detail']['user_id'] : '' }}">


                                    <?php $reviewDetail = $item->getReviewAndRatingDetail($item['coach_detail']['id']); ?>

                                    <p class="review-rate">
                                    <div class="rating">

                                    @if(!empty($reviewDetail['avg_rating']))
                                        <div class="rateyo" data-rateyo-rating="{{@$reviewDetail['avg_rating'] }}" data-rateyo-num-stars="5"></div>

                            @else
                            <div class="rateyo" data-rateyo-rating="0" data-rateyo-num-stars="5"></div>

                            @endif


                                    </div>
                                    ({{ count(@$reviewDetail['review_list']) }} Reviews)</p>

                                    <ul class="gain-category">
                                        <?php
                                        $categories = explode(',', @$item['coach_detail']['categories']);
                                        $someCategories = array_slice($categories, 0, 4);
                                        $countAnotherCategories = count($categories) - 4;
                                        foreach ($someCategories as $category) { ?>
                                        <li>{{ @$item->getCategoryName($category) }}</li>
                                        <?php }
                                        if ($countAnotherCategories > 0) { ?>
                                        <a href="{{ route('coaches.profile', @$item['id']) }}">
                                            <li class="two-more">{{ '+' . $countAnotherCategories }}</li>
                                        </a>
                                        <?php }
                                        ?>
                                    </ul>
                                    <p class="mt-2">
                                        {{ !empty(@$item['coach_detail']['bio']) ? substr(@$item['coach_detail']['bio'], 0, 250) . ' ...' : '-----' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12 button-section">
                                <input type="hidden" id="coach_id" value="{{ @$item['id'] }}">
                                <input type="hidden" id="user_id"
                                    value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                                <input type="hidden" id="type" value="{{ $wishList->isTypeCoach() }}">
                                <a href="{{ route('coaches.profile', @$item['id']) }}" class="view-profile-bt">VIEW
                                    PROFILE</a>


                                @if (Auth::check() && Auth::user()->id)
                                    @if (@$item->getWishList(@$item['id']))
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
                                    <span class="view-save-bt"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                @endif


                                <!-- social image condition start -->
                                <div class="social-area">
                                <?php
                                $facebook_url = $item['coach_detail']['facebook_url'];
                                $twitter_url = $item['coach_detail']['twitter_url'] ;
                                $pinterest_url = $item['coach_detail']['pinterest_url'];
                                $youtube_url = $item['coach_detail']['youtube_url'];
                                $instagram_url = $item['coach_detail']['instagram_url'];

                                if (!empty($item['coach_detail']['facebook_url'])) {
                                   echo " <a href='$facebook_url'>
                                    <img src='public/images/fb.svg' alt='svg'>
                                </a>";
                                }
                                if(!empty($item['coach_detail']['twitter_url'])) {
                                    echo " <a href='$twitter_url'>
                                     <img src='public/images/twitter.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($item['coach_detail']['pinterest_url'])) {
                                    echo " <a href='$pinterest_url'>
                                     <img src='public/images/pint.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($item['coach_detail']['youtube_url'])) {
                                    echo " <a href='$youtube_url'>
                                     <img src='public/images/youtube.svg' alt='svg'>
                                 </a>";
                                 }
                                 if(!empty($item['coach_detail']['instagram_url'])) {
                                    echo " <a href='$instagram_url'>
                                     <img src='public/images/insta.svg' alt='svg'>
                                 </a>";
                                 }
                                else {
                                echo "";
                                }

                                ?>





                                </div>
                                <!-- social image condition End -->
                               <!-- <div class="social-area">
                                    <a href="{{ !empty(@$item['coach_detail']['facebook_url']) ? @$item['coach_detail']['facebook_url'] : '#' }}">
                                        <img src="{{ asset('public/images/fb.svg') }}" alt="svg">
                                    </a>
                                    <a href="{{ !empty(@$item['coach_detail']['twitter_url']) ? @$item['coach_detail']['twitter_url'] : '#' }}">
                                        <img src="{{ asset('public/images/twitter.svg') }}" alt="svg">
                                    </a>
                                    <a href="{{ !empty(@$item['coach_detail']['pinterest_url']) ? @$item['coach_detail']['pinterest_url'] : '#' }}">
                                        <img src="{{ asset('public/images/pint.svg') }}" alt="svg">
                                    </a>
                                    <a href="{{ !empty(@$item['coach_detail']['youtube_url']) ? @$item['coach_detail']['youtube_url'] : '#' }}">
                                        <img src="{{ asset('public/images/youtube.svg') }}" alt="svg">
                                    </a>
                                    <a href="{{ !empty(@$item['coach_detail']['instagram_url']) ? @$item['coach_detail']['instagram_url'] : '#' }}">
                                        <img src="{{ asset('public/images/insta.svg') }}"  alt="svg">
                                    </a>
                                </div> -->

                                {{--  <a href="{{ !empty(@$item['coach_detail']['instagram_url']) ? @$item['coach_detail']['instagram_url'] : '#' }}"
                                    class="view-insta-bt"><i class="fa fa-instagram" aria-hidden="true"></i> INSTAGRAM</a>  --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="blank-para">No Data Found!!</div>

                @endforelse
                <div class="d-flex justify-content-center">

                    {{ $users->links() }}

                </div>
            </div>
        </div>

    </section>




    <!-- coaches banner area end here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{--  <div id="button">
        up
    </div>  --}}
    <script>
        $(document).ready(function() {



            var show_filter = '{{ $show_filter }}';
            var show = false;
            if (show_filter === 'show') {
                $('#collapseExample_show').slideDown(1000);
                show = true;
                $('#ShowToggle').html('- Hide Filters');
                $('html, body').animate({
                    scrollTop: $("#dynamictabstrp").offset().top+500
                }, 1000);
            }

            $('#ShowToggle').on('click', function() {
                if (show) {
                    $('#collapseExample_show').slideUp(1000);
                    show = false;
                    $('#ShowToggle').html('+ Show Filters');
                } else {
                    $('#collapseExample_show').slideDown(1000);
                    show = true;
                    $('#ShowToggle').html('- Hide Filters');
                    {{-- $('html, body').animate({
                        scrollTop: $("#dynamictabstrp").offset().top+350
                    }, 2000); --}}


                }
            })

            $(document).on('click', '.add_to_wishlist', function() {

                var thisData = $(this);
                var coach_id = $(this).closest(".button-section").find("#coach_id").val();
                var user_id = $(this).closest(".button-section").find("#user_id").val();
                var type = $(this).closest(".button-section").find("#type").val();
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
                var coach_id = $(this).closest(".button-section").find("#coach_id").val();
                var user_id = $(this).closest(".button-section").find("#user_id").val();
                var type = $(this).closest(".button-section").find("#type").val();
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
    <script>
        function getajaxdata() {
            $.ajax({
                url: "{{ route('ajax-get-coaches') }}",
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
                        '<span class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>SAVE</span>'
                    );
                }
            });
        }

        $(document).ready(function() {
            $(function() {
                $(".rateyo").rateYo({
                    readOnly: true,
                    starWidth: "18px",
                    spacing: "2px",
                });
            });
            //category search
            $("#categorySearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#categoryItem label").filter(function() {
                    $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            //get array of category Ids
            $(".category").change(function() {
                var categoryArray = [];
                $("input:checkbox[name=category]:checked").each(function() {
                    categoryArray.push($(this).val());
                });
                $('#filter_category').val(categoryArray);
            });

            //price Array
            $(".price_filter_checkbox").change(function() {
                var priceArray = [];
                $('input:checkbox.price_filter_checkbox').each(function() {
                    var sThisVal = (this.checked ? $(this).val() : "");

                    if (sThisVal != '') {
                        priceArray.push(sThisVal);

                    }
                });
                $('#filter_price').val(priceArray);
            });

            //Gender
            $(".gender_filter_checkbox").change(function() {
                var genderArray = [];
                $('input:checkbox.gender_filter_checkbox').each(function() {
                    var sThisVal = (this.checked ? $(this).val() : "");

                    if (sThisVal != '') {
                        genderArray.push(sThisVal);

                    }
                });

                $('#filter_gender').val(genderArray);
            });


            //Rating
            $(".rating_filter_checkbox").change(function() {
                var ratingArray = [];
                $('input:checkbox.rating_filter_checkbox').each(function() {
                    var sThisVal = (this.checked ? $(this).val() : "");

                    if (sThisVal != '') {
                        ratingArray.push(sThisVal);

                    }
                });
                $('#filter_rating').val(ratingArray);
            });

            //Country

            $(".country_filter_checkbox").change(function() {
                var countryArray1 = [];
                $('input:checkbox.country_filter_checkbox').each(function() {
                    var sThisVal = (this.checked ? $(this).val() : "");
                    if (sThisVal != '') {
                        countryArray1.push(sThisVal);

                    }
                });
                $('#filter_rating').val(countryArray1);
            });

            $(".per_filter_checkbox").change(function() {
                var perArray1 = [];
                $('input:checkbox.per_filter_checkbox').each(function() {
                    var sThisVal = (this.checked ? $(this).val() : "");
                    if (sThisVal != '') {
                        perArray1.push(sThisVal);

                    }
                });
                $('#filter_personality').val(perArray1);
            });






            $("#searchCountryName").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".all-filter.country-filter label").filter(function() {
                    $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            //get array of country Ids
            $(".country").change(function() {
                var countryArray = [];
                $("input:checkbox[name=country]:checked").each(function() {
                    countryArray.push($(this).val());
                });
                $('#filter_country').val(countryArray);
            });

            $("#searchCityName").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".all-filter.city-filter label").filter(function() {
                    $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            //get array of country Ids
            $(".city").change(function() {
                var cityArray = [];
                $("input:checkbox[name=city]:checked").each(function() {
                    cityArray.push($(this).val());
                });
                $('#filter_city').val(cityArray);
            });



            //training style & personality search
            $("#trainingStyleSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#trainingStyleItem label").filter(function() {
                    $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            //get array of training style & personality Ids
            $(".training_style").change(function() {
                var trainingStyleArray = [];
                $("input:checkbox[name=training_style]:checked").each(function() {
                    trainingStyleArray.push($(this).val());
                });
                $('#filter_training_style').val(trainingStyleArray);
            });

        });

    </script>
@endsection
