<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    $sql=$conn->prepare("delete from employees where ID=?");
    $sql->bind_param("i",$id);
    $sql->execute();

   
    $result=true;

    if($result==true){   
      echo "<script type='text/javascript'>alert('Employee Deleted Successfully..'); window.location.href=' ../Views/manage_employees.php';</script>";   
      
    }
    else{
        
    }
    
  }
  else{
    
  }

 

