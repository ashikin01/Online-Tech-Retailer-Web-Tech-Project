<?php
session_start();
include("../Model/ECon.php");

if (!isset($_SESSION['User_Name'])) {
    header("Location: http://localhost/sublimeText/new/Views/Login_Layout.php");
    exit();
}


$username = $_SESSION['User_Name'];
$query = "SELECT Experience FROM employee_dash WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $experience = $row['Experience'];
    $message = "You have been promoted to $experience";
} else {
    $message = "No experience information found.";
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-top: 0;
        }
        p {
            color: #666;
        }
        .back-button {
            margin-top: 20px;
            text-align: center;
        }
        .back-button input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .back-button input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Notification</h2>
        <p><?php echo $message; ?></p>
        <div class="back-button">
            <a href="http://localhost/sublimeText/new/Controller/ProfileActionPage.php"><input type="submit" value="<= Back to Profile"></a>
        </div>
    </div>
</body>
</html>
