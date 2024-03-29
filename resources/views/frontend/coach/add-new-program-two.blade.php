@extends('layouts.guest')
@section('content')
    <form class="input-box" action="{{ route('add-serviceprogram') }}" id="coachProgramForm" method="post"
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
                    {{-- <p class="oswald-font light-text">View and edit PROGRAM DETAILS HERE </p> --}}
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
                                <a href="{{ route('add-new-program') }}" class="no-border">
                                    <h3>Products</h3>
                                </a>
                                <h4> &gt; Add New Product</h4>
                            </div>

                        </div>
                        <div class="sale-by-location">
                            <div class="view-box">
                                <p class="my-2 form-p">Program Image<span><i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></p>
                                {{--  <div class="upload-certificate-box-main">
                                    <div class="upload-certificate-box">
                                        <img src="public/images/add.png" class="profile_picture" alt="upload">
                                    </div> &nbsp
                                    <div class="upload-add ml-0">
                                        <input id="input-b3" name="image_file" onchange="profileurl(this);" type="file"
                                            accept="image/jpeg, image/jpg, image/png" class="file"
                                            data-show-upload="false" data-show-caption="true"
                                            data-msg-placeholder="Select {files} for upload...">
                                    </div>

                                </div>  --}}
                                <div class="upload-certificate-box-main">
                                    <div class="upload-certificate-box">
                                        <img src="public/images/add.png" class="imgPreview1"
                                            alt="upload">
                                        <input name="image_file" type="file"
                                            accept="image/jpeg, image/jpg, image/png"
                                            class="file imgUpload1 img5" data-show-upload="false"
                                            data-show-caption="true"
                                            data-msg-placeholder="Select {files} for upload...">
                                            <span class="text-danger"  aria-hidden="true">{{ $errors->first('image_file') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Program Categories<span> <i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input multiSelectDropDown" id="category" name="categories[]" multiple
                                        required>
                                        @foreach ($categories as $category)
                                            <option value="{{ @$category->id }}">{{ @$category->title }}</option>
                                        @endforeach
                                        <input type="text" name="category" id="cat" placeholder=""
                                        style="visibilty: hidden;">
                                    <span class="multi_error error_" style="font-size: 13px"></span>
                                    </select>

                                </div>
                                <p class="tag-line">This will appear under your name on your coach profile page. It
                                    will help clients get to know you better.</p>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Program Name<span><i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></p>
                                <input class="form-input" type="text" name="program_name" placeholder="Program Name">
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Program Description<span><i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></p>
                                <textarea class="form-input" name="description"
                                    placeholder="Program Description"></textarea>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Program Short Description<span><i
                                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></p>
                                <textarea class="form-input" name="short_description"
                                    placeholder="Program Short Description"></textarea>
                            </div>
                            <div class="view-box">
                                <p class="my-2 form-p">Price (EUR)<span><i class="fa fa-asterisk validate-mark"
                                            aria-hidden="true"></i></p>
                                <input class="form-input" type="text" name="price" placeholder="Enter Price " id="price">
                                <p class="tag-line">Prices are currently listed in EUR Dollars. Please also consider
                                    taxes and our standard commission {{  $commission['commission_percent'] }}% when creating this price.</p>
                            </div>
                            {{--  <div class="view-box">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4" class="my-2 form-p">Stock Availability</label>
                                        <div class="form-select">
                                            <select class="form-input" name="stock">
                                                <option>Select</option>
                                                <option>Instock</option>
                                                <option>Out of stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="my-2 form-p">Tax Class</label>
                                        <div class="form-select">
                                            <select class="form-input" name="tax_class">
                                                <option>None</option>
                                                <option>Taxable Goods</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                            <hr>
                            <div class="result_field_wrapper">
                                <div class="result-main-section">
                                    <div class="view-box">
                                        <input type="hidden" name="result_count" id="result_count" value="">
                                        <p class="my-2 form-p">Results</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Title<span><i class="fa fa-asterisk validate-mark"
                                                            aria-hidden="true"></i></p>
                                                <input class="form-input" type="text" name="result_title_1"
                                                    placeholder="Enter Results Title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p class="tag-line">Star</p>
                                                <div class="form-select">
                                                    <select class="form-input" name="star_1">
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
                                            <div class="form-group col-md-3">
                                                <p class="tag-line">Image</p>
                                                <div class="upload-certificate-box-main">
                                                    <div class="upload-certificate-box upload-err">
                                                        <img src="public/images/add.png" class="imgPreview1"
                                                            alt="upload">
                                                        <input name="result_image_file_1" type="file"
                                                            accept="image/jpeg, image/jpg, image/png"
                                                            class="file imgUpload1 img5" data-show-upload="false"
                                                            data-show-caption="true"
                                                            data-msg-placeholder="Select {files} for upload...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <p class="tag-line">Description</p>
                                                <textarea class="form-input" name="result_description_1"
                                                    placeholder="Enter Results Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="result_add_button add-btn my-3"
                            title="Add field"><span>Add More Result <i class="fa fa-plus-circle"
                                    aria-hidden="true"></i></span></a>
                            <p class="tag-line">Upload before & after images of your clients here, along with a title,
                                rating and short description. Make sure they have your permission to "use" their images
                                publicly</p>
                            <hr>
                            <div class="inside_field_wrapper">
                                <div class="inside-main-section">
                                    <div class="view-box">
                                        <input type="hidden" name="inside_count" id="inside_count" value="">
                                        <p class="my-2 form-p">Inside the Program</p>
                                        <p class="tag-line">Title</p>
                                        <input class="form-input" type="text" name="inside_title_1"
                                            placeholder="Shot title explaining a feature of the program">
                                        <p class="tag-line">Description</p>
                                        <textarea class="form-input" placeholder="More information about the title"
                                            name="inside_description_1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="inside_add_button add-btn my-3"
                            title="Add field"><span><i class="fa fa-plus"
                                    aria-hidden="true"></i></span>Add more</a>
                            <hr>
                            <div class="field_wrapper">
                                <div class="main-section">
                                    <div class="view-box">
                                        <input type="hidden" name="education_count" id="education_count" value="">
                                        <p class="my-2 form-p">Upload Your Program Files</p>
                                        <p class="tag-line">Title</p>
                                        <input class="form-input" type="text" name="education_title_1"
                                            placeholder="Shot title explaining a feature of the program">
                                        <p class="tag-line">Upload File</p>
                                        <div class="upload-certificate-box-main add-upload side-error">
                                            <!-- <div class="upload-certificate-box">
                                      <img src="images/upload.png" alt="upload">
                                       </div> -->
                                            {{-- <div class="upload-add ml-0">

									<input id="input-b3" name="education_image_file_1" type="file" accept="application/pdf" class="file" multiple
	        						data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
	        						<div></div>
								</div>
							   </div> --}}
                                            <div class="upload-certificate-box">
                                                <img src="public/images/add-more.png" class="imgPreview1" alt="upload">
                                                <input name="education_image_file_1" type="file" accept="application/pdf"
                                                    class="file imgUpload1 img5" data-show-upload="false"
                                                    data-show-caption="true"
                                                    data-msg-placeholder="Select {files} for upload...">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="javascript:void(0);" class="add_button add-btn my-3"
                            title="Add field"><span>Add More <i class="fa fa-plus-circle"
                                    aria-hidden="true"></i></span>
                        </a>
                            <div class="profile-btm-btn">
                                <button type="submit" class="blue-btn oswald-font my-3" id="saveprogram">SAVE</button>
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

            $(".multiSelectDropDown").change(function () {
                $('#cat-error').html('')
                var val = $(this).val();
               if(val.length <= 0){
                $('.multi_error').css('color','red').html('Please select a category');
               }else{
                //$('.multi_error').html('');
                $('#cat-error').html('');
               }
                {{--  var prevSelect = $("#MultiSelect_Preview").select2();
                prevSelect.val($(this).val()).trigger('change');  --}}
             });

              //categories validation
               $("#saveprogram").click(function(e) {
                var submit = true;
                e.preventDefault();
                $("#cat").val($('.multiSelectDropDown').val())
                $('.error_').html('')

                $('#coachProgramForm').submit();

            });

            var count = 1; //Initial field counter is 1
            var maxField = 5; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper

            //Once add button is clicked
            $(addButton).click(function(e) {

                //Check maximum number of input fields
                if (count < maxField) {
                    count++; //Increment field counter
                    $(wrapper).append(`<div class="main-section"><div class="view-box"><p class="my-2 form-p">Upload Your Program Files</p>
							<p class="tag-line">Title</p>
							<input class="form-input" type="text" id="education_title_` + count +
                            `" name="education_title_` + count +
                        `"  placeholder="Shot title explaining a feature of the program">
							<p class="tag-line">Upload File</p>
							<div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    <img src="public/images/add-more.png" class="imgPreview1"  id="imgPreview" alt="upload">
                                    <input  type="file"  class="file imgUpload1" accept="application/pdf" name="education_image_file_` +
                        count +
                        `"id="education_image_file_` +
                        count +
                        `"
                                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                </div>
							</div><a href="javascript:void(0);" style="float:right" class="remove_button add-btn my-3" title="Add field"><span>Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a></div></div>`
                    ); //Add field html
                }
                else{
                    alert("Warning!!, you can not add more than 5 section");
                }
                $("#education_title_"+count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength:50,
                });
                $("#education_image_file_"+count).rules('add', {
                    required: true,
                    messages: {
                        accept: "Please select a valid pdf ",
                      }
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



            //Once add button is clicked
            $(resultAddButton).click(function(e) {

                //Check maximum number of input fields
                if (result_count < resultMaxField) {
                    result_count++; //Increment field counter
                    $(resultWrapper).append(`<div class="result-main-section"><div class="view-box">
							<div class="form-row">
							    <div class="form-group col-md-6">
								    <p class="tag-line">Title</p>
								    <input class="form-input" type="text" id="result_title_` + result_count +`" name="result_title_` + result_count + `" placeholder="Enter Results Titles" required>
							    </div>
					    		 <div class="form-group col-md-6">
							    	<p class="tag-line">Star</p>
									<div class="form-select">
		    							<select class="form-input" id="star_` + result_count +`"  name="star_` + result_count +`">
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
										<!-- <div class="upload-certificate-box">
											<img src="public/images/upload.png" alt="upload">
										</div> -->

                                        <div class="upload-certificate-box upload-err">
                                            <img src="public/images/add.png" class="imgPreview1"  id="imgPreview_` +result_count + `" alt="upload">
                                            <input data-id="` +result_count + `" id="result_image_file_` +result_count + `" type="file" accept="image/jpeg, image/jpg, image/png" name="result_image_file_` +
                                        result_count + `"class="image_upload file imgUpload1` +result_count + `"
                                            data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                        </div>
									</div>
							    </div>
							    <div class="form-group col-md-10">
							    	<p class="tag-line">Description</p>
									<textarea class="form-input" id="result_description_` + result_count + `" name="result_description_` + result_count + `" placeholder="Enter Results Description"></textarea>
							    </div>
						 	</div>
						 	<a href="javascript:void(0);" style="float:right" class="result_remove_button add-btn my-3" title="Add field"><span>Remove Result <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a>
						</div></div>`); //Add field html
                }
                else{
                    alert("Warning!!, you can not add more than 5 section");
                }
                $("#result_title_"+result_count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength:50,
                });
                $("#result_description_"+result_count).rules('add', {
                    required: true,
                    noSpace: true,
                    maxlength:300,

                });
                $("#result_image_file_"+result_count).rules('add', {
                    required: true,
                    messages: {
                        accept: "Please select a valid image file",
                      }
                });
                $("#star_"+result_count).rules('add', {
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
        $(document).ready(function() {
            var inside_count = 1; //Initial field counter is 1
            var insideMaxField = 5; //Input fields increment limitation
            var insideAddButton = $('.inside_add_button'); //Add button selector
            var insideWrapper = $('.inside_field_wrapper'); //Input field wrapper



            //Once add button is clicked
            $(insideAddButton).click(function(e) {

                //Check maximum number of input fields
                if (inside_count < insideMaxField) {
                    inside_count++; //Increment field counter
                    $(insideWrapper).append(`<div class="inside-main-section">
                    <div class="view-box">
                        <p class="my-2 form-p">Inside the Program</p>
                        <p class="tag-line">Title</p>
                        <input class="form-input" type="text" id="inside_title_` + inside_count +
                        `" name="inside_title_` + inside_count +
                        `" placeholder="Shot title explaining a feature of the program">
                        <p class="tag-line">Description</p>
                        <textarea class="form-input inside_description_` +inside_count +
                        `" placeholder="More information about the title" name="inside_description_` +
                        inside_count + `"></textarea>
                        <a href="javascript:void(0);" style="float:right" class="inside_remove_button add-btn my-3" title="Add field"><span>Remove Result <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a>
                    </div>
                </div>`); //Add field html

                    //validation
                    $("#inside_title_"+inside_count).rules('add', {
                        required: true,
                        noSpace: true,
                        maxlength:50,
                    });
                    $(".inside_description_"+inside_count).rules('add', {
                        required: true,
                        noSpace: true,
                        maxlength:300,
                    });
                }
             else{
                    alert("Warning!!, you can not add more than 5 section");
                }
                $("#inside_count").attr("value", inside_count);

            });

            //Once remove button is clicked
            $(insideWrapper).on('click', '.inside_remove_button', function(e) {
                e.preventDefault();
                $(this).closest('.inside-main-section').remove();
                // $(this).parent('.main-section').remove(); //Remove field html
                inside_count--; //Decrement field counter
                $("#inside_count").attr("value", inside_count);
            });

        });
        var cVal = 0;

        $('#price').keyup(function(){
            var regexPositiveFloat = /^([0-9]*)(.[0-9]{0,2})?$/;
            if(regexPositiveFloat.test($('#price').val())){
                console.log('Current Value',$('#price').val())
                cVal= $('#price').val();
                $('#price').val(cVal);
            }else {
                $('#price').val(cVal);
            }


            var val = $(this).val();




            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>0)
                     val =val.replace(/\.+$/,'');
            }
            $(this).val(val);
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
