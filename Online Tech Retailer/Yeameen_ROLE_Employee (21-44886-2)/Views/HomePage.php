<?php
session_start();
include("../Model/ECon.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="HomePaage.css">
    <title>Home Page</title>
</head>
<body>
    <h1>Home</h1>

    <!-- Profile link with profile logo -->
    <div class="profile-container">
        <a href="http://localhost/sublimeText/new/Controller/ProfileActionPage.php">
            <img src="path_to_your_profile_logo_image" alt="Profile" class="profile-logo">
        </a>
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

    <a href="http://localhost/sublimeText/new/Controller/EmployeeDisplay_Page.php">
        <input type="submit" value="<=Back to Display">
    </a>

    <script>
        function myFunction() {
            document.getElementById("demo").innerHTML = "Paragraph changed.";
        }
    </script>
</body>
</html>
