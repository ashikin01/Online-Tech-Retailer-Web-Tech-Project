<?php
session_start();

include "../Model/db_config.php";


$username = "";
$err_username = "";
$newPassword = "";
$err_newPassword = "";
$confirmPassword = "";
$err_confirmPassword = "";

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $has_error = false;

    $newPassword = sanitize($_POST["newPassword"]);

    if (empty($newPassword)) {
        $err_newPassword = "New password required";
        $_SESSION["err_newPassword"] = $err_newPassword;
        $has_error = true;
        // header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
    //     $err_password= "Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
    //     $_SESSION["err_password"]=$err_password;
    //     $has_error=true;
    // }
    // else if ($confirmPassword != $password) {
    //     $err_password = "Password & Confirm Password doesn't match";
    //     $_SESSION["err_password"] = $err_password;
    //     $has_error = true;
    // }

    $confirmPassword = sanitize($_POST["confirmPassword"]);

    if (empty($confirmPassword)) {
        $err_confirmPassword = "Confirm Password required";
        $_SESSION["err_confirmPassword"] = $err_confirmPassword;
        $has_error = true;
        // header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$confirmPassword)){
    //     $err_confirmPassword= "Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
    //     $_SESSION["err_confirmPassword"]=$err_confirmPassword;
    //     $has_error=true;
    // }
    else if ($confirmPassword != $newPassword) {
        $err_confirmPassword = "New Password & Confirm Password doesn't match";
        $_SESSION["err_confirmPassword"] = $err_confirmPassword;
        $has_error = true;
    }

    $username = sanitize($_POST["username"]);

    if (empty($username)) {
        $err_username = "Username required";
        $_SESSION["err_username"] = $err_username;
        $has_error = true;
        // header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
    //     $err_username= "Username must be 4-20 characters and contain only letters and numbers";
    //     $_SESSION["err_username"]=$err_username;
    //     $has_error=true;
    // }

    $sql = $conn->prepare("select * from customer where username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if (mysqli_num_rows($result) > 0) {
    } else {
        $has_error = true;
    }
} else {
}

if ($has_error == false) {
    $sql = $conn->prepare("update customer set password=? where username=?");
    $sql->bind_param("ss", $newPassword, $username);
    $sql->execute();
    $_SESSION["forgot_msg"] = "Password successfully recovered!";
    header("location: ../View/login.php");
} else {
    header("location: ../View/forgot_password.php");
}
