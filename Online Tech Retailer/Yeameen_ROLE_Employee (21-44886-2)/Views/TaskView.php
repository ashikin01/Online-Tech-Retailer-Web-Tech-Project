<?php


session_start();


include("../Model/ECon.php");




$errorMsg = ""; 

try {
  
  $sql = "SELECT task FROM employee_dash WHERE username = :username";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":username", $_SESSION['Username']);
  $stmt->execute();


  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $task = $row['task'];
  } else {
    $task = ""; 
  }
} catch(PDOException $e) {
  $errorMsg = "Error: " . $e->getMessage(); 
} finally {
 
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
