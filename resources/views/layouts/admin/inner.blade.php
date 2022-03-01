<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		 <meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Train By Trainer - Dashboard</title>
		<link rel="shortcut icon" href="{{asset('public/images/favicon.ico') }}" type="image/x-icon">
		<link href="{{asset('public/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{asset('public/vendor/mckenziearts/laravel-notify/css/notify.css') }}">
		<link href="{{asset('public/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('public/admin/css/font-awesome.css') }}" type="text/css" />
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
			<script src="js/respond.js"></script>
		<![endif]-->
	</head>
<body>
<div class="main-page">
@include('layouts.admin.header')

@include('layouts.admin.sidebar')

@yield('content')

@include('layouts.admin.footer')
</div>
<!-- end content area here -->

</div>
<script src="{{asset('public/admin/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('public/admin/js/jquery.validate.min.js') }}"></script>
<script src="{{asset('public/admin/js/additional-methods.min.js') }}"></script>
<script src="{{asset('public/admin/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{asset('public/admin/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
@include('notify::components.notify')

<x:notify-messages />
<script src="{{asset('public/vendor/mckenziearts/laravel-notify/js/notify.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=API_KEY&libraries=places"></script>
<script src="{{asset('public/admin/js/admin-custom.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".menu_bar").click(function(){
			$(".left_sidebar").toggleClass("active");
		});
	});

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

</script>
</body>
</html>
