<?php
session_start();

include 'config/connection.php';

if (isset($_SESSION['auth'])) {
    $_SESSION['message_warning'] = "You are already login";
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CMIS - Login</title>

        <!-- Custom fonts for this template-->
        <link rel="shortcut icon" href="assets/img/logo.png">
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="assets/css/adminlte.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-300">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                        	<div class="p-5">
                        		<div class="text-center">
                        			<img src="assets/img/logo.png" width="70" height="70" class="img-fluid mb-4">
                        			<h1 class="h4 text-gray-900">LUPON TAGAPAMAYAPA</h1>
                        			<h3 class="h5 text-gray-900 mb-4">BARANGAY MACABALAN</h3>
                        		</div>
                                <?php include 'config/message.php'; ?>
                        		<form class="user" method="POST">
                        			<div class="form-group">
                        				<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username" value="<?= isset($_POST['login']) ? $_POST['username'] : '' ?>" required>
                        			</div>
                        			<div class="form-group">
                        				<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                        			</div>
                                    <input type="submit" name="login" class="btn btn-primary btn-user btn-block mb-3" value="Login">
                        		</form>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $authenticate = $connection->query("SELECT * FROM tbl_users WHERE user_password = '$password' AND user_username = '$username'");
            if ($authenticate->num_rows > 0) {
                $user = $connection->query("SELECT * FROM tbl_lupon l, tbl_users u, tbl_residents r WHERE u.user_username = '$username' AND l.lupon_id = u.lupon_id AND l.status = 1 AND l.res_id = r.res_id");
                if ($user->num_rows > 0) {
                    $_SESSION['auth'] = true;

                    $row = $user->fetch_assoc();
                    $user_id = $row['user_id'];
                    $user_firstname = $row['res_fname'];
                    $user_lastname = $row['res_lname'];
                    $username = $row['user_username'];
                    $position = $row['pos_id'];
                    $user_role = $row['role'];

                    $_SESSION['auth_user'] = [
                        'first_name' => $user_firstname,
                        'last_name' => $user_lastname,
                        'username' => $username,
                        'position' => $position,
                        'user_id' => $user_id,
                    ];

                    $_SESSION['role'] = $user_role;

                    $action = "Logged In";
                    $log_query = $connection->query("INSERT INTO tbl_logs (user_id, log_action) VALUES ('$user_id', '$action')");
                    // $_SESSION['message_success'] = "Welcome to Dashboard <strong>". $user_firstname . ' ' . $user_lastname ."</strong>!";
                    header('location: dashboard.php');
                } else {
                    // $_SESSION['message_failed'] = "Your account status is inactive, try contacting the Administrator.";
                    header('location: login.php');
                }
            } else {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['message_failed'] = "Invalid username or password.";
                header('location: login.php');
            }
        }
        ?>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/adminlte.min.js"></script>
    </body>
</html>