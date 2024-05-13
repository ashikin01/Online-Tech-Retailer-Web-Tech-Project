<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}
                                                                                                                                                                                                                                                

if(isset($_GET['add_discount_edit_id'])){
$add_discount_edit_id=$_GET['add_discount_edit_id'];
$_SESSION['add_discount_edit_id']=$add_discount_edit_id;


}
?>



<html>
<head>
  <title>Discount</title> 
  <link rel="stylesheet" href="../CSS/edit_task.css">
  <script type="text/javascript" src="js/add_discount.js"></script>
</head>
<body>
  
  <h4>Add Discount for this Product:</h4>
  <form action="../Controllers/add_discount_action.php" method="POST" onsubmit="return validate();" novalidate>
    <table>
    <tr>
    <td><label for="discount">Discount</label></td>
    <td>:</td>
    <td><input type="number" id="discount" name="discount" placeholder="Discount">
    
    <span class="error" id="err_discount">
        <?php
            if (isset($_SESSION['err_discount'])) {
            echo $_SESSION['err_discount'];                           
            }
            unset($_SESSION['err_discount']);
        ?>
    </span>
    
    
    <br></td>
    </tr>


    <tr>
       <td> <input type="submit" value="Add Discount"> </td>
    </tr>
    </table>
  </form>

  <?php include("footer.php"); ?>
</body>
</html>
