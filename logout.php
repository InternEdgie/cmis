<?php
session_start();
include 'config/connection.php';
if(isset($_SESSION['auth'])){
	$action = "Logged Out";
	$user_id = $_SESSION['auth_user']['user_id'];
	$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
	$log_result = $connection->query($log_query);
	unset($_SESSION['auth']);
	unset($_SESSION['auth_user']);
}

header('location: login.php');

?>