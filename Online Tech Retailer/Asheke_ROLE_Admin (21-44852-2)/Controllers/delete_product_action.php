<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_id'])){

   $id=$_GET['delete_id'];
   $sql=$conn->prepare("delete from product_datas where id=?");
   $sql->bind_param("i",$id);
   $sql->execute();
   

    
    $result=true;

    if($result==true){      
       header("location: ../Views/manage_product.php");
    }
    else{
        
    }
    
  }
  else{
    
  }

 

