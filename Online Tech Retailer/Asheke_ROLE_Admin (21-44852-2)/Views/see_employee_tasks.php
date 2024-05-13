<?php
session_start();
 


include "../Model/db_config2.php";
    
    $uid=$_SESSION['uid_employee'];

    $sql=$conn->prepare("select * from tasks where uid=?");
    $sql->bind_param("i",$uid);
    $sql->execute();
    $data=$sql->get_result();


$employees_data_array=$data;

?>



<html>

<head>
<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>     
    <legend>Manage Tasks</legend>  
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
    <tr>
        <th>S.NO</th>
        <th>Task ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Feedback</th>
        <th colspan="2" align="center">Action</th>
    
        </tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php 
    $sno=1;
    foreach($employees_data_array as $row){ ?>
    <tr>  
        <td><?php echo $sno ?></td>                          
        <td><?php echo $row['tid'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><button><a href="employee_full_employee_description.php?description_id=<?php echo $row['tid'] ?>">CLICK to See Full Instruction</a></button></td>
        <td><button><a href="change_status.php?change_status_id=<?php echo $row['tid'] ?>">Change Status</a></button></td>        
        <td><button><a href="employee_give_task_feedback.php?feedback_give_task_id=<?php echo $row['tid'] ?>">Click To Give Feedback</a></button></td>                  
    </tr>
   
    <?php $sno=$sno+1; ?>

    <?php } ?>

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>