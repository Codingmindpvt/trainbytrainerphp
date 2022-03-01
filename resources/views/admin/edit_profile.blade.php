@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Edit Profile</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{ route('admin.updateprofile',$user->id) }}" id="editProfileForm" method="POST" enctype="multipart/form-data">
                        @csrf
					<aside class="col-lg-4 text-center">
						<div class="upload_image">
						@if(!empty(@$user->profile_image))
			                <img src="{{asset('public/'.@$user->profile_image) }}" class="img-circle profile_image profile_picture"/>
			             @else
			                <img src="{{asset('public/images/default-image.png') }}" class="img-circle profile_image profile_picture"/>
			            @endif
							<input type="file" name="profile_image" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp"/>
							
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>

					</aside>
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
								<label>First Name</label>
								<input value="{{ $user->first_name }}" name="first_name" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
								<label>Last Name</label>
								<input  value="{{ $user->last_name }}"name="last_name" class="form-control" type="text">
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Email Address</label>
								<input  value="{{ $user->email }}" name="email" class="form-control" type="text" readonly>
							</aside>
							<aside class="col-sm-6">
								<label>Phone Number</label>
								<input value="{{ $user->contact_no }}" name="contact_no" class="form-control" type="number">
							</aside>
						</div>
						{{--  <div class="row">
							<aside class="col-sm-6">
								<label>Address</label>
								<input value="{{ $user->address }}" name="address" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
							</aside>
						</div>  --}}

						<button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
