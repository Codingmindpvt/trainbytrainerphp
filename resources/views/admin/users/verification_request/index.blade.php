@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <div class="tables_area">
        <h2 class="pull-left">Verification Request</h2><br />
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coach_users as $index=>$coach_user)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ucfirst($coach_user->first_name) ?? ''}}</td>
                                    <td>{{ucfirst($coach_user->last_name) ?? ''}}</td>
                                    <td>{{$coach_user->email}}</td>
                                    <td>
                                        <a href="{{route('admin.verification.details', $coach_user->id)}}" data-toggle="tooltip" data-placement="top" title="user.detail" class="action_btn" alt="detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('admin.delete.verification', $coach_user->id)}}" onclick="return confirm('Are you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top" title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="paginator">
                    {{ $coach_users->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection