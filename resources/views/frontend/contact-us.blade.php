@extends('layouts.guest')
@section('content')
<!--start banner area here -->
	<div class="contact-banner" style="background: url(./images/contact-b.png) no-repeat; background-size: cover; background-position: center;">
		<div class="blue-overlay">
			<div class="container">
				<div class="main-heading oswald-font text-center">
					<h2>Contact us</h2>
					<p class="text-light">for all enquiries, please email us using the form below</p>
				</div>
			</div>
		</div> 
	</div>
<!--end banner area here -->

<!--start form area here -->
	<section class="form-section">
		<div class="container">
			<div class="row">
				<aside class="col-md-6">
					<div class="form-box">
						<form class="form">
							<h3 class="oswald-font mb-4">Feel free to ask any query!</h3>
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
    							<label for="">Phone</label>
    							<input type="text" class="form-control form-input" id="" placeholder="Enter Phone Number">
  							</div>
  							<div class="form-group">
    							<label for="">Email</label>
    							<input type="email" class="form-control form-input" id="" placeholder="E.g. adam_smith007@gmail.com">
  							</div>
  							<div class="form-group">
    							<label for="">Who are You?</label>
    							<div class="form-select">
    							<select class="form-input" id="exampleFormControlSelect1">
								      <option>Who are you?</option>
								      <option>What kind choose.</option>
							    </select>
							    </div>
  							</div>
  							<div class="form-group">
    							<label for="">Zip</label>
    							<input type="text" class="form-control form-input" id="" placeholder="E.g. adam_smith007@gmail.com">
  							</div>
  							<div class="form-group">
    							<label for="">Message</label>
    							<textarea class="form-control value form-input value" id="" rows="3" placeholder="Your Comment"></textarea>
  							</div>
  							<div class="form-group">
    							<a href="create-profile.html" class="blue-btn oswald-font">Send</a>
  							</div>
						</form>
					</div>
				</aside>
				<aside class="col-md-6">
					<div class="contact-info">
						<div class="contact-icon">
							<img src="public/images/Calling.png" alt="call">
						</div>
						<div class="contact-cnt">
							<h4 class="oswald-font mb-2">Phone number</h4>
							<p>+81 (455) 76 76 519</p>
							<p>+81 (455) 76 76 519</p>
						</div>
					</div>
					<div class="contact-info">
						<div class="contact-icon">
							<img src="public/images/Message.png" alt="call">
						</div>
						<div class="contact-cnt">
							<h4 class="oswald-font mb-2">Email address</h4>
							<p>info@trainbytrainer.com</p>
							<p>trainbytrainer@gmail.com</p>
						</div>
					</div>
					<div class="contact-info">
						<div class="contact-icon">
							<img src="public/images/Location.png" alt="call">
						</div>
						<div class="contact-cnt">
							<h4 class="oswald-font mb-2">office address</h4>
							<p>19/A Cirikol City hall Tower</p>
							<p>New york</p>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--end form area here -->

<!--start real trainer area here-->
	<section class="real-trainer common-section">
		<div class="container">
			<h1>Real Trainers. Real Results.</h1>
			<h2>Start today.<br>Do anywhere.</h2>
			<a href="#" class="green-btn">Find Your Coach</a>
			<a href="#" class="green-btn white-btn">Become a Coach</a>
		</div>
	</section>
<!--ends real trainer area here-->
@endsection