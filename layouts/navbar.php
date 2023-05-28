<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-900"><?= $_SESSION['auth_user']['first_name'] . ' ' . $_SESSION['auth_user']['last_name'] ?></span>
				<!-- <img class="img-profile rounded-circle" src="assets/img/logo.png"> -->
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="logout.php">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
					Logout
				</a>
			</div>
		</li>
	</ul>
</nav>
  <!-- /.navbar -->