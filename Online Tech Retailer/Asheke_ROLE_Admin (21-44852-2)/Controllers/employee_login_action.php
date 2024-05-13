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

    

        $password=sanitize($_POST["password"]);
        

        if(empty($password)){
            $err_password="Password Required";
            $_SESSION['err_password']=$err_password;
            $has_error=true;   
        }     

        
    }
    else{
        
    }

   

        if($has_error==false){

            $sql=$conn->prepare("select * from employees where Name=? and `Employee PIN`=?");
            $sql->bind_param("ss",$username,$password);
            $sql->execute();
            $data=$sql->get_result();

            foreach($data as $row){    
                $_SESSION['uid_employee']=$row['ID'];                                          
            } 
      
  
           
            
            if(mysqli_num_rows($data)>0){
                       
                $_SESSION['employee_username']=$username;
                header("location: ../Views/see_employee_tasks.php");
               
            }
            else{
                
                $err_username="Username and Password didn't matched";
                $_SESSION['err_username']= $err_username;
                header("location: ../Views/employee_login.php");

            }
                
    
        } 
        else{
            header("location: ../Views/employee_login.php");
        }
              
        
                  
   

    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

  
  
?>


      
   
