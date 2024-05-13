<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
      
    </style>


</head>
<body>
    <form action="../controllers/loginController.php" method="post" onsubmit="return validate();" novalidate>
        <fieldset>
            <legend>Log In</legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>">
            <span class="error">
                <?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    unset($_SESSION['username']);
                }
                ?>
            </span>
            <br><br>
            <label for="password">PIN:</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <span class="error">
                <?php
                if (isset($_SESSION['password'])) {
                    echo $_SESSION['password'];
                    unset($_SESSION['password']);
                }
                ?>
            </span>
            <br><br>
            <a href="../views/forgot_password.php">Forgot Password?</a>
            <br><br>
            <input type="submit" value="Log in">
        </fieldset>
    </form>
</body>
</html>