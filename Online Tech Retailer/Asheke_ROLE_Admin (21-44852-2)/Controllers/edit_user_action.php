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
        else
        $has_error=false;


    

        $username=sanitize($_POST["username"]);

        if(empty($username)){
            $err_username="Username Required";
            $_SESSION['err_username']=$err_username;
            $has_error=true;   
        }

        else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
            $err_username="Username must be 4-20 characters and contain only letters and numbers";
            $_SESSION['err_username']=$err_username;
            $has_error=true;           
        }        
        else
            $has_error=false;

          
        $email=sanitize($_POST["email"]);

        if(empty($email)){
            $err_email="Email Required";
            $_SESSION['err_email']=$err_email;
            $has_error=true;   
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err_email="Email format is incorrect";
            $_SESSION['err_email']=$err_email;
            $has_error=true;           
        }
        else{
        $has_error=false;
        }
    

      
        $password=sanitize($_POST["password"]);

        if(empty($password)){
            $err_password="Phone number required";
            $_SESSION["err_password"]=$err_password;
            $has_error=true;
        }
        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
            $err_password="Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_password']=$err_password;
            $has_error=true;           
        }
        else{
            
            $has_error=false;
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
    
        else{
            
            $has_error=false;
        }


 
                  
    }

  


        if($has_error==false){
            $edit_id=$_SESSION['edit_id'];
            $sql=$conn->prepare("update customer set Id=?,Full_Name=?,Username=?,Password=?,Email=?,Phone=? where Id=?");
            $sql->bind_param("isssssi",$edit_id,$name,$username,$password,$email,$phone_number,$edit_id);
            $sql->execute();
            
        

            if($db_error === true){       
                $db_error_message= $conn->connect_error;
                $_SESSION["$db_error_message"]=$conn->connect_error;
                header("location: ../Views/edit_user.php");
            }
            else{               
                header("location: ../Views/manage_user.php");
            }
            

        }    
        else{
            header("location: ../Views/edit_user.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>