<?php

session_start();

include "../Model/db_config.php";

$id = "";
$username = "";
$err_username = "";
$fullName = "";
$err_fullName = "";
$email = "";
$err_email = "";
$phone = "";
$err_phone = "";
$password = "";
$err_password = "";

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $has_error = false;
    $has_db_error = false;

    $username = sanitize($_POST["username"]);

    if (empty($username)) {
        $err_username = "Username required";
        $_SESSION["err_username"] = $err_username;
        $has_error = true;
    }
    // else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
    //     $err_username= "Username must be 4-20 characters and contain only letters and numbers";
    //     $_SESSION["err_username"]=$err_username;
    //     $has_error=true;
    // }
    // else (setcookie("username", $username, time() + 60, "/"));
    // $has_error = false;

    $fullName = sanitize($_POST["fullName"]);

    if (empty($fullName)) {
        $err_fullName = "Full Name required";
        $_SESSION["err_fullName"] = $err_fullName;
        $has_error = true;
        // header('location: ../View/login.php');
    }
    // else if (!preg_match("/^[a-zA-Z-' ]*$/", $fullName)) {
    //     $err_username = "Only letters and white space allowed";
    //     $_SESSION["err_fullName"] = $err_fullName;
    //     $has_error = true;
    // } 
    // else (setcookie("fullName", $fullName, time() + 60, "/"));
    // $has_error = false;

    $email = sanitize($_POST["email"]);

    if (empty($email)) {
        $err_email = "Email required";
        $_SESSION["err_email"] = $err_email;
        $has_error = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email = "Invalid email format";
        $_SESSION["err_email"] = $err_email;
        $has_error = true;
    }
    // else (setcookie("email", $email, time() + 60, "/"));
    // $has_error = false;

    $phone = sanitize($_POST["phone"]);

    if (empty($phone)) {
        $err_phone = "Phone number required";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    } else if (!preg_match("/^01[0-9]{9}$/", $phone)) {
        $err_phone = "Invalid phone number format";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    }
    // else (setcookie("phone", $phone, time() + 60, "/"));
    // $has_error = false;
} else {
    $has_error = false;
}

if ($has_error == false) {
    $id = $_POST["id"];
    $sql = $conn->prepare("update customer set username=?, full_name=?, email=?, phone=? where id=?");
    $sql->bind_param("ssssi", $username, $fullName, $email, $phone, $id);
    $result = $sql->execute();

    $result = $sql->get_result();

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["update_msg"] = "Profile successfully updated!";
        header("location: ../View/profile.php");
    }
    else{
        $err_email= "Duplicate email";
        $_SESSION['err_email']=$err_email;
        header('location: ../View/profile.php');
    }


    // if ($has_db_error == true) {
    //     $db_error_message = $conn->connect_error;
    //     $_SESSION["$db_error_message"] = $conn->connect_error;
    //     header("location: ../View/profile.php");
    // } else {
    //     header("location: ../View/profile.php");
    // }
} else {
    header("location: ../View/profile.php");
}
