<?php 
session_start();     
    
       
    
?>
    
    <html>
        <head>
        <link rel="stylesheet" href="../CSS/add_product.css">
        <script type="text/javascript" src="js/add_product.js"></script>
        </head>
        <body>
            <?php 
                if(!isset($_SESSION['username'])){
                    header("location: login.php");
                }
                else{
                   include "header_after_login.php";
                }
            ?>
            <form action="../Controllers/add_product_action.php" method="post" enctype="multipart/form-data" onsubmit="return validate();" novalidate; >
                
                <fieldset>
                <table>
                    <legend>Add Product</legend>
                    
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="name" name="name" placeholder="Name" >
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
                        <td><input type="number" id="price" name="price" placeholder="Price" >
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
                        <td><input type="text" id="category" name="category" placeholder="Category">
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
                        <td><input type="number" id="quantity" name="quantity" placeholder="Quantity" >
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
                        <th><label for="delivery_charge">Delivery Charge</label></th>
                        <td>:</td>
                        <td><input type="number" id="delivery_charge" name="delivery_charge" placeholder="Delivery Charge" >
                        <span id="err_delivery_charge" class="error">
                            <?php
                            if (isset($_SESSION['err_delivery_charge'])) {
                                echo $_SESSION['err_delivery_charge'];
                                
                            }
                            unset($_SESSION['err_delivery_charge']);
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
                        <td align="right"><input type="submit" value="Add product"></td>
                    </tr>
    
                </table>
                </fieldset>
            </form>
            <?php include("footer.php"); ?>
        </body>
    </html>









