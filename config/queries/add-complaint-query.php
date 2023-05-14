<?php
session_start();
include '../connection.php';

if (isset($_POST['resp_id']) && $_POST['resp_id'] != 0) {
	$resp_id = $_POST['resp_id'];
} else {
	$res_fname = $_POST['res_fname'];
	$res_mname = $_POST['res_mname'];
	$res_lname = $_POST['res_lname'];
	$res_suffix = $_POST['res_suffix'];
	$res_birthday = $_POST['res_birthday'];
	$res_gender = $_POST['res_gender'];
	$res_cstatus = $_POST['res_gender'];
	$res_zone_id = $_POST['zone_id'];
	$res_contact = $_POST['res_contact'];

	$formatbd = str_replace('/', '-', $res_birthday);
	$newbd = date('d-m-Y', strtotime($formatbd));

	$dob = new DateTime($newbd);

	$now = new DateTime();

	$diff = $now->diff($dob);

	$age = $diff->y;

	$resident_query = "INSERT INTO tbl_residents (res_fname, res_mname, res_lname, res_suffix, res_birthday, res_age, res_gender, res_cstatus, zone_id, res_contact) VALUES ('$res_fname', '$res_mname', '$res_lname', '$res_suffix', '$res_birthday', '$age', '$res_gender', '$res_cstatus', '$res_zone_id', '$res_contact')";

	if ($connection->query($resident_query) === TRUE) {
		$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the resident record.";
		$user_id = $_SESSION['auth_user']['user_id'];
		$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
		$log_result = $connection->query($log_query);

		$resp = $connection->query("SELECT * FROM tbl_residents ORDER BY res_id DESC")->fetch_assoc();

		$resp_id = $resp['res_id'];
	} else {
		$message = "Something went wrong when inserting the Resident. Please try again later.";
		$flag = 0;
		exit();
	}
}


if (isset($fc_type) && $fc_type == 1) {
	if ($comp_nres_id != 0) {
		$comp_id = $_POST['nres_comp_id'];
	} else {
		$comp_nres_fname = $_POST['nres_fname'];
		$comp_nres_mname = $_POST['nres_mname'];
		$comp_nres_lname = $_POST['nres_lname'];
		$comp_nres_suffix = $_POST['nres_suffix'];
		$comp_nres_birthday = $_POST['nres_birthday'];
		$comp_nres_gender = $_POST['nres_gender'];
		$comp_nres_cstatus = $_POST['nres_cstatus'];
		$comp_nres_citizenship_id = $_POST['nres_citizenship_id'];
		$comp_nres_zone = $_POST['nres_zone'];
		$comp_nres_barangay = $_POST['nres_barangay'];
		$comp_nres_municipality = $_POST['nres_city'];
		$comp_nres_province = $_POST['nres_province'];
		$comp_nres_zcode = $_POST['nres_zcode'];
		$comp_nres_contact = str_replace('-', '', $_POST['nres_contact']);

		$formatbd = str_replace('/', '-', $comp_nres_birthday);
		$newbd = date('d-m-Y', strtotime($formatbd));
		// Create a datetime object using date of birth
		$dob = new DateTime($newbd);

		// Get current date
		$now = new DateTime();

		// Calculate the time difference between the two dates
		$diff = $now->diff($dob);

		$age = $diff->y;

		$nresident_query = "INSERT INTO tbl_non_residents (nres_fname, nres_mname, nres_lname, nres_suffix, nres_birthday, nres_age, nres_gender, citizenship_id, nres_cstatus, nres_zone, nres_barangay, nres_city, nres_province, nres_zcode, nres_contact) VALUES ('$comp_nres_fname', '$comp_nres_mname', '$comp_nres_lname', '$comp_nres_suffix', '$comp_nres_birthday', '$age', '$comp_nres_gender', '$comp_nres_citizenship_id', '$comp_nres_cstatus', '$comp_nres_zone', '$comp_nres_barangay', '$comp_nres_municipality', '$comp_nres_province', '$comp_nres_zcode', '$comp_nres_contact')";

		if ($connection->query($nresident_query) === TRUE) {
			$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the non-resident record.";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);

			$comp = $connection->query('SELECT * FROM tbl_non_residents ORDER BY nres_id DESC')->fetch_assoc();

			$comp_id = $comp['nres_id'];
		} else {
			$message = "Something went wrong when inserting the Non Resident. Please try again later.";
			$flag = 0;
			exit();
		}
	}
} else if (isset($fc_type) && $fc_type == 0) {
	if ($comp_res_id != 0) {
		$comp_id = $_POST['res_comp_id'];
	} else {
		$comp_res_fname = $_POST['comp_res_fname']
		$comp_res_mname = $_POST['comp_res_mname'];
		$comp_res_lname = $_POST['comp_res_lname'];
		$comp_res_suffix = $_POST['comp_res_suffix'];
		$comp_res_birthday = $_POST['comp_res_birthday'];
		$comp_res_gender = $_POST['comp_res_gender'];
		$comp_res_cstatus = $_POST['comp_res_gender'];
		$comp_res_zone_id = $_POST['comp_zone_id'];
		$comp_res_contact = str_replace('-', '', $_POST['comp_res_contact']);

		$formatbd = str_replace('/', '-', $comp_res_birthday);
		$newbd = date('d-m-Y', strtotime($formatbd));
		// Create a datetime object using date of birth
		$dob = new DateTime($newbd);

		// Get current date
		$now = new DateTime();

		// Calculate the time difference between the two dates
		$diff = $now->diff($dob);

		$age = $diff->y;

		$resident_query = "INSERT INTO tbl_residents (res_fname, res_mname, res_lname, res_suffix, res_birthday, res_age, res_gender, res_cstatus, zone_id, res_contact) VALUES ('$comp_res_fname', '$comp_res_mname', '$comp_res_lname', '$comp_res_suffix', '$comp_res_birthday', '$age', '$comp_res_gender', '$comp_res_cstatus', '$comp_res_zone_id', '$comp_res_contact')";

		if ($connection->query($resident_query) === TRUE) {
			$action = "Added <b>" . $first_name . ' ' . $middle_name . ' ' . $last_name . "</b> to the resident record.";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);

			$comp = $connection->query("SELECT * FROM tbl_residents ORDER BY res_id DESC")->fetch_assoc();

			$comp_id = $comp['res_id'];
		} else {
			$message = "Something went wrong when inserting the Resident. Please try again later.";
			$flag = 0;
			exit();
		}
	}
}

$fc_id = $_POST['fc_id'];
$fc_type = $_POST['fc_type'];
$com_id = $_POST['com_id'];
$fc_statement = $_POST['fc_statement'];

$file_complaint_query = "INSERT INTO tbl_file_complaint (fc_id, comp_id, resp_id, com_id, fc_statement, 'fc_type') VALUES ('$fc_id', '$comp_id', '$resp_id', '$com_id', '$fc_statement', '$fc_type')";

if ($connection->query($file_complaint_query) === TRUE) {
	$action = "Filed new complaint with Entry No: <b>" . $fc_id . "</b>";
	$user_id = $_SESSION['auth_user']['user_id'];
	$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
	$log_result = $connection->query($log_query);

	$message = "Filed complaint success with Entry No: <b>" . $fc_id . "</b>.";
	$flag = 1;
} else {
	$message = "Something went wrong when inserting the Resident. Please try again later.";
	$flag = 0;
}


$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
