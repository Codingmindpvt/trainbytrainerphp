@extends('layouts.guest')
@section('content')
<!--start varification div area here -->
@include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">

            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
            <span class="divide-line"></span>
            <!-- <p class="oswald-font light-text">View and edit COACH OR personal details here</p> -->
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
                <div class="marketplace-header">
                    <h3 class="oswald-font">Program Result</h3>
                </div>
                <div class="ceritified-diploma-box">

                    <!-- Modal body -->
                    <div class="modal-body write-review-modal mb-4 cerified-modal">
                        <div class="certified-form">
                            <form action="{{route('coach.update-program-result')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$result->id}}" name="id">
                                <div class="form-group">
                                    <p class="tag-line">Image<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                                    <div class="upload-certificate-box-main">

                                        <div class="upload-certificate-box">
                                            @if(!empty(@$result->image_file))
                                            <img src="{{asset('public/'.@$result->image_file)}}" alt=""
                                                class="mr-3 profile_picture">
                                            @else
                                            <img src="{{asset('public/images/default-image.png') }}" alt=""
                                                class="mr-3 profile_picture">
                                            @endif
                                            <input id="input-b3" name="image_file" type="file" class="file"
                                                accept="image/png, image/jpg, image/jpeg, image/webp"
                                                onchange="profileurl(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usr">Title<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></label>
                                    <input type="text" value="{{$result->title}}" class="form-control" name="title"
                                        id="usr" placeholder="Enter Tilte">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">stars<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></label>
                                    <div class="form-select">
                                        <select class="form-input" id="result_star" name="star">
                                            <option value="">Select</option>
                                            <option value="1" {{ ($result['certificate'] == 1) ? "selected" : "" }}>1
                                                Star
                                            </option>
                                            <option value="2" {{ ($result['certificate'] == 2) ? "selected" : "" }}>2
                                                Stars
                                            </option>
                                            <option value="3" {{ ($result['certificate'] == 3) ? "selected" : "" }}>3
                                                Stars
                                            </option>
                                            <option value="4" {{ ($result['certificate'] == 4) ? "selected" : "" }}>4
                                                Stars
                                            </option>
                                            <option value="5" {{ ($result['certificate'] == 5) ? "selected" : "" }}>5
                                                Stars
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Description<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></label>
                                    <textarea class="form-control" name="description"
                                        placeholder="Enter Description">{{$result['description']}}</textarea>
                                </div>
                        </div>
                        <input type="submit" class="cancel-yes" name="submit" value="UPDATE" />
                        </form>
                    </div>
                    <!-- The Modal edit certified -->


                </div>

            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
@endsection
