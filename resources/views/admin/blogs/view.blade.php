@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Blog Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-2 text-center">
					</aside>
					<aside class="col-lg-3 text-center">
						@if(!empty(@$blog->image_file))
			                <img src="{{asset('public/'.@$blog->image_file) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-5">
						<div class="row">
							<aside class="col-sm-3">
								<label>Title</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{{ isset($blog->title) ? $blog->title : "-----" }}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Category</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{{ isset($blog['category']['title']) ? $blog['category']['title'] : "-----" }}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Status</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($blog->status) ? $blog->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
						<br/><br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Description</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($blog->description) ? $blog->description : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/>
					</aside>
                </div>
				</div>
			</div>
@endsection
