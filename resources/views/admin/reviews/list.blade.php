@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Reviews</h2>
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>star</th>
									<th>Comment</th>
									<th>Type</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $reviews as $serial_no=>$review)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									<td>
										<p class="review-rate"><?php
	                                		$star = (object)['rate' => $review['star']];
	                                        for ($i = 0; $i < 5; ++$i) {
	                                            echo '<i class="fa fa-star' , ($star->rate <= $i ? '-o' : '') , '" aria-hidden="true" style="color:#ffb547;"></i>';
	                                        } ?>
                                        </p>
									</td>
									<td>{{ $review->description }}</td>
									<td>{!! $review->getReviewType() !!}</td>
									<td><input type="checkbox" class="toggle-status-class"  data-id="{{$review->id}}"  data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" {{ $review->status == 'A' ? 'checked=true' : '' }}></td>
									<td>
										<a href="{{ route('admin.review.view',$review->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
    $(function() {
        $('.toggle-status-class').change(function() {

            var status = $(this).prop('checked') == true ? 'A' : 'D';
            console.log(status);
            var id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            var url = "{{route('admin.change-review-status')}}"; 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    status: status,
                    id: id,
                    _token: token
                },
                success: function(data) {
                    
                }
            });
        })
    })
</script>
@endsection
