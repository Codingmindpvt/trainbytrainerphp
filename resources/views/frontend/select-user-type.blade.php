@extends('layouts.guest')
@section('content')
<!--get started section start area here -->
<section class="getstarted-section">
    <div class="container">
        <div class="row justify-content-center">
            <aside class="col-lg-6">
                <div class="form-box">
                    <h3 class="oswald-font text-center">Sign Up As</h3>
                    <form class="form" method="post" id="signupForm" action="{{route('save-select-user-type')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" readonly="true" placeholder="Please enter email" value="{{ Auth::user()->email }}" style="border-radius: 50px;">
                            </div>
                        </div>
                        <div id="p" class="form-group sign-up">
                            <input type="hidden" value="1" name="account_complete">
                            <label for="">Select Type</label>
                            <div class="personal-gp row personal-bus-error">
                                <div class="col-sm-6">
                                    <div class="coach-choice">
                                        <input type="radio" id="user_type" class="radio" name="user_type" value="P">
                                        <p class="form-input text-left">Personal</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="coach-choice">
                                        <input type="radio" id="user_type" class="radio" name="user_type" value="B">
                                        <p class="form-input text-left">Business</p>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <button type="button" class="cancel-p-bt" style=" background: #1acbaa; color: #fff; border-radius: 30px; width: 100%; line-height: 49px; margin-top: 30px;">Back</button>
                                </div> -->
                                <div class="col-sm-12">
                                    <input type="submit" class="submit-p-bt button" value="Next" style=" background: #002395; color: #fff; border-radius: 30px; width: 100%; line-height: 49px; margin-top: 30px;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </aside>
        </div>
    </div>
</section>
<!--get started section end area here -->
@endsection