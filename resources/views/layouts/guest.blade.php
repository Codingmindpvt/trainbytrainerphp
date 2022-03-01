<!doctype html>
<html lang="en">
   <head>
      <title>Train By Trainer</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="shortcut icon" href="{{asset('public/images/favicon.ico') }}" type="image/x-icon">
      <link rel="stylesheet" href="{{asset('public/css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/bootstrap-multiselect.css') }}">
	  <link rel="stylesheet" href="{{asset('public/css/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/owl.theme.default.css') }}">
      <link rel="stylesheet" href="{{asset('public/vendor/mckenziearts/laravel-notify/css/notify.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/style.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/image-uploader.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/css/countrySelect.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/aos.css') }}">
      <link href="{{asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('public/css/material-icons.css') }}">
      <link rel="stylesheet" href="{{asset('public/css/bootstrap-datepicker.css') }}">
      <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="{{asset('public/css/jquery.rateyo.min.css')}}">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
      <!-- Review rating css-->
      <style>




.rating-css div {
  color: #ffe400;
  font-size: 30px;
  font-family: sans-serif;
  font-weight: 800;
  text-align: center;
  text-transform: uppercase;
  padding: 20px 0;
}
.rating-css input {
  display: none;
}
.rating-css input + label {
  font-size: 30px;
  text-shadow: 1px 1px 0 #ffe400;
  cursor: pointer;
}
.rating-css input:checked + label ~ label {
  color: #838383;
}
.rating-css label:active {
  transform: scale(0.8);
  transition: 0.3s ease;
}
/*This is my youtube channel link*/


  </style>
    <script>
        var app_url = "{{ env('APP_URL') }}"
    </script>
      <!-- Review rating css-->

   </head>
<body>

  <!--start header -->
  @include('layouts.header')
  <!--end header -->

  @yield('content')

  <!--start footer -->
  @include('layouts.footer')
  <!--end footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="{{asset('public/js/popper.min.js') }}"></script>
 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdsjb_RUMEkFt5eBE1iyaHrY-FVEiyMSI&callback=initMap&libraries=places">
    </script>
<script src="{{asset('public/js/jquery.validate.min.js') }}"></script>
<script src="{{asset('public/js/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{asset('public/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{asset('public/js/aos.js') }}"></script>
<script src="{{asset('public/js/owl.carousel.js') }}"></script>
<script src="{{asset('public/js/countrySelect.js') }}"></script>
@include('notify::components.notify')

<x:notify-messages />
<script src="{{asset('public/vendor/mckenziearts/laravel-notify/js/notify.js') }}"></script>
<script src="{{asset('public/js/bootstrap-multiselect.js') }}"></script>
<script src="{{asset('public/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/js/backend.js') }}"></script>
<script src="{{asset('public/js/spartan-multi-image-picker.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('public/js/jquery.rateyo.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> -->

@yield('scripts')
<script>



/********************************/

    /* Swal Popup */

/********************************/
	function SwalOverlayColor() {
   setTimeout(function() {
   	$(".swal-modal").css({
         "font-family": "'Oswald', sans-serif"
      });
      $(".swal-button").css({
         "background-color": '#21ccac'
      });
      $(".swal-title").css({
         "color": '#474646',
         "font-family": "'Oswald', sans-serif"
      });
   }, 200);
}

/****************************************************/

    /* Coming Soon Alert */

/***************************************************/
$(".coming_soon").click(function(){
  SwalOverlayColor();
  swal("Message","WE ARE COMING SOON..");
});


/********************************/

    /* Fixed Header */

/********************************/
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("fixed_header");
	var sticky = header.offsetTop;

	function myFunction() {
	  if (window.pageYOffset-500 > sticky) {
	    header.classList.add("sticky");
	  } else {
	    header.classList.remove("sticky");
	  }
	}
/********************************/

    /* owlCarousel */

/********************************/
	 var owl = $('.screenshot_slider').owlCarousel({
	    loop: true,
	    responsiveClass: true,
	    nav: true,
	    margin: 0,
	    autoplayTimeout: 4000,
	    smartSpeed: 400,
	    center: true,
	    navText:['<img src="public/images/left-arrow.png">', '<img src="public/images/right-arrow.png">'],
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
	AOS.init({
	  duration: 1200,
	})
	 $("#country_selector").countrySelect({
  		defaultCountry:"us"
	});
    $(document).ready(function(){
        $("#hide").click(function(){
          $("#p").hide();
          $("#social-login").hide();
        });
        $("#show").click(function(){
          $("#p").show();
           $("#social-login").show();
        });
      });
  </script>

  <script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
    }
    </script>
    <script>
    function onlyNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
  	  return true;
	}
    </script>
    <script type="text/javascript">
    var selector = '.coach-result-tab li a';

        $(selector).on('click', function(){
            $(selector).removeClass('active');
            $(this).addClass('active');
        });



/********************************/

    /* loader */

/********************************/
document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#web-loader").style.visibility = "visible";
    } else {
        document.querySelector("#web-loader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
};


/****************************************************/

    /* tooltip */

/***************************************************/
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
   </body>
</html>

