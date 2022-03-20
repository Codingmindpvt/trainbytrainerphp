@extends('layouts.guest')
@section('content')
    <!-- user profile content start here -->

    <section class="user-profile-page">
        <div class="container">
            <div class="user-name-tag text-center m-5">
                <h1>Hi, {{ucwords(@$user->first_name." ".@$user->last_name)}} !{!!
                    certifiedUser() !!}</h1>
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
                        <div class="info-profile-head head-edit-account">
                            <h3>Account Information</h3>
                            <h4> > Edit Information</h4>
                        </div>
                        <hr>
                        <form id="updateAccountForm" class="input-box"  method="post" enctype="multipart/form-data">
                        <div class="profile-content-box">
                            @if(!empty(@$user->profile_image))
                            <img src="{{'public/'.@$user->profile_image}}" alt="" class="mr-3 profile_picture">
                            @else
                            <img src="{{asset('public/images/default-image.png') }}" alt="" class="mr-3 profile_picture">
                            @endif
                            <span class="add-image-new"><img src="{{asset('public/images/add.png') }}" alt="add">
                                <input type="file" name="profile_image" accept="image/png, image/jpg, image/jpeg, image/webp"  onchange="profileurl(this);" class="custom-input">
                            </span>
                            <div class="select_profile_box">
                            <div class="select_profile_errors"></div>
                            </div>

                            <div class="profile-content-text">
                                <p>Update Profile Picture</p>
                            </div>
                        </div>
                        <div class="change-pass-area">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control"
                                                placeholder="Adam" name="first_name" value="{{@$user->first_name}}" onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Smith" value="{{@$user->last_name}}" onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Email Address</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="adam_smith007@gmail.com" value="{{@$user->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                             <label>Phone Number</label>
                                            <div class="phone-code-selected">
                                            <input type="text" name="contact_no" value="{{@$user->contact_no}}" class="form-control form-input" placeholder="Enter Phone Number" onkeypress="return onlyNumber(event)">
                                             <span class="phone-code">+31</span>
                                            {{-- <?php
                                            $details = get_country_code();

                                            ?>
                                               @php
                                        $details = get_country_code();
                                    @endphp
                                    <select class="phone-code" name="phonecode">
                                        <option value="">+31</option>
                                        @foreach ($details as $detail)
                                            <option value="+{{ $detail }}">+{{ $detail }}</option>
                                        @endforeach
                                        <option>+31</option>
                                        <!-- <option value="+91">+91</option> -->
                                    </select> --}}
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Address</label>
                                            <input type="hidden" name="address_lat" id="address_lat" value="{{@$user->address_lat}}">
                                            <input type="hidden" name="address_long" id="address_long" value="{{@$user->address_long}}">
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="202 main chock, Dolphin nagar" value="{{@$user->address}}"
                                                onkeypress="return notSpace(event)">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label for="">Country</label>
                                             <input type="hidden" name="country" value="{{ $country->id }}">
                                                    <input type="text" class="form-control form-input"  value="{{@$country->name}}" disabled>

                                            </aside>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">State</label>
                                            <i class="fa fa-angle-down select-angle" aria-hidden="true"></i>
                                            <select class="form-control" name="state_id">
                                                @if(!empty(@$user->state_id))
                                                <option style="display:none" value="{{@$user->state->id}}" selected>{{@$user->state->name}}</option>
                                                @endif
                                                <option value="">Select</option>
                                                @foreach($states as $state)
                                                  <option value="{{@$state->id}}">{{@$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">


                                                <label for="">City</label>

                                              <input type="text" name="city"  value="{{$user->city }}"class="form-control form-input"  placeholder="E.g. City">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code"
                                                placeholder="111111" value="{{@$user->postal_code}}">
                                        </div>
                                    </div>





                                    <div class="col-md-6">
                                        <input type="submit" name="submit" class="sign-bt" value="UPDATE"/>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('userprofile') }}">
                                             <button type="button" class="sign-bt-cancel">CANCEL</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function notSpace(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if(charCode == 32){
                return false;
            }
            return true;
        }

        </script>
@endsection
