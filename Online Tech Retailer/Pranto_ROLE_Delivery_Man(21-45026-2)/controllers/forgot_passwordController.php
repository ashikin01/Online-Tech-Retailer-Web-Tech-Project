<?php
// Include the UserModel.php file
require_once('../models/forgot_passwordModel.php');

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $username = $_POST['username'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if passwords match
        if ($newPassword !== $confirmPassword) {
            $error = "Passwords do not match";
        } else {
            // Create an instance of UserModel
            $userModel = new UserModel();

            // Check if username exists
            if ($userModel->checkUsernameExists($conn, $username)) {
                // Reset user password
                if ($userModel->resetPassword($conn, $username, $newPassword)) {
                    $message = "Password reset successful!";
                } else {
                    $error = "Error resetting password";
                }
            } else {
                $notfound = "User not found";
            }
        }
    } else {
        $error = "Invalid form data";
    }
}
include('../views/forgot_password.php');
// Close database connection
$conn->close();
?>