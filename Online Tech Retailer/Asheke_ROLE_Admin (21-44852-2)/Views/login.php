<?php 
session_start(); 


$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';


?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/login.css">
    <script type="text/javascript" src="js/login.js"></script>

    
    </head>
    <body>
        <?php include "header_before_login.php";  ?>
        <form action="../Controllers/login_action.php" method="post" onsubmit="return validate();" novalidate; >

            <fieldset>
            <table>
              

                <legend>Log IN</legend>
                               
                <tr>
                    <th><label for="username">Username</label></th>
                    <td>:</td>
                    <td><input type="text" id="username" name="username" placeholder="Username" value="">
                    <span id="err_username" >
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
                    <span id="err_password">
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
            
                    <td><button><a href="forget_password.php">Forget Password</a></button></td>               
                    <td align="right"><input type="submit" value="Log in"></td>
                </tr>

                

            </table>
            </fieldset>
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>