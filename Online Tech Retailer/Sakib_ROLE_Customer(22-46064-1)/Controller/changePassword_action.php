<?php
session_start();

include "../Model/db_config.php";

$id = "";
$username = "";
$currentPassword = "";
$err_currentPassword = "";
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

    $username = $_SESSION["username"];
    $sql = $conn->prepare("select * from customer where username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row) {
        $password = $row["Password"];
    }

    $currentPassword = sanitize($_POST["currentPassword"]);

    if (empty($currentPassword)) {
        $err_currentPassword = "Current password required";
        $_SESSION["err_currentPassword"] = $err_currentPassword;
        $has_error = true;
        // header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
    //     $err_password= "Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
    //     $_SESSION["err_password"]=$err_password;
    //     $has_error=true;
    // }
    else if ($currentPassword != $password) {
        $err_currentPassword = "Password doesn't matched";
        $_SESSION['err_currentPassword'] = $err_currentPassword;
        $has_error = true;
    }

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
    else if ($newPassword == $currentPassword) {
        $err_newPassword = "Current password & new password can't be matched";
        $_SESSION['err_newPassword'] = $err_newPassword;
        $has_error = true;
    }

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
}

if ($has_error == false) {
    $id = $_POST["id"];
    $sql = $conn->prepare("update customer set password=? where username=?");
    $sql->bind_param("ss", $newPassword, $username);
    $sql->execute();
    $_SESSION["change_msg"] = "Password successfully changed!";
    unset($_SESSION["username"]);
    header("location: ../View/login.php");
} 
else {
    header("location: ../View/profile.php");
}
