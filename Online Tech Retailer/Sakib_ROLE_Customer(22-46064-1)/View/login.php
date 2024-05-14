<?php
// session_start();

include("top_section.php");
if ((isset($_SESSION["change_msg"])) || (isset($_SESSION["forgot_msg"])) || (isset($_SESSION["register_msg"]))) {
    include("alert_box.php");
}

$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <script src="js/login.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="../Controller/login_action.php" method="post" onsubmit="return validate()" novalidate>

            <h1>Login</h1>
            <div class="input-box">
                <Label>Username</Label><br>
                <input type="text" id="username" name="username" placeholder="Username">
                <i class='bx bxs-user'></i>
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

            <div class="input-box">
                <label>Password</label><br>
                <input type="password" id="password" name="password" placeholder="Password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="error-msg">
                <span id="err_password">
                    <?php
                    if (isset($_SESSION["err_password"])) {
                        echo $_SESSION["err_password"];
                    }
                    unset($_SESSION["err_password"]);
                    ?>
                </span>
            </div>

            <div class="forgot">
                <!-- <label><input type="checkbox"> Remember  me</label> -->
                <a href="forgot_password.php">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="registration.php">Register</a></p>
            </div>

            <div class="login-role-link">
                <p>Other login <a href="login_role.php" name="login-role">Go</a></p>
            </div>

            <!-- <p class="err_username"></p> -->
            

        </form>
    </div>
    
</body>

</html>