<?php 
session_start();
include "../Model/db_config2.php";


if(isset($_GET['description_id'])){
$description_id=$_GET['description_id'];
$_SESSION['description_id']=$description_id;



$sql=$conn->prepare("select description from tasks where tid=?");

$sql->bind_param("i",$description_id);
$sql->execute();
$employees_data_array=$sql->get_result();



foreach($employees_data_array as $row){

echo $row['description'];                                                                                                                                                                                                                                               
                                                                                                                                                                                                                                           

}


}

include("footer.php"); 


?>