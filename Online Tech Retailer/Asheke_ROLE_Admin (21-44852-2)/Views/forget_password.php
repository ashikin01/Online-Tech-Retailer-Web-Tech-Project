<?php 
session_start(); 



?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/forget_password.css">
    <script type="text/javascript" src="js/forget_password.js"></script>
    </head>
    <body>
    <?php include("header_before_login.php"); ?>
        <form action="../Controllers/forget_password_action.php" method="post" onsubmit="return validate();" novalidate; >
            
            <fieldset>
            <table>
                <legend>Forget Password</legend>

                <tr>
                    <th><label for="otp">OTP</label></th>
                    <td>:</td>
                    <td><input type="number" id="otp" name="otp" placeholder="OTP" value="">
                    <span id="err_otp">
                        <?php
                        if (isset($_SESSION['err_otp'])) {
                            echo $_SESSION['err_otp'];
                            
                        }
                        unset($_SESSION['err_otp']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

      

                <tr>
                    <th><label for="username">Username</label></th>
                    <td>:</td>
                    <td><input type="text" id="username" name="username" placeholder="Username" value="">
                    <span id="err_username">
                        <?php
                        if (isset($_SESSION['err_username'])) {
                            echo $_SESSION['err_username'];
                            
                        }
                        unset($_SESSION['err_username']);
                        ?>
                    </span>
                    </td>
                    
                    <td></td>
                    <td></td>               
                    <td></td>
                </tr>

                <tr>
                    <th><label for="new_password">New Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="new_password" name="new_password" placeholder="New Password" value="">
                    <span id="err_new_password">
                        <?php
                        if (isset($_SESSION['err_new_password'])) {
                            echo $_SESSION['err_new_password'];
                            
                        }
                        unset($_SESSION['err_new_password']);
                        ?>
                    </span>
                    </td>
                    
                    <td></td>
                    <td></td>               
                    <td align="right"><input type="submit" value="Update"></td>
                </tr>

            </table>
            </fieldset>
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>