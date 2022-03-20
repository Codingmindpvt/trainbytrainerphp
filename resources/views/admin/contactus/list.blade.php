@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">

    <div class="tables_area">
        <h2 class="pull-left">Contact Us </h2>
        <input type="search" class="searchBox" placeholder="Search Here">
        <div class="clear"></div>
        @if($contactus->count()>0)
        <div class="white_box">
            <div class="table-responsive">
                <table width="100%" cellspacing="0" cellpadding="0" class="myDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i  = ( $contactus->perPage() * ( $contactus->currentPage() - 1)) + 1;
                        ?>
                        @foreach( $contactus as $serial_no=>$training)
                        <tr>
                            <td>{{ $i++ }}</td>
                            {{-- <td>
										@if(!empty(@$training->image_file))
			               				 	<img src="{{asset('public/'.@$training->image_file) }}" class="img-circle
                            profile_image_small"/>
                            @else
                            <img src="{{asset('public/images/default-image-file-o.png') }}"
                                class="img-circle profile_image_small" />
                            @endif
                            </td> --}}
                            <td>{{ $training->first_name}} {{ $training->last_name}}</td>
                            <td><a href="mailto:{{ $training->email}}" target="_blank"
                                    rel="noopener noreferrer">{{ $training->email}}</a></td>
                            <td>{{ $training->phone_number}} </td>
                            <td>{{ $training->message}} </td>
                            <!-- <td><a href="">Delete</a> || <a href="">Reply</a></td>                               -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paginator">
    {{ $contactus->links() }}
        </div>
        @else
        <div class="main-img">
            <img src="{{asset('public/images/no-record.png') }}" class="no-record" />
        </div>
        @endif
    </div>
    @endsection
