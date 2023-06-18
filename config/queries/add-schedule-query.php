<?php
session_start();
include '../connection.php';

$fc_id = $_POST['fc_id'];
$date = $_POST['start'];
$event_id = $_POST['event_id'];
$sched_details = $_POST['sched_details'];

$s = "SELECT * FROM tbl_schedules WHERE start_date = '$date'";
$sr = $connection->query($s);
if ($sr->num_rows == 3) {
    $message = "<b>" . date('F d, Y', strtotime($date)) . "</b> is full. Please choose another day. (Max schedule per day: <b>3</b>)";
    $flag = 0;
} else {
    $schedule_query = "INSERT INTO `tbl_schedules`(`fc_id`, `event_id`, `sched_details`, `start_date`) VALUES ('$fc_id', '$event_id', '$sched_details', '$date')";
    if ($connection->query($schedule_query)) {
        if (isset($_SESSION['auth'])) {
            $action1 = "Appointed a schedule for Entry No: <b>" . $fc_id . "</b>";
            $user_id = $_SESSION['auth_user']['user_id'];
            $log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action1')";
            $log_result = $connection->query($log_query);
        }
        $message = "Entry No.: <b>" . $fc_id . "</b> has appointed a schedule successfully.";
        $flag = 1;
    } else {
        $message = "Something went wrong. Please try again later.";
        $flag = 0;
    }
}

$response['message'] = $message;
$response['success_flag'] = $flag;

exit(json_encode($response));
