@extends('layouts.guest')
@section('content')

<!--start varification div area here -->

    @include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
	<section class="common-light-header">
		<div class="container">
			<div class="popular-box text-center">
				<h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!</h1>
				<span class="divide-line"></span>
				{{-- <p class="oswald-font light-text">View and edit COACH OR Educational details here</p> --}}
			</div>
		</div>
	</section>
<!--end banner area here -->

<!--start my profile no date area here-->
	<section class="marketplace-section">
		<div class="container">
			<div class="row">
				<aside class="col-lg-4">
					@if(Auth::check() && Auth::user()->role_type == 'C')
					<!-- start coach sidebar here -->

				                @include('frontend.nav._coachSideBar')

				    <!-- end coach sidebar here -->
				    @else
				    <!-- start sidebar here -->

				                @include('frontend.nav._sidebar')

				    <!-- end sidebar here -->
				    @endif
				</aside>

				<aside class="col-lg-8 marketplace-main-box">
					<div class="marketplace-header">
					    <h3 class="oswald-font">Certificated / Diplomas</h3>
					</div>
                    <div class="ceritified-diploma-box">
                    	@if(!empty(@$certificateDiplomas['coach_education']))
                    	@forelse(@$certificateDiplomas['coach_education'] as $certificateDiploma)
                        <div class="certified-area">
                            <div class="certified-box-left">
                                <h5>{{ ucwords($certificateDiploma['title'])}}</h5>
                                <p>{{$certificateDiploma['completion_year']}}</p>
                                <p>{{ucwords($certificateDiploma['institute'])}}</p>
                            </div>
                            <div class="certified-box-right delete-cart">
                                <a href="{{ route('coach.certificate-diploma-delete',$certificateDiploma['id']) }}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="{{ route('coach.certificate-diploma-edit',$certificateDiploma['id']) }}"><i class="fa fa-pencil edit-pencil-new" aria-hidden="true" data-toggle="modal" data-target="#edit-certified_{{$certificateDiploma['id']}}"></i></a>
                            </div>
                        </div>
                        @empty
                        <p class="blank-para">No Record found!!</p>
						@endforelse
						@else
						<p class="blank-para">No Record found!!</p>
						@endif

                    </div>

				</aside>
			</div>
		</div>
	</section>
<!--ends my profile no date area here-->
@endsection
