<?php
// Database connection credentials
$servername = "localhost";
$username = "";
$password = "";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username from session
function getTotalDoneOrders($username, $conn)
{
    $sql = "SELECT COUNT(*) AS total_done_orders FROM users WHERE Name = ? AND status = 'Done'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_done_orders'];
    } else {
        return 0;
    }
}

function getUserSalary($username, $conn)
{
    $sql = "SELECT salary FROM users WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['salary'];
    } else {
        return 0;
    }
}

function calculateBonus($totalDoneOrders)
{
    return $totalDoneOrders > 0 ? $totalDoneOrders * 5 : 0;
}

function calculateEstimatedSalary($salary, $bonus)
{
    return $salary + $bonus;
}
?>