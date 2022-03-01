@extends('layouts.guest')
@section('content')

<form id="msform">
<fieldset>
<section class="getstarted-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Get started with us</h3>
							<div class="form-group">
    							<label for="">Account Type</label>
    							<div class="coach-choice" id="coach">
    								<input type="radio" id="show" class="radio" name="check" checked="">
    								<p class="form-input text-left">Find a coach or program </p>
    							</div>
  							</div>
  							<div class="form-group">
  								<div class="coach-choice" id="become">
  									<input type="radio" id="hide" class="radio mt-2" name="check">
    								<p class="form-input text-left">Become a coach</p>
    							</div>
  							</div>
  							<div id="p" class="form-group sign-up">
    							<label for="">Sign Up As</label>
    							<div class="personal-gp row">
                      <div class="col-sm-6">
          								<div class="coach-choice">
          									<input type="radio" id="" class="radio" name="check-user">
          									<p class="form-input text-left">Personal</p>
          								</div>
                      </div>
                      <div class="col-sm-6">
        								<div class="coach-choice">
    										    <input type="radio" id="" class="radio" name="check-user">
        									 <p class="form-input text-left">Business</p>
        								</div>
                      </div>
    							</div>
  							</div>
  							<div class="form-group">
    							<label for="">Email address</label>
    							<input type="email" class="form-control form-input" id="" placeholder="E.g. adam_smith007@gmail.com">
  							</div>
  							<div class="form-group">
    							<a href="" class="next action-button blue-btn oswald-font" id="user-next-btn">next</a>
                  <a href="fill-information-1.html" class="blue-btn oswald-font" id="coach-next-btn" style="display: none;">next</a>
  							</div>
  							<p class="or sign-up">OR SIGN UP USING</p>
  							<div class="form-group my-3 sign-up">
                  <div class="row">
                    <div class="col-6">
                      <a href="#" class="fb"><i class="fa fa-facebook mx-1" aria-hidden="true"></i> Facebook</a>
                    </div>
                    <div class="col-6">
                      <a href="#" class="google"><i class="fa fa-google mx-1" aria-hidden="true"></i> Google</a>
                    </div>
                  </div>
                </div>
						<p class="frm-para">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
					</div>
				</aside>
			</div>
		</div>
	</section>
</fieldset>
<!--fill information section start area here -->
<fieldset>
	<section class="fill-information-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Fill information below</h3>
							<div class="form-group row">
								<div class="col-sm-6">
    								<label for="">First Name</label>
    								<input type="email" class="form-control form-input" id="" placeholder="E.g. Adam">
    							</div>
    							<div class="col-sm-6">
    								<label for="">Last Name</label>
    								<input type="email" class="form-control form-input" id="" placeholder="E.g. Smith">
    							</div>
  							</div>
  							<div class="form-group">
    							<label for="">Create Password</label>
    							<input type="password" class="form-control form-input" id="" placeholder="Create a Secure Password">
  							</div>
  							<div class="form-group">
    							<label for="">Confirm Password</label>
    							<input type="password" class="form-control form-input" id="" placeholder="Re-enter Your Secure Password">
  							</div>
  							<div class="form-group">
    							<label for="">Country</label>
    							<div class="form-select">
    							<select class="form-input" id="exampleFormControlSelect1">
								      <option>USA</option>
								      <option>INDIA</option>
								      <option>PAKISTAN</option>
								      <option>MAXICO</option>
								      <option>JAPAN</option>
							    </select>
							    </div>
  							</div>
  							<div class="form-group row">
  								<aside class="col-6">
    								<a href="{{ route('singup') }}" class="blue-btn outline oswald-font">Back</a>
    							</aside>
    							<aside class="col-6">
    								<a href="{{ route('create-profile') }}" class="next action-button blue-btn oswald-font">Next</a>
    							</aside>
  							</div>
  							 <div class="form-check agree-checkbox">
							    <label class="custom-check">
								  	<input type="checkbox">
								  	<span class="checkmark"></span>
								</label>
							    <p>I read and agree to <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</p>
							 </div>
					</div>
				</aside>
			</div>
		</div>
	</section>
</fieldset>
<fieldset>
	<section class="profile-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Hi, <span class="green-text">Adam Smith</span></h3>
						<p class="mt-3"><b>Last Step!</b> Setup your profile information.</p>
							<div class="form-group upload-profile">
								<input type="file" class="" id="" placeholder="E.g. Adam">
  							</div>
  							<p>Upload profile picture (optional)</p>
  							<div class="form-group mt-3">
    							<label for="">Phone Number</label>
    							<div class="phone-code-selected">
    								<input type="text" class="form-control form-input" id="" placeholder="Enter Phone Number">
    								<span class="phone-code">+1</span>
    							</div>
  							</div>
  							<h4 class="oswald-font blue-text normal-font">Billing Address</h4>
  							<div class="form-group">
    							<label for="">Address</label>
    							<input type="text" class="form-control form-input" id="" placeholder="E.g. 202 Main Town, Dolphin Chowk">
  							</div>
  							<div class="form-group row">
  								<aside class="col-sm-6">
  									<label for="">City</label>
    								<input type="text" class="form-control form-input" id="" placeholder="E.g. Los Angeles">
  								</aside>
  								<aside class="col-sm-6">
  								<label for="">State</label>
    							<div class="form-select">
	    							<select class="form-input" id="exampleFormControlSelect1">
									      <option>Select</option>
								    </select>
							    </div>
  								</aside>
  							</div>
  							<div class="form-group row">
  								<aside class="col-sm-6">
  									<label for="">Postal Code</label>
    								<input type="text" class="form-control form-input" id="" placeholder="E.g. 90001">
  								</aside>
  								<aside class="col-sm-6">
  								<label for="">Country</label>
    							<div class="form-select">
	    							<select class="form-input" id="exampleFormControlSelect1">
									      <option>Select</option>
									      <option>USA</option>
									      <option>CANADA</option>
									      <option>INDIA</option>
								    </select>
							    </div>
  								</aside>
  							</div>
  							<div class="form-group row mt-4">
  								<aside class="col-6">
    								<a href="{{ route('fill-information') }}" class="previous action-button blue-btn outline oswald-font">Back</a>
    							</aside>
    							<aside class="col-6">
    								<a href="{{ route('dashboard') }}" class="submit action-button blue-btn oswald-font">Submit</a>
    							</aside>
  							</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
</fieldset>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

</script>
<!--fill information end area here -->
  @endsection
