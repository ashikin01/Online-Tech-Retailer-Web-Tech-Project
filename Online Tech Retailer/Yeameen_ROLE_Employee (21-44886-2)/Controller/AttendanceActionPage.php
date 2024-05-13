<?php
session_start();
include("../Model/ECon.php");

// Sample data for present and absent days (replace with actual data from database)
$presentDays = 23;
$absentDays = 7;

// Update present and absent days based on admin's actions
if (isset($_POST['refresh'])) {
    // Perform update operations here (e.g., fetch data from database)
    // For demonstration purposes, we'll just increment present and absent days by 1
    $presentDays++;
    $absentDays--;
}

// Increment present days count when "Give Attendance to Admin" button is clicked
if (isset($_POST['give_attendance'])) {
    // Perform update operations here (e.g., increment present days count)
    $presentDays++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" type="text/css" href="Attendance.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['User_Name']; ?></h1>

    <div>
        <h2>Attendance Summary</h2>
        <p>Present: <?php echo $presentDays; ?> days</p>
        <p>Absent: <?php echo $absentDays; ?> days</p>
    </div>

    <div>
        <form method="post">
            <input type="submit" name="refresh" value="Refresh">
        </form>
    </div>

    <!-- Form for giving attendance to admin -->
    <div>
        <form method="post">
            <input type="submit" name="give_attendance" value="Give Attendance to Admin">
        </form>
    </div>

    <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<=Back to Home"></a>

</body>
</html>
