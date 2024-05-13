<?php
session_start();
include("../Model/DataCon.php");

function send_password_reset($get_name,$get_email,$token)
{
  
}

if(isset($_POST['ResetPasswordCode.php']))
  {
    $email = mysqli_real_escape_string($conn, $_POST['email'])

    $check_email = "SELECT email FROM empusers WHERE email=$email LIMIT 1";
    $check_email_run = mysqli_query ($conn,email);

    if (mysqli_num_rows($check_email_run)>0)
    {

    	$row = mysqli_fetch_array ($check_email_run);
    	$get_name = $row['name'];
    	$get_email = $row['email'];

    	$update_token = UPDATE empusers SET verify_token='$token' WHERE email = '$get_email' LIMIT 1;
    	$update_token_run = mysqli_query($conn,$update_token);

    	if($update_token_run)
    	{
        send_password_reset($get_name,$get_email,$token);
        $_SESSION['status'] = "We emailed yo a password reset link.Please check your email..";
        header("Location : http://localhost/sublimeText/new/Views/ForgetPassword.php");
        exit(0);
    	}
    	else {

    		$_SESSION['status'] = "Something is Wrong. #1";
    		header("Location : http://localhost/sublimeText/new/Views/ForgetPassword.php");
    		exit(0);
    	}
    }


  }


?>