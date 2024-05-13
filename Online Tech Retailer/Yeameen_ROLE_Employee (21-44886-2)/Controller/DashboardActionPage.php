<?php
session_start();
include("../Model/ECon.php");

// Assuming you have already established a database connection in ECon.php

// Fetching tasks
$taskSql = "SELECT Task FROM employee_dash"; 
$taskStmt = mysqli_prepare($conn, $taskSql);
mysqli_stmt_execute($taskStmt);
mysqli_stmt_bind_result($taskStmt, $task);
$tasks = array();
while (mysqli_stmt_fetch($taskStmt)) {
    $tasks[] = $task;
}
mysqli_stmt_close($taskStmt);

// Fetching performance data
$performanceSql = "SELECT Performance FROM employee_dash"; 
$performanceStmt = mysqli_prepare($conn, $performanceSql);
mysqli_stmt_execute($performanceStmt);
mysqli_stmt_bind_result($performanceStmt, $performance);
$performances = array();
while (mysqli_stmt_fetch($performanceStmt)) {
    $performances[] = $performance;
}
mysqli_stmt_close($performanceStmt);

// Fetching announcement data
$announcementSql = "SELECT Announcement FROM employee_dash"; 
$announcementStmt = mysqli_prepare($conn, $announcementSql);
mysqli_stmt_execute($announcementStmt);
mysqli_stmt_bind_result($announcementStmt, $announcement);
$announcements = array();
while (mysqli_stmt_fetch($announcementStmt)) {
    $announcements[] = $announcement;
}
mysqli_stmt_close($announcementStmt);

mysqli_close($conn);

// Notification message based on tasks fetched
$notificationMessage = !empty($tasks) ? "Task is added" : "0 Notification";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="Dashboard.css">
</head>
<body>
    <h1>Welcome to Dashboard, <?php echo $_SESSION['User_Name']; ?></h1>

    <div class="button-container">
        <button onclick="toggleVisibility('taskDiv')">Task</button>
        <button onclick="toggleVisibility('notificationDiv')">Notification</button>
        <button onclick="toggleVisibility('performanceDiv')">Performance</button>
        <button onclick="toggleVisibility('announcementDiv')">Announcement</button>
    </div>

    <div id="taskDiv" style="display: none;">
        <!-- Content for Task -->
        <?php
        // Output fetched tasks
        if (!empty($tasks)) {
            echo "<ul>";
            foreach ($tasks as $task) {
                echo "<li>$task</li>";
            }
            echo "</ul>";
        } else {
            echo "No tasks available.";
        }
        ?>
    </div>

    <div id="notificationDiv" style="display: none;">
        <!-- Content for Notification -->
        <p><?php echo $notificationMessage; ?></p>
    </div>

    <div id="performanceDiv" style="display: none;">
        <!-- Content for Performance -->
        <?php
        // Output fetched performance data
        if (!empty($performances)) {
            echo "<ul>";
            foreach ($performances as $performance) {
                echo "<li>$performance</li>";
            }
            echo "</ul>";
        } else {
            echo "No performance data available.";
        }
        ?>
    </div>

    <div id="announcementDiv" style="display: none;">
        <!-- Content for Announcement -->
        <?php
        // Output fetched announcement data
        if (!empty($announcements)) {
            echo "<ul>";
            foreach ($announcements as $announcement) {
                echo "<li>$announcement</li>";
            }
            echo "</ul>";
        } else {
            echo "No announcement data available.";
        }
        ?>
    </div>

    <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<=Back to Home"></a>

    <script>
        function toggleVisibility(divId) {
            var div = document.getElementById(divId);
            if (div.style.display === 'block') {
                div.style.display = 'none';
            } else {
                hideAll();
                div.style.display = 'block';
            }
        }

        function hideAll() {
            document.getElementById('taskDiv').style.display = 'none';
            document.getElementById('notificationDiv').style.display = 'none';
            document.getElementById('performanceDiv').style.display = 'none';
            document.getElementById('announcementDiv').style.display = 'none';
        }
    </script>
</body>
</html>
