<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) {
	$res_id = $_POST['res_id'];
	$pos_id = $_POST['pos_id'];

	$resident = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$res_id'")->fetch_assoc();
	if ($res_id != 'add') {
		$fullname = $resident['res_lname'] . ', ' . $resident['res_fname'] . ' ' . $resident['res_mname'] . ' ' . $resident['res_suffix'];
		$add_lupon_query = "INSERT INTO tbl_lupon (res_id, pos_id) VALUES ('$res_id', '$pos_id')";
		if ($connection->query($add_lupon_query)) {
			$action = "Added <b>" . $fullname . '</b> as one of the Lupong Tagapamayapa';
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query); 

			$_SESSION['message_success'] = "<b>" . $fullname . "</b> appointed as one of the Lupong Tagapamayapa.";
			header("location: ../../lupon.php");	
		} else {
			$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
			header("location: ../../lupon.php");
		}
	} else {
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
			$row = $connection->query("SELECT * FROM tbl_residents ORDER BY res_id DESC")->fetch_assoc();
			$res_id2 = $row['res_id'];
			$connection->query("INSERT INTO tbl_lupon (res_id, pos_id) VALUES ('$res_id2', '$pos_id')");
			//Saving actions to logs
			if (isset($_SESSION['auth'])) {
				$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the resident record and as one of Lupon.";
				$user_id = $_SESSION['auth_user']['user_id'];
				$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
				$log_result = $connection->query($log_query);
			}
			$_SESSION['message_success'] = "<b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> has been added to the resident and lupon record.";
			header("location:../../lupon.php");

		} else {
			$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
			header('location ../../lupon.php');
		}
	}
}
?>