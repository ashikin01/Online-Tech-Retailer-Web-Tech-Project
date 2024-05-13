<?php require('../controllers/bonusController.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bonus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
            text-align: center;
        }

        .bonus-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        h2 {
            color: #4CAF50;
        }

        .bonus-amount,
        .estimated-salary {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .back-link {
            margin-top: 20px;
            display: block;
            font-size: 16px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
<div class="bonus-container">
    <h2>Bonus</h2>
    <?php if ($totalDoneOrders > 0) : ?>
        <div class="bonus-amount">
            Bonus Earned: <?php echo number_format($bonus) . ' tk'; ?>
        </div>
    <?php else : ?>
        <div class="bonus-amount">
            No completed orders, so no bonus earned.
        </div>
    <?php endif; ?>

    <div class="estimated-salary">
        Estimated Salary: <?php echo number_format($estimatedSalary) . ' tk'; ?>
    </div>

    <a href="earning_tracker.php" class="back-link">Back to Earning Tracker</a>
</div>
</body>
</html>