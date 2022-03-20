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
if (isset($_GET['sort_by'])) {
$filter_sort_by = $_GET['sort_by'] ?? "";
//$show_filter = 'show';
}
@endphp
<section class="coaches-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h5>Best classes for your growth.</h5>
                <h1>Find Your Fitness Classes</h1>
            </div>
            <div class="col-md-5 text-right">
                <img src="{{url('/')}}/public/images/coaches.png" alt="coach" class="img-fluid">
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
                                        class="custom-control-input category" id="{{ 'category_' . $category['id'] }}"
                                        @php if (isset($category_ids) && in_array($category['id'], $category_ids)) {
                                        echo 'checked' ; } else { echo '' ; } @endphp>
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
                                        id="price_1" @php if (isset($price_ids) && in_array('0-100', $price_ids)) {
                                        echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="price_1">€0.00 - €100.00</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" value="100+" name="price" class="custom-control-input price"
                                        id="price_id_2" @php if (isset($price_ids) && in_array('100+', $price_ids)) {
                                        echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="price_id_2">€100.00 and above</label>
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
                                        value="5" name="rating" @php if (isset($filter_rating) && in_array('5',
                                        $filter_rating)) { echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="customCheckBox1">5 Stars</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input rating" id="customCheckBox2"
                                        value="4" name="rating" @php if (isset($filter_rating) && in_array('4',
                                        $filter_rating)) { echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="customCheckBox2">4 Stars</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input rating" id="customCheckBox3"
                                        value="3" name="rating" @php if (isset($filter_rating) && in_array('3',
                                        $filter_rating)) { echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="customCheckBox3">3 Stars</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input rating" id="customCheckBox4"
                                        value="2" name="rating" @php if (isset($filter_rating) && in_array('2',
                                        $filter_rating)) { echo 'checked' ; } else { echo '' ; } @endphp>
                                    <label class="custom-control-label" for="customCheckBox4">2 Stars</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input rating" id="customCheckBox5"
                                        value="1" name="rating" @php if (isset($filter_rating) && in_array('1',
                                        $filter_rating)) { echo 'checked' ; } else { echo '' ; } @endphp>
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
                        <li class="Clear-Filter"><a href="{{ route('classes') }}">Clear Filter</a></li>
                        &nbsp;&nbsp;&nbsp;
                        <li>
                            <form method="get" id="programFilterForm" action="{{ route('classes') }}">
                                <input type="hidden" name="filter_category" id="filter_category" value="@php
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
                                <input type="hidden" name="sort_by" id="filter_sort_by" value="@php
                                        if (isset($filter_sort_by)) {
                                            echo $filter_sort_by;
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
            <h6>{{count($classes)}} Classes</h6>
            <div class="select-box" data-aos="fade-down">
                <form action="{{ route('classes') }}" method="GET" id="sortingForm">
                    <i class="fa fa-angle-down select-down" aria-hidden="true"></i>
                    <select class="custom-select-box custom-select-md filter-select sort_by" name="sort_by">
                        <option value="">SORT BY</option>
                        <option value="HL">Price - High to Low</option>
                        <option value="LH">Price - Low to High</option>
                        <option value="MR">Most Reviewed</option>
                    </select>
                </form>
            </div>
        </div>
</section>




<div class="container">
    <div class="row">
        @isset($classes)

        @forelse( $classes as $class)
        <?Php
                // print_r($class);
               //  die();
                ?>

        <div class="col-md-4">

            <div class="program-one new-one-program">
                <div class="barbell-image button-section">
                    <input type="hidden" id="class_id" value="{{ @$class['id'] }}">
                    <input type="hidden" id="coach_id" value="{{ @$class['program_user']['id'] }}">
                    <input type="hidden" id="user_id"
                        value="{{ Auth::check() && !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                    <input type="hidden" id="type" value="CL">
                    @if (Auth::check() && Auth::user()->id)
                    @if (@$class['program_user']->getClassWishList(@$class['id']))
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
                    <a href="{{route('login')}}"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span></a>

                    @endif
                    @endif
                    <a href="{{url('classes/classes-detail')}}/{{$class->id}}">
                        @if(isset($class->image) && !empty($class->image))
                        <img src="{{asset('public/class/'.$class->image)}}" alt="gorw">
                        @else
                        <img src="{{asset('public/images/default-banner.png')}}" alt="class">
                        @endif

                </div>
                <div class="barberll-content">
                    <div class="doller-review">
                        <h4>{{(isset($class->price) && !empty($class->price)) ? DEFAULT_CURRENCY.$class->price : "-----"}}
                            <span class="session-text">/session</span>
                        </h4>
                        <p class="session-time"> </p>
                    </div>
                    <h3>{{(isset($class->name) && !empty($class->name)) ? $class->name : "-----"}}</h3>
                    <h6>CREATED BY:
                        {{ (isset($class['program_user']['first_name']) && !empty($class['program_user']['first_name'])) ? strtoupper(@$class['program_user']['first_name'] . ' ' . @$class['program_user']['last_name']) : "-----"}}
                    </h6>
                    <p class="address-txt"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->address}}</p>
                    <p>{{$class->description}}</p>
                    <input type="hidden" name="category_id" value="{{$class->category_id}}">
                    <input type="hidden" name="created_by" value="{{$class->created_by}}">

                    <input type="hidden" id="type" value="">


                    <input type="hidden" id="class_id" value="{{$class->category_id}}">


                </div>

            </div>
            </a>

        </div>
        @empty
        <p class="blank-para">No data found!</p>
        @endforelse


        @endisset


    </div>
</div>
</section>

{{ $classes->links() }}
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


<!-- coaches banner area end here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('change', '.sort_by', function() {
        var thisData = $(this).val();
        $("#filter_sort_by").val(thisData);
        $("#sortingForm").submit();
    });


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
$(document).ready(function() {

    var show_filter = '{{ $show_filter ?? '
    ' }}';
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


        }
    })

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