<?php
session_start();
include '../connection.php';
$name = $_POST['status'];
$description = $_POST['description'];
$user_id = $_SESSION['auth_user']['user_id'];

$check = $connection->query("SELECT * FROM tbl_status WHERE status_name = '$name'");
if ($check->num_rows > 0) {
	$message = "<b>" . $name . "</b> is already exist.";
	$flag = 0;
} else {
	$query = "INSERT INTO tbl_status (status_name, status_description) VALUES ('$name', '$description')";
	if ($connection->query($query) === TRUE) {
		$action = "Added new status: <b>" . $name . "</b>.";
		$log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
		$message = "<b>" . $name . "</b> added successfully.";
		$flag = 1;
	} else {
		$message = "Something went wrong. Please try again later.";
		$flag = 0;
	}
}

$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
