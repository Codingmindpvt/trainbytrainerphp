@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Personal Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-4 text-center">
						@if(!empty(@$user->profile_image))
			                <img src="{{asset('public/'.@$user->profile_image) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-8">

						<div class="row user-details">

							<aside class="col-sm-6">
								<label>First Name</label>
								<h4>{{ isset($user->first_name) ? $user->first_name : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Last Name</label>
								<h4>{{ isset($user->last_name) ? $user->last_name : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Email Address</label>
								<h4>{{ isset($user->email) ? $user->email : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Phone Number</label>
								<h4>{{ isset($user->contact_no) ? $user->contact_no : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Address</label>
								<h4>{{ isset($user->address) ? $user->address : "-----" }}</h4>
							</aside>
                             <aside class="col-sm-6">
								<label>Country</label>
								<h4>{{ isset($user->country->name) ? $user->country->name : "-----" }}</h4>
							</aside>

						</div>
                        <div class="row">
                            <aside class="col-sm-6">
								<label>State</label>
								<h4>{{ isset($user->state->name) ? $user->state->name : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>City</label>
								<h4>{{ isset($user->city) ? $user->city : "-----" }}</h4>
							</aside>

						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Postal code</label>
								<h4>{{ isset($user->postal_code) ? $user->postal_code : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
								<h4>{!! @$user->getStatus() !!}</h4>
							</aside>
						</div>

					</aside>
                </div>
			</div>

			<!-- coach detail -->
			<h2>Coach Detail</h2>
			<div class="white_box my_profile">
				@if(isset($user['coach_detail']) && !empty($user['coach_detail']))
				<div class="row">
					<aside class="col-lg-4 text-center">
						@if(!empty(@$user['coach_detail']['image_file']))
			                <img src="{{asset('public/'.@$user['coach_detail']['image_file']) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-8">

						<div class="row user-details">

							<aside class="col-sm-6">
								<label>Title</label>
								<h4>{{ isset($user['coach_detail']['title']) ? $user['coach_detail']['title'] : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Bio</label>
								<h4>{{ isset($user['coach_detail']['bio']) ? $user['coach_detail']['bio'] : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Gender</label>
								<h4>{{ isset($user['coach_detail']['gender']) ? $user['coach_detail']->getGender() : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>City</label>
								<h4>{{ isset($user['coach_detail']['city']) ? $user['coach_detail']['city'] : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<!-- <aside class="col-sm-6">
								<label>Time Zone</label>
								<h4>{{ isset($user['coach_detail']['timezone']) ? $user['coach_detail']['timezone'] : "-----" }}</h4>
							</aside> -->
                             <aside class="col-sm-6">
								<label>Price Range</label>
								<h4>{{ isset($user['coach_detail']['price_range']) ? $user['coach_detail']['price_range'] : "-----" }}</h4>
							</aside>

						</div>
                        <div class="row">
                            <aside class="col-sm-6">
								<label>Category</label>
								<h4>@php
                                    $categories = explode(',', @$user['coach_detail']['categories']);
                                    @endphp

                                    @forelse($categories as $category)
                                    <span class="label label-default">{{ @$user->getCategoryName($category) }}</span>
                                    @empty
                                	@endforelse
                           		 </h4><br>
							</aside>
							<aside class="col-sm-6">
								<label>Language</label>
								<h4><?php
                                    $languages = explode(',', @$user['coach_detail']['languages']);
                                    foreach ($languages as $language) { ?>
                                    <span class="label label-default">{{ @$language }}</span>
                                    <?php }
                                    ?></h4><br>
							</aside>

						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Personality & Training</label>
								<h4><?php
                                    $trainingStyles = explode(',', @$user['coach_detail']['personality_and_training']);
                                    foreach ($trainingStyles as $trainingStyle) { ?>
                                    <span class="label label-default">{{ @$user->getTrainingStyleName($trainingStyle) }}</span>
                                    <?php }
                                    ?></h4><br>
							</aside>
							<aside class="col-sm-6">
								<label>Created At</label>
								<h4>{{ isset($user['coach_detail']['created_at']) ? $user['coach_detail']['created_at'] : "-----" }}</h4>
							</aside>
						</div>

					</aside>
                </div>
                @else
				<p>No Data Found!!</p>
				@endif
				</div>
			

			<!-- Certificated / Diplomas detail -->
			<h2>Certificates / Diplomas</h2>
			<div class="white_box my_profile">
				<div class="row">
					@php 
					@$educationDetails = $user['coach_detail']['coach_education'];
					@endphp
					@if(@$educationDetails)
					@foreach(@$educationDetails as $educationDetail)
					<aside class="col-lg-6">

						<div class="row user-details">

							<aside class="col-sm-6">
								<label>Title</label>
								<h4>{{ isset($educationDetail['title']) ? $educationDetail['title'] : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Completion Year</label>
								<h4>{{ isset($educationDetail['completion_year']) ? $educationDetail['completion_year'] : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-12">
								<label>Institute</label>
								<h4>{{ isset($educationDetail['institute']) ? $educationDetail['institute'] : "-----" }}</h4>
							</aside>
						</div>

					</aside>
					@endforeach
					@else
					<p>Not Data Found!!</p>
					@endif
                </div>
				</div>

				<!-- verification detail -->
			<h2>Certification Detail</h2>
			<div class="white_box my_profile row">
				<div class="col-md-12">
					@php 
					@$verificationDetail = $user['verification_detail'];
					//print_r($verificationDetail);die;
					@endphp
					@if(!empty(@$verificationDetail))

						<div class="row user-details">

							<aside class="col-sm-6">
								<label>qualified fitness coach</label>
								<h4>{!! !empty(@$verificationDetail['qualified_fitness_coach']) ? @$verificationDetail->getQualification() : "-----" !!}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>qualification</label>
								<h4>{{ !empty(@$verificationDetail['qualification']) ? @$verificationDetail['qualification'] : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>country</label>
								<h4>{{ !empty(@$verificationDetail['country']) ? @$verificationDetail['country'] : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>currently insured</label>
								<h4>{!! !empty(@$verificationDetail['currently_insured']) ? @$verificationDetail->getInsurance() : "-----" !!}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>insured with</label>
								<h4>{{ !empty(@$verificationDetail['insured_with']) ? @$verificationDetail['insured_with'] : "-----" }}</h4>
							</aside>
                             <aside class="col-sm-6">
								<label>insurance type</label>
								<h4>{{ !empty(@$verificationDetail['insurance_type']) ? @$verificationDetail['insurance_type'] : "-----" }}</h4>
							</aside>

						</div>
                        <div class="row">
                            <aside class="col-sm-6">
								<label>insurance expire date</label>
								<h4>{{ !empty(@$verificationDetail['insurance_expire_date']) ? @$verificationDetail['insurance_expire_date'] : "-----" }}
                           		 </h4>
							</aside>
							<aside class="col-sm-6">
								<label>agree as a coach</label>
								<h4>{!! !empty(@$verificationDetail['agree_as_a_coach']) ? @$verificationDetail->getAgree() : "-----" !!}</h4>
							</aside>

						</div>
					@else
					<p>Not Data Found!!</p>
					@endif
                </div>
                <div class="col-md-12">
                	<h4 class="insurance-text">Insurance</h4>
                	@if(!empty(@$verificationDetail['verification_document']) && count(@$verificationDetail['verification_document'])>0)
                    @foreach($verificationDetail['verification_document'] as $certificate)
                        @if($certificate['type'] == 'I')
                        <div class="upload-certificate-box" data-toggle="modal" data-target="{{'#'.$certificate['id']}}">
							<div class="eye-icon">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</div>
                            <img src="{{asset('public/images/insurance.png')}}" class="profile_picture" alt="upload">
                            <!-- <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="100px" class="profile_picture"></iframe> -->
                        </div> &nbsp
                        <!-- The Modal start -->
                                  <div class="modal fade" id="{{$certificate['id']}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">View Certificate</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                           <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="700px" class="profile_picture"></iframe>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                   <!-- The Modal end -->
                        @endif
                    @endforeach

                    @else
                    <div class="upload-certificate-box">
                        <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture" alt="upload">
                    </div>
                    @endif
                </div>
                   <div class="col-md-12">
                	<h4 class="insurance-text">Certificate</h4>
                	 @if(!empty(@$verificationDetail['verification_document']) && count(@$verificationDetail['verification_document'])>0)
                    @foreach(@$verificationDetail['verification_document'] as $certificate)
                        @if($certificate['type'] == 'C')
                        <div class="upload-certificate-box" data-toggle="modal" data-target="{{'#'.$certificate['id']}}">
							<div class="eye-icon">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</div>
                            <img src="{{asset('public/images/certificate.png')}}" class="profile_picture" alt="upload">
                            <!-- <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="100px" class="profile_picture"></iframe> -->
                        </div> &nbsp
                        <!-- The Modal start -->
                                  <div class="modal fade" id="{{$certificate['id']}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">View Certificate</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                           <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="700px" class="profile_picture"></iframe>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                   <!-- The Modal end -->
                        @endif
                    @endforeach

                    @else
                    <div class="upload-certificate-box">
                        <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture" alt="upload">
                    </div>
                    @endif
                </div>
				</div>
				@endsection

			</div>

