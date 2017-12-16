<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0);" class="closebtn sidenav-a sidenav-close-a" onclick="closeNav();">&times;</a>
	<hr />
	<a href="{{ route('guest.about') }}" class="sidenav-a {{ Request::is('about') ? 'active' : '' }}">
		<i class="fa fa-list-alt fa-fw"></i>
		About
	</a>
	<a href="{{ route('guest.contact') }}" class="sidenav-a {{ Request::is('contact') ? 'active' : '' }}">
		<i class="fa fa-id-card fa-fw"></i>
		Contact
	</a>
	<hr />

	<!-- authenticated -->
	@if (Auth::guard())
		<!-- admin -->
		@if (Auth::guard('admin')->check())
			<a href="{{ route('userdata.index') }}"
					class="sidenav-a {{ Request::is('admin/userdata*') ? 'active' : '' }}">
				Users Data
			</a>
			<hr />
		@endif

		<!-- user -->
		@if (Auth::guard('user')->check())
			<a href="{{ route('user.index') }}"
					class="sidenav-a {{ Request::is('user/content*') ? 'active' : '' }}">
				Content
			</a>
			<hr />
		@endif

	<!-- unauthenticated -->
	@else
		<!--  -->
		<hr />
	@endif
</div>
<!--sidenav background-->
<div id="mySidenavBG" class="sidenavBG" onclick="closeNav();"></div>