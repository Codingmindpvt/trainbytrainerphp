@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">

        <div class="user-name-tag text-center m-5">
        <h1>Hi, {{ucwords(@$user->first_name." ".@$user->last_name)}} !</h1>
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
                    <h6>Program Review LIst</h6>
                   
                    @forelse($programReviewlist as $coachReview)
                    <div class="my-review-main">
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
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$coachReview['star']) ? @$coachReview['star'] : 0}}" data-rateyo-num-stars="5"></div>
                                    </div>
                              </p>
                               <h6 class="mb-2">{{@$coachReview['title']}}</h6>
                               <p>{{@$coachReview['description']}}<a href=""> Show Less</a></p>

                            </div>
                        </div>
                        <div class="purchase-date">
                            <p>Purchased on:</p>
                            <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                        </div>
                    </div>

                    @empty
                    <p class="blank-para">No Data Found!</p>
                    @endforelse


                    <!-- //////////////////////////// -->
                    <hr>
                    <h6>Classes Review LIst</h6>
                    @forelse($classReviewlist as $coachReview)
                    
                    <div class="my-review-main">
                        <div class="image-product-tb review-page-box">
                            @if(!empty(@$coachReview['coach']['profile_image']))
                            <img src="{{asset('public/'.@$coachReview['coach']['profile_image'])}}" alt="">
                            @else
                            <img src="{{asset('public/images/default-image.png')}}" alt="">
                            @endif
                            <div>
                                <h3>{{@$coachReview['class']['first_name']}}edddddd</h3>
                                <p>{{@$coachReview['class']['address']}}</p>
                                <p class="review-rate">

                                <div class="rating">
                                        <div class="rateyo" data-rateyo-rating="{{!empty(@$coachReview['star']) ? @$coachReview['star'] : 0}}" data-rateyo-num-stars="5"></div>
                                    </div>
                                <!-- @switch(@$coachReview['star'])
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
                                Default case...
                                @endswitch -->
                              </p>
                               <h6 class="mb-2">{{@$coachReview['title']}}</h6>
                               <p>{{@$coachReview['description']}}<a href=""> Show Less</a></p>

                            </div>
                        </div>
                        <div class="purchase-date">
                            <p>Purchased on:</p>
                            <p class="mb-3">Oct 4, 2021  10:01 AM</p>
                        </div>
                    </div>

                    @empty
                    <p class="blank-para">No Data Found!</p>
                    @endforelse

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
