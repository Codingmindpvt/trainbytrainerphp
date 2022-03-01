@extends('layouts.guest')
@section('content')
<!--profile section start area here-->
	<section class="profile-section">
		<div class="container">
			<div class="row justify-content-center">
				<aside class="col-lg-6">
					<div class="form-box">
						<h3 class="oswald-font text-center">Hi, <span class="green-text">Adam Smith</span></h3>
						<p class="mt-3"><b>Last Step!</b> Setup your profile information.</p>
						<form class="form">
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
    								<a href="fill-information.html" class="blue-btn outline oswald-font">Back</a>
    							</aside>
    							<aside class="col-6">
    								<a href="marketplace-dashboard.html" class="blue-btn oswald-font">Submit</a>
    							</aside>
  							</div>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</section>
<!--profile end area here -->  
 @endsection