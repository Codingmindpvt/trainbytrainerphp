@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Add FAQS</h2>
    <div class="white_box my_profile">
        <div class="row">
            <!-- {{$faq_types}} -->
            <form action="{{route('save.faq.form')}}" method="POST" id="faqForm" enctype="multipart/form-data">
                @csrf
                <!-- <aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/images/default-image-file.png') }}" class="img-circle profile_image profile_picture"/>
							<input type="file" name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp"/>
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>

					</aside> -->
                <aside class="col-lg-12">
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Faq Type</label>
                            <!-- <input name="type" class="form-control" type="text"> -->
                            <select class="form-control" name="type">
                                <option>Select</option>
                                @foreach($faq_types as $faq_type)
                                <option value="{{$faq_type->id}}">{{$faq_type->title}}</option>
                                @endforeach
                            </select>
                        </aside>
                    </div>
                </aside>
                <aside class="col-lg-12">
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Questions</label>
                            <input name="questions" class="form-control" type="text">
                        </aside>
                    </div>
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control" autocomplete="off"></textarea>
                        </aside>
                    </div>
                    <button type="submit" class="blue_btn yellow_btn text-uppercase">Add</button>
                </aside>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#faqForm').validate({
                rules: {
                    type: {
                        required: true
                    },
                    questions: {
                        required: true
                    },
                    answer: {
                        required: true
                    },
                },
            });
        });
    </script>
    @endsection