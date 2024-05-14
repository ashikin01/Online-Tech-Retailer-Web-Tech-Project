
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}

?>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/admin_panel.css">
    </head>
    <body>
        
        <form action="" method="" novalidate; >

            <fieldset>
            <table>
                <h1>    
                <legend>Admin Panel</legend>

                <tr>                            
                    <td><a href="profile.php"><input type="button" name="profile" value="Profile"></a></td>
                </tr>

                <tr>                            
                    <td><a href="manage_employees.php"><input type="button" name="manage_employees" value="Manage Employees"></a></td>
                </tr>

                <tr>                            
                    <td><a href="manage_product.php"><input type="button" name="manage_product" value="Manage Products"></a></td>
                </tr>

                <tr>                            
                    <td><a href="manage_user.php"><input type="button" name="manage_uses" value="Manage Customers"></a></td>
                </tr>

               

      
                <tr>                            
                    <td><a href="manage_delivery_man.php"><input type="button" name="manage_delivery_man" value="Manage Delivery Man"></a></td>
                </tr>

      
                <tr>                            
                    <td><a href="faq.php"><input type="button" name="faq" value="FAQ"></a></td>
                </tr>

                <tr>                            
                    <td><a href="question_admin.php"><input type="button" name="question_admin" value="Customers Questions"></a></td>
                </tr>

           
                <tr>                            
                    <td><a href="expense_calculation.php"><input type="button" name="expense_calculation" value="Expense Calculation"></a></td>
                </tr>

                <tr>                            
                    <td><a href="data_analytics.php"><input type="button" name="data_analytics" value="Data Analytics"></a></td>
                </tr>

             
                <tr>                            
                    <td><a href="company_owners.php"><input type="button" name="company_owners" value="Company Owners"></a></td>
                </tr>

             
      

                

            </table>
            </fieldset>
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>