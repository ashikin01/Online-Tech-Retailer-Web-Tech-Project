<?php
session_start();
include("../Model/ECon.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .link {
            display: block;
            margin-bottom: 20px;
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
        .back-button {
            margin-top: 20px;
        }
        .back-button input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .back-button input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['User_Name']; ?></h1>
        <a href="http://localhost/sublimeText/new/Views/NotificationView.php" class="link">Notification</a>
        <a href="http://localhost/sublimeText/new/Views/RankView.php" class="link">Rank</a>
        <a href="http://localhost/sublimeText/new/Views/ProfileDetailsView.php" class="link">Profile Details</a>
        <a href="http://localhost/sublimeText/new/Views/Login_Layout.php" class="link">Log Out</a>
        <div class="back-button">
            <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<= Back to Home"></a>
        </div>
    </div>

    <script>
        // Example JavaScript code can be added here for additional functionalities
    </script>
</body>
</html>
