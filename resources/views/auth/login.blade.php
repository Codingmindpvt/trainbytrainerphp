@extends('layouts.guest')

@section('content')

<section class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <aside class="col-lg-6">
                <div class="form-box">
                    <h3 class="oswald-font text-center">Already a member?</h3>
                    <form class="form" id="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" class="form-control form-input" name="role_type" value="U">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control form-input" id="" name="email" placeholder="Enter Email Address">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control form-input pass" id="" name="password" placeholder="Enter Password">
                             @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <a class="forgot" href="{{ route('password.request') }}">Forgot?</span></a>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="blue-btn oswald-font">Sign in</button>
                          </div>
                          <p class="or">OR SIGN IN USING</p>
                          <div class="form-group my-3">
                              <div class="row">
                                  <div class="col-6">
                                    <a href="#" class="fb"><i class="fa fa-facebook mx-1" aria-hidden="true"></i> Facebook</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="google"><i class="fa fa-google mx-1" aria-hidden="true"></i> Google</a>
                                </div>
                            </div>
                          </div>
                    </form>
                    <p class="frm-para">Don’t have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
