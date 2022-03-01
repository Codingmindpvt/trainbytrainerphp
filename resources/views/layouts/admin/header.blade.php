<!-- start header here -->
	<header class="header">
		<div class="dashboard_logoarea text-center">
			<a href="#" class="menu_bar"><i class="fa fa-bars" aria-hidden="true"></i></a>
						<a href="#"><img src="{{asset('public/images/logo.png') }}" alt="" /></a>
		</div>
		<div class="right_loggedarea">
			<ul>
				<li><a href="#">My Notifications <span class="notification_count">25</span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@if(!empty(Auth::guard('admin')->user()->profile_image))
			                <img src="{{asset('public/'.Auth::guard('admin')->user()->profile_image) }}"/>
			            @else
			                <img src="{{asset('public/images/default-image.png') }}" class="profile-image"/>
			            @endif
						My Account
						<i class="fa fa-sort-desc" aria-hidden="true"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item" href="{{route('admin.myprofile')  }}"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>
					    <a class="dropdown-item" href="{{ route('admin.editprofile',auth()->guard('admin')->user()->id) }}"><i class="fa fa-edit" aria-hidden="true"></i>Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('admin.change-password') }}"><i class="fa fa-user" aria-hidden="true"></i>Change Password</a>
					    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</header>
<!-- end header here -->
