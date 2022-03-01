@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Edit Training Style</h2>
			<div class="white_box my_profile">
				<div class="row">
                    <form  action="{{route('admin.training.update')}}" method="POST" id="categoryForm" enctype="multipart/form-data">
                        @csrf
					<input name="id" value="{{$training->id}}" class="form-control" type="hidden">
					<aside class="col-lg-8">
						<div class="row">
							<aside class="col-sm-6">
								<label>Title</label>
								<input name="title" value="{{$training->title}}" class="form-control" type="text">
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
								<select class="form-control" id="status" name="status">
                                    <?php
                                    if(!empty($training->status)){
                                      echo "<option style='display:none' value=".$training->status.">".$training->getStatus()."</option>";
                                    }
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
								<textarea name="description" class="form-control"  >{{$training->description}}</textarea>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn text-uppercase">Update</button>
					</aside>
                </form>
				</div>
			</div>
@endsection
