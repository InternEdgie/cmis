<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
	$id = $_POST['status_id'];
	$name = $_POST['status'];
	$description = $_POST['description'];
	$user_id = $_SESSION['auth_user']['user_id'];

	$check = $connection->query("SELECT * FROM tbl_status WHERE status_name = '$name' AND status_id != '$id'");
	if ($check->num_rows > 0) {
		$_SESSION['message_failed'] = "<b>" . $name . "</b> already exist.";
		header('location:../../status.php');
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$id'")->fetch_assoc();
		$last_name = $fetch['status_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
		} else {
			$action = "Updated details of status: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
		}

		$query = "UPDATE tbl_status SET status_description = '$description', status_name = '$name' WHERE status_id = '$id'";
		if ($connection->query($query) === TRUE) {
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
			$_SESSION['message_warning'] = $message;
			header('location:../../status.php');
		}
	}
}
?>