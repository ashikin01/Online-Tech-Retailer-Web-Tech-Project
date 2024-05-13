<?php
    session_start();
    include "../Model/db_config2.php";

    
    $name="";
    $err_name="";
    $employee_id=""; 
    $err_employee_id="";
    $email="";
    $err_email="";
    $salary="";
    $err_salary="";
    $bonus="";
    $err_bonus="";
    $db_error_message="";

     

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
       


    

        $employee_id=sanitize($_POST["employee_id"]);

        if(empty($employee_id)){
            $err_employee_id="Employee ID Required";
            $_SESSION['err_employee_id']=$err_employee_id;
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
            
       
        $salary=sanitize($_POST["salary"]);

        if(empty($salary)){
            $err_salary="Salary required";
            $_SESSION["err_salary"]=$err_salary;
            $has_error=true;
        }


        $bonus=sanitize($_POST["bonus"]);

        if(empty($bonus)){
            $err_bonus="Bonus required";
            $_SESSION["err_bonus"]=$err_bonus;
            $has_error=true;
        }
       

 
                  
    }

  

        if($has_error==false){
            $edit_id=$_SESSION['edit_id'];

            $sql=$conn->prepare("update employees set ID=?,Name=?,`Employee PIN`=?,Email=?,Salary=?, Bonus=? where ID=?");
            $sql->bind_param("isssssi",$edit_id,$name,$employee_id,$email,$salary,$bonus,$edit_id);
            $sql->execute();
            
            $db_error= true;


            

            if($db_error === true){       
            header("location: ../Views/manage_employees.php");
            }
           /* else{
                $db_error_message=$db_error;
                $_SESSION["$db_error_message"]=$db_error_message;
                header("location: ../Views/edit_employees.php");
            }
            */

        }    
        else{
            header("location: ../Views/edit_employees.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>