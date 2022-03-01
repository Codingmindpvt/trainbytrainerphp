@extends('layouts.guest')
@section('content')
<!--start varification div area here -->
	 @include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
	<section class="common-light-header">
		<div class="container">
			<div class="popular-box text-center">

				<h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
				<span class="divide-line"></span>
				<p class="oswald-font light-text">View and edit COACH OR personal details here</p>
			</div>
		</div>
	</section>
<!--end banner area here -->

<!--start my profile no date area here-->
	<section class="marketplace-section">
		<div class="container">
			<div class="row">
				<aside class="col-lg-4">
					@if(Auth::check() && Auth::user()->role_type == 'C')
					<!-- start coach sidebar here -->

				                @include('frontend.nav._coachSideBar')

				    <!-- end coach sidebar here -->
				    @else
				    <!-- start sidebar here -->

				                @include('frontend.nav._sidebar')

				    <!-- end sidebar here -->
				    @endif
				</aside>

				<aside class="col-lg-8 marketplace-main-box">
					<div class="marketplace-header">
					    <h3 class="oswald-font">Certificated / Diplomas</h3>
					</div>
                    <div class="ceritified-diploma-box">
						  
						        <!-- Modal body -->
						        <div class="modal-body write-review-modal mb-4 cerified-modal">
						            <div class="certified-form">
						                <form action="{{route('coach.certificate-diploma-update')}}" method="POST" >
						                	@csrf
						                	 <input type="hidden" value="{{$certificateDiploma['id']}}" name="id">
						                    <div class="form-group">
						                        <label for="usr">Accreditation or Certificate</label>
						                        <input type="text" value="{{$certificateDiploma['title']}}"  class="form-control" name="title" id="usr" placeholder="Diploma In Fitness">
						                    </div>
						                    <div class="form-group">
						                        <label for="pwd">Year</label>
						                        <input type="text" value="{{$certificateDiploma['completion_year']}}" class="form-control" name="completion_year" id="pwd" placeholder="2011">
						                    </div>
						                    <div class="form-group">
						                        <label for="pwd">Institute or organisation </label>
						                        <input type="text" value="{{$certificateDiploma['institute']}}" class="form-control" name="institute" id="pwd" placeholder="Victorian Fitness Academy">
						                    </div>
						                
						            </div>
						          <a class="cancel-no" class="close" data-dismiss="modal" href="">CANCEL</a>
						          <input type="submit" class="cancel-yes" name="submit" value="UPDATE" />
						          </form>
						        </div>
						<!-- The Modal edit certified -->
                        
                        
                    </div>
					
				</aside>
			</div>
		</div>
	</section>	
<!--ends my profile no date area here-->
@endsection