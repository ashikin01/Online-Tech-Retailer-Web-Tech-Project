<?php
session_start();
include("../Model/DataCon.php");

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
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['User_Name']; ?></h1>
        <a href="#" class="link">Notification</a>
        <a href="#" class="link">Rank</a>
        <a href="#" class="link">Profile Details</a>
        <a href="http://localhost/sublimeText/new/Views/Login_Layout.php" class="link">Log Out</a>
       
         <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<=Back to Home"></a>

    </div>

    <script>
        // Example JavaScript code can be added here for additional functionalities
    </script>
</body>
</html>
