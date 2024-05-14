<?php
session_start();
include("../Model/ECon.php");


if (!isset($_SESSION['User_Name'])) {
 
    header("Location: http://localhost/sublimeText/new/Views/Login_Layout.php");
    exit();
}


$email = $_SESSION['User_Name'];


$taskSql = "SELECT Task FROM employee_dash WHERE Email = ?";
$taskStmt = mysqli_prepare($conn, $taskSql);
mysqli_stmt_bind_param($taskStmt, "s", $email);
mysqli_stmt_execute($taskStmt);
mysqli_stmt_bind_result($taskStmt, $task);
$tasks = array();
while (mysqli_stmt_fetch($taskStmt)) {
    $tasks[] = $task;
}
mysqli_stmt_close($taskStmt);


$performanceSql = "SELECT Performance FROM employee_dash WHERE Email = ?";
$performanceStmt = mysqli_prepare($conn, $performanceSql);
mysqli_stmt_bind_param($performanceStmt, "s", $email);
mysqli_stmt_execute($performanceStmt);
mysqli_stmt_bind_result($performanceStmt, $performance);
$performances = array();
while (mysqli_stmt_fetch($performanceStmt)) {
    $performances[] = $performance;
}
mysqli_stmt_close($performanceStmt);


$announcementSql = "SELECT Announcement FROM employee_dash WHERE Email = ?";
$announcementStmt = mysqli_prepare($conn, $announcementSql);
mysqli_stmt_bind_param($announcementStmt, "s", $email);
mysqli_stmt_execute($announcementStmt);
mysqli_stmt_bind_result($announcementStmt, $announcement);
$announcements = array();
while (mysqli_stmt_fetch($announcementStmt)) {
    $announcements[] = $announcement;
}
mysqli_stmt_close($announcementStmt);

$notificationSql = "SELECT Task FROM employee_dash WHERE Email = ?";
$notificationStmt = mysqli_prepare($conn, $notificationSql);
mysqli_stmt_bind_param($notificationStmt, "s", $email);
mysqli_stmt_execute($notificationStmt);
mysqli_stmt_bind_result($notificationStmt, $notification);
$notifications = array();
while (mysqli_stmt_fetch($notificationStmt)) {
    $notifications[] = $notification;
}
mysqli_stmt_close($notificationStmt);

mysqli_close($conn);

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
       
        <?php
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
     
        <p><?php echo $notificationMessage; ?></p>
    </div>

    <div id="performanceDiv" style="display: none;">
      
        <?php
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
     
        <?php
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
