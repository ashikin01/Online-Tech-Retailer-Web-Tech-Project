<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config.php";



$employees_salary="SELECT SUM(salary) AS employee_salary FROM employees";
$employees_salary_data_array=get($employees_salary);

$employees_bonus="SELECT SUM(salary) AS employee_bonus FROM employees";
$employees_bonus_data_array=get($employees_bonus);

$employees_total="SELECT SUM(salary + bonus) AS total_employee_expense FROM employees";
$employees_total_data_array=get($employees_total);


$delivery_man_salary="SELECT SUM(salary) AS delivery_man_salary FROM delivery_men";
$delivery_man_salary_data_array=get($delivery_man_salary);

$delivery_man_bonus="SELECT SUM(bonus) AS delivery_man_bonus FROM delivery_men";
$delivery_man_bonus_data_array=get($delivery_man_bonus);


$delivery_man_total="SELECT SUM(salary + bonus) AS total_delivery_man_expense FROM delivery_men";
$delivery_man_total_data_array=get($delivery_man_total);


?>

<html>

<head>

<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Total Expense</legend>

  
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>Total Employee Salaries</td>                            
        <td><b>Total Employee Bonuses</td>                            
        <td><b>Total Employee Expense</td>                            
        <td><b>Total Delivery Man Salaries</td>
        <td><b>Total Delivery Man Bonuses</td>
        <td><b>Total Delivery Man Expense</td>
        <td><b>Total Expense</td>
    
     
        
    </tr>
    <tr>

    <?php foreach($employees_salary_data_array as $row){ ?>
      
      <td><?php echo $row['employee_salary'] ?></td>                          
                

    <?php } ?>

    <?php foreach($employees_bonus_data_array as $row){ ?>
      
      <td><?php echo $row['employee_bonus'] ?></td>                          
                

    <?php } ?>

    <?php global $e; ?>
    <?php foreach($employees_total_data_array as $row){ ?>
      
        <td><?php echo $row['total_employee_expense'] ?></td>                          
        <?php $e= $row['total_employee_expense'] ?>                         
                  

    <?php } ?>

   
    <?php foreach($delivery_man_salary_data_array as $row){ ?>
      
        <td><?php echo $row['delivery_man_salary'] ?></td>                          
                  

    <?php } ?>

    <?php foreach($delivery_man_bonus_data_array as $row){ ?>
      
        <td><?php echo $row['delivery_man_bonus'] ?></td>                          
                  

    <?php } ?>

    <?php foreach($delivery_man_total_data_array as $row){ ?>
      
        <td><?php echo $row['total_delivery_man_expense'] ?></td>                          
        <?php $d= $row['total_delivery_man_expense'] ?>                          
        <td><?php 
        $t=$e+$d; 
        echo $t;
        
        ?></td>                          
                  

    <?php } ?>

    

   

    </tr>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>