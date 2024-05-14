<?php
session_start();


include("../Model/ECon.php");


if (!isset($_SESSION['Username'])) {
    header("Location: http://localhost/sublimeText/new/Views/Login_Layout.php");
    exit();
}


$email = $_SESSION['Username'];
$sql = "SELECT Salary FROM employee_dash WHERE Email =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    echo "Error: " . $conn->error;
    exit();
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentSalary = $row['Salary'];
} else {
    // Handle case where no data is found
    $currentSalary = "N/A";
}

$stmt->close();

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
        <p>Current Salary: <?php echo $currentSalary; ?> TK</p>
    </div>

    <div>
        <form method="post">
            <input type="submit" name="refresh" value="Refresh">
        </form>
    </div>
    <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<=Back to Home"></a>

    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
</body>
</html>
