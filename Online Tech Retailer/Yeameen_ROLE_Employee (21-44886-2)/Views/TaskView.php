<?php

// Start the session (assuming session is already started elsewhere)
session_start();

// Include the database connection file
include("../Model/ECon.php");

// Check if a user is logged in


$errorMsg = ""; // Initialize error message variable (though not used here)

try {
  


  // Prepare the SQL statement to fetch task
  $sql = "SELECT task FROM employee_dash WHERE username = :username";
  $stmt = $conn->prepare($sql);

  // Bind the username parameter
  $stmt->bindParam(":username", $_SESSION['Username']);

  // Execute the statement
  $stmt->execute();

  // Check if any results are found
  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $task = $row['task'];
  } else {
    $task = ""; // Set task to empty string if not found
  }
} catch(PDOException $e) {
  $errorMsg = "Error: " . $e->getMessage(); // You can display the error message if needed
} finally {
  // Close the connection
  $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard Task</title>
</head>
<body>

  <h2>Employee Task</h2>
  <p><?php echo $task; ?></p>

</body>
</html>
