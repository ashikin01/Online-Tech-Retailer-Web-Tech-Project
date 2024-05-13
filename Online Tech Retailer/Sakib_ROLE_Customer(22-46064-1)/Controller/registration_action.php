<?php
session_start();

include "../Model/db_config.php";


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
    else (setcookie("username", $username, time() + 60, "/"));
    $has_error = false;

    $fullName = sanitize($_POST["fullName"]);

    if (empty($fullName)) {
        $err_fullName = "Full Name required";
        $_SESSION["err_fullName"] = $err_fullName;
        $has_error = true;
        // header('location: ../View/login.php');
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $fullName)) {
        $err_fullName = "Only letters and white space allowed";
        $_SESSION["err_fullName"] = $err_fullName;
        $has_error = true;
    } else (setcookie("fullName", $fullName, time() + 60, "/"));
    $has_error = false;

    $email = sanitize($_POST["email"]);

    if (empty($email)) {
        $err_email = "Email required";
        $_SESSION["err_email"] = $err_email;
        $has_error = true;
        // header('location: ../View/login.php');
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email = "Invalid email format";
        $_SESSION["err_email"] = $err_email;
        $has_error = true;
    } else (setcookie("email", $email, time() + 60, "/"));
    $has_error = false;

    $phone = sanitize($_POST["phone"]);

    if (empty($phone)) {
        $err_phone = "Phone number required";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
        // header('location: ../View/login.php');
    } else if (!preg_match("/^01[0-9]{9}$/", $phone)) {
        $err_phone = "Invalid phone number format (e.g. 01866188084)";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    } else (setcookie("phone", $phone, time() + 60, "/"));
    $has_error = false;

    $password = sanitize($_POST["password"]);

    if (empty($password)) {
        $err_password = "Password required";
        $_SESSION["err_password"] = $err_password;
        $has_error = true;
        header('location: ../View/login.php');
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
        header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$confirmPassword)){
    //     $err_confirmPassword= "Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
    //     $_SESSION["err_confirmPassword"]=$err_confirmPassword;
    //     $has_error=true;
    // }
    else if ($confirmPassword != $password) {
        $err_password = "Password & Confirm Password doesn't match";
        $_SESSION["err_password"] = $err_password;
        $has_error = true;
    }

    $sql = $conn->prepare("select * from customer where username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $count_username = $sql->get_result();

    if (mysqli_num_rows($count_username) > 0) {
        $err_username = "This username is already taken";
        $_SESSION["err_username"] = $err_username;
        $has_error = true;
    }

    $sql = $conn->prepare("select * from customer where email=?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $count_email = $sql->get_result();

    if (mysqli_num_rows($count_email) > 0) {
        $err_email = "This email is already taken";
        $_SESSION["err_email"] = $err_email;
        $has_error = true;
    }

    $sql = $conn->prepare("select * from customer where phone=?");
    $sql->bind_param("s", $phone);
    $sql->execute();
    $count_phone = $sql->get_result();


    if (mysqli_num_rows($count_phone) > 0) {
        $err_phone = "This phone number is already taken";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    }
}

if ($has_error == false) {
    $sql = $conn->prepare("insert into customer values(?,?,?,?,?,?)");
    $null="null";
    $sql->bind_param("ssssss", $null,$username,$fullName,$email,$phone,$password);
    $sql->execute();

    $_SESSION["register_msg"] = "Account successfully registered!";
    header("location: ../View/login.php");
}
else{
    header("location: ../View/registration.php");
}
