@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Edit Coach</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.user.updateCoach',$user->id)}}" method="POST" id="editUserForm" enctype="multipart/form-data">
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
						{{-- <input value="{{ $type}}" name="type" class="form-control" type="hidden"> --}}
						<div class="row">
							<aside class="col-sm-6">
								<label>First Name</label>
								<input value="{{ $user->first_name}}" name="first_name" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
								<label>Last Name</label>
								<input  value="{{ $user->last_name}}"name="last_name" class="form-control" type="text">
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Email Address</label>
								<input  value="{{ $user->email}}" name="email" class="form-control" type="text" readonly>
							</aside>
							<aside class="col-sm-6">
								<label>Phone Number</label>
								<input value="{{ $user->contact_no}}" name="contact_no" class="form-control" type="text" readonly>
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Address</label>
								<input value="{{ $user->address}}" name="address" class="form-control" type="text">
							</aside>
                             <aside class="col-sm-6">
                                 <label for="">Country</label>
                                 <div class="form-select">
                                     <select class="form-input form-control" name="country" id="country-dd">
                                     	@if(!empty($user->country->id))
										<option style='display:none' value="{{$user->country->id}}">{{$user->country->name}}</option>
									  	@endif
                                         <option value="">Select</option>
                                         @foreach ($countries as $country)
                                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </aside>
                             </div>
                             <div class="row">
                             <aside class="col-sm-6">
                                 <label for="">State</label>
                                 <div class="form-select">
                                     <select class="form-input form-control" name="state" id="state-dd">
                                     	@if(!empty($user->state->id))
										<option style='display:none' value="{{$user->state->id}}">{{$user->state->name}}</option>
									  	@endif
                                         <option value="">Select</option>
                                         @foreach ($states as $state)
                                             <option value="{{ $state->id }}">{{ $state->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </aside>

                             <aside class="col-sm-6">
                                <label>City</label>

                              <input type="text" name="city"  value="{{$user->city }}"class="form-control" id="" >
                            </aside>
                         </div>
						<div class="row">
                             <aside class="col-sm-6">
								<label>Postal code</label>
								<input value="{{ $user->postal_code}}"  class="form-control" name="postal_code" type="text">
							</aside>
						</div>


						<button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function() {
                var idState = this.value;


                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
