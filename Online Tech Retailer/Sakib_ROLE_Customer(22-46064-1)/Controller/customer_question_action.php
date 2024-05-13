<?php
session_start();

include "../Model/db_config.php";

$username = "";
$err_username = "";
$question = "";
$err_question = "";

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $has_error = false;

    $username = sanitize($_POST["username"]);

    if (empty($username)) {
        $err_username = "Username required";
        $_SESSION["err_username"] = $err_username;
        $has_error = true;
    } else (setcookie("username", $username, time() + 60, "/"));
    $has_error = false;

    $question = sanitize($_POST["question"]);

    if (empty($question)) {
        $err_question = "Question required";
        $_SESSION["err_question"] = $err_question;
        $has_error = true;
    } else {
        $has_error = false;
    }
}

if ($has_error == false) {
    // $sql = $conn->prepare("select * from order_manager where order_id=?");
    // $sql->bind_param("i", $order_id);
    // $sql->execute();
    // $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    // foreach ($result as $row) {
    //     $usernameX = $row["Name"];
    // }
    // if ($username == $usernameX) {
    $question_id = "null";
    $answer = "";
    $sql = $conn->prepare("insert into customer_question values(?,?,?,?)");
    $sql->bind_param("ssss", $question_id, $username, $question, $answer);
    $sql->execute();

    $_SESSION["question_msg"] = "Question sent!";
    header("location: ../View/customer_question.php");
} else {
    header("location: ../View/customer_question.php");
}
