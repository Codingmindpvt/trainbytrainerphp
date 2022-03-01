@extends('layouts.guest')
@section('content')
<!--fill information section start area here -->
	<section class="fill-information-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Fill information below</h3>
						<form class="form">
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
    								<a href="get-started.html" class="blue-btn outline oswald-font">Back</a>
    							</aside>
    							<aside class="col-6">
    								<a href="create-profile -1.html" class="blue-btn oswald-font">Next</a>
    							</aside>
  							</div>
  							 <div class="form-check agree-checkbox">
							    <label class="custom-check">
								  	<input type="checkbox">
								  	<span class="checkmark"></span>
								</label>
							    <p>I read and agree to <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</p>
							 </div>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--fill information end area here -->  
  @endsection