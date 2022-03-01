@extends('layouts.guest')
@section('content')

<!--start blog details area here -->
	<section class="blog-details-section">
		<div class="container">
			<div class="row">
				<aside class="col-md-12 blog-box">
					<div class="main-heading">
						<h1 class="oswald-font">{{$blogDetail['title']}}</h1>
						<span class="divide-line"></span>
						<p>{{$blogDetail['category']['title']}}   |   {{date_format(date_create($blogDetail['created_at']),"M d, Y")}}</p>
					</div>
					<div class="blog-img">
						@if(!empty(@$blogDetail->image_file))
                <img src="{{asset('public/'.@$blogDetail->image_file) }}"/>
             @else
                <img src="{{asset('public/images/default-banner.png') }}"/>
             @endif
					</div>
					<div class="blog-content">
						<p class="mb-4">{{$blogDetail['description']}}</p>
					</div>
					<!-- <div class="blog-btn">
						<a href="#" class="blue-btn outline oswald-font w-25"><i class="fa fa-arrow-left mx-1" aria-hidden="true"></i>
                        Previous</a>
						<a href="#" class="blue-btn outline oswald-font w-25">Next <i class="fa fa-arrow-right mx-1" aria-hidden="true"></i>
						</a>
					</div>
					<div class="comment-box row">
						<aside class="col-sm-6">
							<h3 class="oswald-font">Comments (1)</h3>
						</aside>
						<aside class="col-sm-6">
							<a href="#" class="blue-btn oswald-font w-75 float-right">Submit you comment</a>
						</aside>
						<aside class="col-md-12 form-box">
							<form class="form">
								<div class="form-group row">
									<div class="col-sm-6">
	    								<input type="email" class="form-control form-input" id="" placeholder="Full Name">
	    							</div>
	    							<div class="col-sm-6">
	    								<input type="email" class="form-control form-input" id="" placeholder="Email">
	    							</div>
	  							</div>
	  							<div class="form-group">
	    							<textarea class="form-control form-input value" id="" rows="3" placeholder="Your Comment"></textarea>
	  							</div>
							</form>
						</aside>
					</div>
					<div class="row">
						<aside class="col-md-12 d-flex mt-4">
							<div class="cmt-profile">
								<img src="images/jaime.png" alt="main">
							</div>
							<div class="cmt-content">
								<h4 class="oswald-font">Jaime Barón</h4>
								<p>Morbi in sagittis est. Interdum et malesuada fames ac ante ipsum primis in aucibus.Proin non placerat sem, vel faucibus felis. Vivamus cursus ex dui. Ut sed purus at ipsum congue finibus eu eu magna.</p>
								<p class="posted"><i class="fa fa-calendar cal mr-2" aria-hidden="true"></i>Posted on Sep 07,2021</p>
							</div>
						</aside>
					</div> -->
				</aside>
			</div>
		</div>
	</section>
<!--end blog details area here -->
  @endsection