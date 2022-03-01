@extends('layouts.guest')
@section('content')
    <form id="coachDetailForm" class="input-box" action="{{ route('coach.Profile.Detail') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        <!--start varification div area here -->
        @include('frontend.nav._alertSection')

        <!--end varification div area here -->


        <!--start banner area here -->
        <section class="common-light-header">
            <div class="container">
                <div class="popular-box text-center">

                    <h1 class="oswald-font">Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</h1>
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
                            <h3 class="oswald-font">Coach Profile</h3>
                            <!-- <a href="" class="save-green-bt"> <i class="fa fa-check"  aria-hidden="true"></i> SAVE PROFILE</a> -->
                        </div>
                        <div class="sale-by-location">
                            <h4 class="oswald-font">Edit Profile Information</h4>
                            <div class="view-box">
                                <p class="my-2 form-p">Hero Image<span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <div class="upload-certificate-box-main">
                                    <div class="upload-certificate-box">
                                        <img src="public/images/default-image.png" class="imgPreview" id="imgPreview"
                                            alt="upload">
                                        <input id="imgUpload" name="image_file" type="file"
                                            accept="image/jpeg, image/jpg, image/png" class="file imgUpload img5"
                                            data-show-upload="false" data-show-caption="true"
                                            data-msg-placeholder="Select {files} for upload...">
                                    </div>
                                </div>
                                <p class="tag-line">This is the main image on your profile page. It is one of the
                                    first things your clients see so make it great!</p>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Coach Page Images</p>
                                <div id="page-image" class="row"></div>
                                <!-- <div class="upload-certificate-box-main">

           <div class="upload-add ml-0">
            <div class="input-images-1" style="padding-top: .5rem;" >
            <input id="page_images" name="page_images[]" type="file" accept="image/jpeg, image/jpg, image/png" class="file input-images-1" multiple
            data-show-upload="" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
            </div>
           </div>

           <div class="page_image_validation" style="display:none; color:red"> Upload Max 5 Files allowed <b id="total_page_images"></b></div>
          </div> -->
                                <p class="tag-line">These are the main images that appear on your coach page. You are
                                    limited to 5 so make them great!</p>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">City</p>
                                <div class="form-select">
                                    <select class="form-input" name="city">
                                        <option value="">Select</option>
                                        <option>Mohali</option>
                                        <option>Delhi</option>
                                        <option>Dehradun</option>
                                        <option>Bhopal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Time Zone</p>
                                <div class="form-select">
                                    <select class="form-input" name="timezone">
                                        <option value="">Select</option>
                                        @foreach ($timezones as $timezone)
                                            <option timeZoneId="{{ $timezone->id }}"
                                                gmtAdjustment="{{ $timezone->diff_from_gtm }}"
                                                value="{{ $timezone->name }}">{{ $timezone->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="view-box">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="my-2 form-p">Price Range <span><i
                                                    class="fa fa-asterisk validate-mark"
                                                    aria-hidden="true"></i></span></label>
                                        <div class="form-select">
                                            <select class="form-input" name="price_range">
                                                <option value="">Select</option>
                                                <option>€</option>
                                                <option>€€</option>
                                                <option>€€€</option>
                                                <option>€€€€</option>
                                                <option>€€€€€</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="my-2 form-p">Gender</label>
                                        <div class="form-select">
                                            <select class="form-input" name="gender">
                                                <?php
                                                echo "<option value=''>Select Type</option>";
                                                foreach ($coachDetail->getGenderOptions() as $key => $val) {
                                                    echo '<option value=' . $key . '>' . $val . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">My Title <span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <input class="form-input" type="text" name="title">
                                <p class="tag-line">This will appear under your name on your coach profile page. It
                                    will help clients get to know you better.</p>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">My Bio <span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <textarea class="form-input" name="bio"></textarea>
                                <p class="tag-line">This will appear under your name on your coach profile page. It
                                    will help clients get to know you better.</p>
                            </div>
                            <hr>
                            <div class="view-box">
                                <p class="my-2 form-p">Coach Categories <span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input multiSelectDropDown" name="categories[]" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ @$category->id }}">{{ @$category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="tag-line">Select the categories that you specialise in so clients can find
                                    you.</p>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Personality & Training Style <span> <i
                                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input multiSelectDropDown" name="personality_and_training[]"
                                        multiple required>
                                        @foreach ($trainingStyles as $trainingStyle)
                                            <option value="{{ @$trainingStyle->id }}">{{ @$trainingStyle->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="tag-line">Select the traits that best align to your personality and the way
                                    you train clients.</p>
                            </div>
                            <hr>
                            <div class="view-box">
                                <p class="my-2 form-p">Languages <span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input multiSelectDropDown" name="languages[]" multiple required>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->name }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="tag-line">Select the languages you speak. We suggest only selecting
                                    languages that you can have a fluent conversation in.</p>
                            </div>
                            <hr>
                            <div class="field_wrapper">
                                <div class="main-section">
                                    <div class="view-box">
                                        <input type="hidden" name="education_count" id="education_count" value="">
                                        <p class="my-2 form-p">Education</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Accreditation or Certificate</p>
                                                <input class="form-input" type="text" name="education_title_1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Completion Year</p>
                                                @php
                                                    $years = array_combine(range(date('Y', strtotime('+5 year')), 1980), range(date('Y', strtotime('+5 year')), 1980));
                                                @endphp
                                                <div class="form-select">
                                                    <select class="form-input" name="completion_year_1">
                                                        <option value="">Select</option>
                                                        @foreach ($years as $key => $year)
                                                            <option value="{{ $key }}">{{ $year }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-box">
                                        <p class="tag-line">Institute or organisation</p>
                                        <input class="form-input" type="text" name="institute_1">

                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="add_button add-btn my-3"
                                title="Add field"><span>Add More <i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></span>
                            </a>
                            <p class="tag-line">This should be the title of your Degree, Diploma, Accreditaion,
                                Certificate or other</p>
                            <hr>
                            <div class="result_field_wrapper">
                                <div class="result-main-section">
                                    <div class="view-box">
                                        <input type="hidden" name="result_count" id="result_count" value="">
                                        <p class="my-2 form-p">Results</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Title</p>
                                                <input class="form-input" type="text" name="result_title_1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Stars</p>
                                                <div class="form-select">
                                                    <select class="form-input" id="exampleFormControlSelect1"
                                                        name="star_1">
                                                        <option value="">Select</option>
                                                        <option value="1">1 Star</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="5">5 Stars</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-box">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <p class="tag-line">Image</p>
                                                <div class="upload-certificate-box-main">
                                                    <div class="upload-certificate-box">
                                                        <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                                            class="imgPreview_1" alt="upload">
                                                        <input name="result_image_file_1" type="file"
                                                            class="file imgUpload imgUpload_1 img5" data-show-upload="false"
                                                            data-show-caption="true"
                                                            accept="image/jpeg, image/jpg, image/png"
                                                            data-msg-placeholder="Select for upload...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <p class="tag-line">Description</p>
                                                <textarea class="form-input" name="result_description_1"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="result_add_button add-btn my-3"
                                            title="Add field"><span>Add More Result <i class="fa fa-plus-circle"
                                                    aria-hidden="true"></i></span></a>
                            <p class="tag-line">Upload before & after images of your clients here, along with a
                                title, rating and short description. Make sure they have your permission to use their images
                                publicly</p>
                            <hr>
                            <div class="view-box">
                                <p class="my-2 form-p">Link Social Media Account</p>
                                <p class="tag-line">Twitter ID</p>
                                <input class="form-input" type="text" name="twitter_url"
                                    placeholder="E.g. https://twitter.com/trainbytrainer">
                                <p class="tag-line">Facebook ID</p>
                                <input class="form-input" type="text" name="facebook_url"
                                    placeholder="E.g. https://facebook.com/trainbytrainer">
                                <p class="tag-line">Instagram ID</p>
                                <input class="form-input" type="text" name="instagram_url"
                                    placeholder="E.g. https://instagram.com/trainbytrainer">
                                <p class="tag-line">Youtube ID</p>
                                <input class="form-input" type="text" name="youtube_url"
                                    placeholder="E.g. https://youtube.com/trainbytrainer">
                                <p class="tag-line">Pinterest ID </p>
                                <input class="form-input" type="text" name="pinterest_url"
                                    placeholder="E.g. https://pinterest.com/trainbytrainer">
                            </div>
                            <div class="profile-btm-btn">
                                <button class="blue-btn oswald-font my-3">SAVE Profile</button>
                                <!-- <a href="#" class="blue-btn outline oswald-font my-3">VIEW Profile</a> -->
                            </div>
                        </div>
                    </aside>


                </div>
            </div>
    </form>
    </section>
    <!--ends my profile no date area here-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var count = 1; //Initial field counter is 1
            var maxField = 5; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper



            //Once add button is clicked
            $(addButton).click(function(e) {

                //Check maximum number of input fields
                if (count < maxField) {
                    count++; //Increment field counter

                    $(wrapper).append(
                        `<div class="main-section"><div class="view-box"><div class="form-row"><div class="form-group col-md-6"><p class="tag-line">Accreditation or Certificate</p><input class="form-input" type="text"  id="education_title_` +
                        count + `" name="education_title_` + count + `"></div>
            <div class="form-group col-md-6"><p class="tag-line">Completion Year</p>
            @php
            $years = array_combine(range(date('Y', strtotime('+5 year')), 1980), range(date('Y', strtotime('+5 year')), 1980));
            @endphp
                    <div class="form-select">
			    	<select class="form-input" id="completion_year_` + count + `"   name="completion_year_` + count +
                        `">
			    		<option value="">Select</option>
   @foreach ($years as $key => $year)
       <option value="{{ $key }}">{{ $year }}</option>
   @endforeach
			    	</select>
                </div>
            </div>
            </div></div><div class="view-box"><p class="tag-line">Institute or organisation</p><input class="form-input" type="text" id="institute_` + count + `" name="institute_` +
                        count +
                        `"><a href="javascript:void(0);" style="float:right" class="remove_button add-btn my-3" title="Add field"><span>Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a></div></div>`
                        );

                } else {
                    alert("Warning!!, you can not add more than 5 section");
                }
                $("#education_title_" + count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength: 50,
                });
                $("#completion_year_" + count).rules('add', {
                    required: true,

                });
                $("#institute_" + count).rules('add', {
                    required: true,
                    maxlength: 125,
                });
                $("#education_count").attr("value", count);

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).closest('.main-section').remove();
                // $(this).parent('.main-section').remove(); //Remove field html
                count--; //Decrement field counter
                $("#education_count").attr("value", count);
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var result_count = 1; //Initial field counter is 1
            var resultMaxField = 5; //Input fields increment limitation
            var resultAddButton = $('.result_add_button'); //Add button selector
            var resultWrapper = $('.result_field_wrapper'); //Input field wrapper

            $(".imgUpload_1").on('change', function() {
                var file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('.imgPreview_1').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            //Once add button is clicked
            $(resultAddButton).click(function(e) {

                //Check maximum number of input fields
                if (result_count < resultMaxField) {
                    result_count++; //Increment field counter
                    $(resultWrapper).append(`<div class="result-main-section"><div class="view-box">
							<div class="form-row">
							    <div class="form-group col-md-6">
								    <p class="tag-line">Title</p>
								    <input class="form-input" type="text" id="result_title_` + result_count + `"  name="result_title_` +
                        result_count + `">
							    </div>
							    <div class="form-group col-md-6">
							    	<p class="tag-line">Stars</p>
									<div class="form-select">
		    							<select class="form-input" id="result_star_` + result_count + `" name="star_` + result_count + `">
									      <option value="">Select</option>
									      <option value="1">1 Star</option>
									      <option value="2">2 Stars</option>
									      <option value="3">3 Stars</option>
									      <option value="4">4 Stars</option>
									      <option value="5">5 Stars</option>
									    </select>
									</div>
							    </div>
						 	</div>
						</div>
						<div class="view-box">
							<div class="form-row">
							    <div class="form-group col-md-2">
								    <p class="tag-line">Image</p>
									<div class="upload-certificate-box">
										{{-- <img src="{{asset('public/images/default-image-file-o.png')}}" class="imgPreview" id="imgPreview_`+result_count+`"  alt="upload">
										<input id="imgUpload_`+result_count+`" name="result_image_file_`+result_count+`"  accept="image/jpeg, image/jpg, image/png"type="file" class="file imgUpload" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select for upload..."> --}}
                                        <div class="upload-certificate-box">
                                            <img src="{{ asset('public/images/default-image-file-o.png') }}" class="imgPreview1"   alt="upload">
                                            <input id="result_image_file_` + result_count +
                        `" type="file" accept="image/jpeg, image/jpg, image/png" name="result_image_file_` +
                        result_count + `"  class="file imgUpload1"
                                            data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                        </div>
                                    </div>
							    </div>
							    <div class="form-group col-md-10">
							    	<p class="tag-line">Description</p>
									<textarea class="form-input" id="result_description_` + result_count + `" name="result_description_` +
                        result_count + `"></textarea>
							    </div>
						 	</div>
						 	<a href="javascript:void(0);"  style="float:right" class="result_remove_button add-btn my-3" title="Add field"><span>Remove Result <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a>
						</div></div>`); //Add field html


                    $("#imgUpload_" + result_count).on('change', function() {
                        var file = this.files[0];
                        console.log(file);
                        if (file) {
                            let reader = new FileReader();
                            reader.onload = function(event) {
                                console.log(event.target.result);
                                $('#imgPreview_' + result_count).attr('src', event.target
                                    .result);
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                } else {
                    alert("Warning!!, you can not add more than 5 section");
                }
                $("#result_title_" + result_count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength: 50,
                });
                $("#result_star_" + result_count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength: 300,

                });
                $("#result_image_file_" + result_count).rules('add', {
                    required: true,
                    messages: {
                        accept: "Please select a valid image file",
                    },
                    messages: {
                        accept: "Please select a valid image file",
                    }
                });
                $("#result_description_" + result_count).rules('add', {
                    required: true
                });
                $("#result_count").attr("value", result_count);

            });


            //Once remove button is clicked
            $(resultWrapper).on('click', '.result_remove_button', function(e) {
                e.preventDefault();
                $(this).closest('.result-main-section').remove();
                // $(this).parent('.main-section').remove(); //Remove field html
                result_count--; //Decrement field counter
                $("#result_count").attr("value", result_count);
            });

        });
    </script>
    <script type="text/javascript">
        $(function() {

            $("#page-image").spartanMultiImagePicker({
                fieldName: 'page_images[]',
                maxCount: 5,
                fileAccept: 'image/png, image/jpg, image/jpeg, image/webp',
                rowHeight: '102px',
                groupClassName: 'col-md-2 col-sm-2 col-xs-6',
                maxFileSize: '',
                placeholderImage: {
                    image: "{{ asset('/public/images/add-more.png') }}",
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
        $('input.img5').bind('change', function() {
            var maxSizeKB = 5242880; //Size in KB
            var maxSize = maxSizeKB ; //File size is returned in Bytes
            if (this.files[0].size > maxSize) {
              $(this).val("");
              alert("Max size 5mb");
              return false;
            }
          });

    </script>

@endsection
