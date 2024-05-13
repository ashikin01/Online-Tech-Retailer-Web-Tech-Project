<?php

include "../Model/db_config.php";
include("top_section.php");
include("../View/logout.php");
include("report_button.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="order_history.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Item name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $usernameX = $_SESSION["username"];
                $sql = $conn->prepare("select * from customer_order where customer_name=?");
                $sql->bind_param("s", $usernameX);
                $sql->execute();
                $result = $sql->get_result();

                while ($user_fetch = mysqli_fetch_assoc($result)) {
                    echo "
                <tr>
                <td>$user_fetch[Order_Id]</td>
                <td>$user_fetch[Item_Name]</td>
                <td>$user_fetch[Unit_Price]<input type='hidden' class='sPrice' value='$user_fetch[Unit_Price]'></td>
                <td>$user_fetch[Quantity]<input type='hidden' class='sQuantity' value='$user_fetch[Quantity]'></td>
                <td class='sTotal'></td>
                </tr>
                ";
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="js/cart.js"></script>
</body>

</html>