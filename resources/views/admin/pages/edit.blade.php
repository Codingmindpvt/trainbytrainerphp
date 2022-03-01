@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Edit Page</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.page.update')}}" method="POST" id="pageForm" enctype="multipart/form-data">
                        @csrf
					<aside class="col-lg-4 text-center">
						<div class="upload_image">
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image profile_picture"/>
							<input type="file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp"/>
						</div>
						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>
					</aside>
					<input name="id" value="{{$page->id}}" class="form-control" type="hidden">
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
								<label>Title</label>
								<input name="title" value="{{$page->title}}" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
								<label>Description</label>
								<textarea name="description" class="form-control">{{$page->description}}</textarea>
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-6">
								<label>Type</label>
								<select class="form-control" id="type" name="type">
									  <?php
									  if(!empty($page->type)){
										echo "<option style='display:none' value=".$page->type.">".$page->getType()."</option>";
									  }
									  echo "<option value=''>Select Type</option>";
									 foreach($page->getTypeOptions() as $key=>$val){
										 	echo "<option value=".$key.">".$val."</option>";
									 }
									  ?>
							      </select>
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
								<select class="form-control" id="status" name="status">
									  <?php
									  if(!empty($page->status)){
										echo "<option style='display:none' value=".$page->status.">".$page->getStatus()."</option>";
									  }
									  echo "<option value=''>Select Status</option>";
									 foreach($page->getStatusOptions() as $key=>$val){
										 	echo "<option value=".$key.">".$val."</option>";
									 }
									  ?>
							      </select>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
