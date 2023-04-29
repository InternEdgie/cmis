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
	$civil_status = $_POST['civil_status'];
	$zone_id = $_POST['zone_id'];
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

	$query = "INSERT INTO tbl_residents (res_fname, res_mname, res_lname, res_suffix, res_birthday, res_age, res_gender, res_cstatus, zone_id, res_contact) VALUES ('$first_name', '$middle_name', '$last_name', '$suffix', '$birthday', '$age', '$gender', '$civil_status', '$zone_id', '$contact')";
	if ($connection->query($query) === TRUE) {
		//Saving actions to logs
		if (isset($_SESSION['auth'])) {
			$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the resident record.";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);
		}
		$_SESSION['message_success'] = "<b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> has been added to the resident record.";
		header("location:../../residents.php");

	} else {
		$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
		header('location ../../residents.php');
	}
}
?>