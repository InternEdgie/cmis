<?php
session_start();
include '../connection.php';
$id = $_POST['pos_id'];
$name = $_POST['position'];
$description = $_POST['description'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_positions WHERE pos_name = '$name' AND pos_id != '$id'");
$check_changes = $connection->query("SELECT * FROM tbl_positions WHERE pos_id = '$id'")->fetch_assoc();
if ($name != $check_changes['pos_name'] || $description != $check_changes['pos_description']) {
	if ($check->num_rows > 0) {
		$message = "<b>" . $name . "</b> is already exist.";
		$flag = 0;
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_positions WHERE pos_id = '$id'")->fetch_assoc();
		$last_name = $fetch['pos_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
			$flag = 1;
		} else {
			$action = "Updated details of position: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
			$flag = 1;
		}

		$query = "UPDATE tbl_positions SET pos_description = '$description', pos_name = '$name' WHERE pos_id = '$id'";
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
