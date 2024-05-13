<?php 
  

  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  else{
  echo "<h1 style='text-align:center'>Welcome ".$_SESSION['username']."</h1>";
  }

?>
<html>
  <body>   
      <link rel="stylesheet" href="../CSS/header_before_login.css">
      <h1 align='right'><button class="logout-button"><a href="logout.php">Log out</a></button></h1>
  </body>
</html>