@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<div class="tables_area">
                <h2 class="pull-left">Incomplete Users Listing</h2><br/>
				{{-- <a href="add_user" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Email</th>
                                    <th>Account Type</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $user_list as $index=>$user )
								<tr>
									<td>{{ $index+1 }}</td>
									<td>{{ $user->email }}</td>
                                    <td>{{ @$user->getType() }}</td>
                                    <td>{!! $user->getStatus() !!}</td>
									<td>
										<a href="{{ route('admin.user.delete',$user->id) }}" onclick="return confirm('Are you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top" title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>

                                @endforeach

							</tbody>

						</table>

					</div>
                    <div class="paginator">
                        {{ $user_list->links() }}
                    </div>
				</div>

			</div>
@endsection
