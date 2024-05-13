<?php
    session_start();
    include "../Model/db_config2.php";

    
    $rating="";
    $err_rating="";
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $has_db_error=false;

        
        $rating=sanitize($_POST["rating"]);

        if(empty($rating)){
            $err_rating="Rating Required";
            $_SESSION['err_rating']=$err_rating;
            $has_error=true;   
        }
       
                  
    }

  
        if($has_error==false){
            $rating_delivery_man_user_id=$_SESSION['rating_delivery_man_user_id'];

            $sql=$conn->prepare("update delivery_men set ID=?, Rating=? where ID=?");
            $sql->bind_param("isi",$rating_delivery_man_user_id,$rating,$rating_delivery_man_user_id);
            $sql->execute();
            
            $db_error= true;


            

            if($db_error === true){       
            header("location: ../Views/manage_delivery_man.php");
            }
           /* else{
                $db_error_message=$db_error;
                $_SESSION["$db_error_message"]=$db_error_message;
                header("location: ../Views/edit_delivery_man.php");
            }
            */

        }    
        else{
            header("location: ../Views/rating_delivery_man.php");
        }

      

    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>