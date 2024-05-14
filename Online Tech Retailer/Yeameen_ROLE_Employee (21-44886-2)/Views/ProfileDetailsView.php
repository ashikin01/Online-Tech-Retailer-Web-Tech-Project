<?php
session_start();
include("../Model/DataCon.php");

if (!isset($_SESSION['User_Name'])) {
    header("Location: http://localhost/sublimeText/new/Views/Login_Layout.php");
    exit();
}


$username = $_SESSION['User_Name'];
$query = "SELECT Username, Email, Gender, Phone, Address FROM employee_dash WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $username = $row['Username'];
    $email = $row['Email'];
    $gender = $row['Gender'];
    $phone = $row['Phone'];
    $address = $row['Address'];
} else {
    
    header("Location: error.php");
    exit();
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
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
            text-align: center;
            position: relative;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
        .back-button input[type="submit"] {
            padding: 10px 20px;
            background-color: #009688;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-button input[type="submit"]:hover {
            background-color: #00796b;
        }
        .bottom-right {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Profile Details</h2>
        <p>Username: <?php echo $username; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Gender: <?php echo $gender; ?></p>
        <p>Phone: <?php echo $phone; ?></p>
        <p>Address: <?php echo $address; ?></p>
        <a href="http://localhost/sublimeText/new/Controller/ProfileActionPage.php" class="back-button"><input type="submit" value="<=Back"></a>
        <a href="http://localhost/sublimeText/new/Controller/UpdateProfilePage.php" class="button bottom-right">Update Profile</a>
    </div>
</body>
</html>
