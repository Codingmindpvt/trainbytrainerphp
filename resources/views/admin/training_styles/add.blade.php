@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Add Training Style</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.trainingstyle.add')}}" method="POST" id="categoryForm" enctype="multipart/form-data">
                        @csrf
					{{--  <aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/images/default-image-file.png') }}" class="img-circle profile_image profile_picture"/>
							<input type="file" name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp"/>
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>

					</aside>  --}}
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
								<label>Title</label>
                                <label class="my-2 form-p">Title<span style="font-size:20px;color: red;">*</label>
								<input name="title" class="form-control" type="text" placeholder="Enter Title">
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
                                <label class="my-2 form-p">Status<span style="font-size:20px;color: red;">*</label>
								<select class="form-control" id="status" name="status">
									  <?php
									  echo "<option value=''>Select Status</option>";
									 foreach($training->getStatusOptions() as $key=>$val){
										 	echo "<option value=".$key.">".$val."</option>";
									 }
									  ?>
							      </select>
							</aside>

						</div>
						<div class="row">
							<aside class="col-sm-12">
								<label>Description</label>
                                <label class="my-2 form-p">Description<span style="font-size:20px;color: red;">*</label>
								<textarea name="description" class="form-control" placeholder="Enter Description" autocomplete="off" ></textarea>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn text-uppercase">Add</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
