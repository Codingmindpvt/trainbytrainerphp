@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Booking Requests</h2>
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<!-- <th>Scedule</th> -->
									<th>Class</th>
									<th>Booking Date</th>
									<th>Created By</th>
									<th>Status</th>
									<th>Manage Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $bookings as $serial_no=>$booking)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									<!-- <td>{{$booking['schedule']}}</td> -->
									<td>{{$booking['coach_class']['name']}}</td>
									<td>{{date_format(date_create($booking['booking_date']),"d-m-Y")}}
									</td>
									<td>{{$booking['user']['first_name']}}</td>
									<td>{!!$booking->getStatus()!!}</td>
									<td>
										@if($booking['status'] == '2')
										<button type="button" title="Reject" value="0" id="{{$booking->id}}" class="btn btn-danger reject-booking-request reject_request_{{$booking->id}}">
											<i class="fa fa-close" aria-hidden="true"></i>
										</button>
										@elseif($booking['status'] == '0')
										<button type="button" title="Accept" value="2" id="{{$booking->id}}" class="btn btn-success accept-booking-request accept_request_{{$booking->id}}" >
											<i class="fa fa-check" aria-hidden="true"></i>
										</button>
										@else
										<button type="button" title="Accept" value="2" id="{{$booking->id}}" class="btn btn-success accept-booking-request accept_request_{{$booking->id}}" >
											<i class="fa fa-check" aria-hidden="true"></i>
										</button>
										<button type="button" title="Reject" onclick="return confirm('Are you sure you want to reject this coach profile?')" value="0" id="{{$booking->id}}" class="btn btn-danger reject-booking-request reject_request_{{$booking->id}}">
											<i class="fa fa-close" aria-hidden="true"></i>
										</button>
										@endif
									<td>
									<a href="{{ route('admin.booking.view',$booking->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
									</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
                <div class="paginator">
                </div>
			</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $('.accept-booking-request').on('click', function() {
  var booking_status = this.value;
  var booking_id = this.id;

  if(booking_status == 2){
    var token = '{{ csrf_token() }}';
    var url = "{{route('admin.booking.accept-booking-request')}}"; 
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: booking_id,
            _token: token
        },
        success: function(data) {
           location.reload(); 
        }
    });
}
});

$('.reject-booking-request').on('click', function() {
let alert_msg = "Are you sure you want to reject this booking request.";
var booking_status = this.value;
var booking_id = this.id;
  if (confirm(alert_msg) == true) {
	if(booking_status == 0){
		var token = '{{ csrf_token() }}';
		var url = "{{route('admin.booking.reject-booking-request')}}"; 
		$.ajax({
			type: "POST",
			url: url,
			data: {
				id: booking_id,
				_token: token
			},
			success: function(data) {
			location.reload(); 
			}
		});
	}
  } else {
    return false;
  }

});
</script>
@endsection
