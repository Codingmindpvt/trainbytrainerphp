@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <div class="tables_area">
        <h2 class="pull-left">Buisness Users Listing</h2><br />
        <input type="search" class="searchBox" placeholder="Search Here">
        {{-- <a href="add_user" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
        <div class="clear"></div>
        <div class="white_box">
            <div class="table-responsive">
                <table width="100%" cellspacing="0" cellpadding="0" class="myDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            {{--  <th>Account Type</th>  --}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i  = ($user_list->perPage() * ($user_list->currentPage() - 1)) + 1;
                    ?>
                        @foreach( $user_list as $index=>$user )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->first_name}}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->contact_no }}</td>
                            <td>{{ @$user->city }}</td>
                            <td>{{ @$user->state->name }}</td>
                            <td>{{ @$user->country->name }}</td>
                            {{--  <td>{{ @$user->getType() }}</td>  --}}
                            <!-- <td>{!! $user->getStatus() !!}</td> -->
                            <td><input type="checkbox" class="toggle-status-class" data-id="{{$user->id}}"
                                    data-toggle="toggle" data-on="Active" data-off="Suspend" data-onstyle="success"
                                    data-offstyle="danger" {{ $user->status == 'A' ? 'checked=true' : '' }}></td>

                            <td>
                                <a href="{{ route('admin.user.detail',$user->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="user.detail" class="action_btn" alt="detail"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('admin.edit.buisnessUser',$user->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="user.edit" class="action_btn" alt="edit"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a>
                                {{--  <a href="{{ route('admin.user.delete',$user->id) }}" onclick="return confirm('Are
                                you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top"
                                title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash"
                                    aria-hidden="true"></i></a> --}}
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
        {{ $user_list->links() }}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(function() {
        $('.toggle-status-class').change(function() {

            var status = $(this).prop('checked') == true ? 'A' : 'S';
            console.log(status);
            var id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            var url = "{{route('admin.change-user-status')}}";
            //alert(url);
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    status: status,
                    id: id,
                    _token: token
                },
                success: function(data) {
                    SwalOverlayColor();
                if(data.status == 'Suspend'){
                    swal({
                        title: data.status,
                        text: "Are you sure you want to suspend the user account?",
                    })
                }else{
                    swal({
                        title: data.status,
                        text: "Are you sure you want to activate the user account?",
                    })
                }
                }
            });
        })
    })
    </script>
    @endsection
