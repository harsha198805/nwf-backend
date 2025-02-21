<header class="header">
	<div class="toggle-btns">
		<a id="toggle-sidebar" href="#">
			<i class="icon-list"></i>
		</a>
		<a id="pin-sidebar" href="#">
			<i class="icon-list"></i>
		</a>
	</div>
	<div class="header-items">

		<!-- Header actions start -->
		<ul class="header-actions">
			<li class="dropdown">
				<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
					<span class="user-name">John Cena</span>
					<span class="avatar">
						<img src="{{ URL::to('assets/admin/img/user-default.png') }}" alt="avatar">
						<span class="status busy"></span>
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
					<div class="header-profile-actions">
						<div class="header-user-profile">
							<div class="header-user">
								<img src="{{ URL::to('assets/admin/img/user-default.png') }}" alt="avatar">
							</div>
							<h5>John Cena</h5>
							<p>Admin</p>
						</div>
						<a href="profile.php"><i class="icon-user1"></i> My Profile</a>
						<a href="index.php"><i class="icon-log-out1"></i> Sign Out</a>
					</div>
				</div>
			</li>
		</ul>						
		<!-- Header actions end -->
	</div>
</header>

<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
</div>