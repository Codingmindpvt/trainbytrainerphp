@extends('layouts.guest')
@section('content')
<form class="input-box" action="{{ route('update-program') }}" id="coachProgramFormEdit" method="post"
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
                <p class="oswald-font light-text">View and edit PROGRAM DETAILS HERE </p>
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
                                <h3>Products</h3>
                            </a>
                            <h4>&gt;Edit Product</h4>
                        </div>
                    </div>
                    <div class="sale-by-location">
                        <div class="view-box">
                            <p class="my-2 form-p">Program Image<span><i class="fa fa-asterisk validate-mark"
                                        aria-hidden="true"></i></p>
                            <div class="upload-certificate-box">
                                <!-- @if(!empty(@$program['image_file']))
                                <img src="{{asset('public/'.$program->image_file)}}">
                                @else
                                <img src="{{asset('public/images/default-image.png')}}" class="imgPreview" id="imgPreview" alt="upload">
                                @endif -->
                                @if (!empty($coachPrograms->image_file))
                                <img src="{{ asset('public/' . $coachPrograms->image_file) }}" id="blah">
                                @else
                                <img src="{{ asset('public/images/default-image.png') }}" class="profile_picture"
                                    alt="upload">
                                @endif
                                <input onchange="loadFile(event)" id="imgUpload" name="program_image" type="file"
                                    accept="image/jpeg, image/jpg, image/png" class="file imgUpload"
                                    data-show-upload="false" data-show-caption="true"
                                    data-msg-placeholder="Select {files} for upload...">
                            </div>

                        </div>
                        <input type="hidden" name="program_id" value="{{$program[0]['id']}}" placeholder="Program Name">

                    <div class="view-box">
                        <p class="my-2 form-p">Program Categories<span><i class="fa fa-asterisk validate-mark"
                                    aria-hidden="true"></i></span></p>
                        <div class="form-select">
                            @php
                            $getCategoryIdsArray = explode(',', $program[0]['categories']);
                            @endphp
                            <select class="form-input multiSelectDropDown" name="categories[]" multiple required>
                                @foreach($categories as $category)
                                <option value="{{@$category->id}}" @if(in_array($category->id, $getCategoryIdsArray ))
                                    selected
                                    @endif >{{@$category->title}}</option>
                                @endforeach
                            </select>
                            <input type="text" name="category" id="cat" placeholder="Program Name"
                                style="visibility: hidden;">
                            <span class="multi_error error_" style="font-size: 13px"> </span>
                        </div>
                        <p class="tag-line">This will appear under your name on your coach profile page. It
                            will help clients get to know you better.</p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Program Name<span><i class="fa fa-asterisk validate-mark"
                                    aria-hidden="true"></i></p>
                        <input class="form-input" type="text" name="program_name"
                            value="{{$program[0]['program_name']}}" placeholder="Program Name">
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Program Description<span><i class="fa fa-asterisk validate-mark"
                                    aria-hidden="true"></i></p>
                        <textarea class="form-input" name="description"
                            placeholder="Program Description">{{$program[0]['description']}}</textarea>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Program Short Description<span><i class="fa fa-asterisk validate-mark"
                                    aria-hidden="true"></i></p>
                        <textarea class="form-input" name="short_description"
                            placeholder="Program Short Description">{{$program[0]['short_description']}}</textarea>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Price ({{DEFAULT_CURRENCY_SORT_NAME}})<span><i
                                    class="fa fa-asterisk validate-mark" aria-hidden="true"></i></p>
                        <input class="form-input" type="text" name="price" placeholder="Enter Price " id="price"
                            value="{{$program[0]['price']}}">
                        <p class="tag-line">Prices are currently listed in EURO.Please also consider
                            taxes and our standard commission (15%) when creating this price.</p>
                    </div>


                    <div class="profile-btm-btn">
                        <button type="submit" class="blue-btn oswald-font my-3" id="saveprogram">SAVE</button>
                    </div>
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
    var baseUrl = "{{URL('/')}}";
    //categories validation
    $("#saveprogram").click(function(e) {
        var submit = true;
        e.preventDefault();
        $("#cat").val($('.multiSelectDropDown').val())
        $('.error_').html('')


        $('#coachProgramFormEdit').submit();

    });

    $("#pdfUpload_1").on('change', function() {
        var file = this.files[0];
        $this = $(this);
        console.log(file.type);
        if (file.type === 'application/pdf') {
            $('#pdfPreview_1').attr('src', baseUrl + '/public/images/pdf.jpg');
            return false;
        }
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                console.log(event.target.result);
                $('#pdfPreview_1').css('border', '2px solid')
                $('#pdfPreview_1').attr('src', event.target.result);

            }
            reader.readAsDataURL(file);
        }
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
							<input class="form-input" type="text" name="education_title_1` + count +
                `"  placeholder="Shot title explaining a feature of the program">
							<p class="tag-line">Upload File</p>
							<div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    <img src="public/images/add-more.png" class="pdfPreview_` + count +
                `"  id="pdfPreview_` + count + `" alt="upload">
                                    <input id="pdfUpload` + count +
                `" type="file" accept="application/pdf" name="education_image_file_` +
                count +
                `"  class="file imgUpload1"
                                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                </div>
							</div><a href="javascript:void(0);" class="remove_button add-btn my-3" title="Add field"><span>Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a></div></div>`
            ); //Add field html

            $("#pdfUpload_" + count).on('change', function() {
                var file = this.files[0];
                $this = $(this);
                console.log(file.type);
                if (file.type == 'application/pdf') {
                    //alert("ok");
                    $('#pdfPreview_' + count).attr('src', baseUrl + '/public/images/pdf.jpg');
                    return false;
                }
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#pdfPreview_' + count).css('border', '2px solid')
                        // $this.parent().find('#pdfPreview_' + count).attr('src', event.target.result);
                        $('#pdfPreview_' + count).attr('src', event.target.result);

                    }
                    reader.readAsDataURL(file);
                }
            });
        }
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
    $("#imgUpload_1").on('change', function() {
        var file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                console.log(event.target.result);
                $('#imgPreview_1').attr('src', event.target.result);
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
								    <input class="form-input" type="text" name="title` + result_count + `" placeholder="Enter Results Titles">
							    </div>
					    		 <div class="form-group col-md-6">
							    	<p class="tag-line">Star</p>
									<div class="form-select">
		    							<select class="form-input"  name="star` + result_count + `">
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
                                            <img src="{{asset('public/images/default-image.png')}}" id="imgPreview_` +
                result_count + `" alt="upload">
                                            <input id="imgUpload_` + result_count +
                `" type="file" accept="image/jpeg, image/jpg, image/png" name="image_file` +
                result_count + `"  class="file imgUpload1"
                                            data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                                        </div>
									</div>
							    </div>
							    <div class="form-group col-md-10">
							    	<p class="tag-line">Description</p>
									<textarea class="form-input" name="description` + result_count + `" placeholder="Enter Results Description"></textarea>
							    </div>
						 	</div>
						 	<a href="javascript:void(0);" class="result_remove_button add-btn my-3" title="Add field"><span>Remove Result <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a>
						</div></div>`); //Add field html

            $("#imgUpload_" + result_count).on('change', function() {
                var file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview_' + result_count).attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
        //alert(result_count);
        $("#result_count").attr("value", result_count);

    });

    //Once remove button is clicked
    $(resultWrapper).on('click', '.result_remove_button', function(e) {
        e.preventDefault();
        $(this).closest('.result-main-section').remove();

        // $(this).parent('.main-section').remove(); //Remove field html
        result_count--; //Decrement field counter
        $("#result_count").attr("value", result_count);
        //alert(result_count);
    });
 //alert(result_count+" outer");
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
                        <input class="form-input" type="text" name="title` + inside_count +
                `" placeholder="Shot title explaining a feature of the program">
                        <p class="tag-line">Description</p>
                        <textarea class="form-input" placeholder="More information about the title" name="description` +
                inside_count + `"></textarea>
                        <a href="javascript:void(0);" class="inside_remove_button add-btn my-3" title="Add field"><span>Remove Result <i class="fa fa-minus-circle" aria-hidden="true"></i></span></a>
                    </div>
                </div>`); //Add field html
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
</script>

<!-- Image preview -->
<script type="text/javascript">
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
<script type="text/javascript">
var loadFile = function(event) {
    var output = document.getElementById('blah');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#input-box').validate({
        rules: {
            program_image: {
                required: true
            },
            categories: {
                required: true
            },
            program_name: {
                required: true
            },
            description: {
                required: true
            },
            short_description: {
                required: true
            },
            price: {
                required: true
            },
            result_titl: {
                required: true
            },
            result_star: {
                required: true
            },
            edu_title: {
                required: true
            },
            edu_description: {
                required: true
            },
            image_title: {
                require: true
            }
        }
    });
});
</script>
<script>
var cVal = 0;

$('#price').keyup(function() {
    var regexPositiveFloat = /^([0-9]*)(.[0-9]{0,2})?$/;
    if (regexPositiveFloat.test($('#price').val())) {
        console.log('Current Value', $('#price').val())
        cVal = $('#price').val();
        $('#price').val(cVal);
    } else {
        $('#price').val(cVal);
    }


    var val = $(this).val();




    if (isNaN(val)) {
        val = val.replace(/[^0-9\.]/g, '');
        if (val.split('.').length > 0)
            val = val.replace(/\.+$/, '');
    }
    $(this).val(val);
});
</script>
@endsection
