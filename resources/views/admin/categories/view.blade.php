@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Category Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-2 text-center">
					</aside>
					<aside class="col-lg-4 text-center">
						@if(!empty(@$category->image_file))
			                <img src="{{asset('public/'.@$category->image_file) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-4">

						<div class="row user-details">
							<aside class="col-sm-6 ">
								<label>Title</label>
								<h4>{{ isset($category->title) ? $category->title : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Description</label>
								<h4>{!! isset($category->description) ? $category->description : "-----" !!}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-4">
								<label>Status</label>
								<h4>{!! isset($category->status) ? $category->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
					</aside>
                </div>
				</div>
			</div>
@endsection
