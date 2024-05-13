<?php
    session_start();
    include "../Model/db_config2.php";

    
    $name="";
    $err_name="";
    $username=""; 
    $err_username="";
    $email="";
    $err_email="";
    $phone_number="";
    $err_phone_number="";
    $password="";
    $err_password="";

       
    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $has_db_error=false;

        
        
        $name=sanitize($_POST["name"]);

        if(empty($name)){
            $err_name="Name Required";
            $_SESSION['err_name']=$err_name;
            $has_error=true;            
        }

        else if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $err_name="Only letters and white space allowed";
            $_SESSION['err_name']=$err_name;
            $has_error=true;           
        }
       

    

        $username=sanitize($_POST["username"]);

        if(empty($username)){
            $err_username="Username Required";
            $_SESSION['err_username']=$err_username;
            $has_error=true;   
        }

        else if (!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
            $err_username="Username must be 4-20 characters and contain only letters and numbers";
            $_SESSION['err_username']=$err_username;
            $has_error=true;           
        }        
        

          
        $email=sanitize($_POST["email"]);

        if(empty($email)){
            $err_email="Email Required";
            $_SESSION['err_email']=$err_email;
            $has_error=true;   
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err_email="Email format is incorrect";
            $_SESSION['err_email']=$err_email;
            $has_error=true;           
        }
      
    
        
        $phone_number=sanitize($_POST["phone_number"]);

        if(empty($phone_number)){
            $err_phone_number="Phone number required";
            $_SESSION["err_phone_number"]=$err_phone_number;
            $has_error=true;
        }

        else if(!preg_match("/^01[0-9]{9}$/",$phone_number)){
            $err_phone_number="Invalid phone number format (e.g., 01812345678)";
            $_SESSION['err_phone_number']=$err_phone_number;
            $has_error=true;           
        }
    
     


 
                  
    }

  


        if($has_error==false){
            $edit_id=$_SESSION['edit_id'];
            $sql=$conn->prepare("update admin_users set id=?,name=?,username=?,email=?,phone_number=? where id=?");
            $sql->bind_param("issssi",$edit_id,$name,$username,$email,$phone_number,$edit_id);
            $sql->execute();
            
        

            if($db_error === true){       
                $db_error_message= $conn->connect_error;
                $_SESSION["$db_error_message"]=$conn->connect_error;
                header("location: ../Views/edit_profile.php");
            }
            else{               
                header("location: ../Views/profile.php");
            }
            

        }    
        else{
            header("location: ../Views/edit_profile.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>