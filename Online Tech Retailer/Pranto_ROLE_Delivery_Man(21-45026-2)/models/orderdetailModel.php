<?php
session_start();

// If session variable is not set, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../views/login.php");
    exit;
}

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

// Get username from session
$username = $_SESSION['username'];

// Prepare SQL query to retrieve order details based on username
$sql = "SELECT Order_ID, Order_Amount FROM delivery_men WHERE Name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>