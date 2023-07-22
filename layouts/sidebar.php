<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-lightblue text-white elevation-4">
	<!-- Brand Logo -->
	<a href="index.php" class="brand-link">
		<img src="assets/img/logo.png" class="brand-image img-circle elevation-3">
		<span class="brand-text font-weight-light">Lupon Macabalan</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="dashboard.php" class="nav-link py-3 <?= $page == 'dashboard.php' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-fw fa-chart-area"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="file-complaint.php" class="nav-link py-3 <?= $page == 'file-complaint.php' || $page == 'view-file-complaint.php' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-fw fa-file-alt"></i>
						<p>
							File Complaint
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="schedules.php" class="nav-link py-3 <?= $page == 'schedules.php' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-fw fa-calendar-alt"></i>
						<p>
							Schedules
						</p>
					</a>
				</li>
				<?php if ($_SESSION['role'] == 1) : ?>
					<li class="nav-item <?= $page == 'residents.php' || $page == 'non-residents.php' || $page == 'lupon.php' || $page == 'users.php' || $page == 'logs.php' || $page == 'view-resident-profile.php' || $page == 'view-non-resident-profile.php' || $page == 'view-lupon-profile.php' ? 'menu-open' : '' ?>">
						<a href="#" class="nav-link py-3 <?= $page == 'residents.php' || $page == 'non-residents.php' || $page == 'lupon.php' || $page == 'users.php' || $page == 'logs.php' || $page == 'view-resident-profile.php' || $page == 'view-non-resident-profile.php' || $page == 'view-lupon-profile.php' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Manage
								<i class="fas fa-angle-left right mt-2"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="residents.php" class="nav-link py-3 <?= $page == 'residents.php' || $page == 'view-resident-profile.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Residents</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="non-residents.php" class="nav-link py-3 <?= $page == 'non-residents.php' || $page == 'view-non-resident-profile.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Non-Residents</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="lupon.php" class="nav-link py-3 <?= $page == 'lupon.php' || $page == 'view-lupon-profile.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Lupon</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="users.php" class="nav-link py-3 <?= $page == 'users.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Users</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="logs.php" class="nav-link py-3 <?= $page == 'logs.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>User Logs</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item <?= $page == 'filed-complaint-reports.php' || $page == 'residents_report.php' || $page == 'residents_report.php' ? 'menu-open' : '' ?>">
						<a href="#" class="nav-link py-3 <?= $page == 'filed-complaint-reports.php' || $page == 'residents_report.php' || $page == 'residents_report.php' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-chart-pie"></i>
							<p>
								Reports
								<i class="right fas fa-angle-left mt-2"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="filed-complaint-reports.php" class="nav-link py-3 <?= $page == 'filed-complaint-reports.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Filed Complaints</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link py-3 <?= $page == 'resident-reports.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Residents</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link py-3 <?= $page == 'non-resident-reports.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Non-Residents</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item <?= $page == 'positions.php' || $page == 'zone.php' || $page == 'citizenship.php' || $page == 'status.php' || $page == 'events.php' || $page == 'complaint-type.php' || $page == 'backup.php' ? 'menu-open' : '' ?>">
						<a href="#" class="nav-link py-3 <?= $page == 'positions.php' || $page == 'zone.php' || $page == 'citizenship.php' || $page == 'status.php' || $page == 'events.php' || $page == 'complaint-type.php' || $page == 'backup.php' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-cog"></i>
							<p>
								Settings
								<i class="right fas fa-angle-left mt-2"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="citizenship.php" class="nav-link <?= $page == 'citizenship.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Citizenship</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="complaint-type.php" class="nav-link <?= $page == 'complaint-type.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Complaint Type</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="events.php" class="nav-link <?= $page == 'events.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Events</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="positions.php" class="nav-link <?= $page == 'positions.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Positions</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="backup.php" class="nav-link <?= $page == 'backup.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>SQL Backup</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="status.php" class="nav-link <?= $page == 'status.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Status</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="zone.php" class="nav-link <?= $page == 'zone.php' ? 'active' : '' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Zone</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="settings.php" class="nav-link py-3 <?= $page == 'settings.php' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-fw fa-cog"></i>
							<p>
								Settings
							</p>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>