@extends('layouts.admin.inner')
@section('content')


	<!-- start content area here -->
		<div class="content_area">
			<h2>Edit Blog</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.blog.update')}}" method="POST" id="editBlog" enctype="multipart/form-data">
                        @csrf
					<aside class="col-lg-4 text-center">

                            <div class="upload_image">
                                @if(!empty(@$blog->image_file))
                                <img src="{{asset('public/'.@$blog->image_file) }}" class="img-circle profile_image profile_picture"/>
                                 @else
                                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image profile_picture" />
                                 @endif
                                <input type="file" name="image_file" onchange="profileurl(this);" accept="image/png, image/jpg, image/jpeg, image/webp" />
                            </div>
			                {{-- <img src="{{asset('public/'.@$blog->image_file) }}" class="img-circle profile_image"/>
							<input type="file" name="image_file"/> --}}

						<p class="upload_text">Upload Image</p>
						<div class="select_profile_errors error"></div>
					</aside>
					<input name="id" value="{{$blog->id}}" class="form-control" type="hidden">
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
                                <label class="my-2 form-p">Title<span style="font-size:20px;color: red;">*</label>
								<input name="title" value="{{$blog->title}}" class="form-control"  maxlength="30" type="text" placeholder="Enter Title">
							</aside>
							<aside class="col-sm-6">
                                <label class="my-2 form-p">Status<span style="font-size:20px;color: red;">*</label>
								<select class="form-control" id="status" name="status" placeholder="Enter Status">
									  <?php
									  if(!empty($blog->status)){
										echo "<option style='display:none' value=".$blog->status.">".$blog->getStatus()."</option>";
									  }
									  echo "<option value=''>Select Status</option>";
									 foreach($blog->getStatusOptions() as $key=>$val){
										 	echo "<option value=".$key.">".$val."</option>";
									 }
									  ?>
							      </select>
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-6">
                                <label class="my-2 form-p">Category<span style="font-size:20px;color: red;">*</label>
								<select class="form-control" id="category" name="category">
									  <?php
									   if(!empty($blog->category_id)){
										echo "<option style='display:none' value=".$blog->category_id.">".$blog['category']['title']."</option>";
									  }
									  echo "<option value=''>Select Category</option>";
									 foreach($blog->categoryList() as $category){
										 	echo "<option value=".$category->id.">".$category->title."</option>";
									 }
									  ?>
							      </select>
							</aside>
							<aside class="col-sm-6">
                                <label class="my-2 form-p">Description<span style="font-size:20px;color: red;">*</label>
								<textarea name="description" class="form-control" maxlength="500" placeholder="Enter Description">{{$blog->description}}</textarea>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
