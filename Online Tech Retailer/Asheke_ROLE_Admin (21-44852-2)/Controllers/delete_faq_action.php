<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_faq_id'])){
    $id=$_GET['delete_faq_id'];

    $sql=$conn->prepare("delete from faq where ID=?");
    $sql->bind_param("i",$id);
    $sql->execute();

   
    $result=true;

    if($result==true){   
      echo "<script type='text/javascript'>alert('Faq Deleted Successfully..'); window.location.href=' ../Views/faq.php';</script>";   
      
    }
    else{
        
    }
    
  }
  else{
    
  }

 

