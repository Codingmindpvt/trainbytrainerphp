@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>User Detail</h2>
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
			</div>
@endsection
