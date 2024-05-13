<?php require_once('../controllers/profileController.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding-top: 50px;
            background-color: #f3f3f3;
        }

        .profilecontainer {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: auto;
        }

        h2 {
            color: #4CAF50;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .message {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .button-container {
            margin-top: 20px;
        }

        .promotionbutton {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="profilecontainer">
        <h2>Profile</h2>
        <p>Welcome, <?php echo htmlspecialchars($userData['Name']); ?></p>

        <form method="post" action="update_profile.php" novalidate>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userData['Name']); ?>" readonly>

            <label for="Email">Email</label>
            <input type="text" id="Email" name="Email" value="<?php echo htmlspecialchars($userData['Email']); ?>">

            <input type="submit" value="Update Profile">
        </form>

        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php elseif (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="../views/earning_tracker.php" method="post" class="button-container">
            <input type="submit" value="Earning Tracker">
        </form>

        <form action="../views/change_password.php" method="post">
            <input type="submit" value="Change Password">
        </form>
        <br>

        <a href="../views/promotion_status.php" class="promotionbutton">Check Promotion Status</a>
        <br><br>
        <a href="../views/reportandrating.php" class="promotionbutton">Order Report and Rating</a>
        <br><br>
        <a href="../views/welcome.php">Back to Welcome Page</a>
    </div>
</body>

</html>
