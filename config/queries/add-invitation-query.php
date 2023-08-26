<?php
session_start();
include '../connection.php';

$inv_id = $_POST['inv_id'];
$resp_id = $_POST['resp_id'];
if (isset($_POST['nres_comp_id'])) {
    $comp_id = $_POST['nres_comp_id'];
}
if (isset($_POST['res_comp_id'])) {
    $comp_id = $_POST['res_comp_id'];
}
$inv_type = $_POST['inv_type'];
$start_date = $_POST['start_date'];
$sched_details = $_POST['sched_details'];

$invitation_query = "INSERT INTO tbl_invitation (inv_id, comp_id, resp_id, inv_type) VALUES ('$inv_id', '$comp_id', '$resp_id', '$inv_type')";

$s = "SELECT * FROM tbl_schedules WHERE `start_date` = '$start_date'";
$sr = $connection->query($s);
if ($sr->num_rows == 3) {
    $message = "<b>" . date('F d, Y', strtotime($start_date)) . "</b> is full. Please choose another day. (Max schedule per day: <b>3</b>)";
    $flag = 0;
} else {
    if ($connection->query($invitation_query) === TRUE) {
        $schedule_query = $connection->query("INSERT INTO tbl_schedules (fc_id, sched_details, `start_date`, sched_type) VALUES ('$inv_id', '$sched_details', '$start_date', '1')");

        $action = "Added new invitation with Entry No: <b>" . $inv_id . "</b>";
        $user_id = $_SESSION['auth_user']['user_id'];
        $log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
        $log_result = $connection->query($log_query);
    
        $message = "Added invitation success with Entry No: <b>" . $inv_id . "</b>.";
        $flag = 1;
    } else {
        $message = "Something went wrong when inserting the Resident. Please try again later.";
        $flag = 0;
    }
}




$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
