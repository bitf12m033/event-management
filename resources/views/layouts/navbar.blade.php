	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="index.html" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="{{ asset('assets/images/logo.svg') }}" alt="" class="logo logo-lg">
					<img src="{{ asset('assets/images/logo-sm.svg') }}"  alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Menu</label>

					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Dashboard</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.levels.index') }}" class="pc-link"><span class="pc-micon"><i data-feather="layers"></i></span><span class="pc-mtext">Levels</span></a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.classes.index') }}" class="pc-link">
							<span class="pc-micon"><i class="nav-icon fas fa-school"></i></span>
							<span class="pc-mtext">Classes</span>
						</a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.subjects.index') }}" class="pc-link">
							<span class="pc-micon"><i class="nav-icon fas fa-book"></i></span>
							<span class="pc-mtext">Subjects</span>
						</a>
					</li>
					<!-- New link for User Purchases -->
					<li class="pc-item">
						<a href="{{ route('admin.purchases.index') }}" class="pc-link">
						<span class="pc-micon"><i class="nav-icon fas fa-shopping-cart"></i></span>
						<span class="pc-mtext">All Purchases</span>
					</a>
                </li>
					<li class="pc-item pc-hasmenu {{ Request::is('admin/users*') ? 'active pc-trigger' : '' }}">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">User</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="user-profile.html">Profile</a></li>
							<li class="pc-item"><a class="pc-link" href="user-profile-social.html">Social Profile</a></li>
							<li class="pc-item"><a class="pc-link" href="user-card.html">User Card</a></li>
							<li class="pc-item {{ Request::is('admin/users*') ? 'active' : '' }}"><a class="pc-link" href="{{ route('admin.users.index') }}">User List</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->