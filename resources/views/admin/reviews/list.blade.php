@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Reviews</h2>
                <input type="search" class="searchBox" placeholder="Search Here">
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
                        <table width="100%" cellspacing="0" cellpadding="0" class='myDataTable'>
							<thead>
								<tr>
									<th>#</th>
									<th>Rate By</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Rating</th>
                                    <th>Review Title</th>
									<th>Review Description</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                $i  = ($reviews->perPage() * ($reviews->currentPage() - 1)) + 1;
                                ?>
                                @foreach( $reviews as $serial_no=>$review)

								<tr>
									<td>{{ $i++ }}</td>
                                    <td><h4>{!! isset($review->users->first_name) ? $review->users->first_name." ".$review->users->last_name : "-----" !!}</h4></td>
                                    <td>{!! $review->getReviewType() !!}</td>


                                        @php
                                        if($review->review_type == 'CL'){
                                            @endphp
                                            <td><h4> {!! isset($review->class->name) ? $review->class->name : "" !!}</h4></td>
                                            @php
                                        }
                                        else{
                                        @endphp
                                            <td><h4> {!! isset($review->program->program_name) ? $review->program->program_name : "---" !!}</h4></td>
                                        @php
                                        }
                                        @endphp


                                     <td>
										<p class="review-rate"><?php
	                                		$star = (object)['rate' => $review['star']];
	                                        for ($i = 0; $i < 5; ++$i) {
	                                            echo '<i class="fa fa-star' , ($star->rate <= $i ? '-o' : '') , '" aria-hidden="true" style="color:#ffb547;"></i>';
	                                        } ?>
                                        </p>
									</td>
                                    <td><h4>{{ $review->title }}</h4></td>
							<td>
								<?php
								$string = $review['description'];
								if (strlen($string) >= 1 && strlen($string) <= 399) {
									echo substr($string, 0, 399);
								}
								if (strlen($string) >= 399) {
									echo substr($string, 0, 399) . '<span class="read_more_class" style="color:blue;">Read More</span>' . '<span class="show_read_more_class" style="display:none;">' . substr($string, 399) . '</span>' . '<span class="show_less_class" style="color:blue; display:none;" style="color:blue;">Show Less</span>';
								}
								?>


							</td>


							{{-- <td><input type="checkbox" class="toggle-status-class"  data-id="{{$review->id}}" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" {{ $review->status == 'A' ? 'checked=true' : '' }}></td> --}}
							{{-- <td>
										<a href="{{ route('admin.review.view',$review->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
									</td>  --}}
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
                <div class="paginator">
                    {{ $reviews->links() }}
                </div>
			</div>
		</div>
		<div class="paginator">
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(function() {

			$('.read_more_class').on('click', function() {
        $(this).hide();
        $(this).parent().find('.show_less_class').show();
        $(this).parent().find('.show_read_more_class').toggle();
        });
        $('.show_less_class').on('click', function() {
            $(this).parent().find('.read_more_class').show();
            $(this).hide();
            $(this).parent().find('.show_read_more_class').hide();
        });

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
