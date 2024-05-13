<?php
require_once('../models/profileModel.php');

session_start();

if (!isset($_SESSION['username'])) 
{
    include '../views/login.php';
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database";
$sessionUsername = $_SESSION['username'];

// Instantiate model
$profileModel = new ProfileModel();

// Get user data
$userData = $profileModel->getUserData($servername, $username, $password, $database, $sessionUsername);

// Process form submission
$message = $error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'mobile_number' is set in $_POST
    if (isset($_POST['Email'])){
        $email = $_POST['Email'];

        if ($profileModel->updateUserProfile($servername, $username, $password, $database, $sessionUsername, $Email)) {
            $message = "Profile updated successfully!";
            // Update user data after successful update
            $userData['Email'] = $Email;
        } else {
            $error = "Error updating profile.";
        }
    }
}
?>