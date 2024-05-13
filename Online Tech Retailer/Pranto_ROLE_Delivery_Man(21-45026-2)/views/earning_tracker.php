<?php require_once('../controllers/earning_trackerController.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Earning Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
            text-align: center;
        }

        .earning-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #4CAF50;
        }

        .salary {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .done-orders {
            margin-top: 20px;
            font-size: 18px;
        }

        .bonus-link {
            margin-top: 20px;
            display: block;
            font-size: 16px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
<div class="earning-container">
    <h2>Your Salary</h2>
    <div class="salary"><?php echo htmlspecialchars($salary) . 'tk'; ?></div>

    <div class="done-orders">
        <?php if ($totalDoneOrders > 0) : ?>
            Total Completed Orders: <?php echo $totalDoneOrders; ?>
        <?php else : ?>
            No completed orders found
        <?php endif; ?>
    </div>
    <a href="../views/bonus.php" class="bonus-link">Check Bonus</a>
    <br>
    <a href="../views/profile.php">Back to Profile</a>
</div>
</body>
</html>
