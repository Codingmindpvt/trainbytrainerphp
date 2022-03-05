@extends('layouts.guest')
@section('content')
    <!-- coaches banner area start here -->


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
        $filter_rating = explode(',', $_GET['filter_rating'] ?? []);
        $show_filter = 'show';
    }
    @endphp

    <section class="coaches-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h5>Best programs for your growth.</h5>
                    <h1>Find Your Fitness Programs</h1>
                </div>
                <div class="col-md-5 text-right">
                    <img src="{{ url('/') }}/public/images/coaches.png" alt="coach" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <div class="filter-show-box">
        <div class="container">
            <h6>Filters</h6>
            <p id="ShowToggle">+ Show Filters</p>
        </div>
    </div>

    <div class="collapse" id="collapseExample_show">
        <div class="card card-body " id="dynamictabstrp">
            <section class="filerts box-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="category-filter">
                                <div class="cat-head">
                                    <h5>Category</h5>
                                    <input type="search" id="categorySearch" class="form-control" placeholder="search"
                                        aria-label="Search" />
                                </div>
                                <hr>
                                <div class="all-filter all-filter-height-box">
                                    @foreach (@$categoryList as $category)
                                        <div class="custom-control custom-checkbox checkbox-area" id="categoryItem">
                                            <input type="checkbox" name="category" value="{{ $category['id'] }}"
                                                class="custom-control-input category"
                                                id="{{ 'category_' . $category['id'] }}" @php

                                                    if (isset($category_ids) && in_array($category['id'], $category_ids)) {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }

                                                @endphp>
                                            <label class="custom-control-label"
                                                for="{{ 'category_' . $category['id'] }}">{{ $category['title'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="category-filter">
                                <div class="cat-head categories-heading">
                                    <h5>Price</h5>
                                </div>
                                <hr>

                                <div class="all-filter">
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" value="0-100" name="price" class="custom-control-input price"
                                            id="price_1" @php

                                                if (isset($price_ids) && in_array('0-100', $price_ids)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="price_1">$0.00 - $100.00</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" value="100+" name="price" class="custom-control-input price"
                                            id="price_id_2" @php

                                                if (isset($price_ids) && in_array('100+', $price_ids)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="price_id_2">$100.00 and above</label>
                                    </div>
                                </div>
                            </div>

                            <div class="category-filter mt-4">
                                <div class="cat-head">
                                    <h5>Rating</h5>
                                </div>
                                <hr>
                                <div class="rating-filter">
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input rating" id="customCheckBox1"
                                            value="5" name="rating" @php

                                                if (isset($filter_rating) && in_array('5', $filter_rating)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="customCheckBox1">5 Stars</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input rating" id="customCheckBox2"
                                            value="4" name="rating" @php

                                                if (isset($filter_rating) && in_array('4', $filter_rating)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="customCheckBox2">4 Stars</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input rating" id="customCheckBox3"
                                            value="3" name="rating"  @php

                                                if (isset($filter_rating) && in_array('3', $filter_rating)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="customCheckBox3">3 Stars</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input rating" id="customCheckBox4"
                                            value="2" name="rating"  @php

                                                if (isset($filter_rating) && in_array('2', $filter_rating)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="customCheckBox4">2 Stars</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input rating" id="customCheckBox5"
                                            value="1" name="rating"  @php

                                                if (isset($filter_rating) && in_array('1', $filter_rating)) {
                                                    echo 'checked';
                                                } else {
                                                    echo '';
                                                }

                                            @endphp>
                                        <label class="custom-control-label" for="customCheckBox5">1 Star</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="my-4">
                    <div class="add-filter">
                        <ul>
                            <!-- <li>Weight Loss <i class="fa fa-times" aria-hidden="true"></i></li>
                                                                        <li>$0.00 - $100.00 <i class="fa fa-times" aria-hidden="true"></i></li>
                                                                        <li>4 Star & Up <i class="fa fa-times" aria-hidden="true"></i></li> -->
                            <li class="Clear-Filter"><a href="{{ route('programs') }}">Clear Filter</a></li> &nbsp;&nbsp;&nbsp;
                            <li>
                                <form method="get" id="programFilterForm" action="{{ route('programs') }}">
                                    <input type="hidden" name="filter_category" id="filter_category"
                                        value="@php
                                            if (isset($category_ids)) {
                                                echo implode(',', $category_ids);
                                            } else {
                                                echo '';
                                            }
                                        @endphp">
                                    <input type="hidden" name="filter_price" id="filter_price" value="@php
                                        if (isset($price_ids)) {
                                            echo implode(',', $price_ids);
                                        } else {
                                            echo '';
                                        }
                                    @endphp">

                                    <input type="hidden" name="filter_rating" id="filter_rating" value="@php
                                        if (isset($filter_rating)) {
                                            echo implode(',', $filter_rating);
                                        } else {
                                            echo '';
                                        }
                                    @endphp">


                                    <input type="submit" class="Apply-Filter" value="Apply Filter" name="submit" />
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="coaches-list">
        <div class="container">
            <div class="coaches-list-heading">
                <h6> Programs {{ @$program }} </h6>
               {{--  <p><i class="fa fa-heart" aria-hidden="true"></i> SAVED</p>
                <div class="select-box" data-aos="fade-down">
                    <i class="fa fa-angle-down select-down" aria-hidden="true"></i>
                    <select class="custom-select-box custom-select-md filter-select">
                        <option selected>SORT BY</option>
                        <option value="1">SORT BY</option>
                    </select>
                </div>--}}

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @forelse ( $programs as $item)
                <div class="col-md-4">



                    <div class="program-one">

                        <div class="button-section">
                            <input type="hidden" id="program_id" value="{{ @$item['id'] }}">
                            <input type="hidden" id="coach_id" value="{{ @$item['user_id'] }}">
                            <input type="hidden" id="user_id"
                                value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
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
                                    @if(!empty(Auth::id()))
                                    <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>

                                @else
                                    <a href="{{route('login')}}"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span></a>

                                @endif
                                @endif
                        </div>
                        <a href="{{ route('program-detail', $item->id) }}">
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
                                    
                                    <?php $reviewDetail = $item->getReviewAndRatingDetail($item['id']); ?>
                                    <p class="review-rate">
                                    <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] :0}}" data-rateyo-num-stars="5"></div>
                                    </div>

                                    ({{ count(@$reviewDetail['review_list']) }} Reviews)</p>
                                </div>
                                <h3>{{ ucfirst(@$item['program_name']) }}</h3>
                                <p>{{ ucfirst(@$item['short_description']) }}</p>
                            </div>
                        </a>
                    </div>

                </div>

            @empty
                <div class="blank-para">No Data Found!!</div>
            @endforelse

        </div>
    </div>

    </section>

    <!-- start pagination -->


    {{-- <nav aria-label="Page navigation example">
         <ul class="pagination">
            {{ $programs->links()}}
        </ul>
        </nav> --}}
    <div class="d-flex justify-content-center">

        {{ $programs->links() }}

    </div>


    <!-- coaches banner area end here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var show_filter = '{{ $show_filter ?? '' }}';
            var show = false;
            if (show_filter === 'show') {
                $('#collapseExample_show').slideDown(1000);
                show = true;
                $('#ShowToggle').html('- Hide Filters');
                $('html, body').animate({
                    scrollTop: $("#dynamictabstrp").offset().top + 500
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
            $(function() {
                $(".rateyo").rateYo({
                    readOnly: true,
                    starWidth: "18px",
                    spacing: "2px",
                });
            });
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
                            '<span class="view-save-bt-red remove_from_wishlist"><i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>'
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
                            '<span class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>'
                        );

                    }
                });
            });

        });


        $(document).ready(function() {
            var checkFilterApply =
                "{{ isset($_GET['filter_category']) || isset($_GET['filter_price']) ? $_GET['filter_category'] . $_GET['filter_price'] : '' }}";
            if (checkFilterApply != "") {
                $("#show_filter").trigger("click");
            }
            //category search
            $("#categorySearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#categoryItem label").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            //get array of category Ids
            $(".category").change(function() {
                var categoryArray = [];
                var token = "{{ csrf_token() }}";
                $("input:checkbox[name=category]:checked").each(function() {
                    categoryArray.push($(this).val());
                });
                $('#filter_category').val(categoryArray);
            });
            //get array of price Ids
            $(".price").change(function() {
                var thisPriceData = $(this);

                if (thisPriceData.is(":checked")) {

                    $('#filter_price').val($(this).val());
                    var group = "input:checkbox[name='" + thisPriceData.attr("name") + "']";
                    $(group).prop("checked", false);
                    thisPriceData.prop("checked", true);
                } else {
                    $('#filter_price').val('');
                    thisPriceData.prop("checked", false);
                }
            });
            $(".rating").change(function() {
                var categoryArray = [];
                var token = "{{ csrf_token() }}";
                $("input:checkbox[name=rating]:checked").each(function() {
                    categoryArray.push($(this).val());
                });
                $('#filter_rating').val(categoryArray);
            });
        });

    </script>
@endsection
