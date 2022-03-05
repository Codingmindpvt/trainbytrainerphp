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
                    @if($verificationDetail->badge_status == 'S')
                    <a href="{{route('coach-badge-send-request', $verificationDetail->id)}}">
                        <div class="save-green-bt"> <i class="fa fa-envelope" aria-hidden="true"></i> Send Request</div>
                    </a>
                    @endif

                </div>
                <form id="coachVerification" method="POST" action="{{route('update-coach-verification')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="sale-by-location">
                        <input type="hidden" name="id" value="{{$verificationDetail['id']}}">
                        <h4 class="oswald-font">Qualifications<span><i class="fa fa-asterisk validate-mark"
                            aria-hidden="true"></i></span></h4>
                        <div class="view-box">
                            <p class="my-2 form-p">Are you a qualified fitness coach?</p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="Yes"  name="qualified_fitness_coach" {{ $verificationDetail->qualified_fitness_coach == 'Y' ? 'checked' : ''}}>Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="No" name="qualified_fitness_coach" {{$verificationDetail->qualified_fitness_coach == 'N' ? 'checked' : ''}}>No
                                </label>
                            </div>
                        </div>

                        <div class="view-box">
                            <p class="my-2 form-p">What qualifications do you have? (list them all below separated by commas)</p>
                            <input type="text" class="form-input" value="{{$verificationDetail['qualification']}}" name="qualifications" required>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">What country did you get these qualifications in?</p>
                            <input type="text" class="form-input" value="{{$verificationDetail['country']}}" name="country" required>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">Upload certificate proof of your qualifications</p>

                            <div id="certificate" class="row">
                                <div class="upload-certificate-box-main">
                                    @if(count($verificationDetail['verification_document'])>0)
                                    @foreach($verificationDetail['verification_document'] as $certificate)
                                    @if($certificate['type'] == 'C')
                                    <a href="{{route('delete-coach-verification', $certificate->id)}}" onclick="return confirm('Are you sure want to delete qualification document?')" title="Delete Qualification Certificate"><i class="fa fa-trash"></i></a>
                                    <div class="upload-certificate-box" data-toggle="modal" data-target="{{'#'.$certificate['id']}}">
                                        <img src="{{asset('public/images/certificate.png')}}" class="profile_picture" alt="upload">
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
                                                    <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="700px" class="profile_picture"></iframe>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal end -->
                                    @endif
                                    @endforeach
                                    @else
                                    <div class="upload-certificate-box">
                                        <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture" alt="upload">
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="view-box imsurance-box">
                            <h4 class="oswald-font">Insurance<span><i class="fa fa-asterisk validate-mark"
                                aria-hidden="true"></i></span></h4>
                        </div>

                        <div class="view-box">
                            <p class="my-2 form-p">Are you a qualified fitness coach?</p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="Yes" name="currently_insured" {{$verificationDetail->currently_insured == 'Y' ? 'checked' : ''}} >Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="No" name="currently_insured" {{$verificationDetail->currently_insured == 'N' ? 'checked' : ''}}>No
                                </label>
                            </div>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">What insurer are you insured with?</p>
                            <input type="text" class="form-input" name="insured_with" value="{{$verificationDetail['insured_with']}}" required>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">What type of insurance do you have?</p>
                            <input type="text" class="form-input" name="insurance_type" value="{{$verificationDetail['insurance_type']}}" required>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">When does your insurance expire?</p>
                            <div class="cal-box">
                                <!-- <p>{{$verificationDetail['insurance_expire_date']}}</p> -->
                                <div class="cal-box">
                                    <input class="form-input" id="datepicker" type="date" min="{{ date('Y-m-d')}}" name="insurance_expire_date" value="{{$verificationDetail['insurance_expire_date']}}" required>
                                    {{-- <i class="fa fa-calendar" aria-hidden="true"></i>  --}}
                                </div>
                            </div>
                        </div>

                        <div class="view-box">
                            <p class="my-2 form-p">Upload your proof of insurance (this must clearly show that your insurance has been paid and is currently valid).</p>

                            <div id="insurance" class="row">
                            <div class="upload-certificate-box-main">
                                @if(count($verificationDetail['verification_document'])>0)
                                @foreach($verificationDetail['verification_document'] as $certificate)
                                @if($certificate['type'] == 'I')
                                <a href="{{route('delete-coach-verification', $certificate->id)}}" onclick="return confirm('Are you sure want to delete insurance document?')" title="Delete Insurance Certificate"><i class="fa fa-trash"></i></a>
                                <div class="upload-certificate-box" data-toggle="modal" data-target="{{'#'.$certificate['id']}}">
                                    <img src="{{asset('public/images/insurance.png')}}" class="profile_picture" alt="upload">
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
                                                <iframe src="{{ asset('public/' . $certificate->image_file) }}" width="100%" height="700px" class="profile_picture"></iframe>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- The Modal end -->
                                @endif
                                @endforeach

                                @else
                                <div class="upload-certificate-box">
                                    <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture" alt="upload">
                                </div>
                                @endif
                            </div>
                            </div>
                        </div>
                        <p class="imsurance-box">Being a qualified fitness coach does not mean you can coach anyone about anything fitness
                            related. A qualification only allows you to coach certain types of people and categories.</p>
                        <div class="view-box">
                            <label class="form-check-label">{!!$verificationDetail->getAgree()!!}</label>
                        </div>
                        <div class="container">
                            <button type="submit" class="blue-btn oswald-font my-3">Update verification</button>
                        </div>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#certificate").spartanMultiImagePicker({
            fieldName: 'certificates[]',
            fileAccept: 'application/pdf',
            setFileType: 'document',
            maxCount: 5,
            rowHeight: '102px',
            groupClassName: 'col-md-2 col-sm-2 col-xs-6',
            maxFileSize: '',
            docImage: "{{asset('/public/images/certificate.png')}}",
            placeholderImage: {
                image: "{{asset('/public/images/add-more.png')}}",
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onAddRow: function(index) {
                console.log(index);
                console.log('add new row');
            },
            onRenderedPreview: function(index) {
                console.log(index);
                console.log('preview rendered');
            },
            onRemoveRow: function(index) {
                console.log(index);
            },
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });

        $("#insurance").spartanMultiImagePicker({
            fieldName: 'insurances[]',
            fileAccept: 'application/pdf',
            setFileType: 'document',
            maxCount: 5,
            rowHeight: '102px',
            groupClassName: 'col-md-2 col-sm-2 col-xs-6',
            maxFileSize: '',
            docImage: "{{asset('/public/images/insurance.png')}}",
            placeholderImage: {
                image: "{{asset('/public/images/add-more.png')}}",
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onAddRow: function(index) {
                console.log(index);
                console.log('add new row');
            },
            onRenderedPreview: function(index) {
                console.log(index);
                console.log('preview rendered');
            },
            onRemoveRow: function(index) {
                console.log(index);
            },
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#coachVerification').validate({
        rules:{
            qualified_fitness_coach: {
                required: true
            },
            qualifications: {
                required: true
            },
            country: {
                required: true
            },
            currently_insured: {
                required: true
            },
            insured_with: {
                required: true
            },
            insurance_type: {
                required: true
            }
        }
    });
});
</script>

@endsection
