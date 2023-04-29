<?php
session_start();

if (!isset($_SESSION['auth'])) {
	// $_SESSION['message_failed'] = 'Please login to continue';
	header("location: login.php");
} else {
	// $_SESSION['message_success'] = "Welcome to Dashboard <strong>" . $user_firstname . ' ' . $user_lastname . '</strong>.';
	header("location: dashboard.php");
}
?>