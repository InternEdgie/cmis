<?php
session_start();
include '../connection.php';

$fc_id = $_POST['fc_id'];
// $sched_id = $_POST['sched_id'];
$event_id = $_POST['event_id'];
$date = substr($_POST['start_date'], 3, 12);
$sched_type = $_POST['sched_type'];
$start_date = date('Y-m-d', strtotime($date));
$s = "SELECT * FROM tbl_schedules WHERE start_date = '$start_date'";
$sr = $connection->query($s);
if ($sr->num_rows == 3) {
    $message = "<b>" . date('F d, Y', strtotime($start_date)) . "</b> is full. Please choose another day. (Max schedule per day: <b>3</b>)";
    $flag = 0;
} else {
    $sched_update_query = "UPDATE tbl_schedules SET start_date = '$start_date' WHERE fc_id = '$fc_id' AND event_id = '$event_id' AND sched_type = '$sched_type'";
    if ($connection->query($sched_update_query) === TRUE) {
        if (isset($_SESSION['auth'])) {
            $action = "Updated the schedule of Entry No.: <b>" . $fc_id . "</b>";
            $user_id = $_SESSION['auth_user']['user_id'];
            $log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
            $log_result = $connection->query($log_query);
        }
        $message = "Entry No.: <b>" . $fc_id . "</b> updated the schedule successfully.";
        $flag = 1;
    } else {
        $message = "Something went wrong. Please try again later.";
        $flag = 0;
    }
}

$response['message'] = $message;
$response['success_flag'] = $flag;
exit(json_encode($response));
