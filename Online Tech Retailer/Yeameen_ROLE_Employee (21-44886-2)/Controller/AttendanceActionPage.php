<?php
session_start();
include("../Model/ECon.php");


$query="SELECT Eid from employee_dash ed, employee_attendance eda WHERE ed.Eid=eda.EID";
$result = mysqli_query ($conn,$query);
while ($row = mysqli_fetch_assoc($result))
{
    
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
