<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
            line-height: 1.5;
            min-height: 600px;
            background: #f3f3f3;
            margin: auto;
        }

        .forgotpassword {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 20px;
            text-align: left;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: none;
            color: white;
            cursor: pointer;
            background-color: #4CAF50;
            font-size: 16px;
        }

        p {
            margin-top: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
    </style>
    <script type="text/javascript" src="js/forgot_password.js"></script>
</head>

<body>
    <div class="forgotpassword">
        <h2>Forgot Password</h2>
        <form method="post" action="../controllers/forgot_passwordController.php" onsubmit="return validateForm()" novalidate>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <span id="error_username" class="error"></span>

            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password">
            <span id="error_new_password" class="error"></span>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <span id="error_confirm_password" class="error"></span>

            <input type="submit" value="Reset Password">

            <br><br>
        </form>

        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        } elseif (isset($error)) {
            echo '<p>' . $error . '</p>';
        } elseif (isset($notfound)) {
            echo '<p>' . $notfound . '</p>';
        }
        ?>

        <p>Remember your password? <a href="../views/login.php">Login here</a></p>
    </div>
</body>

</html>