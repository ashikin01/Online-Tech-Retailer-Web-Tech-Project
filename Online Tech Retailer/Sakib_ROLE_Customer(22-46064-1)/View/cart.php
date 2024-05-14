<?php

include "../Model/db_config.php";
include("top_section.php");

// if(!isset($_SESSION["username"])){
//     $_SESSION["err_login"] = "Login to your account first"; 
// }

if ((isset($_SESSION["purchase_msg"])) || (isset($_SESSION["err_login"])) || (isset($_SESSION["err_cart"])) || (isset($_SESSION["err_quantity"]))) {
    include("alert_box2.php");
}

// $usernameX = $_SESSION['username'];

// $sql = $conn->prepare("select * from customer where username=?");
// $sql->bind_param("s", $usernameX);
// $sql->execute();
// $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

// foreach ($result as $row) {
//     $username = $row["Username"];
//     $phone = $row["Phone"];
// }

// if (isset($_SESSION["cart"])) {
//     foreach ($_SESSION["cart"] as $key => $value) {
//         $sql = $conn->prepare("select * from product_datas where name=?");
//         $sql->bind_param("s", $value["item_name"]);
//         $sql->execute();
//         $result = $sql->get_result();
//         while ($row = mysqli_fetch_assoc($result)) {
//             $quantityX = $row["quantity"];
//         }
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="cart.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <h1>Shopping Cart</h1>

    <div id="container">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Serial no.</th>
                    <th>Image</th>
                    <th>Item name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $value) {
                        $sql = $conn->prepare("select * from product_datas where name=?");
                        $sql->bind_param("s", $value["item_name"]);
                        $sql->execute();
                        $result = $sql->get_result();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $quantityX = $row["quantity"];
                        }
                        $sr = $key + 1;
                        echo "
                        <tr>
                        <td>$sr</td>
                        <td><img src='$value[image]' class='cart-img'></td>
                        <td>$value[item_name]</td>
                        <td>$value[price] <input type='hidden' class='iPrice' value='$value[price]'></td>
                        <td>
                        <form action='../Controller/cart_action.php' method='post' novalidate>
                           <input type='number' class='quantity iQuantity' name='modQuantity' onchange='this.form.submit()' value='$value[quantity]' min='1' max='$quantityX'>
                           <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>
                        </td>
                        <td class='iTotal'></td>
                        <td>
                        <form action='../Controller/cart_action.php' method='post' novalidate>
                           <button name='remove_item' class='btn-remove'><i class='bx bxs-message-square-x'></i></button>
                           <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>
                        </td>
                        </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="price-details">
            <table>
                <th>Checkout</th>
            </table>

            <p class="total-price">Total Price:</p>
            <p class="price-value" id="gTotal">0</p>
            <p class="total-price">Shipping Cost:</p>
            <p class="price-value">Free</p>

            <form action="../Controller/checkout_action.php" method="" novalidate>
                <div class="btn-container">
                    <button name="purchase" class="btn-checkout">Checkout</button><br><br>

            </form>

            <form action="homepage.php" novalidate>
                <button class="btn-checkout">Continue Shopping</button><br><br>
            </form>
        </div>
    </div>
    <script src="js/cart.js"></script>

    <!-- <script>
        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("demo").innerHTML =
                    this.responseText;
            }
            xhttp.open("GET", "cart.php");
            xhttp.send();
        }
    </script> -->

</body>

</html>