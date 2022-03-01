@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<h2>Faq Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-2 text-center">
					</aside>
					{{-- <aside class="col-lg-4 text-center">
						@if(!empty(@$training->image_file))
			                <img src="{{asset('public/'.@$training->image_file) }}" class="img-circle profile_image"/>
			             @else
			                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image"/>
			            @endif
					</aside> --}}

					<aside class="col-lg-4">

						<div class="row">
							<aside class="col-sm-6">
								<label>Questions</label>
								<h4>{{$view_faq->questions}}</h4>
							</aside>
							<aside class="col-sm-6">
								<label>Answer</label>
								<h4>{{$view_faq->answer}}</h4>
							</aside>
						</div>
						<div class="row">
							<aside class="col-sm-4">
								<label>Status</label>
								<h4>{!! isset($view_faq->status) ? $view_faq->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
					</aside>
                </div>
				</div>
			</div>
@endsection
