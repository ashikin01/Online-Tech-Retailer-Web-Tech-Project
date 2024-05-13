<?php
require_once('../models/earning_trackerModel.php');

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../views/login.php");
    exit;
}

// Database connection credentials
$servername = "localhost";
$username = ""; 
$password = ""; 
$database = "your_database";

// Instantiate model
$model = new EarningTrackerModel();
$model->getConnection($servername, $username, $password, $database);

// Retrieve username from session
$username = $_SESSION['username'];

// Retrieve data from model
$salary = $model->getSalaryByUsername($username);
$totalDoneOrders = $model->getTotalDoneOrdersByUsername($username);

// Close database connection
$model->closeConnection();

?>