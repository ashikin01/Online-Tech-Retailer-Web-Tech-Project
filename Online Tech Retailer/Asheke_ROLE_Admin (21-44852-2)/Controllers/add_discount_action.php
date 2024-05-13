<?php
session_start();
include "../Model/db_config2.php";


$discount="";



if($_SERVER["REQUEST_METHOD"]=="POST"){

    $has_error=false;

    $discount=sanitize($_POST["discount"]);

    if(empty($discount)){
        $err_discount="Discount Required";
        $_SESSION['err_discount']=$err_discount;
        $has_error=true;            
    }

        
    else if (preg_match("/^[0-9]+$/", $discount) === 0){
        $err_discount = "Only numbers are allowed.";
        $_SESSION['err_discount']=$err_discount;
        $has_error=true; 
    }

        

   


}




if($has_error==false){
    $add_discount_edit_id=$_SESSION['add_discount_edit_id'];


    $discount=$_POST["discount"];
    
    $sql=$conn->prepare("select * from product_datas where id=?");
    $sql->bind_param("i", $add_discount_edit_id);
    $sql->execute();
    $data=$sql->get_result();

    foreach($data as $row){
        $price=$row['price'];                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                   
    
   }

    $price=floatval($price);

    $temp=$discount/100;
    $temp2=$temp*$price;
    $price_after_discount=$price-$temp2;


    $sql=$conn->prepare("UPDATE product_datas SET discount=?, price_after_discount=? where id=?");
    $sql->bind_param("ssi",$discount,$price_after_discount,$add_discount_edit_id);
    $sql->execute();

    echo "<script type='text/javascript'>alert('Discount added Successfully..'); window.location.href=' ../Views/manage_product.php';</script>";
  


}
else{
    header("location: ../Views/add_discount.php?add_discount_edit_id=$_SESSION[add_discount_edit_id]");
}


function sanitize($data){      
    $data=htmlspecialchars($data);
    return $data;
}