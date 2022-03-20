@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">

    <div class="tables_area">
        <h2 class="pull-left">Blog Listing</h2>
        <input type="search" class="searchBox" placeholder="Search Here">
        <a href="{{ route('admin.blog.add')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
        <div class="clear"></div>
        @if($blogs->count()>0)
        <div class="white_box">
            <div class="table-responsive">
                <table width="100%" cellspacing="0" cellpadding="0" class='myDataTable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i  = ( $blogs->perPage() * ( $blogs->currentPage() - 1)) + 1;
                        ?>
                        @foreach( $blogs as $serial_no=>$blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>

                                @if(!empty(@$blog->image_file))
                                <img src="{{asset('public/'.@$blog->image_file) }}"
                                    class="img-circle profile_image_small" />
                                @else
                                <img src="{{asset('public/images/default-image-file-o.png') }}"
                                    class="img-circle profile_image_small" />
                                @endif

                            </td>
                            <td>{{ $blog->title}}</td>
                            <td>{!! $blog->getStatus() !!}</td>
                            <td>
                                <a href="{{ route('admin.blog.view',$blog->id) }}" class="action_btn"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('admin.blog.edit',$blog->id) }}" class="action_btn"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="{{ route('admin.blog.delete',$blog->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this record?')"
                                    class="action_btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paginator">
            {{ $blogs->links() }}
        </div>
        @else
        <div class="main-img">
            <img src="{{asset('public/images/no-record.png') }}" class="no-record" />
        </div>
        @endif
    </div>
    @endsection
