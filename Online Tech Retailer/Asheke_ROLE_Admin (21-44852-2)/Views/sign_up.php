<?php 
session_start(); 


$name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$phone_number = isset($_COOKIE['phone_number']) ? $_COOKIE['phone_number'] : '';


?>

<?php include "header_before_login.php";  ?>
<div style="margin-top: 80px;"></div> 
<html>
    <head>
        <link rel="stylesheet" href="../CSS/sign_up.css">
        <script type="text/javascript" src="js/sign_up.js"></script>
    </head>
    <body>
        
        <form action="../Controllers/sign_up_action.php" method="post" onsubmit="return validate();" novalidate; >
            
            <fieldset>
            <table>
                <legend>Registration</legend>
                
                <tr>
                    <th><label for="name">Name</label></th>
                    <td>:</td>
                    <td><input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name ;?>">
                    <span id="err_name" class="error">
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
                    <th><label for="username">Username</label></th>
                    <td>:</td>
                    <td><input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username ;?>">
                    <span id="err_username" class="error">
                        <?php
                        if (isset($_SESSION['err_username'])) {
                            echo $_SESSION['err_username'];
                            
                        }
                        unset($_SESSION['err_username']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                <tr>
                    <th><label for="password">Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="password" name="password" placeholder="password" value="">
                    <span id="err_password" class="error">
                        <?php
                        if (isset($_SESSION['err_password'])) {
                            echo $_SESSION['err_password'];
                            
                        }
                        unset($_SESSION['err_password']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                <tr>
                    <th><label for="confirmpassword">Confirm Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="confirmpassword" name="confirm_password" placeholder="Confirm Password" value="">
                    <span id="err_confirm_password" class="error">
                        <?php
                        if (isset($_SESSION['err_confirm_password'])) {
                            echo $_SESSION['err_confirm_password'];
                            
                        }
                        unset($_SESSION['err_confirm_password']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                <tr>
                    <th><label for="email">Email</label></th>
                    <td>:</td>
                    <td><input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email ;?>">
                    <span id="err_email" class="error">
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
                    <th><label for="phonenumber">Phone Number</label></th>
                    <td>:</td>
                    <td><input type="number" id="phonenumber" name="phone_number" placeholder="Phone Number" value="<?php echo $phone_number ;?>">
                    <span id="err_phone_number" class="error">
                        <?php
                        if (isset($_SESSION['err_phone_number'])) {
                            echo $_SESSION['err_phone_number'];
                            
                        }
                        unset($_SESSION['err_phone_number']);
                        ?>
                    </span>   
                    </td>
                    
                </tr>
                   
                <tr>
                    <td align="left"><input type="submit" name="save_as_draft" value="Save as draft"></td>
                    <td></td>               
                    <td align="right"><input type="submit" value="Register"></td>
                </tr>

            </table>
            </fieldset>
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>