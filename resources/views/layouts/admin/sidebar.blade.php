<!-- start left sidebar here -->
<style>
    .active3{
        color:#1ACBAA !important;
    }
</style>
		<div class="left_sidebar">
			<ul>
                @php

                $current_uri = request()->segments();
                $current_uri  =  $current_uri[1] ?? '';
                @endphp
				<li>
					<a href="{{ route('admin.dashboard')}} " class="{{ isset($current_uri)  && $current_uri == 'dashboard' ? 'active3' : '' }}">
						<i class="fa fa-tachometer" aria-hidden="true"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a href="{{ route('admin.commission.list') }}" class="{{ isset($current_uri)  && $current_uri == 'commission-list' ? 'active3' : '' }}">
					<i class="fa fa-eur" aria-hidden="true"></i><span>Admin Commission</span></a>
				</li>
				<li class="dropdown">
					<a class="page-title collapsed" data-toggle="collapse"   data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1" aria-expanded="false" >
						<i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a>
						<ul id="faqCollapse-1" class="collapse sub" aria-labelledby="faqHeading-1" data-parent="#accordion">
							<li>
						    	<a class="dropdown-item" href="{{ route('incompleteUser') }}" ><i class="fa fa-user" aria-hidden="true"></i>Incomplete Profiles</a>
							</li>
							<li>
						    	<a class="dropdown-item" href="{{ route('personalUser') }}"><i class="fa fa-user" aria-hidden="true"></i>Personal Users</a>
							</li>
							<li>
						    	<a class="dropdown-item" href="{{ route('buisnessUser') }}"><i class="fa fa-edit" aria-hidden="true"></i>Business Users</a>
							</li>
						</ul>
				</li>
				<li class="dropdown">
					<a class="page-title collapsed" data-toggle="collapse"  class="{{ isset($current_uri)  && $current_uri == 'coach' ? 'active3' : '' }}" data-target="#faqCollapse-2" data-aria-expanded="true" data-aria-controls="faqCollapse-2" aria-expanded="false">
						<i class="fa fa-users" aria-hidden="true"></i><span>Coaches</span></a>
						<ul id="faqCollapse-2" class="collapse sub" aria-labelledby="faqHeading-2" data-parent="#accordion">
							<li>
						    	<a class="dropdown-item" href="{{ route('admin.coach.incomplete-coach','in-complete-coach') }}"><i class="fa fa-user" aria-hidden="true"></i>Incomplete Profiles</a>
							</li>
							<li>
						    	<a class="dropdown-item" href="{{ route('admin.coach.list', 'coach-list') }}"><i class="fa fa-user" aria-hidden="true"></i>Coaches Status</a>
							</li>
						</ul>
				</li>
				<li>
					<a href="{{ route('admin.page.list') }}" class="{{ isset($current_uri)  && $current_uri == 'page' ? 'active3' : '' }}">
					<i class="fa fa-file-text" aria-hidden="true"></i><span>Pages</span></a>
				</li>
				<li class="dropdown">
					<a class="page-title collapsed" data-toggle="collapse"  data-target="#faqCollapse" data-aria-expanded="true" data-aria-controls="faqCollapse" aria-expanded="false">
						<i class="fa fa-users" aria-hidden="true"></i><span>How It Work</span></a>
						<ul id="faqCollapse" class="collapse sub" aria-labelledby="faqHeading" data-parent="#accordion">
						    <li>
						    	<a class="dropdown-item" href="{{route('admin.how-it-work.heading.list')}}"><i class="fa fa-list" aria-hidden="true"></i>Heading</a>
							</li>
							<li>
						    	<a class="dropdown-item" href="{{route('admin.how-it-work.types.list')}}"><i class="fa fa-user" aria-hidden="true"></i>Types</a>
							</li>
							<li>
						    	<a class="dropdown-item" href="{{route('admin.how-it-work.contents.list')}}"><i class="fa fa-user" aria-hidden="true"></i>Content</a>
							</li>
						
						</ul>
				</li>
				<li>
					<a href="{{ route('admin.category.list') }}" class="{{ isset($current_uri)  && $current_uri == 'category' ? 'active3' : '' }}">
					<i class="fa fa-th-large" aria-hidden="true"></i><span>Categories</span></a>
				</li>
				<li>
					<a href="{{ route('admin.blog.list') }}" class="{{ isset($current_uri)  && $current_uri == 'blog' ? 'active3' : '' }}">
					<i class="fa fa-quote-left" aria-hidden="true"></i><span>Blogs</span></a>
				</li>
                <li>
					<a href="{{ route('admin.training.list') }}" class="{{ isset($current_uri)  && $current_uri == 'traning_style' ? 'active3' : '' }}">
					<i class="fa fa-th" aria-hidden="true"></i><span>Training Style</span></a>
				</li>
				<li>
					<a href="{{ route('admin.review.list') }}" class="{{ isset($current_uri)  && $current_uri == 'review-list' ? 'active3' : '' }}">
					<i class="fa fa-star-o" aria-hidden="true"></i><span>Reviews</span></a>
				</li>
				<li>
					<a href="{{ route('admin.booking.list') }}" class="{{ isset($current_uri)  && $current_uri == 'booking-list' ? 'active3' : '' }}">
					<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span>Booking Request</span></a>
				</li>
				<li>
					<a href="{{route('faq.dashboard')}}" class="{{ isset($current_uri)  && $current_uri == 'faqs_dashboard' ? 'active3' : '' }}">
					<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span>Faqs Management</span></a>
				</li>
			</ul>


		</div>
<!-- end left sidebar here -->
