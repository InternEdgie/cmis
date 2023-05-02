<?php
session_start();
include '../connection.php';
$id = $_POST['citizenship_id'];
$name = $_POST['citizenship'];
$description = $_POST['description'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_citizenship WHERE citizenship_name = '$name' AND citizenship_id != '$id'");
$check_changes = $connection->query("SELECT * FROM tbl_citizenship WHERE citizenship_name = '$name' AND citizenship_description = '$description' AND citizenship_id = '$id'");
if ($check_changes->num_rows > 0) {
	if ($check->num_rows > 0) {
		$message = "<b>" . $name . "</b> is already taken.";
		$flag = 0;
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_citizenship WHERE citizenship_id = '$id'")->fetch_assoc();
		$last_name = $fetch['citizenship_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
			$flag = 1;
		} else {
			$action = "Updated details of citizenship: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
			$flag = 1;
		}

		$query = "UPDATE tbl_citizenship SET citizenship_description = '$description', citizenship_name = '$name' WHERE citizenship_id = '$id'";
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
