<?php
    session_start();
    include "../Model/db_config2.php";

       
    $new_password="";
    $err_new_password="";
    $otp="";
    $err_otp="";
    $username="";
    $err_username="";
   
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
      
        $otp=sanitize($_POST["otp"]);
        $new_password=sanitize($_POST["new_password"]);
        $username=sanitize($_POST["username"]);
        



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

        
        if(empty($otp)){
            $err_otp="OTP Required";
            $_SESSION['err_otp']=$err_otp;
            $has_error=true;   
        }

        else if($otp!=1964){
            $err_otp="OTP Wrong";
            $_SESSION['err_otp']=$err_otp;
            $has_error=true;   
        }
        

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
       
        $sql=$conn->prepare("select * from admin_users where username=?");
        $sql->bind_param("s",$username);
        $sql->execute();
        $data=$sql->get_result();

       
        
        if(mysqli_num_rows($data)>0){
            
           
        }
        else{
            $err_username="username wrong";
            $_SESSION['err_username']=$err_username;
            $has_error=true;
        }
       
        if(mysqli_num_rows($data)>0){
            
           
        }
        else{
            $has_error=true;
        }
       

           
                  
    }
    else{}

  





        if($has_error==false){

            $sql=$conn->prepare("update admin_users set passsword=? where username=?");
            $sql->bind_param("ss",$new_password,$username);
            $sql->execute();
        

            $_SESSION['password']=$new_password;
            

            echo "<script type='text/javascript'>alert('Password Reset successfully..'); window.location.href=' ../Views/login.php';</script>";
            

        }    
        else{
            header("location: ../Views/forget_password.php");
        }

      


    

        
     


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>