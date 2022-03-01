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
				<aside class="col-lg-8 marketplace-main-box">
					<div class="marketplace-header">
						<h3 class="oswald-font">My Transactions List</h3>
						{{-- <a href="" class="save-green-bt"><i class="fa fa-check" aria-hidden="true"></i> SAVE CLASS</a> --}}
					</div>

					<div class=" name-date-box-area">
						<div class="row">
							<div class="col-md-6">
								<div class="seller-earning-box">
									<div class="earning-text-count">
										<h2>$92,412</h2>
										<p>Total Seller earning<br>
											(base currency)</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="seller-earning-counting-box">
									<div class="total-sale-count text-center">
										<h4>+ $98,532</h4>
										<p>Total Sale</p>
									</div>
									<div class="total-tax-count text-center">
										<h4>- $3,040</h4>
										<p>Tax</p>
									</div>
									<div class="total-commision-count text-center">
										<h4>- $3,080</h4>
										<p>Commission</p>
									</div>
								</div>
							</div>
						</div>
						<hr class="my-4">
						<div class="row">
							<div class="col-md-3">
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Search By Name">
							</div>
							<div class="col-md-3">
								<i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="From">
							</div>
							<div class="col-md-3">
								<i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="To">
							</div>

						</div>
					</div>
					<div class="coach-product-list-table">
						<div class="table-responsive cart-table-box">
							<table class="table">
							<thead>
								<tr>
									<th scope="col">TRANSACTION ID</th>
									<th scope="col">FROM</th>
									<th scope="col">PRODUCT</th>
									<th scope="col">DATE</th>
									<th scope="col">PRICE</th>
								</tr>
							</thead>
							<tbody>
								@foreach($transactions as $transaction)

								<tr>
									<td>{{ $transaction['transection_id']}}</td>
									<td>{{ auth()->user()->first_name}}</td>
									<td>@php
									$transaction_id = ltrim($transaction['program_ids'],"[");
									$transaction_id = rtrim($transaction_id,"]");
									$programs = (explode(",",@$transaction_id));
									$sr_no = 1;
                                  foreach($programs as $key=>$program){
                                    @endphp
                                    <p>{{$sr_no++.". ".@$transaction->getProgramName($program)}}</p>
                                @php
                                  }
									@endphp</td>
									<td>{{ date('d-m-Y', strtotime($transaction['created_at']) )}}</td>
									<td>${{ $transaction['price']}}</td>
								</tr>
								@endforeach



								</tbody>
							</table>
						</div>
						<div class="pagination-count-box">
						{{ $transactions->links() }}

								<!-- end pagination -->
						</div>
					</div>

				</aside>
			</div>
		</div>
	</section>
<!--ends my profile no date area here-->
 @endsection
