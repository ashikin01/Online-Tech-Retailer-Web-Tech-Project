<?php
session_start();


$completedTasks = 20;
$failedTasks = 1;
$incompleteTasks = 2;
$totalTasks = 23;
$performanceRating = round(($completedTasks / $totalTasks) * 100); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Report</title>
    <link rel="stylesheet" type="text/css" href="TaskReport.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['User_Name']; ?></h1>

    <div class="container">
        <div class="feedback-form">
            <h2>Feedback to Admin</h2>
            <textarea id="feedback" rows="10" placeholder="Write your feedback here (at least 100 words)"></textarea>
            <button onclick="submitFeedback()">Submit task report to admin</button>
        </div>

        <div class="admin-feedback">
            <h2>Admin Feedback</h2>
            <p>Completed Tasks: <?php echo $completedTasks; ?></p>
            <p>Failed Tasks: <?php echo $failedTasks; ?></p>
            <p>Incomplete Tasks: <?php echo $incompleteTasks; ?></p>
            <p>Performance Rating: <?php echo $performanceRating; ?>%</p>
        </div>

    </div>

      <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" value="<=Back to Home"></a>
    <!-- JavaScript for submitting feedback -->
    <script>
        function submitFeedback() {
            var feedback = document.getElementById("feedback").value;
            // Check if feedback meets minimum word requirement
            var wordCount = feedback.trim().split(/\s+/).length;
            if (wordCount < 100) {
                alert("Please write at least 100 words in the feedback.");
                return;
            }
            
            console.log("Feedback submitted:", feedback);
        }
    </script>
</body>
</html>
