@extends('layouts.guest')
@section('content')
<form id="editCoachDetailForm" class="input-box" action="{{route('update-coach-profile')}}" method="post"
    enctype="multipart/form-data">
    @csrf
    <!--start varification div area here -->
    @if($coachDetail->coachVerificationDetail()->count()==0)
    @include('frontend.nav._alertSection')
    @endif

    <!--end varification div area here -->

    <!-- <?php
            // echo "<pre>";
            // print_r($coachDetail);
            // echo "</pre>";
            // die();
            ?> -->

    <!--start banner area here -->
    <section class="common-light-header">
        <div class="container">
            <div class="popular-box text-center">

                <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
                <span class="divide-line"></span>
                {{-- <p class="oswald-font light-text">View and edit COACH OR personal details here</p> --}}
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
                        <h3 class="oswald-font">Coach Profile</h3>
                        <!-- <a href="" class="save-green-bt"> <i class="fa fa-check"  aria-hidden="true"></i> SAVE PROFILE</a> -->
                    </div>
                    <div class="sale-by-location">
                        <h4 class="oswald-font">Edit Profile Information</h4>
                        <div class="view-box">
                            <input type="hidden" name="id" value="{{$coachDetail->id}}">
                            <p class="my-2 form-p">Hero Image<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    @if(!empty($coachDetail->image_file))
                                    <img src="{{asset('public/'.$coachDetail->image_file)}}" id="output" />
                                    @else
                                    <img src="{{asset('public/images/default-image.png')}}" class="imgPreview"
                                        id="imgPreview" alt="upload">
                                    @endif
                                    <!-- <img src="{{asset('public/images/default-image.png')}}" class="imgPreview" id="imgPreview" alt="upload"> -->
                                    <input id="imgUpload" onchange="loadFile(event)" name="image" type="file"
                                        value="{{$coachDetail->image_file}}" accept="image/jpeg, image/jpg, image/png"
                                        class="file imgUpload" data-show-upload="false" data-show-caption="true"
                                        data-msg-placeholder="Select {files} for upload...">
                                </div>
                            </div>
                            <p class="tag-line">This is the main image on your profile page. It is one of the first
                                things your clients see so make it great!</p>
                        </div>
                        <div class="view-box">
                            <!-- {{$coachDetail['coach_images']}} -->
                            <p class="my-2 form-p">Coach Page Images</p>
                            <div class="upload-certificate-box-main">
                                @foreach($coachDetail['coach_images'] as $page_image)
                                <div class="coach-image-section">
                                    <div id="coach-image-view">
                                        <input type="hidden" id="coach_detail_id"
                                            value="{{$page_image->coach_detail_id}}">
                                        <span class="remove_coach_image" id="{{$page_image->id}}"
                                            title="Delete Coach Page Image"><i class="fa fa-close"></i></span>
                                        <div class="upload-coach-image-box">
                                            <img src="{{asset('public/'.$page_image->image_file)}}"
                                                class="profile_picture img_" alt="upload">
                                        </div>
                                    </div>&nbsp
                                </div>
                                @endforeach
                                <input type="hidden" value="{{count($coachDetail['coach_images'])}}" id="image_count">
                            </div>
                            <div id="page-image" class="row"></div>
                            <div class="upload-certificate-box-main">

                                <!-- <div class="upload-add ml-0">
                                        <div class="input-images-1" style="padding-top: .5rem;" >
                                        <input id="page_images" name="page_images[]" type="file" accept="image/jpeg, image/jpg, image/png" class="file input-images-1" multiple
                                        data-show-upload="" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                        </div>
                                    </div> -->

                                <div class="page_image_validation" style="display:none; color:red"> Upload Max 5 Files
                                    allowed <b id="total_page_images"></b></div>
                            </div>
                            <p class="tag-line">These are the main images that appear on your coach page. You are
                                limited to 5 so make them great!</p>
                        </div>



                        <div class="view-box">
                            <p class="my-2 form-p">City<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <div class="form-group">
                                <input type="hidden" name="address_lat" id="address_lat"
                                    value="{{@$user->address_lat}}">
                                <input type="hidden" name="address_long" id="address_long"
                                    value="{{@$user->address_long}}">
                                <input type="text" class="form-control form-input" name="city" id="address"
                                    placeholder="202 main chock, Dolphin nagar" value="{{$coachDetail->city ?? ''}}"">
                                </div>

                        </div>
                        {{--  <div class="view-box">
                            <p class="my-2 form-p">Time Zone</p>
                            <div class="form-select">
                                <select class="form-input" name="timezone">
                                    <option value="{{$coachDetail->timezone}}">{{$coachDetail->timezone ?? ''}}
                                </option>
                                @foreach($timezones as $timezone)
                                <option timeZoneId="{{$timezone->id}}" gmtAdjustment="{{$timezone->diff_from_gtm}}"
                                    value="{{$timezone->name}}">{{$timezone->name}}</option>
                                @endforeach
                                </select>
                                <!-- <input type="text" class="form-control" value="{{$coachDetail->timezone ?? ''}}" name="timezone" placeholder="Enter timezone"> -->
                            </div>
                        </div> --}}
                        <div class="view-box">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="my-2 form-p">Price Range<span><i class="fa fa-asterisk validate-mark"
                                                aria-hidden="true"></i></span></label>
                                    <div class="form-select">
                                        <!-- <input type="text" class="form-control" value="{{$coachDetail->price_range ?? ''}}" name="price_range"> -->
                                        <select class="form-input" name="price_range">
                                            <option value="{{$coachDetail->price_range ?? ''}}">
                                                {{$coachDetail->price_range ?? ''}}</option>
                                            <option value="€">€</option>
                                            <option value="€€">€€</option>
                                            <option value="€€€">€€€</option>
                                            <option value="€€€€">€€€€</option>
                                            <option value="€€€€€">€€€€€</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="my-2 form-p">Gender<span><i
                                                class="fa fa-asterisk validate-mark" aria-hidden="true"></i></label>
                                    <div class="form-select">
                                        <select class="form-input" name="gender">
                                            {{-- <option value="{{$coachDetail->gender}}">{{$coachDetail->getGender()}}
                                            </option> --}}
                                            <?php
                                            echo "<option value=''>Select Type</option>";
                                            foreach ($coachDetail->getGenderOptions() as $key => $val) {
                                                ?>
                                            <option value="{{ $key }}"
                                                <?= ($coachDetail->getGender() == $val) ? 'selected' : '' ?>>{{ $val }}
                                            </option>
                                            <?php }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">My Title<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <input class="form-input" type="text" name="title" value="{{$coachDetail->title ?? ''}}">
                            <p class="tag-line">This will appear under your name on your coach profile page. It will
                                help clients get to know you better.</p>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">My Bio<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <textarea class="form-input" name="bio">{{$coachDetail->bio ?? ''}}</textarea>
                            <p class="tag-line">This will appear under your name on your coach profile page. It will
                                help clients get to know you better.</p>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Coach Categories<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <div class="form-select">
                                @php
                                $getCategoryIdsArray = explode(',', $coachDetail['categories']);
                                @endphp
                                <select class="form-input multiSelectDropDown" name="categories[]" multiple required>
                                    @foreach($categories as $category)
                                    <option value="{{@$category->id}}" @if(in_array($category->id, $getCategoryIdsArray
                                        )) selected
                                        @endif >{{@$category->title}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="category" id="cat" placeholder="Program Name" style="visibility: hidden;">
                                <span class="multi_error error_" style="font-size: 13px"> </span> --}}
                            </div>
                            <p class="tag-line">Select the categories that you specialise in so clients can find you.
                            </p>
                        </div>
                        <div class="view-box">
                            <p class="my-2 form-p">Personality & Training Style<span><i
                                        class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                            <div class="form-select">
                                @php
                                $getTrainingStyleArray = explode(',', $coachDetail['personality_and_training']);
                                @endphp
                                <select class="form-input multiSelectDropDown" name="personality_and_training[]"
                                    multiple required>
                                    @foreach($trainingStyles as $trainingStyle)
                                    <option value="{{@$trainingStyle->id}}" @if(in_array($trainingStyle->id,
                                        $getTrainingStyleArray)) selected
                                        @endif>{{@$trainingStyle->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="tag-line">Select the traits that best align to your personality and the way you
                                train clients.</p>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Languages<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></span></p>
                            <div class="form-select">
                                @php
                                $getLanguageIdsArray = explode(',', $coachDetail['languages']);
                                @endphp
                                <select class="form-input multiSelectDropDown" name="languages[]" multiple required>
                                    <!-- <option selected>{{$coachDetail->languages}}</option> -->
                                    @foreach($languages as $language)
                                    <option value="{{$language->name}}" @if(in_array($language->name,
                                        $getLanguageIdsArray)) selected
                                        @endif>{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="tag-line">Select the languages you speak. We suggest only selecting languages that
                                you can have a fluent conversation in.</p>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Link Social Media Account</p>
                            <p class="tag-line">Twitter ID</p>
                            <input class="form-input" type="text" value="{{$coachDetail->twitter_url}}"
                                name="twitter_url" placeholder="E.g. https://twitter.com/trainbytrainer">
                            <p class="tag-line">Facebook ID</p>
                            <input class="form-input" type="text" value="{{$coachDetail->facebook_url}}"
                                name="facebook_url" placeholder="E.g. https://facebook.com/trainbytrainer">
                            <p class="tag-line">Instagram ID</p>
                            <input class="form-input" type="text" value="{{$coachDetail->instagram_url}}"
                                name="instagram_url" placeholder="E.g. https://instagram.com/trainbytrainer">
                            <p class="tag-line">Youtube ID</p>
                            <input class="form-input" type="text" value="{{$coachDetail->youtube_url}}"
                                name="youtube_url" placeholder="E.g. https://youtube.com/trainbytrainer">
                            <p class="tag-line">Pinterest ID </p>
                            <input class="form-input" type="text" value="{{$coachDetail->pinterest_url}}"
                                name="pinterest_url" placeholder="E.g. https://pinterest.com/trainbytrainer">
                        </div>
                        <button type="submit" class="blue-btn oswald-font my-3">Update Coach Profile</button>
                    </div>
                </aside>
            </div>
        </div>
</form>
</section>
<!--ends my profile no date area here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
//remove image
$(document).ready(function() {
    $('.remove_coach_image').on('click', function() {

        var thisData = this;
        var image_id = this.id;
        var coach_detail_id = $(this).closest('.coach-image-section').find("#coach_detail_id").val();
        if (image_id != "") {
            var token = '{{ csrf_token() }}';
            var url = "{{route('delete-coach-profile')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: image_id,
                    coach_detail_id: coach_detail_id,
                    _token: token
                },
                success: function(data) {
                    $(thisData).closest('.coach-image-section').find("#coach-image-view")
                        .remove();
                    var deleteCount = $('.img_').length - 1;
                    //  alert(deleteCount);
                    $("#image_count").val(deleteCount);
                    if (deleteCount >= 5) {
                        $("#page-image").hide();
                    } else {

                        $("#page-image").show();

                    }
                }
            });
        }
    });
    //spartan_image_placeholder
    $(function() {
        //$('.spartan_image_placeholder').on('click', function() {
        var oo = $('.img_').length;
        // alert(oo);
        if (oo >= 5) {
            $("#page-image").hide();
        } else {
            $("#page-image").show();

        }

        var image_count = 5 - $('.img_').length;
        // var image_count = 5 - $("#image_count").val();


        $("#page-image").spartanMultiImagePicker({
            fieldName: 'page_images[]',
            maxCount: image_count,
            fileAccept: 'image/png, image/jpg, image/jpeg, image/webp',
            setFileType: 'image',
            rowHeight: '102px',
            groupClassName: 'col-md-2 col-sm-2 col-xs-6',
            maxFileSize: '',
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
});
</script>
<script type='text/javascript'>
$(document).ready(function() {
    $("#imgUpload").validate({
        rules: {
            image: {
                accept: "jpg|jpeg|png|gif"
            }
        },
        messages: {
            image: {
                accept: 'Not an image!'
            }
        }
    })
});
</script>

<!-- Image Upload -->
<script type='text/javascript'>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
<!-- Jquery Validation -->


@endsection