@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2 class="pull-left">Faqs Listing</h2>
				<a href="{{ route('add.faq.form')}}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a>
				<div class="clear"></div>
				@if($faqs->count()>0)
				<div class="white_box">
					<div class="table-responsive">
						<table width="100%" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Questions</th>
									<th>Answer</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach( $faqs as $index => $faq)
								<tr>
									<td>{{ $index+1 }}</td>
									<td>{{ $faq->questions}}</td>
									<td>{{$faq->answer}}</td>
                                    <td>{!! $faq->getStatus() !!}</td>
									<td>
										<a href="{{route('faq_view_more', $faq->id)}}" class="action_btn" title="View More"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{route('edit.faq', $faq->id)}}" class="action_btn" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a href="{{route('delete.faq', $faq->id)}}" onclick="return confirm('Are you sure you want to delete this record?')" class="action_btn" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
                <div class="paginator">
                    {{ $faqs->links() }}
                </div>
				@else
					<div class="main-img">
						<img src="{{asset('public/images/no-record.png') }}" class="no-record"/>
					</div>
				@endif
			</div>
@endsection
