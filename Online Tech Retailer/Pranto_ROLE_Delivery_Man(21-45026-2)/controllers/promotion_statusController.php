<?php
require('../models/promotion_statusModel.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ..views/login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username from session
$username = $_SESSION['username'];

// Create an instance of PromotionModel and pass the database connection
$model = new PromotionModel();
$model->setConnection($conn);

// Retrieve user information
$userInfo = $model->getUserInfoByUsername($username);

// Extract user information
$rating = $userInfo['rating'] ;
$accountAge = $userInfo['account_age'] ;
$eligibleForPromotion = $userInfo['eligible_for_promotion'];

// Check eligibility for promotion based on conditions and update if necessary
if ($rating >= 4 && $accountAge >= 1) {
    $eligibleForPromotion = 'Yes';
    $model->updateEligibilityForPromotion($username, 'yes');
} else {
    $eligibleForPromotion = 'No';
    $model->updateEligibilityForPromotion($username, 'no');
}

// Close database connection
$conn->close();
?>