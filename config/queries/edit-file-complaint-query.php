<?php
    session_start();
    include '../connection.php';
    
    if (isset($_POST['fc_statement'])) {
        $statement = $_POST['fc_statement'];
        $id = $_POST['fc_id'];
        $response = array();
        
        $query = $connection->query("UPDATE tbl_file_complaint SET fc_statement = '$statement' WHERE fc_id = '$id'");
        if($query === TRUE) {
            if (isset($_SESSION['auth'])) {
                $action = "Updated the statement of <strong>" . $id . "</strong>.";
                $user_id = $_SESSION['auth_user']['user_id'];
                $log_query = "INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')";
                $log_result = $connection->query($log_query);
            }
            $message = "Updated the statement successfully.";
            $flag = 1;
        } else {
            $message = "Something went wrong. Please try again.";
            $flag = 0;
        }

        $response['message'] = $message;
        $response['success_flag'] = $flag;
        exit(json_encode($response));
    }



        
    
?>