@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Edit Content</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="{{route('admin.how-it-work.contents-update.save')}}" method="POST" id="Form_validation" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$content->id}}">
                <aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/'.$content->image_file) }}" class="img-circle profile_image profile_picture"/>
							<input type="file"  name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp" />
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>
					</aside>

                <div class="col-sm-8">
                    <label>Type</label>
                    <select id="type_id" class="form-control" name="type_id" required>
                    @foreach($typeList as $getType)
                        <option value="{{$getType->id}}" <?php ($getType->id === $content->type_id) ? "selected" : ""?>>{{ $getType->title}}</option>
                        <!-- <span class="text-danger" aria-hidden="true">{{ $errors->first('type_id') }}</span> -->
                        @endforeach

                    </select>

                </div>
                <aside class="col-lg-8">
                    {{-- <input value="{{ $type}}" name="type_id" class="form-control" type="hidden"> --}}
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Title</label>
                            <input value="{{$content->title}}" name="title" class="form-control" type="text" required>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('title') }}</span>
                        </aside>
                        <aside class="col-sm-6">
                            <label>Description</label>
                            <textarea  name="description" class="form-control" type="text" required>{{$content->description}}</textarea>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('description') }}</span>
                        </aside>
                    </div>
                    <button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
                </aside>
            </form>
        </div>
    </div>
    @endsection
    @include('admin.how_it_works.script')
    
