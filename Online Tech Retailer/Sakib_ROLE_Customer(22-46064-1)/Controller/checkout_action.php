<?php

session_start();

$loginError = false;
$cartError = false;
$quantityError = false;

if ((isset($_SESSION["cart"])) && (count($_SESSION["cart"])) == 0) {
    $cartError = true;
}

if (!isset($_SESSION["username"])) {
    $loginError = true;
}

if ($cartError == true) {
    $_SESSION["err_cart"] = "Add products to the cart";
    header("location: ../View/cart.php");
} else if ($loginError == true) {
    $_SESSION["err_login"] = "Login to your account first";
    header("location: ../View/cart.php");
} else {
    header("location: ../View/checkout.php");
}

// if (isset($_SESSION["cart"])) {
//     foreach ($_SESSION["cart"] as $key => $value) {
//         $sql = $conn->prepare("select * from product_datas where name=?");
//         $sql->bind_param("s", $value["item_name"]);
//         $sql->execute();
//         $result = $sql->get_result();
//         while ($row = mysqli_fetch_assoc($result)) {
//             $quantityX = $row["quantity"];
//         }

//         if ($value["quantity"] > $quantityX) {
//             $quantityError =  true;
//         }
//     }
// }

// if ($quantityError == true) {
//     $_SESSION["err_quantity"] = "Please change the through up down button";
//     header("location: ../View/cart.php");
// } else {
//     header("location: ../View/checkout.php");
// }
