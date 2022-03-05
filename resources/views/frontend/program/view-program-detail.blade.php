@extends('layouts.guest')
@section('content')
<form class="input-box" action="" id="coachProgramForm" method="post" enctype="multipart/form-data">
    @csrf
    <!--start varification div area here -->
    <!-- <section class="profesional-common-box">
          <div class="container">
           <p><img src="images/notify.png"  class="mr-2" alt="notify">You are currently not verified. <a href="#"><span>Click here</span></a> or on the verification tab to verify yourself as a professional fitness coach.
          </div>
         </section> -->
    <!--end varification div area here -->

    <!--start banner area here -->
    <section class="common-light-header">
        <div class="container">
            <div class="popular-box text-center">
                <h1 class="oswald-font">{{Auth::user()->first_name." ".Auth::user()->last_name}}</h1>
                <span class="divide-line"></span>
                <!-- s -->
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
                            <a href="{{ route('coach.my-product-list') }}" class="no-border">
                                <h3>My Products</h3>
                            </a>
                            <h4>&gt;Product Detail</h4>
                        </div>

                    </div>
                    <div class="sale-by-location">
                        <div class="view-box">
                            <p class="my-2 form-p">Hero Image</p>
                            <a href="{{route('edit-program', @$coachProgram->id)}}" class="save-green-bt float-right">
                                <i class="fa fa-pencil" aria-hidden="true"></i> EDIT
                                PROGRAM
                            </a>
                            <div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    @if (!empty($coachProgram->image_file))
                                    <img src="{{ asset('public/' . $coachProgram->image_file) }}"
                                        class="profile_picture" alt="upload">
                                    @else
                                    <img src="{{ asset('public/images/default-image.png') }}" class="profile_picture"
                                        alt="upload">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Program Categories</p>
                            <p class="tag-line">
                                <?php $categories = explode(',', $coachProgram['categories']); ?>
                                @foreach ($categories as $category)
                                <span class="badge badge-secondary">
                                    {{ @$user->getCategoryName($category)}}
                                </span>
                                @endforeach
                            </p>
                        </div>
                        <div class="view-box">
                            <div class="view-box">
                                <p class="my-2 form-p">Program Name</p>
                                <p class="tag-line">{{ $coachProgram['program_name'] }}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">Program Description</p>
                            <p class="tag-line">{{ $coachProgram['description'] }}</p>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Program Short Description</p>
                            <p class="tag-line">{{ $coachProgram['short_description'] }}</p>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Price (EURO)</p>
                            <p class="tag-line">{{ DEFAULT_CURRENCY.$coachProgram['price'] }}</p>
                        </div>
                        <hr>
                        {{-- <div class="view-box">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="my-2 form-p">Stock Availability</label>
                                        <p class="tag-line">{{ $coachProgram['stock'] }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-6">
                            <label class="my-2 form-p">Stock Availability</label>
                            <p class="tag-line">{{ $coachProgram['tax_class'] }}</p>
                        </div>

                    </div>
            </div>
        </div> --}}
        <hr>
        <div class="result_field_wrapper">
            <div class="result-main-section">
                <div class="view-box">
                    <p class="my-2 form-p">Results
                @if (count($coachProgram['program_result']) < 5) </p>
                    <a class="save-green-bt float-right"
                        href="{{route('coach.add-program-result',@$coachProgram['id'])}}"> <i class="fa fa-plus"
                            aria-hidden="true"></i> ADD
                        RESULT
                    </a><br /><br />
                @endif
                    @if (count($coachProgram['program_result']) > 0)
                     <div class="form-row">
                        <div class="form-group col-md-2">
                            <p class="tag-line"><b>Image</b></p>
                        </div>
                        <div class="form-group col-md-3">
                            <p class="tag-line"><b>Accreditation or Certificate</b></p>
                        </div>
                        <div class="form-group col-md-2">
                            <p class="tag-line"><b>Star</b></p>
                        </div>
                        <div class="form-group col-md-3">
                            <p class="tag-line"><b>Institute or organisation</b></p>
                        </div>
                        <div class="form-group col-md-2">
                            <p class="tag-line"><b>Action</b></p>
                        </div>
                     </div>
                     @foreach ($coachProgram['program_result'] as $program)

                     <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    @if (!empty($program->image_file))
                                    <img src="{{ asset('public/' . $program->image_file) }}" class="profile_picture"
                                        alt="upload">
                                    @else
                                    <img src="{{ asset('public/images/default-image.png') }}" class="profile_picture"
                                        alt="upload">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <p class="tag-line">{{ $program['title'] }}</p>
                        </div>
                        <div class="form-group col-md-2">
                            <p class="tag-line">{{ $program['certificate'] }}</p>
                        </div>
                        <div class="form-group col-md-3">
                            <p class="tag-line">{{ $program['description'] }}</p>
                        </div>
                        <div class="form-group col-md-2">
                            <a href="{{ route('coach.edit-program-result',$program['id']) }}"><i
                                    class="fa fa-pencil edit-pencil-new mr-2" aria-hidden="true" data-toggle="modal"
                                    data-target="#edit-certified_{{$program['id']}}"></i></a>
                            <a href="{{ route('coach.delete-program-result',$program['id']) }}"
                                onclick="return confirm('Are you sure you want to delete this record?')"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>


                        <hr>
                    </div>
                    @endforeach
                    @else
                    <p class="tag-line">No record Found!</p>
            @endif
                </div>
            </div>
            <hr>


            <div class="result_field_wrapper">
                <div class="result-main-section">
                    <div class="view-box">
                        <p class="my-2 form-p">Inside the Program</p>
                        @if (count($coachProgram['program_inside']) < 5) <a class="save-green-bt float-right"
                            href="{{route('coach.add-program-inside',@$coachProgram['id'])}}"> <i class="fa fa-plus"
                                aria-hidden="true"></i> ADD
                            INSIDE
                            </a><br /><br />
                            @endif
                            @if (count($coachProgram['program_inside']) > 0)
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <p class="tag-line"><b>Title</b></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p class="tag-line"><b>Description</b></p>
                                </div>
                                <div class="form-group col-md-2">
                                    <p class="tag-line"><b>Action</b></p>
                                </div>
                            </div>
                            @foreach ($coachProgram['program_inside'] as $program)
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <p class="tag-line">{{ $program['title'] }}</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p class="tag-line">{{ $program['description'] }}</p>
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="{{ route('coach.edit-program-inside',$program['id']) }}"><i
                                            class="fa fa-pencil edit-pencil-new mr-2" aria-hidden="true"
                                            data-toggle="modal"></i></a>
                                    <a href="{{ route('coach.delete-program-inside',$program['id']) }}"
                                        onclick="return confirm('Are you sure you want to delete this record?')"><i
                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                            @else
                            <p class="tag-line">No record Found!</p>
                            @endif
                    </div>
                </div>
                <hr>



                <div class="inside_field_wrapper">
                    <div class="inside-main-section">
                        <div class="view-box">
                            <p class="my-2 form-p">Upload Your Program Files</p>
                            @if (count($coachProgram['program_image']) < 5) <a class="save-green-bt float-right"
                                href="{{route('coach.add-program-file',@$coachProgram['id'])}}"> <i class="fa fa-plus"
                                    aria-hidden="true"></i> ADD
                                PROGRAM FILE
                                </a><br /><br />
                                @endif
                                @if (count($coachProgram['program_image']) > 0)
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <p class="tag-line"><b>Title</b></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="tag-line"><b>Upload File</b></p>
                                    </div>
                                </div>
                                @foreach ($coachProgram['program_image'] as $program)
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <p class="tag-line">{{ $program['title'] }}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="upload-certificate-box-main">
                                            <div class="upload-certificate-box">
                                                @if (!empty($program))
                                                <iframe src="{{ asset('public/' . $program->image_file) }}" width="100%"
                                                    height="250px" class="profile_picture"></iframe>
                                                @else
                                                <img src="{{ asset('public/images/default-image.png') }}"
                                                    class="profile_picture" alt="upload">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <a href="{{ route('coach.edit-program-file',$program['id']) }}"><i
                                                class="fa fa-pencil edit-pencil-new mr-2" aria-hidden="true"
                                                data-toggle="modal"></i></a>
                                        <a href="{{ route('coach.delete-program-file',$program['id']) }}"
                                            onclick="return confirm('Are you sure you want to delete this record?')"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                                @else
                                <p class="tag-line">No record Found!</p>
                                @endif
                        </div>
                    </div>


                </div>
                </aside>
            </div>
        </div>
</form>
</section>
<!--ends my profile no date area here-->

@endsection
