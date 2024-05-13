<?php
session_start();
include "../Model/db_config2.php";





if($_SERVER["REQUEST_METHOD"]=="POST"){

    

   


    $question_id = $_POST["question_id"];
    $answer=$_POST["answer"];
    $null_value=null;
   

    $sql=$conn->prepare("update customer_question set Question_Id=?,Answer=? where Question_Id=?");
    $sql->bind_param("isi",$question_id,$answer,$question_id);
    $sql->execute();

    echo "<script type='text/javascript'>alert('Answer added successfully..'); window.location.href=' ../Views/question_admin.php';</script>";
    


}



function sanitize($data){      
    $data=htmlspecialchars($data);
    return $data;
}