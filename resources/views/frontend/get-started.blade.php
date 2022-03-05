@extends('layouts.guest')
@section('content')
<!--get started section start area here -->
  <section class="getstarted-section">
    <div class="container">
      <div class="row justify-content-center">
        <aside class="col-lg-6">
          <div class="form-box">
            <h3 class="oswald-font text-center">Get started with</h3>
            <form class="form" method="post" id="signupForm">
              @csrf
              <div class="form-group">
                  <label for="">Account Type</label>
                  <div class="coach-choice" id="coach">
                    <input type="radio" id="show" class="radio role_type" name="role_type" value="{{ $user->isRoleUser()}}" checked="">
                    <p class="form-input text-left">Find a coach or program </p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="coach-choice" id="become">
                    <input type="radio" id="hide" class="radio mt-2 role_type" name="role_type" value="{{$user->isRoleCoach()}}">
                    <p class="form-input text-left">Become a coach </p>
                  </div>
                </div>
                <div id="p" class="form-group sign-up">
                  <label for="">Sign Up As</label>
                  <div class="personal-gp row personal-bus-error">
                      <div class="col-sm-6">
                          <div class="coach-choice">
                            <input type="radio" id="user_type" class="radio" name="user_type" value="{{$user->userTypePersonal()}}">
                            <p class="form-input text-left">Personal</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="coach-choice">
                            <input type="radio" id="user_type" class="radio" name="user_type" value="{{$user->userTypeBusiness()}}">
                           <p class="form-input text-left">Business</p>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="email" name="email" class="form-control form-input" value="{{ old('email') }}" id="" placeholder="E.g. adam_smith007@gmail.com" onkeypress="return notSpace(event)">
                </div>
                <div class="form-group">
                  <label for="">Create Password</label>
                  <input type="password" name="password" class="form-control form-input" id="password" placeholder="Create a Secure Password" onkeypress="return notSpace(event)">
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control form-input" id="" placeholder="Re-enter Your Secure Password" onkeypress="return notSpace(event)">
                </div>
                <div class="form-check agree-checkbox">
                  <label class="custom-check">
                    <input type="checkbox" name="agree_terms">
                    <span class="checkmark"></span>
                </label>
                  <p>I read and agree to <a href="{{route('termscondition')}}" target="_blank">Terms & Conditions</a> and <a href="{{route('privacyPolicy')}}" target="_blank">Privacy Policy</a>.</p>
                  <div class="errorName"></div>
               </div>
               <br/>
                <div class="form-group">
                  <input type="submit" name="submit" class="blue-btn oswald-font" id="user-next-btn" value="Next" >
                  <!-- <a href="{{ route('fill-information') }}" class="blue-btn oswald-font" id="user-next-btn">next</a>
                       <a href="fill-information-1.html" class="blue-btn oswald-font" id="coach-next-btn" style="display: none;">next</a> -->
                </div>
                <div id="social-login">
                  <p class="or sign-up">OR SIGN UP USING</p>
                  <div class="form-group my-3 sign-up">
                    <div class="row">
                      <div class="col-6">
                        <a href="{{route('login.facebook')}}" class="fb"><i class="fa fa-facebook mx-1" aria-hidden="true"></i> Facebook</a>
                      </div>
                      <div class="col-6">
                        <a href="{{route('auth/google')}}" class="google"><i class="fa fa-google mx-1" aria-hidden="true"></i> Google</a>
                      </div>
                    </div>
                  </div>
                </div>

                </form>
            <p class="frm-para">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
          </div>
        </aside>
      </div>
    </div>
  </section>
<!--get started section end area here -->
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
