@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Admin Commission</h2>
				@if(empty($commissions[0]))
				<a href="{{ route('admin.commission.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
				@endif
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Commisssion Percent</th>
									<th>Commisssion Type</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $commissions as $serial_no=>$commission)
								<tr>
									<td>{{ $serial_no+1 }}</td>
									<td>{{ $commission->commission_percent}}</td>
									<td>{{ $commission->commission_type}}</td>
									<td>
										<a href="{{ route('admin.commission.edit',$commission->id) }}" class="action_btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
@endsection
