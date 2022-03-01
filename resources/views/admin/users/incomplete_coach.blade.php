@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">
			<div class="tables_area">
				<h2 class="pull-left">Incomplete Coaches Listing</h2><br/>
				{{-- <a href="add_user" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
				<div class="clear"></div>
				<div class="white_box">
					<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade active in" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="table-responsive">
							<table width="100%" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<th>ID</th>
										{{--  <th>First Name</th>
										<th>Last Name</th>  --}}
										<th>Email</th>
										{{--  <th>Contact No.</th>
										<th>City</th>
										<th>State</th>
										<th>Country</th>  --}}
										<th>Status</th>
	                                    <th>Action</th>
									</tr>
								</thead>
								<tbody>
	                                @foreach( $incompleteProfiles as $index=>$incomplete )
									<tr>
										<td>{{ $index+1 }}</td>
										{{--  <td>{{ $incomplete->first_name}}</td>
										<td>{{ $incomplete->last_name }}</td>  --}}
										<td>{{ $incomplete->email }}</td>
										{{--  <td>{{ $incomplete->contact_no }}</td>
										<td>{{ @$incomplete->city }}</td>
										<td>{{ @$incomplete->state->name }}</td>
	                                    <td>{{ @$incomplete->country->name }}</td>  --}}
	                                    <td>{!! $incomplete->getStatus() !!}</td>
										<td>
											{{--  <a href="{{ route('admin.user.detail',$incomplete->id) }}" data-toggle="tooltip" data-placement="top" title="user.detail" class="action_btn" alt="detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a href="{{ route('admin.user.edit',['id'=>$incomplete->id,'type'=>$type]) }}" data-toggle="tooltip" data-placement="top" title="user.edit" class="action_btn" alt="edit"><i class="fa fa-edit" aria-hidden="true"></i></a>  --}}
											<a href="{{ route('admin.user.delete',$incomplete->id) }}" onclick="return confirm('Are you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top" title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>
									</tr>

	                                @endforeach

								</tbody>

							</table>

						</div>
					</div>

					</div>
					  </div>

					</div>
				</div>
			</div>
@endsection
