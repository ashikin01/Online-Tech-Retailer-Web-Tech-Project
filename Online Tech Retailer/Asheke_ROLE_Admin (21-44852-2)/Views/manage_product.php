<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config.php";

$query="select * from product_datas";
$product_data_array=get($query);

?>

<html>

<head>

<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Manage Products</legend>

    <tr>                            
        <td align='center'><a href="add_product.php"><input type="button" name="add_product" value="Add Products"></a></td>
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>ID</td>                            
        <td><b>Name</td>
        <td><b>Category</td>
        <td><b>Quantity</td>
        <td><b>Price</td>
        <td><b>Discount(%)</td>
        <td><b>Price After Discount</td>
        <td><b>Delivery Charge</td>
        <td ><b>Picture</td>
        <td colspan="4"><b>Action</td>
    </tr>
    <?php foreach($product_data_array as $row){ ?>
    <tr>  
        <td><?php echo $row['id'] ?></td> 
        <td><?php echo $row['name'] ?></td> 
        <td><?php echo $row['category'] ?></td>                                 
        <td><?php echo $row['quantity'] ?></td>     
        <td><?php echo $row['price'] ?></td>     
        <td><?php echo $row['discount'] ?></td>     
        <td><?php echo $row['price_after_discount'] ?></td>     
        <td><?php echo $row['delivery_charge'] ?></td>     
        <?php $imagename= $row['picture'] ?>   
        <td ><?php echo "<img src='images/$imagename' style='max-width: 100px; max-height: 100px;'>   ";?></td>   
        <td><button><a href="add_delivery_charge.php?add_delivery_charge_edit_id=<?php echo $row['id'] ?>">Add/Change Delivery Charge</a></button></td>   
        <td><button><a href="add_discount.php?add_discount_edit_id=<?php echo $row['id'] ?>">Add/Change Discount</a></button></td>   
        <td><button><a href="edit_product.php?edit_id=<?php echo $row['id'] ?>">Edit</a></button></td>     
        <td><button><a href="../Controllers/delete_product_action.php?delete_id=<?php echo $row['id']?>">Delete</a></button></td>     
    </tr>
   

    <?php } ?>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>