@extends('layouts.guest')
@section('content')
<!-- coaches banner area start here -->
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
        <p data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">+ Show Filters</p>
    </div>
</div>

<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <section class="filerts box-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="category-filter">
                            <div class="cat-head">
                                <h5>Category</h5>
                                <input type="search" id="form1" class="form-control" placeholder="search"
                                    aria-label="Search" />
                            </div>
                            <hr>
                            <div class="all-filter all-filter-height-box">
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Weight Loss</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Muscle Gain</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Body Building</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Cycling</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Yoga</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Swimming</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Suppliments</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Powerlifting</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Boxing</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Strength &
                                        Conditioning</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Crossfit</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Barre</label>
                                </div>
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
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">$0.00 - $100.00</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">$100.00 and above</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr class="my-4">
                <div class="add-filter">
                    <ul>
                        <li>Weight Loss <i class="fa fa-times" aria-hidden="true"></i></li>
                        <li>$100.00 and above <i class="fa fa-times" aria-hidden="true"></i></li>
                        <li class="Clear-Filter">Clear Filter</i></li>
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
            <p><i class="fa fa-heart" aria-hidden="true"></i> SAVED</p>
            <div class="select-box" data-aos="fade-down">
                <i class="fa fa-angle-down select-down" aria-hidden="true"></i>
                <select class="custom-select-box custom-select-md filter-select">
                    <option selected>SORT BY</option>
                    <option value="1">SORT BY</option>
                </select>
            </div>
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
                    </a>
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
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->address}}</p>
                    <p>{{$class->description}}</p>
                    <input type="hidden" name="category_id" value="{{$class->category_id}}">
                    <input type="hidden" name="created_by" value="{{$class->created_by}}">

                    <input type="hidden" id="type" value="">


                    <input type="hidden" id="class_id" value="{{$class->category_id}}">


                </div>
            </div>


        </div>
        @empty
        <p class="blank-para">No data found!</p>
        @endforelse


        @endisset


        <!--  <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="{{url('classes-detail')}}/2"><img src="{{url('/')}}/public/images/class2.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                                <input type="hidden" id="class_id" value="1">
                            <input type="hidden" id="coach_id" value="2">
                            <input type="hidden" id="user_id"
                                value="3">
                            <input type="hidden" id="type" value="cl">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class3.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class1.png" alt="gym"></a></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class2.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class3.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class1.png" alt="gym"></a></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="grow.html"><img src="{{url('/')}}/public/images/class2.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="program-one new-one-program">
                        <div class="barbell-image">
                            <a href="{{url('classes-detail')}}"><img src="{{url('/')}}/public/images/class3.png" alt="gym"></a>
                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>$10 <span class="session-text">/session</span></h4>
                                <p class="session-time"> 6:00 AM - 10:00 PM</p>
                            </div>
                            <h3>1111111HOW CAN GROW FROM ZERO TO HERO</h3>
                            <h6>By- Steven Topalovic</h6>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  California, USA</p>
                            <p>Have access to a barbell and want to make the
                                most of it? There are so many workouts you can
                                do...</p>
                        </div>
                    </div>
                </div>
-->
    </div>
</div>
</section>


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
