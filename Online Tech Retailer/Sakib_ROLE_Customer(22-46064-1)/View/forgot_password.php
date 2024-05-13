<?php
// session_start();

include("top_section.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <script type="text/javascript" src="js/forgot_password.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper-forgot">
        <form action="../Controller/forgot_password_action.php" method="post" novalidate>
            <h1>Forgot Password</h1>
            <div class="input-box-forgot">
                <Label>Username</Label><br>
                <input type="text" name="username" placeholder="Username">
            </div>

            <div class="error-msg">
                <span id="err_username">
                <?php
                if (isset($_SESSION["err_username"])) {
                    echo $_SESSION["err_username"];
                 }
                 unset($_SESSION["err_username"]);
                 ?>
                </span>
            </div>

            <div class="input-box-forgot">
                <Label>New Password</Label><br>
                <input type="password" name="newPassword" placeholder="New Password">
            </div>

            <div class="error-msg">
                <span id="err_newPassword">
                <?php
                if (isset($_SESSION["err_newPassword"])) {
                    echo $_SESSION["err_newPassword"];
                 }
                 unset($_SESSION["err_newPassword"]);
                 ?>
                </span>
            </div>

            <div class="input-box-forgot">
                <Label>Confirm Password</Label><br>
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
            </div>

            <div class="error-msg">
                <span id="err_confirmPassword">
                <?php
                if (isset($_SESSION["err_confirmPassword"])) {
                    echo $_SESSION["err_confirmPassword"];
                 }
                 unset($_SESSION["err_confirmPassword"]);
                 ?>
                </span>
            </div>
    
            <button type="submit"class="btn-forgot">Change Password</button>
    
            <!-- <button type="submit"class="btn-forgot">Next</button> -->
            
            </div>

        </form>
    </div>

</body>
</html>