<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}



if(isset($_GET['feedback_task_id'])){
$feedback_task_id=$_GET['feedback_task_id'];
$_SESSION['feedback_task_id']=$feedback_task_id;


$sql=$conn->prepare("select feedback from tasks where tid=?");

$sql->bind_param("i",$feedback_task_id);
$sql->execute();
$employees_data_array=$sql->get_result();



foreach($employees_data_array as $row){

echo $row['feedback'];                                                                                                                                                                                                                                               
                                                                                                                                                                                                                                           

}


}

include("footer.php"); 


?>