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
            $err_employee_id="Employee PIN Required";
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

    

    
       



        
        $sql=$conn->prepare("select * from employees where `Employee PIN`=?");
        $sql->bind_param("s",$employee_id);
        $sql->execute();
        $data=$sql->get_result();


        
        if(mysqli_num_rows($data)>0){
            $has_error=true;
            $err_category="This PIN is already taken";
            $_SESSION['err_employee_id']= $err_employee_id;
        }

  
 
            
                  
    }

  





        if($has_error==false){

            $sql=$conn->prepare("insert into employees values(null,?,?,?,?,?,?)");
            $rating=0;
            $sql->bind_param("ssssss",$name,$employee_id,$email,$salary,$bonus,$rating);
            $sql->execute();

            
            $db_error= true;

            if($db_error === true){       
            header("location: ../Views/manage_employees.php");
            }
            else{
               
            }
            

        }    
        else{
            header("location: ../Views/add_employees.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

   