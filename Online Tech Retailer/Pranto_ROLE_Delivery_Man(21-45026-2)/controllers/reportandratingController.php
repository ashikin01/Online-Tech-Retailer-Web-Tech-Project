<?php
session_start();

// Include the model
require_once('../models/reportandratingModel.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../views/login.php");
    exit;
}

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

// Instantiate the model
$orderModel = new OrderModel();

// Explicitly connect to the database
$orderModel->connect($servername, $username, $password, $database);

// Retrieve the username from the session
$username = $_SESSION['username'];

// Get orders for the user
$orders = $orderModel->getOrdersByUsername($username);

// Count completed orders
$completedOrdersCount = 0;
foreach ($orders as $order) {
    if ($order['Task_Status'] === 'Done') {
        $completedOrdersCount++;
    }
}

// Close database connection
$orderModel->closeConnection();
?>
