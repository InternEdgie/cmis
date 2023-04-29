<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) {
	$lupon_id = $_POST['lupon_id'];
	$resident_id = $_POST['res_id'];
	$pos_id = $_POST['pos_id'];
	$status = $_POST['status'];

	$update_lupon_query = "UPDATE tbl_lupon SET pos_id = '$pos_id', status = '$status' WHERE lupon_id = '$lupon_id'";
	if ($connection->query($update_lupon_query) === TRUE) {
		$select_resident1 = "SELECT * FROM tbl_residents WHERE res_id = '$resident_id'";
		$rdata = $connection->query($select_resident1)->fetch_assoc();
		if (isset($_SESSION['auth'])) {
			$action = "Updated <b>" . $rdata['res_fname'] . ' ' . $rdata['res_mname'] . ' ' . $rdata['res_lname'] . "</b>";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);
		}
		$_SESSION['message_warning'] = "Updated <b>" . $rdata['res_fname'] . " " . $rdata['res_mname'] . " " . $rdata['res_lname'] . "</b>.";
		header('location: ../../view-lupon-profile.php?id='.$resident_id);
	} else {
		$_SESSION['message_failed'] = "Something went wrong. Please try again later.";
		header('location: ../../view-lupon-profile.php?id='.$resident_id);
	}	
}
?>