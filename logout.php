<?php
session_start();

// session_unset();
// session_destroy();

// //to show notification of success
// $_SESSION['message'] = "Login Successful";
// $_SESSION['color'] = "success";

// header("Location: login_user.php");

if(isset($_SESSION['is_login'])){
    unset($_SESSION['is_login']);
    //to show notification of success
    $_SESSION['message'] = "Logout successfully";
    $_SESSION['color'] = "success";
}
header("Location: login_user.php");

?>