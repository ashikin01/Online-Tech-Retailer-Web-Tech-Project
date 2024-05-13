<?php
    session_start();
    include "../Model/db_config2.php";

       
    $new_password="";
    $err_new_password="";
    $old_password="";
    $err_old_password="";
    $confirm_new_password="";
    $err_confirm_new_password="";
   
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $password=$_SESSION['password']; 
        $old_password=sanitize($_POST["old_password"]);
        $new_password=sanitize($_POST["new_password"]);
        $confirm_new_password=sanitize($_POST["confirm_new_password"]);



        if(empty($new_password)){
            $err_new_password="New Password Required";
            $_SESSION['err_new_password']=$err_new_password;
            $has_error=true;   
        }

        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$new_password)){
            $err_new_password="Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_new_password']=$err_new_password;
            $has_error=true;           
        }

        else if($confirm_new_password!=$new_password){
            $err_new_password="Password & Confirm password didn't matched";
            $_SESSION['err_new_password']=$err_new_password;
            $has_error=true;
        }
        



        if(empty($confirm_new_password)){
            $err_confirm_new_password="Confirm Password Required";
            $_SESSION['err_confirm_new_password']=$err_confirm_new_password;
            $has_error=true;   
        }

        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$confirm_new_password)){
            $err_confirm_new_password="Confirm Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_confirm_new_password']=$err_confirm_new_password;
            $has_error=true;           
        }
        else if($confirm_new_password!=$new_password){
            $err_confirm_new_password="Password & Confirm password didn't matched";
            $_SESSION['err_confirm_new_password']=$err_confirm_new_password;
            $has_error=true; 
        }
       
        
                
    
        if(empty($old_password)){
            $err_old_password="Old Password Required";
            $_SESSION['err_old_password']=$err_old_password;
            $has_error=true;   
        }

        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$old_password)){
            $err_old_password="Old Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_old_password']=$err_old_password;
            $has_error=true;           
        }

        else if($old_password!=$password){
            $err_old_password="Password didn't matched";
            $_SESSION['err_old_password']=$err_old_password;
            $has_error=true; 
        }

     
        
                

        
  
            
                  
    }
    else{}

  





        if($has_error==false){
            $sql=$conn->prepare("update admin_users set passsword=? where passsword=?");
            $sql->bind_param("ss",$new_password,$password);
            $sql->execute();
            $_SESSION['password']=$new_password;
            $_SESSION['old_password']=$old_password;
            header("location: ../Views/after_change_password.php");

        }    
        else{
            header("location: ../Views/change_password.php");
        }

      


    

        
     


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>