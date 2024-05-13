<?php

include("top_section.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <script type="text/javascript" src="js/registration.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper-reg">
        <form action="../Controller/registration_action.php" method="post" onsubmit="return validate();" novalidate>
            <h1>Registration</h1>
            <div class="input-box-reg">
                <div class="input-field">
                <Label>Username</Label><br>
                <input type="text" name="username" placeholder="Username">
                <!-- <i class='bx bxs-user'></i> -->
            </div>
            <div class="input-field">
                <label>Full Name</label><br>
                <input type="text" name="fullName" placeholder="Full Name">
                <!-- <i class='bx bxs-lock-alt' ></i> -->
            </div>
            </div>

            <div class="error-msg-reg">
                <span id="err_username">
                <?php
                if (isset($_SESSION["err_username"])) {
                    echo $_SESSION["err_username"];
                 }
                 unset($_SESSION["err_username"]);
                 ?>
                </span>
            </div>
            <div class="error-msg-reg2">
                <span id="err_fullName">
                <?php
                if (isset($_SESSION["err_fullName"])) {
                    echo $_SESSION["err_fullName"];
                 }
                 unset($_SESSION["err_fullName"]);
                 ?>
                </span>
            </div>

            <div class="input-box-reg">
            <div class="input-field">
                <Label>Email</Label><br>
                <input type="text" name="email" placeholder="Email">
                <!-- <i class='bx bxs-user'></i> -->
            </div>
            <div class="input-field">
                <label>Phone</label><br>
                <input type="text" name="phone" placeholder="Phone">
                <!-- <i class='bx bxs-lock-alt' ></i> -->
            </div>
            </div>

            <div class="error-msg-reg">
                <span id="err_email">
                <?php
                if (isset($_SESSION["err_email"])) {
                    echo $_SESSION["err_email"];
                 }
                 unset($_SESSION["err_email"]);
                 ?>
                </span>
            </div>
            <div class="error-msg-reg2">
                <span id="err_phone">
                <?php
                if (isset($_SESSION["err_phone"])) {
                    echo $_SESSION["err_phone"];
                 }
                 unset($_SESSION["err_phone"]);
                 ?>
                </span>
            </div>

            <div class="input-box-reg">
            <div class="input-field">
                <Label>Password</Label><br>
                <input type="password" name="password" placeholder="Password">
                <!-- <i class='bx bxs-user'></i> -->
            </div>
            <div class="input-field">
                <label>Confirm Password</label><br>
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
                <!-- <i class='bx bxs-lock-alt' ></i> -->
            </div>
            </div>

            <div class="error-msg-reg">
                <span id="err_password">
                <?php
                if (isset($_SESSION["err_password"])) {
                    echo $_SESSION["err_password"];
                 }
                 unset($_SESSION["err_password"]);
                 ?>
                </span>
            </div>
             <div class="error-msg-reg2">
                <span id="err_confirmPassword">
                <?php
                if (isset($_SESSION["err_confirmPassword"])) {
                    echo $_SESSION["err_confirmPassword"];
                 }
                 unset($_SESSION["err_confirmPassword"]);
                 ?>
                </span>
            </div>
             
            <button type="submit"class="btn-reg">Register</button>

            <div class="register-link">
                <p>Already have an account?  <a href="login.php">Login</a></p>
            </div>
            
        </form>
    </div>

</body>
</html>