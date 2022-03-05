@extends('layouts.guest')
@section('content')
<!--end header area here -->
<!--start varification div area here -->

@if($coachDetail->coachVerificationDetail()->count()==0)
@include('frontend.nav._alertSection')
@endif
<!--end varification div area here -->
<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi,{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}! {!!
                certifiedUser() !!}</h1>
            <span class="divide-line"></span>
            <p class="oswald-font light-text">View and edit coach OR personal details here</p>
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if(Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>


            <aside class="col-lg-8 marketplace-main-box varification-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">New Products</h3>
                </div>
                <div class="sale-by-location">
                    <div class="view-box">
                        <p class="my-2 form-p">Product Type</p>
                        <div class="form-select">
                            <select class="form-input" id="create_class_and_program">
                                <option value="{{ route('add-program') }}"><a href="">Program</a></option>
                                <option value="{{ route('add.class') }}"><a href="">Class</a></option>

                            </select>
                        </div>
                    </div>
                    <a type="submit" href="{{ route('add-program') }}"
                        class="blue-btn oswald-font my-3 create_class_and_program_submit">CONTINUE</a>
                </div>
            </aside>
        </div>
    </div>
</section>
@section('scripts')
<script>
$('#create_class_and_program').on('change', function() {
    $('.create_class_and_program_submit').attr('href', this.value);
})
</script>
@endsection
<!--ends my profile no date area here-->
@endsection