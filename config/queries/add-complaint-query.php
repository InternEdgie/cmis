<?php
session_start();
include '../connection.php';

$get_fc = "SELECT fc_regdatetime, fc_id FROM tbl_file_complaint ORDER BY fc_id DESC";
$rfc = $connection->query($get_fc)->fetch_assoc();
$current_year = date('Y');
if (!empty($rfc['fc_regdatetime']) && !empty($rfc['fc_id'])) {
	$last_year = date('Y', strtotime($rfc['fc_regdatetime']));
	$last_id = substr($rfc['fc_id'], 0, 3);

	for ($i = 1;; $i++) {
		if ($current_year != $last_year) {
			$id = $i;
		} else {
			if ($i == $last_id) {
				$id = $i + 1;
			} else {
				$id = $i + $last_id;
			}
		}
		break;
	}
	$fc_id = sprintf('%03d', $id) . '-' . $current_year;
} else {
	$fc_id = sprintf('%03d', 1) . '-' . $current_year;
}

// $fc_id = $_POST['fc_id'];
$resp_id = $_POST['resp_id'];
// $comp_id = $_POST['comp_id'];
if (isset($_POST['nres_comp_id'])) {
	$comp_id = $_POST['nres_comp_id'];
}
if (isset($_POST['res_comp_id'])) {
	$comp_id = $_POST['res_comp_id'];
}
if (isset($_POST['summon'])) {
	$comp_id = $_POST['comp_id'];
	$id = $_POST['inv_id'];

	$change_status_query = "UPDATE `tbl_invitation` SET `inv_status`='3' WHERE `inv_id`='$id'";

	if ($connection->query($change_status_query) === TRUE) {
		if (isset($_SESSION['auth'])) {
			$action = "Invitation No: " . $id . " - Changed status to Summon";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);
		}
	}
}
$fc_type = $_POST['fc_type'];
$com_id = $_POST['com_id'];
$fc_statement = $_POST['fc_statement'];

$file_complaint_query = "INSERT INTO tbl_file_complaint (fc_id, comp_id, resp_id, com_id, fc_statement, fc_type) VALUES ('$fc_id', '$comp_id', '$resp_id', '$com_id', '$fc_statement', '$fc_type')";

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
