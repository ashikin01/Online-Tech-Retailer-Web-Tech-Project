<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}
                                                                                                                                                                                                                                                

if(isset($_GET['add_delivery_man_task_user_id'])){
$add_delivery_man_task_user_id=$_GET['add_delivery_man_task_user_id'];
$_SESSION['add_delivery_man_task_user_id']=$add_delivery_man_task_user_id;


}
?>



<html>
<head>
  <title>Delivery Man Task List</title> 
  <link rel="stylesheet" href="../CSS/edit_task.css">
  <script type="text/javascript" src="js/add_delivery_man_task.js"></script>
</head>
<body>
  
  <h4>Add a New Task</h4>
  <form action="../Controllers/add_delivery_man_task_action.php" method="POST" onsubmit="return validate();" novalidate>
    <table>
    <tr>
    <td><label for="task_title">Task Title</label></td>
    <td>:</td>
    <td><input type="text" id="task_title" name="task_title" placeholder="Enter task title here">
    
    <span class="error" id="err_task_title">
        <?php
            if (isset($_SESSION['err_task_title'])) {
            echo $_SESSION['err_task_title'];                           
            }
            unset($_SESSION['err_task_title']);
        ?>
    </span>
    
    <br></td>
    </tr>

    <tr>
    <td><label for="task_description">Task Description</label></td>
    <td>:</td>
    <td><textarea id="task_description" name="task_description" placeholder="Enter detailed task description"></textarea>
    
    <span class="error" id="err_task_description">
        <?php
            if (isset($_SESSION['err_task_description'])) {
            echo $_SESSION['err_task_description'];                           
            }
            unset($_SESSION['err_task_description']);
        ?>
    </span>
    
    
    <br></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
       <td align="right"> <input type="submit" value="Add Task"> </td>
    </tr>
    </table>
  </form>

  <?php include("footer.php"); ?>
</body>
</html>
