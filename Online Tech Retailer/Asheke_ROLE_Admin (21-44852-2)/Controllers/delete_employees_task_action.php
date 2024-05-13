<?php 
   
   include "../Model/db_config2.php";

  if(isset($_GET['delete_employee_task_id'])){
    $delete_employee_task_id=$_GET['delete_employee_task_id'];
    $manage_employee_task_user_id=$_GET['manage_employee_task_user_id']; 
    $sql=$conn->prepare("delete from delivery_man_tasks where tid=?");
    $sql->bind_param("i",$delete_employee_task_id);
    $sql->execute();

   
    $result=true;

    if($result==true){      
        echo "<script type='text/javascript'>alert('Task deleted successfully..'); window.location.href=' ../Views/manage_employee_task.php?manage_employee_task_user_id=$manage_employee_task_user_id';</script>";
    }
    else{
        
    }
    
  }
  else{
    
  }
