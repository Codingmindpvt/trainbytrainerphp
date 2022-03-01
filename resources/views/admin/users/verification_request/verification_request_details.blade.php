@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Personal Detail</h2>
    <div class="white_box my_profile">
        <div class="row">
            <aside class="col-lg-4 text-center">
                @if(!empty(@$user->profile_image))
                <img src="{{asset('public/'.@$user->profile_image) }}" class="img-circle profile_image" />
                @else
                <img src="{{asset('public/images/default-image.png') }}" class="img-circle profile_image" />
                @endif
            </aside>

            <aside class="col-lg-8">

                <div class="row user-details">

                    <aside class="col-sm-6">
                        <label>First Name</label>
                        <h4>{{ucwords($user->first_name) ?? '-'}}</h4>
                    </aside>
                    <aside class="col-sm-6">
                        <label>Last Name</label>
                        <h4>{{ucwords($user->last_name) ?? '-'}}</h4>
                    </aside>
                </div>
                <div class="row user-details">
                    <aside class="col-sm-6">
                        <label>Email Address</label>
                        <h4>{{$user->email ?? '-'}}</h4>
                    </aside>
                    <aside class="col-sm-6">
                        <label>Phone Number</label>
                        <h4>{{ $user->contact_no ?? '-'}}</h4>
                    </aside>
                </div>
                <div class="row user-details">
                    <aside class="col-sm-6">
                        <label>Address</label>
                        <h4>{{ucwords($user->address) ?? '-'}}</h4>
                    </aside>
                    <aside class="col-sm-6">
                        <label>Country</label>
                        <h4>{{$user->country->name ?? '-'}}</h4>
                    </aside>

                </div>
                <div class="row">
                    <aside class="col-sm-6">
                        <label>State</label>
                        <h4>{{$user->state->name ?? '-'}}</h4>
                    </aside>
                    <aside class="col-sm-6">
                        <label>City</label>
                        <h4>{{$user->city ?? '-'}}</h4>
                    </aside>

                </div>
                <div class="row">
                    <aside class="col-sm-6">
                        <label>Postal code</label>
                        <h4>{{$user->postal_code ?? '-'}}</h4>
                    </aside>
                    <aside class="col-sm-6">
                        <label>Status</label>
                        <h4>{!! $user->getStatus() !!}</h4>
                    </aside>
                </div>

            </aside>
        </div>
    </div>

    <!-- verification detail -->
    <h2>Verification Detail</h2>
    <div class="white_box my_profile row">
        <div class="col-md-12">
            @php
            @$verificationDetail = $user['verification_detail'];
            //print_r($verificationDetail);die;
            @endphp
            @if(!empty(@$verificationDetail))
            <div class="row user-details">

                <aside class="col-sm-6">
                    <label>qualified fitness coach</label>
                    <h4>{!! !empty(@$verificationDetail['qualified_fitness_coach']) ? @$verificationDetail->getQualification() : "-----" !!}</h4>
                </aside>
                <aside class="col-sm-6">
                    <label>qualification</label>
                    <h4>{{$verificationDetail->qualification ?? '-'}}</h4>
                </aside>
            </div>
            <div class="row user-details">
                <aside class="col-sm-6">
                    <label>country</label>
                    <h4>{{$verificationDetail->country ?? '-'}}</h4>
                </aside>
                <aside class="col-sm-6">
                    <label>currently insured</label>
                    <h4>{{$verificationDetail->currently_insured ?? '-'}}</h4>
                </aside>
            </div>
            <div class="row user-details">
                <aside class="col-sm-6">
                    <label>insured with</label>
                    <h4>{{$verificationDetail->insured_with ?? ''}}</h4>
                </aside>
                <aside class="col-sm-6">
                    <label>insurance type</label>
                    <h4>{{$verificationDetail->insurance_type ?? ''}}</h4>
                </aside>
            </div>
            @else
            <p>Not Data Found</p>
            @endif
            <div class="row">
                <aside class="col-sm-6">
                    <label>insurance expire date</label>
                    <h4></h4>
                </aside>
                <aside class="col-sm-6">
                    <label>agree as a coach</label>
                    <h4></h4>
                </aside>

            </div>

            <p>Not Data Found!!</p>

        </div>
        <div class="col-md-12">
            <h4>Insurance</h4>

            <div class="upload-certificate-box" data-toggle="modal" data-target="">
                <img src="{{asset('public/images/insurance.png')}}" class="profile_picture" alt="upload">

            </div> &nbsp
            <!-- The Modal start -->
            <div class="modal fade" id="">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">View Certificate</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <iframe src="" width="100%" height="700px" class="profile_picture"></iframe>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal end -->

            <div class="upload-certificate-box">
                <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture" alt="upload">
            </div>

        </div>
        <div class="col-md-12">
            <h4>Certificate</h4>

            <div class="upload-certificate-box" data-toggle="modal" data-target="">
                <img src="{{asset('public/images/certificate.png')}}" class="profile_picture" alt="upload">

                <!-- The Modal start -->
                <div class="modal fade" id="">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">View Certificate</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <iframe src="" width="100%" height="700px" class="profile_picture"></iframe>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="upload-certificate-box">
                    <img src="" class="profile_picture" alt="upload">
                </div>

            </div>
        </div>
    </div>
    @endsection