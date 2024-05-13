<?php require_once('../models/orderdetailModel.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }

        .order-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #4CAF50;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .centered {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="order-container">
    <h2>Order Details</h2>
    <?php if ($result->num_rows > 0) { ?>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Amount</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['Order_ID'] ; ?></td>
                    <td><?php echo $row['Order_Amount'] .'tk'; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No order details found for <?php echo htmlspecialchars($username); ?></p>
    <?php } ?>
     <div class="centered">
        <br>
        <a href="welcome.php">Back to Welcome Page</a>
    </div>
</div>
</body>
</html>
