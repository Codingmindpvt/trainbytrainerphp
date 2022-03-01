@extends('layouts.admin.outer')
@section('content')
	<div class="container">
		<div class="logo_header text-center">
			<a href="#"><img src="images/logo.png" alt="" /></a>
		</div>
		<div class="login_form_outer">
			<div class="login_form">
				<h2>Forgot Password?</h2>
				<p>Enter your email or username. We’ll email instructions on how to reset your password</p>
				<div class="form-group">
					<label>Username or Email</label>
					<input type="text" value="" placeholder="" class="form-control" />
				</div>
				<button type="submit" class="blue_btn">Submit</button>
			</div>
			<img src="images/shadow.png" alt="" class="shadow" />
		</div>
	</div>
@endsection
