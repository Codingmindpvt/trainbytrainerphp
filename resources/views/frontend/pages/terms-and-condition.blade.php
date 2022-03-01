@extends('layouts.guest')
@section('content')
<!--start terms & conditions area here -->
	<section class="terms-condition-section">
		<!-- Nav tabs -->
		<div class="user-tab">
	  		<ul class="nav nav-pills container" role="tablist">
		    	<li class="nav-item">
		      	<a class="nav-link active" data-toggle="pill" href="#home">User Terms</a>
		    	</li>
		    	<li class="nav-item">
		      	<a class="nav-link" data-toggle="pill" href="#menu1">Coach Terms</a>
		    	</li>
	  		</ul>
	  	</div>
	  		 <!-- Tab panes -->
	  		<div class="tab-content more-content">
	  			<!-- User Terms & Conditions -->
	    		<div id="home" class="container tab-pane active"><br>
	  			@if(isset($userTerms))
	    			<div class="main-heading">
			      		<h1 class="oswald-font my-3">Terms & Conditions</h1>
			      		<h2 class="oswald-font my-3">{{$userTerms->title}}</h2>
			      		<span class="divide-line"></span>
						<p class="my-3">Last updated on:- {{date_format($userTerms->updated_at,"F d, Y")}}</p>
					</div>
					<div class="blog-content">{!! $userTerms->description!!}</div>
	    		@else
	    		<div>No Records Found!!</div>
	    		@endif
	    		</div>
	    		<!-- Coach Terms & Conditions -->
	    		<div id="menu1" class="container tab-pane fade"><br>
	    		@if(isset($coachTerms))
	      			<div class="main-heading">
			      		<h1 class="oswald-font my-3">TERMS & CONDITIONS</h1>
			      		<h2 class="oswald-font my-3">{{$coachTerms->title}}</h2>
			      		<span class="divide-line"></span>
						<p class="my-3">Last updated on:- {{ date_format($coachTerms->updated_at,"F d, Y")}}</p>
					</div>
					<div class="blog-content">
						{!! $coachTerms->description!!}
	    			</div>
	    		@else
	    		<div>No Records Found!!</div>
	    		@endif
	    		</div>
	  		</div>

	</section>
<!--end terms & conditions area here -->
  @endsection