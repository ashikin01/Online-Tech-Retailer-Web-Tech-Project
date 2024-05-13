<?php
session_start();

// Include your database connection file
include("../Model/ECon.php");

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    // Redirect to login page or handle unauthorized access

}

// Retrieve user's salary information from the database
$user_id = $_SESSION['EId']; // Assuming you have EId as the session variable
$sql = "SELECT Salary FROM employee_dash WHERE Eid = $user_id"; // Corrected column name to Eid
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data and store it in variables
    $row = $result->fetch_assoc();
    $currentSalary = $row['Salary'];
} else {
    // Handle case where no data is found
    $currentSalary = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link rel="stylesheet" type="text/css" href="Salary.css">
    <style>
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['Username']; ?></h1>

    <div>
        <h2>Salary Information</h2>
        <p>Current Salary: <?php echo $currentSalary; ?> TK</
