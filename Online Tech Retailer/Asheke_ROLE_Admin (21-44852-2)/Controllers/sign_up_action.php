<?php
    session_start();
    include "../Model/db_config2.php";

    
    $name="";
    $err_name="";
    $username=""; 
    $err_username="";
    $password="";
    $err_password="";
    $confirm_password="";
    $err_confirm_password="";
    $email="";
    $err_email="";
    $phone_number="";
    $err_phone_number="";
    $db_error_message="";

    
    

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
     

        
        
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
            $err_username="User Name Required";
            $_SESSION['err_username']=$err_username;
            $has_error=true;   
        }

        else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
            $err_username="Username must be 4-20 characters and contain only letters and numbers";
            $_SESSION['err_username']=$err_username;
            $has_error=true;           
        }       
       

    

        $password=sanitize($_POST["password"]);
        $confirm_password=sanitize($_POST["confirm_password"]);

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

        else if($confirm_password!=$password){
            $err_password="Password & Confirm password didn't matched";
            $_SESSION['err_password']=$err_password;
            $has_error=true;
        }
        





        if(empty($confirm_password)){
            $err_confirm_password="Confirm Password Required";
            $_SESSION['err_confirm_password']=$err_confirm_password;
            $has_error=true;   
        }

        else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$confirm_password)){
            $err_confirm_password="Confirm Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
            $_SESSION['err_confirm_password']=$err_confirm_password;
            $has_error=true;           
        }
        else if($confirm_password!=$password){
            $err_confirm_password="Password & Confirm password didn't matched";
            $_SESSION['err_confirm_password']=$err_confirm_password;
            $has_error=true; 
        }
        
        
                
    


        
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
      



        $sql=$conn->prepare("select * from admin_users where username=?");
        $sql->bind_param("s",$username);
        $sql->execute();
        $count_username=$sql->get_result();
        
        if(mysqli_num_rows($count_username)>0){
            $has_error=true;
            $err_username="This username is already taken";
            $_SESSION['err_username']= $err_username;
        }
     

        $sql=$conn->prepare("select * from admin_users where email=?");
        $sql->bind_param("s",$email);
        $sql->execute();
        $count_email=$sql->get_result();

       
        
        if(mysqli_num_rows($count_email)>0){
            $has_error=true;
            $err_email="This email is already taken";
            $_SESSION['err_email']= $err_email;
        }
      

        $sql=$conn->prepare("select * from admin_users where phone_number=?");
        $sql->bind_param("s",$phone_number);
        $sql->execute();
        $count_phone_number=$sql->get_result();


        
        if(mysqli_num_rows($count_phone_number)>0){
            $has_error=true;
            $err_phone_number="This phone number is already taken";
            $_SESSION['err_phone_number']= $err_phone_number;
        }






        if (isset($_POST['save_as_draft'])) {
            setcookie("name", $name, time() + 60, "/");
            setcookie("username", $username, time() + 60, "/");
            setcookie("email", $email, time() + 60, "/");
            setcookie("phone_number", $phone_number, time() + 60, "/");
            $has_error=true;
            
        } 
        
  
            
                  
    }

  





        if($has_error==false){

            $sql=$conn->prepare("insert into admin_users values(?,?,?,?,?,?)");
            $sql->bind_param("ssssss",$name,$username,$password,$email,$phone_number);
            $sql->execute();
            header("location: ../Views/login.php");
           
            

        }    
        else{
            header("location: ../Views/sign_up.php");
        }

      


      

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>