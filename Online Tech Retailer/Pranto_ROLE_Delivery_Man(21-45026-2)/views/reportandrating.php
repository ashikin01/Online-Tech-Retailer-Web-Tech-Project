<?php require_once('../controllers/reportandratingController.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Report and Rating</title>
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
            width: 600px;
            margin: auto;
        }
        h2 {
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Report and Rating</h2>

        <?php if (!empty($orders)) { ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Comment</th>
                </tr>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['Tasks']; ?></td>
                        <td>
                            <?php 
                            $status = $order['Task_Status'];
                            if ($status === 'Active') {
                                echo 'Incomplete';
                            } elseif ($status === 'Done') {
                                echo 'Complete';
                            } else {
                                echo 'Unknown';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($status === 'Active') { ?>
                                <input type="text" name="comment" placeholder="Add a comment...">
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No orders found for this user.</p>
        <?php } ?>
        
        <p>Total Completed Orders: <?php echo $completedOrdersCount; ?></p>

        <?php
        // Display rating based on completed orders count
        if ($completedOrdersCount === 1) {
            echo "<p>Rating: 5 out of 5</p>";
        } else {
            echo "<p>Rating: 0 out of 5</p>";
        }
        ?>

        <br>
        <a href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
