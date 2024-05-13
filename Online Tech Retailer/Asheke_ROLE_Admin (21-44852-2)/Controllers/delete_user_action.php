<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $sql=$conn->prepare("delete from customer where id=?");
    $sql->bind_param("i",$id);
    $sql->execute();

   if($db_error === true){       
      $db_error_message= $conn->connect_error;
      $_SESSION["$db_error_message"]=$conn->connect_error;
      header("location: ../Views/manage_user.php");
  }
  else
   header("location: ../Views/manage_user.php");
  
    
  }
  else{
    
  }

 

