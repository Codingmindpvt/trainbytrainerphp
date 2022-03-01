@extends('layouts.guest')
@section('content')
<!--forgot password section start area here -->
	<section class="forgot-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Forgot password?</h3>
						<p>Enter the email address associated with your account and we’ll send you a link to reset your password.</p>
						<form class="form">
							<div class="form-group">
    							<label for="">Email Address</label>
    							<input type="email" class="form-control form-input" id="" placeholder="Enter Email Address">
  							</div>
  							<div class="form-group">
    							<a href="{{ route('login') }}" class="blue-btn oswald-font">Continue</a>
  							</div>
						</form>
						<p class="frm-para">Back to <a href="{{ route('login') }}">Sign In</a></p>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--forgot password section end area here -->
 @endsection
