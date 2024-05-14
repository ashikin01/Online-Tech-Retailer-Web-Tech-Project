<?php
session_start();

include "../Model/db_config.php";

$order_id = "";
$err_order_id = "";
$username = "";
$err_username = "";
$report_message = "";
$err_report_message = "";

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $has_error = false;

    $order_id = sanitize($_POST["order_id"]);

    if (empty($order_id)) {
        $err_order_id = "Order Id required";
        $_SESSION["err_order_id"] = $err_order_id;
        $has_error = true;
    } else (setcookie("order_id", $order_id, time() + 60, "/"));
    $has_error = false;

    $username = sanitize($_POST["username"]);

    if (empty($username)) {
        $err_username = "Username required";
        $_SESSION["err_username"] = $err_username;
        $has_error = true;
    } else (setcookie("username", $username, time() + 60, "/"));
    $has_error = false;

    $report_message = sanitize($_POST["report_message"]);

    if (empty($report_message)) {
        $err_report_message = "Message required";
        $_SESSION["err_report_message"] = $err_report_message;
        $has_error = true;
    } 
    else {
        $has_error = false;
    }
}

if ($has_error == false) {
    $sql = $conn->prepare("select * from order_manager where order_id=?");
    $sql->bind_param("i", $order_id);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row) {
        $usernameX = $row["Name"];
    }
    if ($username == $usernameX) {
        $sql = $conn->prepare("insert into customer_report values(?,?,?)");
        $sql->bind_param("iss", $order_id, $username, $report_message);
        $sql->execute();

        $_SESSION["report_msg"] = "Report sent!";
        header("location: ../View/report.php");
    }
    else {
        $err_order_id = "Order id doesn't match for the username";
        $_SESSION["err_order_id"] = $err_order_id;
        header("location: ../View/report.php");
    }
} 
else {
    header("location: ../View/report.php");
}
