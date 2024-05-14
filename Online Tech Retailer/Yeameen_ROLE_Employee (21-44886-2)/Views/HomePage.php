<?php
session_start();
include("../Model/ECon.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" type="text/css" href="HomePaage.css">
    <title>Home Page</title>
</head>
<body>
    <h1>Home</h1>

    <!-- Profile link with profile logo -->
    <div class="profile-container">
        <a href="http://localhost/sublimeText/new/Controller/ProfileActionPage.php">Profile<i class='bx bx-user-circle'></i></a>
    </div>

    <div class="button-container">
        <a href="http://localhost/sublimeText/new/Controller/DashboardActionPage.php">
            <button type="button">Dashboard</button>
        </a>
        <a href="http://localhost/sublimeText/new/Controller/AttendanceActionPage.php">
            <button type="button" onclick="myFunction()">Attendance</button>
        </a>
        <a href="http://localhost/sublimeText/new/Controller/SalaryActionPage.php">
            <button type="button" onclick="myFunction()">Salary</button>
        </a>
        <a href="http://localhost/sublimeText/new/Controller/TaskReportActionPage.php">
            <button type="button" onclick="myFunction()">Task Report</button>
        </a>
    </div>

    

    <script>
        function myFunction() {
            document.getElementById("demo").innerHTML = "Paragraph changed.";
        }
    </script>
</body>
</html>
