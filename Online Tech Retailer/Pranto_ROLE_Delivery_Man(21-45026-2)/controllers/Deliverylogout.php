<?php
session_start();

if (!isset($_SESSION['username'])) 
{
    include '../views/login.php';
    exit;
}

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
include '../views/login.php';
exit;
?>