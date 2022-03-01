@extends('layouts.guest')
@section('content')
        <!-- whishlist-section start here -->
        <section class="blog-page-banner">
            <div class="whishlist-title">
                <h2>OUR BLOGS</h2>
                <h6>FITNESS RALATED TALKS FROM TRAIN BY TRAINERS</h6>
            </div>   
        </section>



        <!-- blog page slider area start -->
        <section class="blog-slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Swiper -->
                        <div class="swiper mySwiper blog-box">
                            <div class="swiper-wrapper">
                                @forelse($blogList as $blog)
                                <div class="swiper-slide blog-slide-image">
                                    @if(!empty(@$blog->image_file))
                                        <img src="{{asset('public/'.@$blog->image_file) }}"/>
                                     @else
                                        <img src="{{asset('public/images/default-banner.png') }}"/>
                                     @endif
                                    <div class="blog-slider-content">
                                        <p>{{$blog['category']['title']}}   |   {{date_format(date_create($blog['created_at']),"M d, Y")}}</p>
                                        <h2>{{$blog['title']}}</h2>
                                            <p>{{$blog['description']}}</p>
                                            <a href="{{route('blog-detail',$blog['id'])}}">Read More.</a>
                                    </div>
                                </div>
                                @empty
                                 <div class="swiper-slide blog-slide-image">
                                    <img src="{{asset('public/images/default-banner.png') }}"></div>
                                @endforelse
                            </div>
                            <div class="swiper-button-next blog-bt-slide"></div>
                            <div class="swiper-button-prev blog-bt-slide"></div>
                        </div>
                        <!-- Swiper end-->
                    </div>
                    <div class="col-md-4">
                            <!-- <div class="blog-category-search">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SEARCH</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search posts here">
                                    <button type="submit" class="btn btn-primary">SEARCH</button>
                                  </div>
                            </div> -->
                            <div class="blog-category-search mt-4 pb-0  ">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CATEGORIES</label>
                                   <ul>
                                    @forelse($categoryList as $category)
                                       <li> <a href="{{route('blog-detail-by-category',$category['id'])}}">{{$category['title']}}</a></li>
                                    @empty
                                    <p class="blank-para">No Data Found!!</p>
                                    @endforelse
                                   </ul>
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog page slider area end -->

        <!-- blog list area start -->
        <section class="blog-list-area">
            <div class="container">
                <div class="row">
                    @forelse($blogList as $blog)
                    <div class="col-md-4">
                        <div class="blog-list-one">
                            <div class="blog-img">
                                @if(!empty(@$blog->image_file))
                                    <img src="{{asset('public/'.@$blog->image_file) }}"/>
                                 @else
                                    <img src="{{asset('public/images/default-banner.png') }}"/>
                                 @endif
                            </div>
                            <div class="blog-img-content">
                                <h4>{{$blog['title']}}</h4>
                                <h6>{{$blog['category']['title']}}   |   {{date_format(date_create($blog['created_at']),"M d, Y")}}</h6>
                                <p>{{$blog['description']}}</p>
                                    <p class="text-center"><a href="{{route('blog-detail',$blog['id'])}}">READ MORE</a></p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="blank-para">No Data Found!!</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- blog list area end -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />  
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>      
<script> 
 var owl = $('.screenshot_slider').owlCarousel({
    loop: true,
    responsiveClass: true,
    nav: true,
    margin: 0,  
    autoplayTimeout: 4000,
    smartSpeed: 400,
    center: true,
    navText:['<img src="images/left-arrow.png">', '<img src="images/right-arrow.png">'],
    responsive: {
        0: {
            items: 1,
            center: false
        },
        767: {
            items: 1,
            center: false
        },
        991: {
            items: 2,
            center: false
        },
        1200: {
            items: 3
        }
    }
});

 $("#mobile-view-search").click(function() {
     $(".header-search-input").slideToggle();
 });

/****************************/

jQuery(document.documentElement).keydown(function (event) {    

    // var owl = jQuery("#carousel");

    // handle cursor keys
    if (event.keyCode == 37) {
       // go left
      owl.trigger('prev.owl.carousel', [400]);
      //owl.trigger('owl.prev');
    } else if (event.keyCode == 39) {
       // go right
        owl.trigger('next.owl.carousel', [400]);
       //owl.trigger('owl.next');
    }

});
 $("#country_selector").countrySelect({
      defaultCountry:"us"
});

</script>
<script>
    var swiper = new Swiper(".mySwiper.blog-box", {
      slidesPerView: "auto",
     
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
  </script>
 @endsection