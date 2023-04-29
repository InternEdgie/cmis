<?php
include '../connection.php';
if(isset($_POST["submit"])){
	$fileName = $_FILES["excel"]["name"];
	$fileExtension = explode('.', $fileName);
	$fileExtension = strtolower(end($fileExtension));
	$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

	$targetDirectory = "imported/" . $newFileName;
	move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

	error_reporting(0);
	ini_set('display_errors', 0);

	require '../excelReader/excel_reader2.php';
	require '../excelReader/SpreadsheetReader.php';

	$reader = new SpreadsheetReader($targetDirectory);
	foreach($reader as $key => $row){
		$res_fname = $row[0];
		$res_mname = $row[1];
		$res_lname = $row[2];
		$res_suffix = $row[3];
		$res_birthday = $row[4];
		$res_age = $row[5];
		$res_gender = $row[6];
		$res_cstatus = $row[7];
		$zone_name = $row[8];
		$res_contact = $row[9];

		$zone = $connection->query("SELECT * FROM tbl_zone WHERE zone_name = '$zone_name'")->fetch_assoc();
		$zone_id = $zone['zone_id'];

		$connection->query("INSERT INTO tblstudent (res_fname, res_mname, res_lname, res_suffix, res_birthday, res_age, res_gender, res_cstatus, zone_id, res_contact) VALUES ('$res_fname', '$res_mname', '$res_lname', '$res_suffix', '$res_birthday', '$res_age', '$res_gender', '$res_cstatus', '$zone_id')");
		$_SESSION['message_success'] = "Imported successfully.";

		if (isset($_SESSION['auth'])) {
			$action = "Imported residents record.";
			$user_id = $_SESSION['auth_user']['user_id'];
			$log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
			$log_result = $connection->query($log_query);
		}

		header("location:../residents.php");
	}

	// echo
	// "
	// <script>
	// alert('Succesfully Imported');
	// document.location.href = '/sems/student/index.php';
	// </script>
	// ";
}
?>