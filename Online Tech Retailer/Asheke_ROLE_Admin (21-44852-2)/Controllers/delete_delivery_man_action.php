<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    $sql=$conn->prepare("delete from delivery_men where ID=?");
    $sql->bind_param("i",$id);
    $sql->execute();

   
    $result=true;

    if($result==true){   
      echo "<script type='text/javascript'>alert('Delivery Man Deleted Successfully..'); window.location.href=' ../Views/manage_delivery_man.php';</script>";   
      
    }
    else{
        
    }
    
  }
  else{
    
  }

 

