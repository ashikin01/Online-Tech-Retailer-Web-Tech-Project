<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
            background-color: #f3f3f3;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: auto;
        }
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form method="post" action="../controllers/change_passwordController.php" novalidate>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
            <br>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <br>
            <button type="submit">Change Password</button>
        </form>
        <?php if (isset($message)) : ?>
            <p class="message"><?php echo $message; ?></p>
        <?php elseif (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <br>
        <a href="../views/profile.php">Back to Profile</a>
    </div>
</body>
</html>