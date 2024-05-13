<?php require_once('../controllers/update_profileController.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <style>

        body 
        {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
            line-height: 1.5;
            min-height: 600px;
            background: #f3f3f3;
            margin: auto;
        }

        .profilecontainer 
        {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h2 
        {
            color: #4CAF50;
        }

        form 
        {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="submit"] 
        {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        input[type="submit"] 
        {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .message 
        {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .error 
        {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="profilecontainer">
        <h2>Profile</h2>

        <?php
        if (isset($message)) 
        {
            echo '<p class="message">' . $message . '</p>';
            echo '<a href="profile.php">Back to Profile</a>';
        } 
        elseif (isset($error)) 
        {
            echo '<p class="error">' . $error . '</p>';
        }
        ?>
    </div>
</body>

</html>