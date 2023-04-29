<?php
session_start();
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);

include 'config/connection.php';
if (isset($_SESSION['auth'])) {
	if ($_SESSION['role'] == 0) {
		$action = "Tried to access ". $page ." page.";
		$user_id = $_SESSION['auth_user']['user_id'];
		$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
		$log_result = $connection->query($log_query);
		$_SESSION['message_failed'] = "You are not authorized to access this page.";
		header("location: index.php");
		exit();
	}
} else {
	$_SESSION['message_failed'] = "Please login to continue.";
	header("location: login.php");
	exit();
}


?>