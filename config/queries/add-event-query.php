<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
	$name = $_POST['event'];
	$color = $_POST['color'];
	$user_id = $_SESSION['auth_user']['user_id'];

	$check = $connection->query("SELECT * FROM tbl_events WHERE event_name = '$name'");
	if ($check->num_rows > 0) {
		$_SESSION['message_failed'] = "<b>" . $name . "</b> is already taken.";
		header('location:../../events.php');
	} else {
		$query = "INSERT INTO tbl_events (event_name, event_color) VALUES ('$name', '$color')";
		if ($connection->query($query) === TRUE) {
			$action = "Added new event: <b>" . $name . "</b>.";
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
			$_SESSION['message_success'] = "<b>" . $name . "</b> added successfully.";
			header('location:../../events.php');
		}
	}
}
?>