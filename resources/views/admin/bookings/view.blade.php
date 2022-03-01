@extends('layouts.admin.inner')
@section('content')

<!-- start content area here -->
		<div class="content_area">
			<h2>Booking Request Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-2 text-center">
					</aside>

					<aside class="col-lg-5">
						<div class="row">
							<aside class="col-sm-3">
								<label>Class</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{{$booking['coach_class']['name']}}
								</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Booking Date</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($booking->booking_date) ? $booking->booking_date : "-----" !!}</h4>
							</aside>
						</div>
						<br/><br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Created By</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($booking->user->first_name) ? $booking->user->first_name." ".$booking->user->last_name : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Start Time</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($booking->schedule->from_time) ? $booking->schedule->from_time : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>End Time</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($booking->schedule->to_time) ? $booking->schedule->to_time : "-----" !!}</h4>
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
								<h4>{!! isset($booking->status) ? $booking->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/>
					</aside>
                </div>
				</div>
			</div>

@endsection
