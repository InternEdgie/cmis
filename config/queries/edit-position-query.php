<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
	$id = $_POST['pos_id'];
	$name = $_POST['position'];
	$description = $_POST['description'];
	$user_id = $_SESSION['auth_user']['user_id'];

	$check = $connection->query("SELECT * FROM tbl_positions WHERE pos_name = '$name' AND pos_id != '$id'");
	if ($check->num_rows > 0) {
		$_SESSION['message_failed'] = $name . " already exist.";
		header('location:../../positions.php');
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_positions WHERE pos_id = '$id'")->fetch_assoc();
		$last_name = $fetch['pos_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
		} else {
			$action = "Updated details of position: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
		}

		$query = "UPDATE tbl_positions SET pos_description = '$description', pos_name = '$name' WHERE pos_id = '$id'";
		if ($connection->query($query) === TRUE) {
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
			$_SESSION['message_warning'] = $message;
			header('location:../../positions.php');
		}
	}
}
?>