<?php
    session_start();
    include "../Model/db_config2.php";   
    
    $username=""; 
    $err_username="";
    $password="";
    $err_password="";
      

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        
        
        $username=sanitize($_POST["username"]);

        if(empty($username)){
            $err_username="User Name Required";
            $_SESSION['err_username']=$err_username;
            $has_error=true;   
        }

        else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
            $err_username="Username must be 4-20 characters and contain only letters and numbers";
            $_SESSION['err_username']=$err_username;
            $has_error=true;           
        }       
        else{
            setcookie("username", $username, time() + 60, "/");
          
        }

    

        $password=sanitize($_POST["password"]);
        

        if(empty($password)){
            $err_password="Password Required";
            $_SESSION['err_password']=$err_password;
            $has_error=true;   
        }

        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
            $err_password="Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_password']=$err_password;
            $has_error=true;           
        }        
        else{
           
        }

        
    }
    else{
        
    }

   

        if($has_error==false){

            $sql=$conn->prepare("select * from admin_users where username=? and passsword=?");
            $sql->bind_param("ss",$username,$password);
            $sql->execute();
            $data=$sql->get_result();

           
            
            if(mysqli_num_rows($data)>0){
                
                $_SESSION['username']=$username;
                header("location: ../Views/admin_panel.php");
               
            }
            else{
                
                $err_username="Username and Password didn't matched";
                $_SESSION['err_username']= $err_username;
                header("location: ../Views/login.php");

            }
                
    
        } 
        else{
            header("location: ../Views/login.php");
        }
              
        
                  
   

    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

  
  
?>


      
   
