@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Pages</h2>
				<a href="{{ route('admin.page.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
				<div class="clear"></div>
                @if($pages->count()>0)
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Title</th>
									<th>Type</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $pages as $serial_no=>$page)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									<td>{{ $page->title}}</td>
									<td>{{ $page->getType() }}</td>
                                    <td>{!! $page->getStatus() !!}</td>
									<td>
										<a href="{{ route('admin.page.view',$page->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{ route('admin.page.edit',$page->id) }}" class="action_btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a href="{{ route('admin.page.delete',$page->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="action_btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
                <div class="paginator">
                    {{ $pages->links() }}
                </div>
                @else
					<div>
						<img src="{{asset('public/images/no-record.png') }}" class="no-record"/>
					</div>
				@endif
			</div>
@endsection
