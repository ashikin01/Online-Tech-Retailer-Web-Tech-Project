<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config2.php";

$sql=$conn->prepare("select * from customer");
$sql->execute();
$user_data_array=$sql->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<html>

<head><link rel="stylesheet" href="../CSS/manage_product.css"></head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Manage Users</legend>
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
        <td><b>Password</td>
        <td><b>Email</td>
        <td><b>Phone Number</td>
        <td colspan="2"><b>Action</td>

    </tr>
    <?php foreach($user_data_array as $row){ ?>
    <tr>  
        <td><?php echo $row['Id'] ?></td>                          
        <td><?php echo $row['Full_Name'] ?></td>
        <td><?php echo $row['Username'] ?></td>
        <td><?php echo $row['Password'] ?></td>
        <td><?php echo $row['Email'] ?></td>     
        <td><?php echo $row['Phone'] ?></td>     
        <td><button><a href="edit_user.php?edit_id=<?php echo $row['Id'] ?>">Edit</a></button></td>     
        <td><button><a href="../Controllers/delete_user_action.php?delete_id=<?php echo $row['Id']?>">Delete</a></button></td>     
    </tr>
   

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>