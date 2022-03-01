@extends('layouts.admin.outer')
@section('content')
    <div class="container">
        <div class="logo_header text-center">
            <a href="#"><img src="{{url('/')}}/public/images/logo.png" alt="" /></a>
        </div>
        <div class="login_form_outer">
            <div class="login_form">
                <h2>Sign In</h2>
                <form class="form" method="POST" action="{{ route('admin.user.login') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="" placeholder="" class="form-control" />
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" value="" name="password" placeholder="" class="form-control" />
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    {{-- <p class="forgot_password"><a href="{{ route('password.request') }}">Forgot Password?</a></p> --}}
                    <button type="submit" class="blue_btn">Sign In</button>
                    {{-- <a href="dashboard" class="blue_btn">Sign In</a> --}}
            </div>
        </form>
            <img src="images/shadow.png" alt="" class="shadow"/>
        </div>
    </div>
@endsection
