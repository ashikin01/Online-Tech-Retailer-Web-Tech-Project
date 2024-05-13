<?php
session_start();
require_once('../models/change_passwordModel.php'); // Include the UserModel class

// Redirect to login if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../views/login.php");
    exit;
}

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

// Process the password change request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate that new password matches the confirmed password
    if ($newPassword === $confirmPassword) {
        $username = $_SESSION['username'];

        // Instantiate the UserModel and update the password
        $userModel = new UserModel();
        $passwordUpdated = $userModel->updatePassword($servername, $username, $password, $database, $username, $newPassword);

        if ($passwordUpdated) {
            $message = "Password updated successfully!";
        } else {
            $error = "Error updating password.";
        }
    } else {
        $error = "New password and confirm password do not match.";
    }
}

// Include the view
include('../views/change_password.php');
?>
