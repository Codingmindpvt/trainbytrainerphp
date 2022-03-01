@extends('layouts.guest')
@section('content')
    @include('frontend.nav._alertSection')
    <!--end varification div area here -->

    <!--start banner area here -->
    <section class="common-light-header">
        <div class="container">
            <div class="popular-box text-center">
                <h1 class="oswald-font">Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</h1>
                <span class="divide-line"></span>
                {{-- <p class="oswald-font light-text">View and edit program detail here </p> --}}
            </div>
        </div>
    </section>
    <!--end banner area here -->

    <!--start my profile no date area here-->
    <section class="marketplace-section">
        <div class="container">
            <div class="row">
                <aside class="col-lg-4">
                    @if (Auth::check() && Auth::user()->role_type == 'C')
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
                        <div class="info-profile-head head-edit-account p-0">
                            <h3>Add Class</h3>
                        </div>
                    </div>
                    <div class="sale-by-location">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @include('frontend.class.includes.class_list')
                        <h3 class="pull-right add-btn my-3 add_class_btn btn" style="font-size: 15px; cursor: pointer;">Add
                            Class</h3>
                        <br>
                        <div class="add_class_div" style="display: none;">
                            @include('frontend.class.includes.add_class')

                        </div>


                        @include('frontend.class.includes.schedule')


                    </div>
                </aside>

            </div>
        </div>
    </section>
    @include('frontend.class.includes.edit_class_modal')
@section('scripts')
    @include('frontend.class.scripts')
@endsection
@endsection
