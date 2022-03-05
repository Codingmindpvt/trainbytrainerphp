@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi, {{ucwords(@$user->first_name." ".@$user->last_name)}} {!! certifiedUser() !!}</h1>

            <p>View and edit personal details here</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if(Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>Account Information</h3>
                        <a href="{{ route('edit_profile') }}"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT
                            INFORMATION</a>
                    </div>
                    <hr>
                    <div class="profile-content-box">

                        @if(!empty(@$user->profile_image))
                        <img src="{{asset('public/'.@$user->profile_image) }}" alt="" class="mr-3 profile_picture">
                        @else
                        <img src="{{asset('public/images/default-image.png') }}" alt="" class="mr-3 profile_picture">
                        @endif

                        <div class="profile-content-text ">
                            <h2>{{ucwords(@$user->first_name." ".@$user->last_name)}}</h2>
                            <p>{{@$user->email}}</p>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <p class="phone-head">Phone Number</p>
                                    <p>+31{{@$user->contact_no}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="phone-head">Address</p>
                                    <p>{{@$user->address}}</p>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <p class="phone-head">Country</p>
                                    <p>{{@$user->country->name}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="phone-head">State</p>
                                    <p>{{@$user->state->name}}</p>
                                </div>


                            </div>
                            <div class="row mt-3">

                                <div class="col-6">
                                    <p class="phone-head">City</p>
                                    <p>{{@$user->city}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="phone-head">Postal Code</p>
                                    <p>{{@$user->postal_code}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="change-pass-area">
                        <h3>Change Password</h3>

                        <form id="changePasswordForm" class="input-box" action="{{ route('change_password') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Current Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password"
                                    placeholder="Enter Password" onkeypress="return notSpace(event)">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password"
                                    placeholder="Enter Password" onkeypress="return notSpace(event)">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Confirm New Password</label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="confirm_password" placeholder="Enter Password"
                                    onkeypress="return notSpace(event)">
                            </div>
                            <input type="submit" name="submit" class="sign-bt" value="SUBMIT" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function notSpace(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 32) {
        return false;
    }
    return true;
}
</script>
@endsection