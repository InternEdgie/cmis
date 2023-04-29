<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) {
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$suffix = $_POST['suffix'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$citizenship_id = $_POST['citizenship_id'];
	$civil_status = $_POST['civil_status'];
	$zone = $_POST['zone'];
	$barangay = $_POST['barangay'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$zip_code = $_POST['zcode'];
	$contact = str_replace('-', '', $_POST['contact']);

	$formatbd = str_replace('/', '-', $birthday);
	$newbd = date('d-m-Y', strtotime($formatbd));
	// Create a datetime object using date of birth
	$dob = new DateTime($newbd);

	// Get current date
	$now = new DateTime();

	// Calculate the time difference between the two dates
	$diff = $now->diff($dob);

	$age = $diff->y;

	$nresident_query = "INSERT INTO tbl_non_residents (nres_fname, nres_mname, nres_lname, nres_suffix, nres_birthday, nres_age, nres_gender, citizenship_id, nres_cstatus, nres_zone, nres_barangay, nres_city, nres_province, nres_zcode, nres_contact) VALUES ('$first_name', '$middle_name', '$last_name', '$suffix', '$birthday', '$age', '$gender', '$citizenship_id', '$civil_status', '$zone', '$barangay', '$city', '$province', '$zip_code', '$contact')";
	if ($connection->query($nresident_query) === TRUE) {
		//Saving actions to logs
		if (isset($_SESSION['auth'])) {
			$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the non-resident record.";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);
		}
		$_SESSION['message_success'] = "<b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> has been added to the non-resident record.";
		header("location:../../non-residents.php");

	} else {
		$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
		header('location ../../non-residents.php');
	}
}
?>