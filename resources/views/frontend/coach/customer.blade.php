@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
<!-- <section class="profesional-common-box">
  <div class="container">
   <p><img src="images/notify.png"  class="mr-2" alt="notify">You are currently not verified. <a href="#"><span>Click here</span></a> or on the verification tab to verify yourself as a professional fitness coach.
  </div>
 </section> -->
<!--end varification div area here -->

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">{{Auth::user()->first_name." ".Auth::user()->last_name}}</h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View and edit COACH Program details here</p> --}}
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if (Auth::check() && Auth::user()->role_type == 'C')
                    <!-- start coach sidebar here -->

                    @include('frontend.nav._coachSideBar')

                    <!-- end coach sidebar here -->
                @else
                    <!-- start sidebar here -->

                    @include('frontend.nav._sidebar')

                    <!-- end sidebar here -->
                @endif
            </aside>

				<aside class="col-lg-8">
					<div class="user-profle-right-side marketplace-main-box">
                        <div class="info-profile-head">
                            <h3>Customers</h3>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search By Name">
                        </div>
                        <hr>
                        <div class="customer-page-box">
                                <div class="row">
                                    @foreach($customers as $customer)
                                    <aside class="col-md-12">
                                        <div class="cutomers-main-box">
                                        @if(!empty(@$customer['users']->profile_image))
                                          <img src="{{asset('public/'.@$customer['users']->profile_image) }}" class="img-fluid img-rounded"/>
                                        @else
                                          <img src="{{asset('public/images/default-image.png') }}" class="img-fluid img-rounded"/>
                                        @endif

                                            <div class="customers-main-content">
                                                <h5 class="oswald-font">{{ ucwords(@$customer['users']['first_name']." ".@$customer['users']['last_name']) }}</h5>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$customer['users']['city']}}</p>
                                                <span>Purchased 2 Sessions and 5 Programs</span>
                                            </div>
                                            <a href="{{ route('coach.view.profile',$customer['users']['id']) }}" class="profile-new-view-bt">VIEW PROFILE</a>
                                        </div>
                                    </aside>
                                    @endforeach

                            </div>
                        </div>
                        <div class="pagination-count-box">
						{{ $customers->links() }}

								<!-- end pagination -->
						</div>
                	</div>
				</aside>
			</div>
		</div>
	</section>
<!--ends my profile no date area here-->
@endsection
