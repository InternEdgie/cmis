<?php
session_start();
include '../connection.php';
$id = $_POST['event_id'];
$name = $_POST['event'];
$color = $_POST['color'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_events WHERE event_name = '$name' AND event_id != '$id'");
$check_changes = $connection->query("SELECT * FROM tbl_events WHERE event_id = '$id'")->fetch_assoc();
if ($name != $check_changes['event_name'] || $color != $check_changes['event_color']) {
	if ($check->num_rows > 0) {
		$message = "<b>" . $name . "</b> is already exist.";
		$flag = 0;
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_events WHERE event_id = '$id'")->fetch_assoc();
		$last_name = $fetch['event_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
			$flag = 1;
		} else {
			$action = "Updated details of event: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
			$flag = 1;
		}

		$query = "UPDATE tbl_events SET event_color = '$color', event_name = '$name' WHERE event_id = '$id'";
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
