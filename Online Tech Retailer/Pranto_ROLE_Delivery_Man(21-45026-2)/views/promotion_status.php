<?php require_once('../controllers/promotion_statusController.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Promotion Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
            text-align: center;
        }

        .promotion-container {
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

        .status-info {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="promotion-container">
        <h2>Promotion Status</h2>
        <div class="status-info">
            <p><strong>Rating:</strong> <?php echo htmlspecialchars($rating); ?></p>
            <p><strong>Account Age:</strong> <?php echo htmlspecialchars($accountAge); ?> years</p>
            <p><strong>Eligible for Promotion:</strong> <?php echo htmlspecialchars($eligibleForPromotion); ?></p>
        </div>
        <br>
        <a href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
