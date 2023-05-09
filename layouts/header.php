<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>CMIS</title>

	<link rel="shortcut icon" href="assets/img/logo.png">
	<!-- Custom fonts for this template-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

	<!-- Custom styles for this template-->
	<link href="assets/css/sb-admin-2.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap-icons.css">
	<!-- Bootstrap core JavaScript-->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- DataTables -->
	<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Select2 -->
	<link rel="stylesheet" href="assets/vendor/select2/select2.min.css" />
	<link rel="stylesheet" href="assets/vendor/select2/select2-bootstrap-5-theme.min.css" />

	<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" />

	<link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css" />

	<link rel="stylesheet" href="assets/vendor/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">

	<link rel="stylesheet" href="assets/vendor/bs-stepper/css/bs-stepper.min.css">

	<style type="text/css">
		body {
			color: black !important;
		}

		#content {
			margin-top: 1rem;
		}


		body {
			background-color: black !important;
		}

		.text-black,
		table td,
		table tbody th {
			color: black !important;
		}

		#loader-wrapper {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1001;
		}

		#loader-wrapper .loader-section {
			position: fixed;
			top: 0;
			width: 51%;
			height: 100%;
			background: #fff;
			z-index: 1000;
			-webkit-transform: translateX(0);
			transform: translateX(0);
		}

		#loader-wrapper .loader-section.section-left {
			left: 0;
		}

		#loader-wrapper .loader-section.section-right {
			right: 0;
		}

		#loader {
			display: block;
			position: relative;
			left: 50%;
			top: 50%;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #3498db;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
			z-index: 99999;
		}

		#loader:before {
			content: "";
			position: absolute;
			top: 5px;
			left: 5px;
			right: 5px;
			bottom: 5px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #e74c3c;
			-webkit-animation: spin 3s linear infinite;
			animation: spin 3s linear infinite;
		}

		#loader:after {
			content: "";
			position: absolute;
			top: 15px;
			left: 15px;
			right: 15px;
			bottom: 15px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #f9c922;
			-webkit-animation: spin 1.5s linear infinite;
			animation: spin 1.5s linear infinite;
		}

		.loaded #loader-wrapper {
			visibility: hidden;
			-webkit-transform: translateY(-100%);
			transform: translateY(-100%);
			-webkit-transition: all 0.3s 1s ease-out;
			transition: all 0.3s 1s ease-out;
		}

		.loaded #loader-wrapper .loader-section.section-left {
			-webkit-transform: translateX(-100%);
			transform: translateX(-100%);
			-webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
			transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
		}

		.loaded #loader-wrapper .loader-section.section-right {
			-webkit-transform: translateX(100%);
			transform: translateX(100%);
			-webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
			transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
		}

		.loaded #loader {
			opacity: 0;
			-webkit-transition: all 0.3s ease-out;
			transition: all 0.3s ease-out;
		}

		@-webkit-keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}

			100% {
				-webkit-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}

		@keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}

			100% {
				-webkit-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}

		.loaded #loader-wrapper {
			visibility: hidden;
			transform: translateY(-100%);
		}

		.loaded #loader {
			opacity: 0;
		}
	</style>
</head>

<body id="page-top">
	<div id="wrapper">
		<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>
		<?php include "sidebar.php" ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<?php //include "navbar.php" 
			?>