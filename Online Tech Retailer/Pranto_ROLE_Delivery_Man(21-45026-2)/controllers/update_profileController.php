<?php
session_start();
require_once('../models/update_profileModel.php');

if (!isset($_SESSION['username'])) 
{
    include '../views/login.php';
    exit;
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Retrieve updated profile
    $Email = $_POST['Email'];
    $username = $_SESSION['username'];

    // Update user profile in database
    $stmt = $conn->prepare("UPDATE users SET Email = ? WHERE Name = ?");
    $stmt->bind_param("ss", $Email, $username);

    if ($stmt->execute()) 
    {
        $message = "Profile updated successfully!";
    } 
    else 
    {
        $error = "Error updating profile: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>