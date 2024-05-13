<?php 
session_start();
include("../Model/DataCon.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link rel="stylesheet" type="text/css" href="forgetpasswordstyle.css">
</head>
<body>
    <div class="container">
        <h2>Reset Your Password</h2>
        <form action="ResetPasswordCode.php" method="POST">

            <input type="text" name="username" class="textfilled" placeholder="Enter Your Email"><br>
            <button type="submit" class="btn" name="reset-password">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>
