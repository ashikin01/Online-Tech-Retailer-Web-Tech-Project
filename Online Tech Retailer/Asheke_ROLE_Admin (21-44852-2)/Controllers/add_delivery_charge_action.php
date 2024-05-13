<?php
session_start();
include "../Model/db_config2.php";


$delivery_charge="";
$err_delivery_charge="";


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $has_error=false;

    $delivery_charge=sanitize($_POST["delivery_charge"]);

    if(empty($delivery_charge)){
        $err_delivery_charge="Delivery Charge Required";
        $_SESSION['err_delivery_charge']=$err_delivery_charge;
        $has_error=true;            
    }

        
    else if (preg_match("/^[0-9]+$/", $delivery_charge) === 0){
        $err_delivery_charge = "Only numbers are allowed.";
        $_SESSION['err_delivery_charge']=$err_delivery_charge;
        $has_error=true; 
    }

        

   


}




if($has_error==false){
    $add_delivery_charge_edit_id=$_SESSION['add_delivery_charge_edit_id'];


    $delivery_charge=$_POST["delivery_charge"];
   

    $sql=$conn->prepare("UPDATE product_datas SET delivery_charge=? where id=?");
    $sql->bind_param("si",$delivery_charge,$add_delivery_charge_edit_id);
    $sql->execute();

    echo "<script type='text/javascript'>alert('Product Updated Successfully..'); window.location.href=' ../Views/manage_product.php';</script>";
  


}
else{
    header("location: ../Views/add_delivery_charge.php?add_delivery_charge_edit_id=$_SESSION[add_delivery_charge_edit_id]");
}


function sanitize($data){      
    $data=htmlspecialchars($data);
    return $data;
}