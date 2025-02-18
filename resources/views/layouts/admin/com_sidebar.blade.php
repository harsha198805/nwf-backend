<nav id="sidebar" class="sidebar-wrapper">
				
				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="index.php" class="logo">
						<img src="{{ URL::to('assets/admin/img/logo.png') }}" alt="System" />
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li class="active">
								<a href="dashboard.php">
									<i class="icon-devices_other"></i>
									<span class="menu-text">dashboard</span>
								</a>
							</li>
							<li>
								<a href="{{ route('categories.index') }}">
									<i class="icon-grid"></i>
									<span class="menu-text">Category</span>
								</a>
							</li>
							<li>
								<a href="{{ route('products.index') }}">
									<i class="icon-box"></i>
									<span class="menu-text">Products</span>
								</a>
							</li>
							<li>
								<a href="blog.php">
									<i class="icon-question_answer"></i>
									<span class="menu-text">Blogs</span>
								</a>
							</li>
							<li>
								<a href="profile.php">
									<i class="icon-user1"></i>
									<span class="menu-text">User Profile</span>
								</a>
							</li>
							<li>
								<a href="index.php">
									<i class="icon-log-out1"></i>
									<span class="menu-text">Sign Out</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->
				
			</nav>