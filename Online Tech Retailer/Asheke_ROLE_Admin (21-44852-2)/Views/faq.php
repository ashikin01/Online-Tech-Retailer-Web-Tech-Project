<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config.php";

$query="select * from faq";
$faq_data_array=get($query);

?>

<html>

<head>

<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>FAQ</legend>

    <tr>                            
        <td align='center'><a href="add_faq.php"><input type="button" name="add_faq" value="Add FAQ"></a></td>
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>Question ID</td>                            
        <td><b>Question</td>                            
        <td><b>Name</td>
    
        <td colspan="5"><b>Action</td>
        
    </tr>
    <?php foreach($faq_data_array as $row){ ?>
    <tr>  
        <td><?php echo $row['id'] ?></td>                          
        <td><?php echo $row['question'] ?></td>       
        <td><?php echo $row['answer'] ?></td>        
        <td><button><a href="../Controllers/delete_faq_action.php?delete_faq_id=<?php echo $row['id']?>">Delete</a></button></td>     
    </tr>
   

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>