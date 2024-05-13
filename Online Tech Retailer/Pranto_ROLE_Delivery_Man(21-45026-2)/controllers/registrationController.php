<?php
session_start();

// Include the model
require_once('../models/registrationModel.php');

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

// Process the registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mobile_number'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];

    // Instantiate the model and establish connection
    $userModel = new UserModel();
    $userModel->getConnection($servername, $username, $password, $database);

    // Check if username already exists
    if ($userModel->checkExistingUsername($username)) {
        $exist = "Username already exists. Please choose a different username.";
    } else {
        // Register new user
        if ($userModel->registerUser($username, $password, $mobile_number)) {
            $message = "Registration successful!";
        } else {
            $error = "Error: " . $conn->error;
        }
    }

    // Close database connection
    $userModel->closeConnection();
}
include('../views/registration.php');
?>
