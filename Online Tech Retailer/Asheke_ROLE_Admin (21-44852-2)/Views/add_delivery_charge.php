<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}
                                                                                                                                                                                                                                                

if(isset($_GET['add_delivery_charge_edit_id'])){
$add_delivery_charge_edit_id=$_GET['add_delivery_charge_edit_id'];
$_SESSION['add_delivery_charge_edit_id']=$add_delivery_charge_edit_id;


}
?>



<html>
<head>
  <title>Delivery Charge</title> 
  <link rel="stylesheet" href="../CSS/edit_task.css">
  <script type="text/javascript" src="js/add_delivery_charge.js"></script>
</head>
<body>
  
  <h4>Add Delivery Charge for this Product:</h4>
  <form action="../Controllers/add_delivery_charge_action.php" method="POST" onsubmit="return validate();" novalidate>
    <table>
    <tr>
    <td><label for="delivery_charge">Delivery Charge</label></td>
    <td>:</td>
    <td><input type="number" id="delivery_charge" name="delivery_charge" placeholder="Enter delivery charge">
    
    <span class="error" id="err_delivery_charge">
        <?php
            if (isset($_SESSION['err_delivery_charge'])) {
            echo $_SESSION['err_delivery_charge'];                           
            }
            unset($_SESSION['err_delivery_charge']);
        ?>
    </span>
    
    
    <br></td>
    </tr>


    <tr>
       <td> <input type="submit" value="Add Task"> </td>
    </tr>
    </table>
  </form>

  <?php include("footer.php"); ?>
</body>
</html>
