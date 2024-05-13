<?php
session_start();

require_once('../models/notificationsModel.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) 
{
    include '../views/login.php';
    exit;
}
// Handle "Done" button click
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['done_order_id'])) {
    $username = $_SESSION['username'];
    $orderId = $_POST['done_order_id'];

    // Update order status
    $userModel = new UserModel();
    $updateResult = $userModel->updateOrderStatus($username, $orderId);

    if (!$updateResult) {
        echo "Error updating order status.";
        exit;
    }
}

// Retrieve order notifications for the logged-in user
$username = $_SESSION['username'];
$userModel = new UserModel();
$orderNotifications = $userModel->getNotifications($username);

?>