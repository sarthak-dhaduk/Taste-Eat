<?php
include_once 'connection.php';

$id = $_GET['id'];
$q_temp_user = "SELECT * FROM `temporary_register`  WHERE `temp_user_id`='$id'";
$q_temp_user_r = mysqli_query($con, $q_temp_user);
if ($row = mysqli_fetch_assoc($q_temp_user_r)) {

    $username = $row['temp_username'];
    $email = $row['temp_email'];
    $password = $row['temp_password'];
    $user = $row['temp_user'];
    $profilepic = $row['temp_pic'];
    $token = $row['temp_token'];


    $exp_time = $row['exp_time'];
    $exp_date = $row['exp_date'];

    $q_check_registered = "SELECT * FROM `register`  WHERE `email`='$email'";
    $q_check_registered_r = mysqli_query($con, $q_check_registered);
    if (mysqli_num_rows($q_check_registered_r) != 1) {

        if ($id != "" && $exp_date != "" && $exp_time != "") {

            if ((date('Y-m-d') == $exp_date) && (date('H:i:s') < $exp_time)) {
                $query_insert_user = "INSERT INTO `register`(`username`, `email`, `password`, `user`, `profilepic`, `token`) 
            VALUES ('$username', '$email', '$password', '$user', '$profilepic', '$token')";
            $inserted_result = mysqli_query($con, $query_insert_user);
                if ($inserted_result) {
                    $_SESSION['activated'] = true;
                    header("location:login.php");
                    
                    // $_SESSION['u'] = $username;
                    // $_SESSION['e'] = $email;
                    // $_SESSION['p'] = $password;
                    // $_SESSION['use'] = $user;
                    // if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) {
                    // }
                }
            } else {
                header("location:register.php");
            }
        }
    }
}
