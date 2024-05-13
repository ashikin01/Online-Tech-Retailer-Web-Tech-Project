<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config2.php";

if(isset($_GET['manage_delivery_man_task_user_id'])){
    $manage_delivery_man_task_user_id=$_GET['manage_delivery_man_task_user_id'];
    $_SESSION['manage_delivery_man_task_user_id']=$manage_delivery_man_task_user_id;
    
    
    }


    $sql=$conn->prepare("select * from delivery_man_tasks where uid=?");
    $sql->bind_param("i",$manage_delivery_man_task_user_id);
    $sql->execute();
    $data=$sql->get_result();


$delivery_man_data_array=$data;

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
    foreach($delivery_man_data_array as $row){ ?>
    <tr>  
        <td><?php echo $sno ?></td>                          
        <td><?php echo $row['tid'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><button><a href="full_delivery_man_description.php?description_id=<?php echo $row['tid'] ?>">CLICK to See Full Instruction</a></button></td>
        <td><?php echo $row['status'] ?></td>         
        <td><button><a href="delivery_man_task_feedback.php?feedback_task_id=<?php echo $row['tid'] ?>">Click To See Feedback</a></button></td>     
        <td><button><a href="edit_delivery_man_tasks.php?edit_delivery_man_task_id=<?php echo $row['tid'] ?>">Edit</a></button></td>     
        <td><button><a href="../Controllers/delete_delivery_man_task_action.php?delete_delivery_man_task_id=<?php echo $row['tid']?>&manage_delivery_man_task_user_id=<?php echo $manage_delivery_man_task_user_id?>">Delete</a></button></td>     
    </tr>
   
    <?php $sno=$sno+1; ?>

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>