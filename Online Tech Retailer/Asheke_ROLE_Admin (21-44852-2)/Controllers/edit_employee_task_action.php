<?php
session_start();
include "../Model/db_config2.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $edit_employee_task_id=$_SESSION['edit_employee_task_id'];

    $null_value=null;
    $task_title=$_POST["task_title"];
    $task_description=$_POST["task_description"];
    $status='Not Started';

    $null_value=null;

   
            $sql=$conn->prepare("update tasks set tid=?,title=?,description=? where tid=?");
            $sql->bind_param("issi",$edit_employee_task_id,$task_title,$task_description,$edit_employee_task_id);
            $sql->execute();

   

    echo "<script type='text/javascript'>alert('Task edited successfully..'); window.location.href=' ../Views/manage_employee_task.php?manage_employee_task_user_id=$_SESSION[manage_employee_task_user_id]';</script>";
  


}