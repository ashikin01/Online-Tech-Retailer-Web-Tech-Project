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


$sql=$conn->prepare("select * from product_datas where id=?");
$sql->bind_param("i",$edit_id);
$sql->execute();
$product_data_array=$sql->get_result()->fetch_all(MYSQLI_ASSOC);




foreach($product_data_array as $row){
$name=$row['name'];                                                                                                                                                                                                                                                
$price=$row['price'];                                                                                                                                                                                                                                                
$quantity=$row['quantity'];                                                                                                                                                                                                                                                
$category=$row['category']; 



}


?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/edit_product.css">
    <script type="text/javascript" src="js/edit_product.js"></script>

    </head>
    <body>
    <form action="../Controllers/edit_product_action.php" method="post" enctype="multipart/form-data" onsubmit="return validate();" novalidate; >
                
                <fieldset>
                <table>
                    <legend>Edit Product</legend>
                  
                    
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="name" name="name" placeholder="Name" value="<?php if (isset($name)){echo $name;};?>">
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
                        <th><label for="price">Price</label></th>
                        <td>:</td>
                        <td><input type="number" id="price" name="price" placeholder="Price" value="<?php if (isset($price)){echo $price;}; ?>">
                        <span id="err_price" class="error">
                            <?php
                            if (isset($_SESSION['err_price'])) {
                                echo $_SESSION['err_price'];
                                
                            }
                            unset($_SESSION['err_price']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
    
    
                    <tr>
                        <th><label for="category">Category</label></th>
                        <td>:</td>
                        <td><input type="text" id="category" name="category" placeholder="Category" value="<?php if (isset($category)){echo $category;};?>">
                        <span id="err_category" class="error">
                            <?php
                            if (isset($_SESSION['err_category'])) {
                                echo $_SESSION['err_category'];
                                
                            }
                            unset($_SESSION['err_category']);
                            ?>
                        </span>
                        </td>
                        
                    </tr>
    
                    <tr>
                        <th><label for="quantity">Quantity</label></th>
                        <td>:</td>
                        <td><input type="number" id="quantity" name="quantity" placeholder="Quantity" value="<?php if (isset($quantity)){echo $quantity;};?>">
                        <span id="err_quantity" class="error">
                            <?php
                            if (isset($_SESSION['err_quantity'])) {
                                echo $_SESSION['err_quantity'];
                                
                            }
                            unset($_SESSION['err_quantity']);
                            ?>
                        </span>   
                        </td>
                        
                    </tr>

                    <tr>
                        <th><label for="picture">Picture</label></th>
                        <td>:</td>
                        <td><input type="file" id="picture" name="picture" >
                        <span id="err_picture" class="error">
                            <?php
                            if (isset($_SESSION['err_picture'])) {
                                echo $_SESSION['err_picture'];
                                
                            }
                            unset($_SESSION['err_picture']);
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