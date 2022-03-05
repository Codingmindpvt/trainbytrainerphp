@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi, {{ucwords(Auth::user()->first_name." ".Auth::user()->last_name)}} {!! certifiedUser() !!}</h1>
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
                        <h3>My Orders</h3>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item mr-3">
                                <a class="nav-link active" href="#sessions" role="tab" data-toggle="tab">Sessions</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#programs" role="tab" data-toggle="tab">Programs</a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane show in active" id="sessions">
                            @forelse($sessions as $session)
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    @if(!empty($session['coach_class']['image']))
                                    <img src="{{asset('public/class/'.$session['coach_class']['image'])}}" alt="">
                                    @else
                                    <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                                    @endif
                                    <div>
                                        <p>Booking ID: {{'#'.$session->id}}</p>
                                        <h3>{{$session['coach_class']['name']}}</h3>
                                        <h6 class="doller-ten">{{DEFAULT_CURRENCY.$session['coach_class']['price']}}
                                            <b>/Session</b><span>Created By:
                                                {{isset($session['coach_class']['program_user']['first_name']) ? ucwords($session['coach_class']['program_user']['first_name']." ".$session['coach_class']['program_user']['last_name']) : "-----"}}</span>
                                        </h6>
                                        <br />
                                        @if($session->status == 2)
                                        <h5 class="green-response"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{ isset($session['coach_class']['program_user']['first_name']) ? ucwords($session['coach_class']['program_user']['first_name']." ".$session['coach_class']['program_user']['last_name']) : "-----" }}
                                            accepted your session request.</h5>
                                        @elseif($session->status == 0)
                                        <h5 class="red-response"><i class="fa fa-times" aria-hidden="true"></i>
                                            {{ isset($session['coach_class']['program_user']['first_name']) ? ucwords($session['coach_class']['program_user']['first_name']." ".$session['coach_class']['program_user']['last_name']) : "-----" }}
                                            rejected your session request.</h5>
                                        @else
                                        <h5 class="orange-response"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                            Waiting for
                                            {{ isset($session['coach_class']['program_user']['first_name']) ? ucwords($session['coach_class']['program_user']['first_name']." ".$session['coach_class']['program_user']['last_name']) : "-----" }}
                                            response to accept or reject.</h5>
                                        @endif

                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Sessioned on:</p>
                                    <p class="mb-3">{{ date_format(date_create($session->booking_date),"M d, Y H:i A")}}
                                    </p>
                                    <a href="{{ route('my-session-order-detail',@$session->id)}}">View Details</a>
                                </div>
                            </div>
                            @empty
                            <p class="blank-para">No Data Found!!</p>
                            @endforelse
                            {{ $sessions->links() }}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="programs">
                            @forelse($programs as $program)
                            <div class="my-oders-list">
                                <div class="image-product-tb">
                                    @if(!empty($program['program']['image_file']))
                                    <img src="{{asset('public/'.$program['program']['image_file'])}}" alt="">
                                    @else
                                    <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                                    @endif
                                    <div>
                                        <p>{{"Order ID: #".$program->order_id}}</p>
                                        <h3>{{ucwords(@$program['program']['program_name'])}}</h3>
                                        <h6 class="doller-ten">{{DEFAULT_CURRENCY.$program['program']['price']}}
                                            <b></b><span>Created By:
                                                {{isset($program['program']['program_user']['first_name']) ? ucwords($program['program']['program_user']['first_name']." ".$program['program']['program_user']['last_name']) : "----"}}</span>
                                        </h6>

                                    </div>
                                </div>
                                <div class="purchase-date">
                                    <p>Purchased on:</p>
                                    <p class="mb-2">{{ date_format(date_create($program->created_at),"M d, Y H:i A")}}
                                    </p>
                                    <a href="{{ route('my-program-order-detail',@$program->id)}}">View Details</a>
                                </div>
                            </div>
                            @empty
                            <p class="blank-para"> No Data Found!!</p>
                            @endforelse
                            {{ $programs->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection