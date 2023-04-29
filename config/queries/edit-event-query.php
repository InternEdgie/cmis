<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
	$id = $_POST['event_id'];
	$name = $_POST['event'];
	$color = $_POST['color'];
	$user_id = $_SESSION['auth_user']['user_id'];

	$check = $connection->query("SELECT * FROM tbl_events WHERE event_name = '$name' AND event_id != '$id'");
	if ($check->num_rows > 0) {
		$_SESSION['message_failed'] = "<b>" . $name . "</b> already exist.";
		header('location:../../events.php');
	} else {
		$fetch = $connection->query("SELECT * FROM tbl_events WHERE event_id = '$id'")->fetch_assoc();
		$last_name = $fetch['event_name'];

		if ($last_name != $name) {
			$action = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b>.";
			$message = "Updated <b>" . $last_name . "</b> to <b>" . $name . "</b> successfully.";
		} else {
			$action = "Updated details of event: <b>" . $name . "</b>.";
			$message = "Updated <b>" . $name . "</b> successfully.";
		}

		$query = "UPDATE tbl_events SET event_color = '$color', event_name = '$name' WHERE event_id = '$id'";
		if ($connection->query($query) === TRUE) {
			$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
			$_SESSION['message_warning'] = $message;
			header('location:../../events.php');
		}
	}
}
?>