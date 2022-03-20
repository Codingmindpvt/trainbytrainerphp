@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
            <a href="{{  route('admin.editprofile',$users->id) }}" class="blue_btn yellow_btn pull-right text-uppercase">Edit Profile</a>
			<h2>My Profile</h2>

			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-4 text-center">
						@if(!empty(@$users->profile_image))
			                <img src="{{asset('public/'.@$users->profile_image) }}" class="img-circle profile_image"/>
			            @else
			                <img src="{{asset('public/images/default-image.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-8 user-main-box">

						<div class="row user-details">
							<aside class="col-sm-6">
								<label>First Name</label>
								<h4>{{ isset($users->first_name) ? $users->first_name : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Last Name</label>
								<h4>{{ isset($users->last_name) ? $users->last_name : "-----" }}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Email Address</label>
								<h4>{{ isset($users->email) ? $users->email : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Phone Number</label>
								<h4>{{ isset($users->contact_no) ? $users->contact_no : "-----" }}</h4>
							</aside>
						</div>
						{{--  <div class="row">
							<aside class="col-sm-6">
								<label>Address</label>
								<h4>{{ isset($users->address) ? $users->address : "-----" }}</h4>
							</aside>
						</div>  --}}

					</aside>
                </div>
				</div>
			</div>
@endsection
