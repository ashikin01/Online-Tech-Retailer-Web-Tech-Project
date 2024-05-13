<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}

if(isset($_GET['edit_id'])){
$edit_id=$_GET['edit_id'];
$_SESSION['edit_id']=$edit_id;
}


$sql=$conn->prepare("select * from customer where id=?");
$sql->bind_param("i",$edit_id);
$sql->execute();
$user_data_array=$sql->get_result()->fetch_all(MYSQLI_ASSOC);


foreach($user_data_array as $row){
$name=$row['Full_Name'];                                                                                                                                                                                                                                                
$username=$row['Username'];                                                                                                                                                                                                                                                
$password=$row['Password'];                                                                                                                                                                                                                                                
$email=$row['Email']; 
$phone_number=$row['Phone']; 



}


?>

<html>
    <head><link rel="stylesheet" href="../CSS/edit_employees.css"></head>
    <body>
    <form action="../Controllers/edit_user_action.php" method="post" novalidate; >
                
                <fieldset>
                <table>
                    <legend>Edit Users</legend>
                  

                    <?php
                         if(isset($_SESSION['db_error_message'])){
                         echo $_SESSION['db_error_message'];
                        }
                    ?>
                    
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="name" name="name" placeholder="Name" value="<?php if (isset($name)){echo $name;};?>">
                        <span>
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
                        <td><input type="text" id="username" name="username" placeholder="username" value="<?php if (isset($username)){echo $username;};?>">
                        <span>
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
                        <th><label for="email">Email</label></th>
                        <td>:</td>
                        <td><input type="text" id="email" name="email" placeholder="email" value="<?php if (isset($email)){echo $email;};?>">
                        <span>
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
                        <th><label for="password">Password</label></th>
                        <td>:</td>
                        <td><input type="text" id="password" name="password" placeholder="password" value="<?php if (isset($password)){echo $password;};?>">
                        <span>
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
                        <th><label for="phone_number">Phone Number</label></th>
                        <td>:</td>
                        <td><input type="number" id="phone_number" name="phone_number" placeholder="phone_number" value="<?php if (isset($phone_number)){echo $phone_number;};?>">
                        <span>
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