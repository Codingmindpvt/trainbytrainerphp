@extends('layouts.guest')
@section('content')
<!--start privacy policy area here -->
	<section class="privacy-section">
		<div class="container">
			@if(isset($privacy))
			<div class="main-heading">
	      		<h1 class="oswald-font my-3">{{$privacy->title}}</h1>
	      		<span class="divide-line"></span>
				<p class="my-3">Last updated on:- {{ date_format($privacy->updated_at,"F d, Y")}}</p>
			</div>
			<div class="blog-content">
            {!!$privacy->description!!}
			</div>
			@else
	    		<div>No Records Found!!</div>
	    @endif
			</div>
		</div>
	</section>
<!--end privacy policy area here -->
  @endsection
