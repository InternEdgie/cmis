<?php
session_start();
include 'config/connection.php';
if (!isset($_SESSION['auth'])) {
	$_SESSION['message_failed'] = "Please login to continue.";
	header("location: login.php");
	exit();
}
?>