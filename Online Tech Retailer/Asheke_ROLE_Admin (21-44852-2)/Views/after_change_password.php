<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config2.php";

$username1=$_SESSION['username'];

$sql=$conn->prepare("select * from admin_users where username='$username1'");
$sql->execute();
$user_data_array=$sql->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<html>

<head></head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Profile</legend>
    <?php
    if(isset($_SESSION['db_error_message'])){
        echo $_SESSION['db_error_message'];
    }
    ?>
 
    <?php foreach($user_data_array as $row){ ?>
  

    <table border="1">  
    <tr>
        <td><b>Old Password</td>                            
        <td><b>New Password</td> 
    </tr>   
    <tr>                  
        <td><?php if(isset($_SESSION['old_password'])){echo $_SESSION['old_password']; }  ?></td> 
        <td><?php echo $row['passsword'] ?></td>   
    </tr>                          
    </table>   
                 
   
    
    <tr>
    <td><button><a href="profile.php">Profile</a></button></td>            
    <td><button><a href="change_password.php">Change Password</a></button></td>  
    </tr>

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>