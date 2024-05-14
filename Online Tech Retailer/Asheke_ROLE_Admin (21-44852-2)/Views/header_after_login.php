<?php 
  

  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  else{
  echo "<h1 style='text-align:center'>Welcome ".$_SESSION['username']."</h1>";
  }

?>
<html>
  <body>   
      <link rel="stylesheet" href="../CSS/header_after_login.css">



                      <tr>          
                    <td><a href="profile.php"><input type="button" name="profile" value="Profile"></a></td>
              

                                        
                    <td><a href="manage_employees.php"><input type="button" name="manage_employees" value="Manage Employees"></a></td>
              

                                         
                    <td><a href="manage_product.php"><input type="button" name="manage_product" value="Manage Products"></a></td>
               

                                          
                    <td><a href="manage_user.php"><input type="button" name="manage_uses" value="Manage Customers"></a></td>
           

               

      
                                          
                    <td><a href="manage_delivery_man.php"><input type="button" name="manage_delivery_man" value="Manage Delivery Man"></a></td>
              

      
                                          
                    <td><a href="faq.php"><input type="button" name="faq" value="FAQ"></a></td>
            

                                         
                    <td><a href="question_admin.php"><input type="button" name="question_admin" value="Customers Questions"></a></td>
               

           
                                         
                    <td><a href="expense_calculation.php"><input type="button" name="expense_calculation" value="Expense Calculation"></a></td>
              

                                         
                    <td><a href="data_analytics.php"><input type="button" name="data_analytics" value="Data Analytics"></a></td>

                    <td><a href="admin_panel.php"><input type="button" name="admin_panel" value="Admin Panel"></a></td>
                </tr>


      <h1 align='right'><button class="logout-button"><a href="logout.php">Log out</a></button></h1>
  </body>
</html>