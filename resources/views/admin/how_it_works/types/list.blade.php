@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">

    <div class="tables_area">
        <h2 class="pull-left">Type Listing</h2>
        <!-- @if(empty($heading[0])) -->
        <a href="{{route('admin.how-it-work.types.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
        <!-- @endif -->
        <div class="clear"></div>
        @if($heading->count()>0)
        <div class="white_box">
            <div class="table-responsive">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getTypes as $serial_no=>$row)
                        <tr>
                            <td>{{$serial_no+1 }}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                            <td> 
                                <a href="{{route('admin.how-it-work.types.edit',$row['id'])}}" class="action_btn"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                                <a href="{{route('admin.how-it-work.types.delete',$row['id'])}}" class="action_btn"><i class="fa fa-remove" aria-hidden="true"></i></a>                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        @else
        <div class="main-img">
            <img src="{{asset('public/images/no-record.png') }}" class="no-record" />
        </div>
        @endif
    </div>
</div>
@endsection