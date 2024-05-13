<?php
session_start();

include "../Model/db_config.php";

$name = "";
$err_name = "";
$phone = "";
$err_phone = "";
$address = "";
$err_address = "";
$total_price = "";
$pay_method = "";

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $has_error = false;

    $name = sanitize($_POST["name"]);

    if (empty($name)) {
        $err_name = "Name required";
        $_SESSION["err_name"] = $err_name;
        $has_error = true;
    }
    // else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
    //     $err_username= "Username must be 4-20 characters and contain only letters and numbers";
    //     $_SESSION["err_username"]=$err_username;
    //     $has_error=true;
    // }
    else (setcookie("name", $name, time() + 60, "/"));
    $has_error = false;

    $phone = sanitize($_POST["phone"]);

    if (empty($phone)) {
        $err_email = "Phone number required";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    } else if (!preg_match("/^01[0-9]{9}$/", $phone)) {
        $err_phone = "Invalid phone number format (e.g. 01866188084)";
        $_SESSION["err_phone"] = $err_phone;
        $has_error = true;
    } else (setcookie("phone", $phone, time() + 60, "/"));
    $has_error = false;

    $address = sanitize($_POST["address"]);

    if (empty($address)) {
        $err_address = "Address required";
        $_SESSION["err_address"] = $err_address;
        $has_error = true;
        // header('location: ../View/login.php');
    }

    $pay_method = $_POST["pay_method"];

    if ($pay_method == "None") {
        $_SESSION["err_payment"] = "Please select the payment method";
        $has_error = true;
    }
}

if ($has_error == false) {
    $sql = $conn->prepare("insert into order_manager values(?,?,?,?)");
    $order_id = "null";
    $sql->bind_param("ssss", $order_id, $name, $phone, $address);
    if ($sql->execute()) {
        $sql = $conn->prepare("insert into customer_order values(?,?,?,?,?,?,?)");
        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION["cart"] as $key => $value) {
            $item_name = $value["item_name"];
            $price = $value["price"];
            $quantity = $value["quantity"];
            // $total_price = $price * $quantity;
            $total_price=0;
            $sql->bind_param("issiiis", $order_id, $name, $item_name, $price, $quantity, $total_price, $pay_method);

            if ($sql->execute()) {
            $sql = $conn->prepare("update customer_order set total_price = unit_price * quantity where item_name=?");
            $sql->bind_param("s", $item_name);
                // $sql->execute();
                if ($sql->execute()) {
                    $sql = $conn->prepare("update product_datas set quantity = quantity - ? where name=?");
                    $sql->bind_param("is", $quantity, $item_name);
                    $sql->execute();
                }
            }

            
            // $sql = $conn->prepare("update product_datas set quantity = quantity - ?, total_price = price * (quantity - ?) where name=?");
        }
    }
    $_SESSION["purchase_msg"] = "Order Successful!";
    unset($_SESSION["cart"]);
    header("location: ../View/cart.php");
} else {
    // $_SESSION["login_msg"] = "Login to your account first";
    header("location: ../View/checkout.php");
}
