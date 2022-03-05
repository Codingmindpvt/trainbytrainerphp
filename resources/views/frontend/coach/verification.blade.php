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
				<p class="oswald-font light-text">Apply for get Certified Badge as Coach here</p>
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
				<aside class="col-lg-8 marketplace-main-box varification-box">
					<div class="marketplace-header">
					<h3 class="oswald-font">Get Certified</h3>
					</div>
					<form method="post" id="coachVerificationForm" action="{{ route('coach.add-verification') }}" enctype="multipart/form-data">
						@csrf
					<div class="sale-by-location">
					<h4 class="oswald-font">Qualifications<span><i class="fa fa-asterisk validate-mark"
                        aria-hidden="true"></i></span></h4>
						<div class="view-box">
							<p class="my-2 form-p">Are you a qualified fitness coach?</p>
							<div class="form-check-inline">
							  	<label class="form-check-label">
							    <input type="radio" class="form-check-input" value="{{$verificationDetail->isQualificationYes()}}" name="qualified_fitness_coach">Yes
							  	</label>
							</div>
							<div class="form-check-inline">
							  	<label class="form-check-label">
							    <input type="radio" class="form-check-input" value="{{$verificationDetail->isQualificationNo()}}" name="qualified_fitness_coach">No
							  	</label>
							</div>
						</div>
						<div class="view-box">
							<p class="my-2 form-p">What qualifications do you have? (list them all below separated by commas)</p>
							<input class="form-input" type="text" name="qualifications">
						</div>
						<div class="view-box">
							<p class="my-2 form-p">What country did you get these qualifications in?</p>
							<input class="form-input" type="text" name="country">
						</div>
						<!-- <div class="view-box">
							<p class="my-2 form-p">What country did you get these qualifications in?</p>
							<div class="form-select">
    							<select class="form-input" id="exampleFormControlSelect1">
							      <option>Select</option>
							      <option>2 year</option>
							      <option>3 year</option>
							      <option>4 year</option>
							      <option>5 year</option>
							    </select>
							</div>
						</div> -->
						<div class="view-box">
							<p class="my-2 form-p">Upload certificate proof of your qualifications</p>

								<div id="certificate" class="row"></div>

						</div>
						<div class="view-box imsurance-box">
							<h4 class="oswald-font">Insurance<span><i class="fa fa-asterisk validate-mark"
                                aria-hidden="true"></i></span></h4>
						</div>
						<div class="view-box">
							<p class="my-2 form-p">Are you currently insured?</p>
							<div class="form-check-inline">
							  	<label class="form-check-label">
							    <input type="radio" class="form-check-input" value="{{$verificationDetail->isInsuranceYes()}}" name="currently_insured">Yes
							  	</label>
							</div>
							<div class="form-check-inline">
							  	<label class="form-check-label">
							    <input type="radio" class="form-check-input" value="{{$verificationDetail->isInsuranceNo()}}" name="currently_insured">No
							  	</label>
							</div>
						</div>
						<div class="view-box">
							<p class="my-2 form-p">What insurer are you insured with?</p>
							<input class="form-input" type="text" name="insured_with">
						</div>
						<div class="view-box">
							<p class="my-2 form-p">What type of insurance do you have?</p>
							<input class="form-input" type="text" name="insurance_type">
						</div>
						<div class="view-box">
							<p class="my-2 form-p">When does your insurance expire?</p>
							<div class="cal-box">
							<input class="form-input" id="datepicker" type="date" min="{{ date('Y-m-d')}}" name="insurance_expire_date">
							{{--  <i class="fa fa-calendar" aria-hidden="true"></i>  --}}
							</div>
						</div>
						<div class="view-box">
							<p class="my-2 form-p">Upload your proof of insurance (this must clearly show that your insurance has been paid and is currently valid).</p>

							<div id="insurance" class="row"></div>
						</div>
						<p class="imsurance-box">Being a qualified fitness coach does not mean you can coach anyone about anything fitness
							related. A qualification only allows you to coach certain types of people and categories.</p>
						<div class="form-check agree-checkbox">
			    			<label class="custom-check">
				  			<input type="checkbox" name="agree_as_a_coach">
				  			<span class="checkmark"></span>
							</label>
			    			<p class="text-left">I confirm that I know what clients my qualification allows me to coach and I agree that I will
							only work with people who I am qualified to coach.</p>
						</div>
						<input type="submit" class="blue-btn oswald-font my-3" value="Submit" />
					</div>
				</form>
				</aside>
			</div>
		</div>
	</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
		$(function(){
			$("#certificate").spartanMultiImagePicker({
				fieldName:        'certificates[]',
				fileAccept: 'application/pdf',
				setFileType: 'document',
				maxCount:         5,
				rowHeight:        '102px',
				groupClassName:   'col-md-2 col-sm-2 col-xs-6',
				maxFileSize:      '',
				docImage: "{{asset('/public/images/certificate.png')}}",
				placeholderImage: {
				    image: "{{asset('/public/images/add-more.png')}}",
            width : '100%'
				},
				dropFileLabel : "Drop Here",
				onAddRow:       function(index){
					console.log(index);
					console.log('add new row');
				},
				onRenderedPreview : function(index){
					console.log(index);
					console.log('preview rendered');
				},
				onRemoveRow : function(index){
					console.log(index);
				},
				onExtensionErr : function(index, file){
					console.log(index, file,  'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr : function(index, file){
					console.log(index, file,  'file size too big');
					alert('File size too big');
				}
			});

			$("#insurance").spartanMultiImagePicker({
				fieldName:        'insurances[]',
				fileAccept: 'application/pdf',
				setFileType: 'document',
				maxCount:         5,
				rowHeight:        '102px',
				groupClassName:   'col-md-2 col-sm-2 col-xs-6',
				maxFileSize:      '',
				docImage: "{{asset('/public/images/insurance.png')}}",
				placeholderImage: {
				    image: "{{asset('/public/images/add-more.png')}}",
            width : '100%'
				},
				dropFileLabel : "Drop Here",
				onAddRow:       function(index){
					console.log(index);
					console.log('add new row');
				},
				onRenderedPreview : function(index){
					console.log(index);
					console.log('preview rendered');
				},
				onRemoveRow : function(index){
					console.log(index);
				},
				onExtensionErr : function(index, file){
					console.log(index, file,  'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr : function(index, file){
					console.log(index, file,  'file size too big');
					alert('File size too big');
				}
			});
		});
	</script>
@endsection
