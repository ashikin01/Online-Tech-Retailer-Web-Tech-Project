<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}

$name="";                                                                                                                                                                                                                                                
$employee_id="";                                                                                                                                                                                                                                                
$email="";                                                                                                                                                                                                                                                
$salary="";                                                                                                                                                                                                                                                
$bonus="";  

if(isset($_GET['edit_id'])){
$edit_id=$_GET['edit_id'];
$_SESSION['edit_id']=$edit_id;



$sql=$conn->prepare("select * from employees where ID=?");
$sql->bind_param("i",$edit_id);
$sql->execute();
$employees_data_array=$sql->get_result();



foreach($employees_data_array as $row){
$name=$row['Name'];                                                                                                                                                                                                                                                
$employee_id=$row['Employee PIN'];                                                                                                                                                                                                                                                
$email=$row['Email'];                                                                                                                                                                                                                                                
$salary=$row['Salary'];                                                                                                                                                                                                                                                
$bonus=$row['Bonus'];   
                                                                                                                                                                                                                                           

}


}


?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/edit_employees.css">
    <script type="text/javascript" src="js/edit_employees.js"></script>
    </head>
    <body>
    <form action="../Controllers/edit_employees_action.php" method="post" onsubmit="return validate();"  novalidate; >
                
                <fieldset>
                <table>
                    <legend>Edit Employee</legend>
                  
                    
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                        <span class="error" id="err_name">
                            <?php
                            if (isset($_SESSION['err_name'])) {
                                echo $_SESSION['err_name'];                           
                            }
                            unset($_SESSION['err_name']);
                            ?>
                        </span>
                        </td>                    
                    </tr>
     
                    
                    <tr>
                        <th><label for="employee_id">Employee PIN</label></th>
                        <td>:</td>
                        <td><input type="number" id="employee_id" name="employee_id" placeholder="Employee ID" value="<?php echo $employee_id ;?>">
                        <span class="error" id="err_employee_id">
                            <?php
                            if (isset($_SESSION['err_employee_id'])) {
                                echo $_SESSION['err_employee_id'];
                                
                            }
                            unset($_SESSION['err_employee_id']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
    
    
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td>:</td>
                        <td><input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email ;?>">
                        <span class="error" id="err_email">
                            <?php
                            if (isset($_SESSION['err_email'])) {
                                echo $_SESSION['err_email'];
                                
                            }
                            unset($_SESSION['err_email']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
                    <tr>
                        <th><label for="salary">Salary</label></th>
                        <td>:</td>
                        <td><input type="number" id="salary" name="salary" placeholder="Salary" value="<?php echo $salary ;?>">
                        <span class="error" id="err_salary">
                            <?php
                            if (isset($_SESSION['err_salary'])) {
                                echo $_SESSION['err_salary'];
                                
                            }
                            unset($_SESSION['err_salary']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
              
                    <tr>
                        <th><label for="bonus">Bonus</label></th>
                        <td>:</td>
                        <td><input type="number" id="bonus" name="bonus" placeholder="Bonus" value="<?php echo $bonus ;?>">
                        <span class="error" id="err_bonus">
                            <?php
                            if (isset($_SESSION['err_bonus'])) {
                                echo $_SESSION['err_bonus'];
                                
                            }
                            unset($_SESSION['err_bonus']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
                       
                    <tr>
                        <td></td>
                        <td></td>               
                        <td align="right"><input type="submit" value="Update"></td>
                    </tr>
    
                </table>
                </fieldset>
            </form>
            <?php include("footer.php"); ?>



    </body>
</html>