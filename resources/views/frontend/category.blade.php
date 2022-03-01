@extends('layouts.guest')
@section('content')
<!--start categories area here -->
	<section class="categories-list grey-bg common-section">
		<div class="container">
			<div class="row">
				<aside class="col-sm-6">
					<div class="main-heading oswald-font">
						<h1>Categories</h1>
						<span class="divide-line"></span>
						<p>WHAT DO YOU NEED HELP TO FIND PERFECT COACH?</p>
					</div>
				</aside>
				<aside class="col-sm-6 text-right">
					<!-- <a href="#" class="oswald-font view-all-categories">view all categories<i class="fa fa-caret-right" aria-hidden="true"></i></a> -->
				</aside>
			</div>



			<div class="row">


                @foreach ($categories as $item)
				<aside class="col-lg-3 col-sm-6" data-aos="fade-down">



					<a class="categories-icon-box" href="{{ route('coaches', ['cat_id'=>$item->id]) }}">
						@if(!empty(@$item->image_file))
			               				 	<img src="{{asset('public/'.@$item->image_file) }}" class="img-circle profile_image_small"/>
			             				@else
			               				 	<img src="{{asset('public/images/category-default.png') }}" class="category-default"/>
			           					@endif
						<p class="oswald-font">{{ isset($item->title) ? $item->title : "-----" }}</p>
					</a>

				</aside>
                @endforeach
			</div>
            {{ $categories ->links() }}
		</div>
	</section>
<!--start categories area here -->
@endsection
