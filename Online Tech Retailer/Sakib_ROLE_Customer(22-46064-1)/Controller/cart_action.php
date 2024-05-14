<?php

session_start();
// session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $my_items = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_name'], $my_items)) {
                // echo "<script>
                // alert('Item already added');
                // window.location.href='../View/homepage.php';
                // </script>";
                $_SESSION["err_item"] = "Item already added";
                header("location: ../View/product.php");
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('image' => $_POST['image'], 'item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
                // print_r($_SESSION['cart']);
                header("location: ../View/product.php");
            }
        } else {
            $_SESSION['cart'][0] = array('image' => $_POST['image'], 'item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
            // print_r($_SESSION['cart']);
            header("location: ../View/product.php");
        }
    }
    if (isset($_POST["remove_item"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value['item_name'] == $_POST['item_name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                
            //     echo '<script>
            //     function loadRemove() {
            //         const xhttp = new XMLHttpRequest();
            //         xhttp.onload = function() {
            //             document.getElementById("container").innerHTML =
            //                 this.responseText;
            //         }
            //         xhttp.open("GET", "../View/cart.php");
            //         xhttp.send();
            //     };
            //     function get(id) {
            //         return document.getElementById(id);
            //     }
            // </script>';
            header("location: ../View/cart.php");
            }
        }
    }
    if (isset($_POST["modQuantity"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value['item_name'] == $_POST['item_name']) {
                $_SESSION["cart"][$key]["quantity"] = $_POST["modQuantity"];

            //     echo '<script>
            //     function loadDoc() {
            //         const xhttp = new XMLHttpRequest();
            //         xhttp.onload = function() {
            //             document.getElementById("container").innerHTML =
            //                 this.responseText;
            //         };
            //         xhttp.open("GET", "../View/cart.php");
            //         xhttp.send();
            //     }
            // </script>';
            header("location: ../View/cart.php");
            }
        }
    }
}
