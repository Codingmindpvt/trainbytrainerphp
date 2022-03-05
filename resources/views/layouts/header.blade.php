
<!--Loader-->
	<div id="web-loader" class="loadingio-spinner-spin-7mhonr12h9"><div class="ldio-kno2f50uxvt">
<div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
</div></div>
<!--Loader-->


<!--start header area here  -->
      <header class="header" id="fixed_header">
      		<div class="container-fluid">
      			<nav class="navbar navbar-expand-lg">
      				@if((Auth::check() && !empty(Auth::user()->account_complete==1) || !Auth::check()))
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('/')}}/public/images/logo.png" alt="logo here"/></a>
					@else
					<a class="navbar-brand" href=""><img src="{{url('/')}}/public/images/logo.png" alt="logo here"/></a>
					@endif
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav ml-md-auto">
                            @php

                            $current_uri = request()->segments();
                            $current_uri  =  $current_uri[0] ?? '';
                            @endphp
                            			@if((Auth::check() && !empty(Auth::user()->account_complete==1) || !Auth::check()))
					      	<li class="nav-item">
					        	<a class="nav-link {{ isset($current_uri)  && $current_uri == '' ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link {{ isset($current_uri)  && $current_uri == 'coaches' ? 'active' : '' }}" href="{{ route('coaches') }}">Coaches</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link {{ isset($current_uri)  && $current_uri == 'programs' ? 'active' : '' }}" href="{{ route('programs') }}">Programs</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link {{ isset($current_uri)  && $current_uri == 'classes' ? 'active' : '' }}" href="{{ route('classes') }}">Classes</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link {{ isset($current_uri)  && $current_uri == 'howitwork' ? 'active' : '' }}" href="{{ route('howitwork') }}">How It Works</a>
					      	</li>
					      	@endif
					      	@if(Auth::check())
					      		@if(!empty(Auth::user()->account_complete==1))
							      	 <li class="nav-item mobile-767">
							        	<a class="nav-link" href="{{ route('cart') }}">My Cart</a>
							      	</li>
							      @else
							      	<li class="nav-item mobile-767">
							        	<a class="small-blue-btn small-black-border-btn" href="{{ route('logout') }}">Logout</a>
							      	</li>
							      @endif
					      	@else
					      	<li class="nav-item mobile-767">
					        	<a class="nav-link" href="{{ route('login') }}">Sign In</a>
					      	</li>
					      	<li class="nav-item mobile-767">
					        	<a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
					      	</li>
					      	@endif
					    </ul>
					</div>
					<ul class="right-menu">
						@if(Auth::check())
							@if(!empty(Auth::user()->account_complete==1))
								<li class="web-upper-767">
									<a href="{{ route('cart') }}" class="circle-icons {{ isset($current_uri)  && $current_uri == 'cart' ? 'active' : '' }}">
										<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="6" cy="12" r="1" fill="#474646"/>
											<circle cx="11" cy="12" r="1" fill="#474646"/>
											<path d="M1.72086 0H0.220861C-0.179139 0.4 0.054194 0.833333 0.220861 1H1.72086C2 1 2.22086 1.83333 2.22086 2L4.22086 9.5C4.5 10.5 5.22086 10.5 5.72086 10.5H11.7209C12.5 10.5 13 10 13.2209 9.5L14.7209 4.5C15.1209 3.3 14.7209 3.5 14.2209 3.5H4.22086L3.22086 1C2.82086 0.2 2.05419 0 1.72086 0Z" fill="#474646"/>
											<path d="M7.5 1C7.1 1 6 2 5.5 2.5H13C12.5 2 11.4 1 11 1C10.6 1 9.5 1.66667 9 2C8.66667 1.66667 7.9 1 7.5 1Z" fill="#474646"/>
										</svg>
									</a>
								</li>

								<li class="web-upper-767">
				                            <a href="{{ route('my-wishlist') }}" class="circle-icons {{ isset($current_uri)  && $current_uri == 'my-wishlist' ? 'active' : '' }}">
				                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				                                    <path d="M11.3125 0.242188C9.99219 0.242188 8.78125 0.859375 8 1.875C7.21875 0.859375 6.00781 0.242188 4.6875 0.242188C2.37891 0.242188 0.5 2.12891 0.5 4.44922C0.5 5.53906 0.914063 6.57422 1.66797 7.36328L7.57422 13.3281L8 13.7578L8.42578 13.3281L14.2188 7.47656C15.0391 6.68359 15.5 5.60547 15.5 4.44922C15.5 2.12891 13.6211 0.242188 11.3125 0.242188Z" fill="#474646"/>
				                                </svg>
				                            </a>
				                        </li>
				                        <li class="web-upper-767">
				                            <a href="{{ route('chat') }}" class="circle-icons {{ isset($current_uri)  && $current_uri == 'chat' ? 'active' : '' }}">
				                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				                                    <path d="M12.333 0.333252H1.66634C0.929675 0.333252 0.333008 0.929919 0.333008 1.66659V13.6666L2.99967 10.9999H12.333C13.0697 10.9999 13.6663 10.4033 13.6663 9.66658V1.66659C13.6663 0.929919 13.0697 0.333252 12.333 0.333252Z" fill="#474646"/>
				                                </svg>
				                                <span class="notification-circle"></span>
				                            </a>
				                        </li>
				                        <li class="m-l10 dropdown">
				                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                            	 @if(!empty(Auth::user()->profile_image))
					                        <img src="{{asset('public/'.Auth::user()->profile_image) }}"/>
					                        @else
					                        <img src="{{asset('public/images/default-image.png') }}"/>
					                        @endif
				                                <span><?= (!empty(Auth::user()->first_name) && !empty(Auth::user()->last_name)) ? Auth::user()->first_name." ".Auth::user()->last_name : "New User"; ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i>
				                            </button>
				                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				                            	@if(Auth::user()->role_type=='C')
				                            	<a class="dropdown-item" href="{{ route('coach-dashboard') }}">My Profile</a>
				                            	@else
				                            	<a class="dropdown-item" href="{{ route('userprofile') }}">My Profile</a>
				                            	@endif
				                                <a class="dropdown-item" href="{{  route('user-logout')  }}">Logout</a>
				                            </div>
				                        </li>
				                  @else
				                  	<li class="nav-item mobile-767">
							        <a  class="small-blue-btn" href="{{ route('logout') }}">Logout</a>
							      </li>
				                  @endif
						@else
						<li class="m-l10 web-upper-767">
							<a href="{{  route('login')  }}" class="small-blue-btn small-black-border-btn">Sign In</a>
						</li>
						<li class="web-upper-767">
							<a href="{{ route('signup') }}" class="small-blue-btn small-black-border-btn">Sign Up</a>
						</li>
						@endif
						@if((Auth::check() && !empty(Auth::user()->account_complete==1) || !Auth::check()))

						<li class="search-header">
							<a href="#" class="circle-icons mobile-view" id="mobile-view-search">
								<svg fill="none" height="24" stroke="#474646" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="10.5" cy="10.5" r="7.5"/><line x1="21" x2="15.8" y1="21" y2="15.8"/></svg>
							</a>
                            <form method="get" class="search-box" action={{ route('coaches') }}>
							<input type="text" name="ss" placeholder="Search trainer by name.." class="form-control header-search-input web-view">
                            <input type="submit" class="search-value" value="Search" >
                            <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        </form>
						</li>

						{{-- <li>
							<input id="country_selector" type="text">
						</li> --}}
						@endif
					</ul>
				</nav>
      		</div>
      </header>

<!--end header area here -->



