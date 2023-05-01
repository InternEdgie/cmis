<?php
session_start();
include '../connection.php';

$nres_id = $_POST['nres_id'];
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

$row = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '$nres_id'")->fetch_assoc();
if ($row['nres_fname'] != $first_name || $row['nres_mname'] != $middle_name || $row['nres_lname'] != $last_name || $row['nres_suffix'] != $suffix || $row['nres_birthday'] != $birthday || $row['nres_gender'] != $gender || $row['nres_cstatus'] != $civil_status || $row['citizenship_id'] != $citizenship_id || $row['nres_contact'] != $contact || $row['nres_zone'] != $zone || $row['nres_barangay'] != $barangay || $row['nres_city'] != $city || $row['nres_province'] != $province || $row['nres_zcode'] != $zip_code) {

	$fullname = $row['nres_lname'] . ', ' . $row['nres_fname'] . ' ' . $row['nres_mname'] . ' ' . $row['nres_suffix'];

	$update_nresident_query = "UPDATE tbl_non_residents SET nres_fname = '$first_name', nres_mname = '$middle_name', nres_lname = '$last_name', nres_suffix = '$suffix', nres_birthday = '$birthday', nres_age = '$age', nres_gender = '$gender', citizenship_id = '$citizenship_id', nres_cstatus = '$civil_status', nres_zone = '$zone', nres_barangay = '$barangay', nres_city = '$city', nres_province = '$province', nres_zcode = '$zip_code', nres_contact = '$contact' WHERE nres_id = '$nres_id'";
	if ($connection->query($update_nresident_query) === TRUE) {
		//Saving actions to logs
		if ($fullname != $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix) {
			if (isset($_SESSION['auth'])) {
				$action = "Updated details and changed the name of <b>" . $fullname . "</b> to <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . '</b> from non-resident records';
				$user_id = $_SESSION['auth_user']['user_id'];
				$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
				$log_result = $connection->query($log_query);
			}
			$message = "Updated and changed the name of <b>" . $fullname . "</b> to <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . '</b>';
			$flag = 1;
		} else {
			if (isset($_SESSION['auth'])) {
				$action = "Updated the details of <b>" . $fullname . "</b> from non-resident records";
				$user_id = $_SESSION['auth_user']['user_id'];
				$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
				$log_result = $connection->query($log_query);
			}
			$message = "Updated the details of <b>" . $last_name . ', ' . $first_name . ' ' . $middle_name . ' ' . $suffix . "</b>";
			$flag = 1;
		}
	} else {
		$message = "Something went wrong. Please try again later.";
		$flag = 0;
	}
} else {
	$message = "No changes have made.";
	$flag = 0;
}

$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
