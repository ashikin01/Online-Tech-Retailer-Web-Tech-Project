<?php 
session_start();     
    
      
    
?>
    
    <html>
        <head>
        <link rel="stylesheet" href="../CSS/add_employees.css">
        <script type="text/javascript" src="js/add_delivery_man.js"></script>
        </head>
        <body>
            <?php 
                if(!isset($_SESSION['username'])){
                    header("location: login.php");
                }
                else{
                   include "header_after_login.php";
                }
            ?>
            <form action="../Controllers/add_delivery_man_action.php" method="post" onsubmit="return validate();"  novalidate; >
                
                <fieldset>
                <table>
                    <legend>Add Delivery Man</legend>
                    
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="name" name="name" placeholder="Name" value="">
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
                        <th><label for="delivery_man_id">Deliver Man PIN</label></th>
                        <td>:</td>
                        <td><input type="number" id="delivery_man_id" name="delivery_man_id" placeholder="Delievery Man ID" value="">
                        <span class="error" id="err_delivery_man_id">
                            <?php
                            if (isset($_SESSION['err_delivery_man_id'])) {
                                echo $_SESSION['err_delivery_man_id'];
                                
                            }
                            unset($_SESSION['err_delivery_man_id']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
    
    
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td>:</td>
                        <td><input type="text" id="email" name="email" placeholder="Email" value="">
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
                        <td><input type="number" id="salary" name="salary" placeholder="Salary" value="">
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
                        <td><input type="number" id="bonus" name="bonus" placeholder="Bonus" value="">
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
                        <td align="right"><input type="submit" value="Add Delivery Man"></td>
                    </tr>
    
                </table>
                </fieldset>
            </form>
            <?php include("footer.php"); ?>
        </body>
    </html>








