@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Admin Commission</h2>
                @if(isset($commissions) && count($commissions) >= 2)
                @else
           <a href="{{ route('admin.commission.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
           @endif


				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>

									<th>#</th>
                                    <th>Product Type</th>
									<th>Commisssion Assigned</th>


                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $commissions as $serial_no=>$commission)
								<tr>
									<td>{{ $serial_no+1 }}</td>
                                    <td>
                                        @if ($commission->type =='P')
                                        Program
                                        @else
                                            Class
                                        @endif
                                      </td>
									<td>{{ $commission->commission_percent}}%</td>

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
