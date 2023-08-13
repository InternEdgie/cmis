<?php
session_start();
include '../connection.php';

// $lupon_id = $_POST['lupon_id'];
// $resident_id = $_POST['res_id'];
// $pos_id = $_POST['pos_id'];
// $status = $_POST['status'];
$status = $_POST['status'];
$id = $_POST['inv_id'];

if ($status == 0) {
    $status_name = "Ongoing";
} else if ($status == 1) {
    $status_name = "Settled";
} else if ($status == 2) {
    $status_name = "Withdrawn";
}

$change_status_query = "UPDATE `tbl_invitation` SET `inv_status`='$status' WHERE `inv_id`='$id'";

if ($connection->query($change_status_query) === TRUE) {
    if (isset($_SESSION['auth'])) {
		$action = "Invitation No: " . $id . " - Changed status to " . $status_name;
		$user_id = $_SESSION['auth_user']['user_id'];
		$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
		$log_result = $connection->query($log_query);
	}
    $message = "Status updated successfully";
    $flag = 1;
}

$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
