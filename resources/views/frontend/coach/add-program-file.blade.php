@extends('layouts.guest')
@section('content')
<!--start varification div area here -->
@include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">

            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}! {!!
                certifiedUser() !!}</h1>
            <span class="divide-line"></span>
            <p class="oswald-font light-text">View and edit COACH OR personal details here</p>
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
            @php
            // print_r($result); die;
            @endphp

            <aside class="col-lg-8 marketplace-main-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">Program Result<span><i class="fa fa-asterisk validate-mark"
                                aria-hidden="true"></i></span></h3>
                </div>
                <div class="ceritified-diploma-box">

                    <!-- Modal body -->
                    <div class="modal-body write-review-modal mb-4 cerified-modal">
                        <div class="certified-form">
                            <form action="{{route('coach.create-program-file')}}" method="POST" class="add-program-file"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{@$coachDetail['id']}}" name="coach_program_id">
                                <div class="form-group">
                                    <p class="tag-line">Image</p>
                                    <div class="upload-certificate-box">
                                        <img src="{{asset('public/images/add-more.png')}}" class="imgPreview1"
                                            alt="upload">
                                        <input name="image_file" type="file" accept="application/pdf"
                                            class="file imgUpload1 img5" data-show-upload="false"
                                            data-show-caption="true"
                                            data-msg-placeholder="Select {files} for upload...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usr">Title</label>
                                    <input type="text" class="form-control" name="title" id="usr"
                                        placeholder="Enter Title">
                                </div>
                        </div>
                        <input type="submit" class="cancel-yes" name="submit" value="SUBMIT" />
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