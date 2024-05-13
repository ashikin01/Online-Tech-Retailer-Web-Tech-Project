<?php
session_start();

require_once '../models/loginModel.php';

// Database connection info
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate ProfileModel
    $profileModel = new ProfileModel();

    // Open database connection
    $profileModel->openConnection($servername, $username, $password, $database);

    // Get user data by username and password
    $userData = $profileModel->getUserByUsernameAndPassword($username, $password);

    if ($userData) {
        $_SESSION['username'] = $userData['Name'];
        header("Location: ../views/welcome.php");
        exit;
    } else {
        $message = "Invalid username or password";
    }

    // Close database connection
    $profileModel->closeConnection();
}
?>
