<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) {
	$res_id = $_POST['res_id'];
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

	$row = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$res_id'")->fetch_assoc();

	if ($row['res_fname'] != $first_name || $row['res_mname'] != $middle_name || $row['res_lname'] != $last_name || $row['res_suffix'] != $suffix || $row['res_birthday'] != $birthday || $row['res_gender'] != $gender || $row['res_cstatus'] != $civil_status || $row['zone_id'] != $zone_id || $row['res_contact'] != $contact) {
		$fullname = $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_suffix'];

		$update_resident_query = "UPDATE tbl_residents SET res_fname = '$first_name', res_mname = '$middle_name', res_lname = '$last_name', res_suffix = '$suffix', res_birthday = '$birthday', res_age = '$age', res_gender = '$gender', res_cstatus = '$civil_status', zone_id = '$zone_id', res_contact = '$contact' WHERE res_id = '$res_id'";
		if ($connection->query($update_resident_query) === TRUE) {
			//Saving actions to logs
			if ($fullname != $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix) {
				if (isset($_SESSION['auth'])) {
					$action = "Updated details and changed the name of <b>" . $fullname . "</b> to <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . '</b> from resident records';
					$user_id = $_SESSION['auth_user']['user_id'];
					$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
					$log_result = $connection->query($log_query);
				}
				$_SESSION['message_warning'] = "Updated and changed the name of <b>" . $fullname . "</b> to <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . '</b>';
				header("location: ../../view-resident-profile.php?id=".$res_id);
			} else {
				if (isset($_SESSION['auth'])) {
					$action = "Updated the details of <b>" . $fullname . "</b> from resident records";
					$user_id = $_SESSION['auth_user']['user_id'];
					$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
					$log_result = $connection->query($log_query);
				}
				$_SESSION['message_warning'] = "Updated the details of <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . "</b>";
				header("location: ../../view-resident-profile.php?id=".$res_id);
			}
		} else {
			$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
			header("location ../../view-resident-profile.php?id=".$res_id);
		}

	} else {
		$_SESSION['message_success'] = "No changes have made";
		header("location: ../../view-resident-profile.php?id=".$res_id);
	}
}
?>