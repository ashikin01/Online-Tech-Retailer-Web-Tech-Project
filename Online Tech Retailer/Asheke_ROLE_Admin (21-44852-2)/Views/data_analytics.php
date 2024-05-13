<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config.php";

$query="select * from product_sell_count";


$sell_count_data_array=get($query);

?>

<html>

<head>

<link rel="stylesheet" href="../CSS/manage_product.css">
</head>
<body>
<form action="" method="" novalidate; >

<fieldset>
<table>

      
    <legend>Data Analytics</legend>

    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>                            
    </tr>
    <tr>
        <td><b>Most Sold Product Name</td>                            
        <td><b>Item Sold</td>                                
        
        
    </tr>

    <tr>
    
    <?php $highest_sell_count=null; ?>

    <?php foreach($sell_count_data_array as $row){ ?>
       
        <?php
        $current_sell_count = $row["sell_count"];

        
        
    if ($highest_sell_count === null || $current_sell_count > $highest_sell_count) {
      $highest_sell_count = $current_sell_count;
      $name=$row["name"];
    }
    ?>

           
               
            
    
   

    <?php } ?>

    <td><?php echo $name ?></td>                          
    <td><?php if ($highest_sell_count !== null) {echo $highest_sell_count ; }?></td>    


    </tr>



    

</table>
</fieldset>
</form>
<?php include("footer.php"); ?>

</body>


</html>