@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<div class="tables_area">
				{{--  @if($type == 'incomplete')
				<h2 class="pull-left">Incomplete Users Profiles</h2><br/>
				@elseif($type == 'personal')
				<h2 class="pull-left">Personal Users Listing</h2><br/>
				@elseif($type == 'business')  --}}
				<h2 class="pull-left">All User Listing</h2><br/>
				{{--  @endif  --}}
				{{-- <a href="add_user" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
				<div class="clear"></div>
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Contact No.</th>
									<th>City</th>
									<th>State</th>
									<th>Country</th>
                                    <th>Account Type</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $user_list as $index=>$user )
								<tr>
									<td>{{ $index+1 }}</td>
									<td>{{ $user->first_name}}</td>
									<td>{{ $user->last_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->contact_no }}</td>
									<td>{{ @$user->city }}</td>
									<td>{{ @$user->state->name }}</td>
                                    <td>{{ @$user->country->name }}</td>
                                    <td><button type="button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">{{ @$user->getType() }}</button></td>
                                    <td>{!! $user->getStatus() !!}</td>
									<td>
										<a href="{{ route('admin.user.detail',$user->id) }}" data-toggle="tooltip" data-placement="top" title="user.detail" class="action_btn" alt="detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{ route('admin.user.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="user.edit" class="action_btn" alt="edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a href="{{ route('admin.user.delete',$user->id) }}" onclick="return confirm('Are you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top" title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>

                                @endforeach

							</tbody>

						</table>

					</div>
				</div>
				{{ $user_list->links() }}
			</div>
@endsection
