@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
@include('frontend.nav._alertSection')
<!--end varification div area here -->
@if($verificationDetail->badge_status == 'S')
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">Your Certification Request has
            been rejected by admin, Please resubmit your Certification Detail and check your email for the reason.
    </div>
</section>
@endif

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!{!!
                certifiedUser() !!}</h1>
            <span class="divide-line"></span>
            <p class="oswald-font light-text">View and edit COACH Verification details here</p>
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
                    <h3 class="oswald-font">Verification</h3>
                    @if($verificationDetail->badge_status != 'C')
                    <a href="{{route('edit-coach-verification', $verificationDetail->id)}}">
                        <div class="save-green-bt"> <i class="fa fa-pencil" aria-hidden="true"></i> EDIT CERTIFICATION
                        </div>
                    </a>
                    @endif
                </div>
                <div class="sale-by-location">
                    <h4 class="oswald-font">Qualifications<span><i class="fa fa-asterisk validate-mark"
                                aria-hidden="true"></i></span></h4>
                    <div class="view-box">
                        <p class="my-2 form-p">Are you a qualified fitness coach?</p>
                        <div class="form-check-inline">
                            <label class="form-check-label">{!!$verificationDetail->getQualification()!!}
                            </label>
                        </div>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">What qualifications do you have? (list them all below separated by
                            commas)</p>
                        <p>{{$verificationDetail['qualification']}}</p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">What country did you get these qualifications in?</p>
                        <p>{{$verificationDetail['country']}}</p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Upload certificate proof of your qualifications</p>
                        <div class="upload-certificate-box-main">
                            @if(count($verificationDetail['verification_document'])>0)
                            @foreach($verificationDetail['verification_document'] as $certificate)
                            @if($certificate['type'] == 'C')
                            <div class="upload-certificate-box" data-toggle="modal"
                                data-target="{{'#'.$certificate['id']}}">
                                <img src="{{asset('public/images/certificate.png')}}" class="profile_picture"
                                    alt="upload">
                                <!-- <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="100px" class="profile_picture"></iframe> -->
                            </div> &nbsp
                            <!-- The Modal start -->
                            <div class="modal fade" id="{{$certificate['id']}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">View Certificate</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%"
                                                height="700px" class="profile_picture"></iframe>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- The Modal end -->
                            @endif
                            @endforeach

                            @else
                            <div class="upload-certificate-box">
                                <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture"
                                    alt="upload">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="view-box imsurance-box">
                        <h4 class="oswald-font">Insurance<span><i class="fa fa-asterisk validate-mark"
                                    aria-hidden="true"></i></span></h4>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Are you currently insured?</p>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                {!!$verificationDetail->getInsurance()!!}
                            </label>
                        </div>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">What insurer are you insured with?</p>
                        <p>{{$verificationDetail['insured_with']}}</p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">What type of insurance do you have?</p>
                        <p>{{$verificationDetail['insurance_type']}}</p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">When does your insurance expire?</p>
                        <div class="cal-box">
                            <p>{{$verificationDetail['insurance_expire_date']}}</p>
                        </div>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Upload your proof of insurance (this must clearly show that your
                            insurance has been paid and is currently valid).</p>
                        <div class="upload-certificate-box-main">
                            @if(count($verificationDetail['verification_document'])>0)
                            @foreach($verificationDetail['verification_document'] as $certificate)
                            @if($certificate['type'] == 'I')
                            <div class="upload-certificate-box" data-toggle="modal"
                                data-target="{{'#'.$certificate['id']}}">
                                <img src="{{asset('public/images/insurance.png')}}" class="profile_picture"
                                    alt="upload">
                                <!-- <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="100px" class="profile_picture"></iframe> -->
                            </div> &nbsp
                            <!-- The Modal start -->
                            <div class="modal fade" id="{{$certificate['id']}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">View Certificate</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%"
                                                height="700px" class="profile_picture"></iframe>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- The Modal end -->
                            @endif
                            @endforeach

                            @else
                            <div class="upload-certificate-box">
                                <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture"
                                    alt="upload">
                            </div>
                            @endif
                        </div>

                    </div>
                    <p class="imsurance-box">Being a qualified fitness coach does not mean you can coach anyone about
                        anything fitness
                        related. A qualification only allows you to coach certain types of people and categories.</p>
                    <div class="view-box">
                        <label class="form-check-label">{!!$verificationDetail->getAgree()!!}</label>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
@endsection
