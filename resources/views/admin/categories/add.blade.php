@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Add Category</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.category.add')}}" method="POST" id="categoryForm" enctype="multipart/form-data">
                        @csrf
					<aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image profile_picture"/>
							<input type="file" name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp"/>
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>

					</aside>
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
								<label>Title</label>
								<input name="title" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
								<select class="form-control" id="status" name="status">
									  <?php
									  echo "<option value=''>Select Status</option>";
									 foreach($category->getStatusOptions() as $key=>$val){
										 	echo "<option value=".$key.">".$val."</option>";
									 }
									  ?>
							      </select>
							</aside>

						</div>
						<div class="row">
							<aside class="col-sm-12">
								<label>Description</label>
								<textarea name="description" class="form-control" autocomplete="off" ></textarea>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn text-uppercase">Add</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
