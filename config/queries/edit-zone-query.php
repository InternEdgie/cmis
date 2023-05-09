<?php
session_start();
include '../connection.php';
$id = $_POST['zone_id'];
$name = $_POST['zone'];
$description = $_POST['description'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_zone WHERE zone_name = '$name' AND zone_id != '$id'");
$check_changes = $connection->query("SELECT * FROM tbl_zone WHERE zone_id = '$id'")->fetch_assoc();
if ($name != $check_changes['zone_name'] || $description != $check_changes['zone_description']) {
	if ($check->num_rows > 0) {
		$message = "<b>" . $name . "</b> is already exist.";
		$flag = 0;
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_zone WHERE zone_id = '$id'")->fetch_assoc();
		$last_name = $fetch['zone_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
			$flag = 1;
		} else {
			$action = "Updated details of zone: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
			$flag = 1;
		}

		$query = "UPDATE tbl_zone SET zone_description = '$description', zone_name = '$name' WHERE zone_id = '$id'";
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
