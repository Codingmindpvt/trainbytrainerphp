@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Categories Listing</h2>
				<a href="{{ route('admin.category.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
				<div class="clear"></div>
				@if($categories->count()>0)
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Image</th>
									<th>Title</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $categories as $serial_no=>$category)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									<td>

										@if(!empty(@$category->image_file))
			               				 	<img src="{{asset('public/'.@$category->image_file) }}" class="img-circle profile_image_small"/>
			             				@else
			               				 	<img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image_small"/>
			           					@endif

			        				</td>
									<td>{{ $category->title}}</td>
                                    <td>{!! $category->getStatus() !!}</td>
									<td>
										<a href="{{ route('admin.category.view',$category->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{ route('admin.category.edit',$category->id) }}" class="action_btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a href="{{ route('admin.category.delete',$category->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="action_btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
                    <div class="paginator">
                        {{ $categories->links() }}
                    </div>
				</div>
				@else
					<div class="main-img">
						<img src="{{asset('public/images/no-record.png') }}" class="no-record"/>
					</div>
				@endif
			</div>
@endsection
