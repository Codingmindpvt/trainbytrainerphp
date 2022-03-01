@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Page Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
				
					<aside class="col-lg-4 text-center">
						@if(!empty(@$page->image_file))
			                <img src="{{asset('public/'.@$page->image_file) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside>

					<aside class="col-lg-4">

						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Title</label>
								<h4>{{ isset($page->title) ? $page->title : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Description</label>
								<h4>{!! isset($page->description) ? $page->description : "-----" !!}</h4>
							</aside>
						</div>
						<div class="row user-details">
							<aside class="col-sm-6">
								<label>Type</label>
								<h4>{{ isset($page->type) ? $page->getType() : "-----" }}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Status</label>
								<h4>{!! isset($page->status) ? $page->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
					</aside>
                </div>
				</div>
			</div>
@endsection
