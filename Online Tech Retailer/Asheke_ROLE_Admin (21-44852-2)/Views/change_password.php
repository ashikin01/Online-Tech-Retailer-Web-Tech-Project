<?php 
session_start(); 




?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/change_password.css">
    <script type="text/javascript" src="js/change_password.js"></script>
    </head>

    <body>
        <?php include "header_after_login.php";  ?>
        <form action="../Controllers/change_password_action.php" method="post" onsubmit="return validate();" novalidate; >
            
            <fieldset>
            <table>
                <legend>Change Password</legend>

                <tr>
                    <th><label for="old_password">Old Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="old_password" name="old_password" placeholder="Old Password" value="">
                    <span id="err_old_password" class="error">
                        <?php
                        if (isset($_SESSION['err_old_password'])) {
                            echo $_SESSION['err_old_password'];
                            
                        }
                        unset($_SESSION['err_old_password']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                <tr>
                    <th><label for="new_password">New Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="new_password" name="new_password" placeholder="New Password" value="">
                    <span id="err_new_password" class="error">
                        <?php
                        if (isset($_SESSION['err_new_password'])) {
                            echo $_SESSION['err_new_password'];
                            
                        }
                        unset($_SESSION['err_new_password']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                <tr>
                    <th><label for="confirm_new_password">Confirm New Password</label></th>
                    <td>:</td>
                    <td><input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" value="">
                    <span id="err_confirm_new_password" class="error">
                        <?php
                        if (isset($_SESSION['err_confirm_new_password'])) {
                            echo $_SESSION['err_confirm_new_password'];
                            
                        }
                        unset($_SESSION['err_confirm_new_password']);
                        ?>
                    </span>
                    </td>
                    
                </tr>

                   
                <tr>
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