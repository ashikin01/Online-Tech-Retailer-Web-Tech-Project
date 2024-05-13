<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config.php";

$query="select * from employees";
$employees_data_array=get($query);

?>

<html>

<head>

<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Manage Employees</legend>

    <tr>                            
        <td align='center'><a href="add_employees.php"><input type="button" name="add_employee" value="Add Employees"></a></td>
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>Serial</td>                            
        <td><b>Name</td>
        <td><b>PIN</td>
        <td><b>Email</td>
        <td><b>Salary</td>
        <td><b>Bonus</td>
        <td><b>Rating</td>
        <td colspan="5"><b>Action</td>
        
    </tr>
    <?php foreach($employees_data_array as $row){ ?>
    <tr>  
        <td><?php echo $row['ID'] ?></td>                          
        <td><?php echo $row['Name'] ?></td>
        <td><?php echo $row['Employee PIN'] ?></td>
        <td><?php echo $row['Email'] ?></td>
        <td><?php echo $row['Salary'] ?></td>     
        <td><?php echo $row['Bonus'] ?></td>        
        <td><?php echo $row['Rating'] ?></td>        
        <td><button><a href="add_employee_task.php?add_employee_task_user_id=<?php echo $row['ID'] ?>">Add Task</a></button></td>      
        <td><button><a href="manage_employee_task.php?manage_employee_task_user_id=<?php echo $row['ID']?>">Manage Tasks</a></button></td>      
        <td><button><a href="rating_employees.php?rating_employee_user_id=<?php echo $row['ID'] ?>">Set Rating</a></button></td>      
        <td><button><a href="edit_employees.php?edit_id=<?php echo $row['ID'] ?>">Edit</a></button></td>     
        <td><button><a href="../Controllers/delete_employees_action.php?delete_id=<?php echo $row['ID']?>">Delete</a></button></td>     
    </tr>
   

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>