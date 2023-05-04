<?php
session_start();
include '../connection.php';
$id = $_POST['com_id'];
$name = $_POST['complaint_type'];
$description = $_POST['description'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_name = '$name' AND com_id != '$id'");
$check_changes = $check->fetch_assoc();
if ($name != $check_changes['com_name'] || $description != $check_changes['com_details']) {
	if ($check->num_rows > 0) {
		$message = "<b>" . $name . "</b> is already exist.";
		$flag = 0;
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$id'")->fetch_assoc();
		$last_name = $fetch['com_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
			$flag = 1;
		} else {
			$action = "Updated details of complaint type: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
			$flag = 1;
		}

		$query = "UPDATE tbl_complaint_type SET com_details = '$description', com_name = '$name' WHERE com_id = '$id'";
		if ($connection->query($query) === TRUE) {
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
		}
	}
} else {
	$message = "No changes have made.";
	$flag = 0;
}

$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
