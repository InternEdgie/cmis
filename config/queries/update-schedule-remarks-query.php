<?php
session_start();
include '../connection.php';



$fc_id = $_POST['fc_id'];
if (isset($_POST['fetch_remark'])) {
    $query = $connection->query("SELECT * FROM tbl_schedules WHERE fc_id = '$fc_id'")->fetch_assoc();

    $response['remarks'] = $query['remarks'];
} else {
    $remarks = $_POST['remarks'];

    $update_remarks = $connection->query("UPDATE tbl_schedules SET remarks = '$remarks' WHERE fc_id = '$fc_id'");
    
    if ($update_remarks === TRUE) {
        if ($remarks == 0) {
            $remarks = "Not Settled";
        } else {
            $remarks = "Settled";
        }
        $action = "Updated remarks of" . $fc_id . " to " . $remarks . "</b>.";
        $user_id = $_SESSION['auth_user']['user_id'];
        $log = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
        $message = "Updated remarks of <b>" . $fc_id . "</b> to " . $remarks . " successfully.";
        $flag = 1;
    } else {
        $message = "Something went wrong. Please try again later.";
        $flag = 0;
    }

    $response['message'] = $message;
    $response['success_flag'] = $flag;
}

exit(json_encode($response));
