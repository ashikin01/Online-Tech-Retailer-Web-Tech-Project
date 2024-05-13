<?php require_once('../controllers/TasknotificationsController.php'); ?>
<!DOCTYPE html>
<head>
    <title>Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }

        .notifications-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        h2 {
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .done-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .centered {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="notifications-container">
        <h2>Order Notifications</h2>

        <?php if (!empty($orderNotifications)) { ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($orderNotifications as $notification) { ?>
                    <tr>
                        <td><?php echo $notification['Tasks']; ?></td>
                        <td><?php echo $notification['Task_Status']; ?></td>
                        <td>
                            <?php if ($notification['Task_Status'] === 'Active') { ?>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="done_order_id" value="<?php echo $notification['Tasks']; ?>">
                                    <button type="submit" class="done-button">Done</button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>

        <?php if (empty($orderNotifications)) { ?>
            <p>No orders found.</p>
        <?php } ?>

        <div class="centered">
            <br><br>
            <a href="../views/welcome.php">Back to Welcome Page</a>
        </div>
    </div>
</body>
</html>