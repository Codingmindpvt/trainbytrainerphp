<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		 <meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Train By Trainer - Admin Login</title>
		<link rel="shortcut icon" href="{{asset('public/images/favicon.ico') }}" type="image/x-icon">
		<link href="{{asset('public/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{asset('public/vendor/mckenziearts/laravel-notify/css/notify.css') }}">
		<link href="{{asset('public/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('public/admin/css/font-awesome.css') }}" type="text/css" />
		<!--[if lt IE 9]>
			<script src="public/js/html5shiv.js"></script>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
			<script src="public/js/respond.js"></script>
            <script src="public/js/admin.js"></script>
		<![endif]-->
	</head>
<body>

	@yield('content')

<script src="{{asset('public/admin/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('public/admin/js/bootstrap.js') }}" type="text/javascript"></script>
@include('notify::components.notify')
<x:notify-messages />
<script src="{{asset('public/vendor/mckenziearts/laravel-notify/js/notify.js') }}"></script>
<script src="{{asset('public/admin/js/admin-custom.js') }}" type="text/javascript"></script>
</body>
</html>
