<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<!-- <i class="fas fa-laugh-wink"></i> -->
			<img src="assets/img/logo.png" width="50">
		</div>
		<div class="sidebar-brand-text mx-3">Lupon Macabalan</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?= $page == 'dashboard.php'? 'active' : '' ?>">
		<a class="nav-link" href="dashboard.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Heading -->
	<div class="sidebar-heading">
		Main Menu
	</div>
	<li class="nav-item <?= $page == 'file-complaint.php' || $page == 'view-file-complaint.php'? 'active' : '' ?>">
		<a class="nav-link" href="file-complaint.php">
			<i class="fas fa-fw fa-file-alt"></i>
			<span>File Complaint</span>
		</a>
	</li>
	<li class="nav-item <?= $page == 'schedules.php'? 'active' : '' ?>">
		<a class="nav-link" href="schedules.php">
			<i class="fas fa-fw fa-calendar-alt"></i>
			<span>Schedule</span>
		</a>
	</li>
	<?php if($_SESSION['role'] == 1): ?>
		<li class="nav-item <?= $page == 'residents.php' || $page == 'non-residents.php' || $page == 'lupon.php' || $page == 'users.php' || $page == 'logs.php' || $page == 'view-resident-profile.php' || $page == 'view-non-resident-profile.php' || $page == 'view-lupon-profile.php' ? 'active':'' ?>">
			<a class="nav-link <?= $page == 'residents.php' || $page == 'non-residents.php' || $page == 'lupon.php' || $page == 'users.php' || $page == 'logs.php' || $page == 'view-resident-profile.php' || $page == 'view-non-resident-profile.php' || $page == 'view-lupon-profile.php' ? '':'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-user"></i>
				<span>Manage</span>
			</a>
			<div id="collapseTwo" class="collapse <?= $page == 'residents.php' || $page == 'non-residents.php' || $page == 'lupon.php' || $page == 'users.php' || $page == 'logs.php' || $page == 'view-resident-profile.php' || $page == 'view-non-resident-profile.php' || $page == 'view-lupon-profile.php' ? 'show':'' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner">
					<h6 class="collapse-header">Manage:</h6>
					<a class="collapse-item <?= $page == 'residents.php' || $page == 'view-resident-profile.php' ? 'active' : '' ?>" href="residents.php">Residents</a>
					<a class="collapse-item <?= $page == 'non-residents.php' || $page == 'view-non-resident-profile.php' ? 'active' : '' ?>" href="non-residents.php">Non-Residents</a>
					<a class="collapse-item <?= $page == 'lupon.php' || $page == 'view-lupon-profile.php' ? 'active' : '' ?>" href="lupon.php">Lupon Officials/Members</a>
					<!-- <a class="collapse-item <?= $page == 'users.php'? 'active' : '' ?>" href="users.php">Users</a> -->
					<a class="collapse-item <?= $page == 'logs.php'? 'active' : '' ?>" href="logs.php">User Logs</a>
				</div>
			</div>
		</li>
		<li class="nav-item <?= $page == 'filed-complaint-reports.php' ? 'active':'' ?>">
			<a class="nav-link <?= $page == 'filed-complaint-reports.php' ? '':'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-fw fa-file"></i>
				<span>Reports</span>
			</a>
			<div id="collapseUtilities" class="collapse <?= $page == 'filed-complaint-reports.php' ? 'show':'' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">List of Reports:</h6>
					<a class="collapse-item <?= $page == 'filed-complaint-reports.php'? 'active' : '' ?>" href="filed-complaint-reports.php">Filed Complaints</a>
					<a class="collapse-item <?= $page == 'resident-reports.php'? 'active' : '' ?>" href="resident-reports.html">List of Residents</a>
					<a class="collapse-item <?= $page == 'non-resident-reports.php'? 'active' : '' ?>" href="non-resident-reports.html">List of Non-Residents</a>
				</div>
			</div>
		</li>
	<?php endif; ?>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Heading -->
	<div class="sidebar-heading">
		Setting
	</div>
	<li class="nav-item <?= $page == 'positions.php' || $page == 'zone.php' || $page == 'citizenship.php' || $page == 'status.php' || $page == 'events.php' || $page == 'complaint-type.php' || $page == 'backup.php' ? 'active':'' ?>">
		<a class="nav-link <?= $page == 'positions.php' || $page == 'zone.php' || $page == 'citizenship.php' || $page == 'status.php' || $page == 'events.php' || $page == 'complaint-type.php' || $page == 'backup.php' ? '':'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-cog"></i>
			<span>Settings</span>
		</a>
		<div id="collapsePages" class="collapse <?= $page == 'positions.php' || $page == 'zone.php' || $page == 'citizenship.php' || $page == 'status.php' || $page == 'events.php' || $page == 'complaint-type.php' || $page == 'backup.php' ? 'show':'' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Change:</h6>
				<a class="collapse-item <?= $page == 'backup.php'? 'active' : '' ?>" href="backup.php">Backup SQL</a>
				<a class="collapse-item <?= $page == 'citizenship.php'? 'active' : '' ?>" href="citizenship.php">Citizenship</a>
				<a class="collapse-item <?= $page == 'complaint-type.php'? 'active' : '' ?>" href="complaint-type.php">Complaint Type</a>
				<a class="collapse-item <?= $page == 'events.php'? 'active' : '' ?>" href="events.php">Events</a>
				<a class="collapse-item <?= $page == 'positions.php'? 'active' : '' ?>" href="positions.php">Positions</a>
				<a class="collapse-item <?= $page == 'status.php'? 'active' : '' ?>" href="status.php">Status</a>
				<a class="collapse-item <?= $page == 'zone.php'? 'active' : '' ?>" href="zone.php">Zone</a>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>