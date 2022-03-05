@extends('layouts.guest')

@section('content')

<section class="login-section forgot-section">
    <div class="container">
        <div class="row justify-content-center">
            <aside class="col-lg-6">
                <div class="form-box">
                    <h3 class="oswald-font text-center">Forgot password?</h3>
                        <p>Enter the email address associated with your account and we’ll send you a link to reset your password.</p>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form" id="reset" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">

                        <label for="email" class="col-md-3 col-form-label text-md-right d-flex align-items-center">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  onkeypress="return notSpace(event)">

                             @error('email')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <div class="form-group mb-0">
                           <button type="submit" class="blue-btn oswald-font">
                                {{ __('CONTINUE') }}
                            </button>
                    </div>

                </form>
                 <p class="frm-para">Back to <a href="{{ route('login') }}">Sign In</a></p>
                </div>
            </aside>
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
