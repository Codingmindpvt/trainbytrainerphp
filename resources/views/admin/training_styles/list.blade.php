@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Training Style Listing</h2>
				<a href="{{ route('admin.trainingstyle.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
				<div class="clear"></div>
				@if($training_s->count()>0)
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									{{-- <th>Image</th> --}}
									<th>Title</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $training_s as $serial_no=>$training)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									{{-- <td>
										@if(!empty(@$training->image_file))
			               				 	<img src="{{asset('public/'.@$training->image_file) }}" class="img-circle profile_image_small"/>
			             				@else
			               				 	<img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image_small"/>
			           					@endif
			        				</td> --}}
									<td>{{ $training->title}}</td>
                                    <td>{!! $training->getStatus() !!}</td>
									<td>
										<a href="{{ route('admin.training.view',$training->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{ route('admin.training.edit',$training->id) }}" class="action_btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a href="{{ route('admin.training.delete',$training->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="action_btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
                <div class="paginator">
                    {{ $training_s->links() }}
                </div>
				@else
					<div class="main-img">
						<img src="{{asset('public/images/no-record.png') }}" class="no-record"/>
					</div>
				@endif
			</div>
@endsection
