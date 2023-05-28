<?php
session_start();
include '../connection.php';

$fc_id = $_POST['fc_id'];
$resp_id = $_POST['resp_id'];
if (isset($_POST['nres_comp_id'])) {
	$comp_id = $_POST['nres_comp_id'];
}
if (isset($_POST['res_comp_id'])) {
	$comp_id = $_POST['res_comp_id'];
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
