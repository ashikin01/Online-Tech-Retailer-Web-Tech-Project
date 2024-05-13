<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    include '../views/login.php';
    exit;
}

// Include database connection and model
require_once('../models/bonusModel.php');

// Retrieve username from session
$username = $_SESSION['username'];

// Get total number of completed orders and user's salary
$totalDoneOrders = getTotalDoneOrders($username, $conn);
$salary = getUserSalary($username, $conn);

// Calculate bonus and estimated salary
$bonus = calculateBonus($totalDoneOrders);
$estimatedSalary = calculateEstimatedSalary($salary, $bonus);

// Close database connection
$conn->close();

// Load the view
require_once('../views/bonus.php');
?>