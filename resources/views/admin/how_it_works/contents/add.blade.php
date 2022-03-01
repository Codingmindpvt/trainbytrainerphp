@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Add Content</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="{{route('admin.how-it-work.contents.save')}}" method="POST" id="Form" enctype="multipart/form-data">
                @csrf
                <aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/images/default-image-file.png') }}" class="img-circle profile_image profile_picture"/>
							<input type="file" name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp" required/>
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>

					</aside>

                <div class="col-sm-8">
                    <label>Type</label>
                    <select id="type_id" class="form-control" name="type_id" required>
                        <option selected="profession">Select Type</option>
                        @foreach($content as $getType)
                        <option id="" value="{{$getType->id}}">{{ $getType->title}}</option>
                        <span class="text-danger" aria-hidden="true">{{ $errors->first('type_id') }}</span>
                        @endforeach

                    </select>

                </div>
                <aside class="col-lg-8">
                    {{-- <input value="{{ $type}}" name="type" class="form-control" type="hidden"> --}}
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Title</label>
                            <input value="" name="title" class="form-control" type="text" required>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('title') }}</span>
                        </aside>
                        <aside class="col-sm-6">
                            <label>Description</label>
                            <textarea value="" name="description" class="form-control" type="text" required></textarea>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('description') }}</span>
                        </aside>
                    </div>
                    <button type="submit" class="blue_btn yellow_btn text-uppercase">Save</button>
                </aside>
            </form>
        </div>
    </div>
    @endsection
    @include('admin.how_it_works.script')
    
