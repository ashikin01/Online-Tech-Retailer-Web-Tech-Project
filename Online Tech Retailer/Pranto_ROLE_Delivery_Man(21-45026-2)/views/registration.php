<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        /* CSS styles */
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

        .registrationform {
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

        a {
            color: #007bff;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        button 
        {
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            border: none;
            color: white;
            cursor: pointer;
            background-color: #4CAF50;
            width: 100%;
            font-size: 16px;
        }
        
    </style>
    <script type="text/javascript" src="js/registration.js"></script>
</head>

<body>
    <div class="registrationform">
        <h2>Registration</h2>
        <form method="post" action="../controllers/registrationController.php" onsubmit="return validateForm()" novalidate>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <span id="error_username" class="error"></span>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <span id="error_password" class="error"></span>

            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number" name="mobile_number">
            <span id="error_mobile_number" class="error"></span>

            <button type="submit">Register</button>
        </form>

        <?php
        // Display registration messages
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
            echo '<a href="../views/login.php">Back to Login</a>';
        } elseif (isset($exist)) {
            echo '<p>' . $exist . '</p>';
        } elseif (isset($error)) {
            echo '<p>' . $error . '</p>';
        }
        ?>
    </div>
</body>

</html>
