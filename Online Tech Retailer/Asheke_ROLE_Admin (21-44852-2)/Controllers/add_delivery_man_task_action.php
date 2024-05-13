<?php
session_start();
include "../Model/db_config2.php";


$task_description="";
$err_task_description="";
$task_title="";
$err_task_title="";




if($_SERVER["REQUEST_METHOD"]=="POST"){

    $has_error=false;

    $task_title=sanitize($_POST["task_title"]);

    if(empty($task_title)){
        $err_task_title="Task Title Required";
        $_SESSION['err_task_title']=$err_task_title;
        $has_error=true;            
    }

        
    $task_description=sanitize($_POST["task_description"]);

    if(empty($task_description)){
        $err_task_description="Task description required";
        $_SESSION['err_task_description']=$err_task_description;
        $has_error=true;            
    }

        

   


}

if($has_error==false){
    $add_delivery_man_task_user_id=$_SESSION['add_delivery_man_task_user_id'];

    $null_value=null;
    $empty_string="No Feedback Added Yet";
    $task_title=$_POST["task_title"];
    $task_description=$_POST["task_description"];
    $status='Not Started';

    $sql=$conn->prepare("insert into delivery_man_tasks values(?,?,?,?,?,?)");
    $sql->bind_param("iissss",$null_value,$add_delivery_man_task_user_id,$task_title,$task_description,$status,$empty_string);
    $sql->execute();

    echo "<script type='text/javascript'>alert('Task created successfully..'); window.location.href=' ../Views/add_delivery_man_task.php?add_delivery_man_task_user_id=$_SESSION[add_employee_task_user_id]';</script>";
    
}

else{
  
   header("location: ../Views/add_delivery_man_task.php?add_delivery_man_task_user_id=$_SESSION[add_delivery_man_task_user_id]");
}



function sanitize($data){      
    $data=htmlspecialchars($data);
    return $data;
}