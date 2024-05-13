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

<head>
<link rel="stylesheet" href="../CSS/profile.css">
</head>
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
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>ID</td>                            
        <td><b>Name</td>
        <td><b>Username</td>       
        <td><b>Email</td>
        <td><b>Phone Number</td>

    </tr>
    <?php foreach($user_data_array as $row){ ?>
    <tr>  
        <td><?php echo $row['id'] ?></td>                          
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>     
        <td><?php echo $row['phone_number'] ?></td>     
        <td><button><a href="edit_profile.php?edit_id=<?php echo $row['id'] ?>">Edit</a></button></td>            
        <td><button><a href="change_password.php?edit_id=<?php echo $row['id'] ?>">Change Password</a></button></td>            
    </tr>
   

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>