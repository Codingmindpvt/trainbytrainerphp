@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
@include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">

            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!
                @if(isset($item['coach_badge_status']) && !empty($item['coach_badge_status']) &&
                $item['coach_badge_status'] == 'C')
                <span><img src="{{ url('/') }}/public/images/verified2.png" alt="image"
                        class="img-fluid">Certified</span>
                @endif
            </h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View COACH OR personal details here</p> --}}
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

            <aside class="col-lg-8 marketplace-main-box">
                <div class="user-profle-right-side marketplace-main-box">
                    <div class="info-profile-head head-edit-account">
                        <h4 class="ml-0">
                            {{isset($classDetail['category']['title']) ? ucwords($classDetail['category']['title']) : "-----"}}
                        </h4>
                    </div>
                    <hr>
                    <div class="order-id-purchase">
                        <p><span>Session Details:</span> Oct 4, 2021 10:01 AM - 11:00 AM, Monday</p>
                    </div>
                    <div class="details-order-image">
                        @if(!empty($classDetail['image']))
                        <img src="{{ asset('public/class/'.$classDetail['image']) }}" alt="" class="mr-3">
                        @else
                        <img src="{{ asset('public/images/default-banner.png') }}" alt="" class="mr-3">
                        @endif

                        <div class="detail-order-content order-new-chat">
                            <h2>{{isset($classDetail['name']) ? ucwords($classDetail['name']) : "-----"}}
                            </h2>
                            <h5>{{isset($classDetail['price']) ? DEFAULT_CURRENCY.$classDetail['price'] : "-----"}}/Seat
                            </h5>
                            <p><b>Location</b></p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{isset($classDetail['address']) ? ucwords($classDetail['address']) : "-----"}}</p>
                        </div>
                    </div>

                    <div class="info-profile-head">
                        <h3>Attendees Details (<strong
                                class="attendees-p">10</strong>/{{isset($classDetail['attendees_limit']) ? $classDetail['attendees_limit'] : "-----"}})
                        </h3>
                    </div>
                    <hr>
                    <div class="row px-4 py-2">
                        @forelse($classDetail['schedules'] as $schedule)
                        <aside class="col-md-6">
                            <div class="cutomers-main-box">
                                @if(empty($schedule['user']['profile_image']))
                                <img src="{{ asset('public/'.$schedule['user']['profile_image']) }}"
                                    style="border-radius: 50%; height: 80px;" alt="use">
                                @else
                                <img src="{{ asset('public/images/default-image.png') }}"
                                    style="border-radius: 50%; height: 80px;" alt="use">
                                @endif
                                <div class="customers-main-content">
                                    <h5 class="oswald-font">
                                        {{isset($schedule['user']['first_name']) ? ucwords($schedule['user']['first_name'].' '.$schedule['user']['last_name']) : "-----"}}
                                    </h5>
                                    <p>{{isset($schedule['user']['email']) ? $schedule['user']['email']: "-----"}}
                                    </p>
                                    <p>{{isset($schedule['user']['contact_no']) ? $schedule['user']['contact_no']: "-----"}}
                                    </p>
                                </div>
                            </div>
                        </aside>
                        @empty
                        <p class="blank-para">No Data Found!!</p>
                        @endforelse
                    </div>
                </div>

            </aside>


        </div>
    </div>
</section>
<!--ends my profile no date area here-->
@endsection