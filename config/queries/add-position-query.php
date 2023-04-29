<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
	$name = $_POST['position'];
	$description = $_POST['description'];
	$user_id = $_SESSION['auth_user']['user_id'];

	$check = $connection->query("SELECT * FROM tbl_positions WHERE pos_name = '$name'");
	if ($check->num_rows > 0) {
		$_SESSION['message_failed'] = "<b>" . $name . "</b> is already taken.";
		header('location:../../positions.php');
	} else {
		$query = "INSERT INTO tbl_positions (pos_name, pos_description) VALUES ('$name', '$description')";
		if ($connection->query($query) === TRUE) {
			$action = "Added new position: <b>" . $name . "</b>.";
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
			$_SESSION['message_success'] = "<b>" . $name . "</b> added successfully.";
			header('location:../../positions.php');
		}
	}
}
?>