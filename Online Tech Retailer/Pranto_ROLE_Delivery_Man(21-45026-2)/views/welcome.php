<?php
session_start();

// If session variable is not set, redirect to login page
if (!isset($_SESSION['username'])) 
{
    include '../views/login.php';
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
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
            margin: 0;
        }

        .welcome {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        form {
            margin-top: 20px;
        }

        input{
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="welcome">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
         <a href="../views/notifications.php" class="notifications-button">View Notifications</a>
         <br>
         <a href="../views/Tasknotifications.php" class="notifications-button">View Task Notifications</a>

        <form action="../views/profile.php" method="post" novalidate>
            <input type="submit" value="View Profile">
        </form>

        <form action="../views/orderdetail.php" method="post" novalidate>
            <input type="submit" value="Order Details">
        </form>

        <form action="../controllers/Deliverylogout.php" method="post" novalidate>
            <input type="submit" value="Logout">
        </form>
    </div>
</body>

</html>