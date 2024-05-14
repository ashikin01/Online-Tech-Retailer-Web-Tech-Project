<?php

include "../Model/db_config.php";
include("top_section.php");

if (isset($_SESSION["err_payment"])) {
    include("alert_box2.php");
}

$usernameX = $_SESSION['username'];

$sql = $conn->prepare("select * from customer where username=?");
$sql->bind_param("s", $usernameX);
$sql->execute();
$result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

foreach ($result as $row) {
    $username = $row["Username"];
    $phone = $row["Phone"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Checkout.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <form action="../Controller/purchase_action.php" method="post" novalidate>
        <h1>Checkout</h1>
        <div class="info-container">
            <table>
                <th>Customer Deatails</th>
            </table>

            <div class="cus-info">
                <Label>Name</Label><br>
                <input type="text" name="name" placeholder="Name" value="<?php if (isset($username)) {
                                                                                echo $username;
                                                                            }; ?>" readonly>
            </div>

            <div class="error-msg">
                <span id="err_username">
                    <?php
                    if (isset($_SESSION["err_username"])) {
                        echo $_SESSION["err_username"];
                    }
                    unset($_SESSION["err_username"]);
                    ?>
                </span>
            </div>

            <div class="cus-info">
                <Label>Phone</Label><br>
                <input type="text" name="phone" placeholder="Phone" value="<?php if (isset($phone)) {
                                                                                echo $phone;
                                                                            }; ?>">
            </div>

            <div class="error-msg">
                <span id="err_phone">
                    <?php
                    if (isset($_SESSION["err_phone"])) {
                        echo $_SESSION["err_phone"];
                    }
                    unset($_SESSION["err_phone"]);
                    ?>
                </span>
            </div>

            <div class="cus-info">
                <Label>Address</Label><br>
                <input type="text" name="address" placeholder="Address">
            </div>

            <div class="error-msg">
                <span id="err_address">
                    <?php
                    if (isset($_SESSION["err_address"])) {
                        echo $_SESSION["err_address"];
                    }
                    unset($_SESSION["err_address"]);
                    ?>
                </span>
            </div>
        </div>

        <div class="payment-container">
            <table>
                <th>Payment Details</th>
            </table>

            <Label class="pay-method">Payment method: </Label>
            <div class="filter-condition">
                <select name="pay_method" id="select">
                    <option value="None">None</option>
                    <option value="Cash on delivery">Cash on delivery</option>
                    <option value="Visa card">Visa card</option>
                    <option value="Master card">Master card</option>
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>

                </select>
            </div>

            <div class="btn-container">
                <button name="purchase" class="btn-checkout">Purchase</button>
            </div>
        </div>

    </form>

</body>

</html>