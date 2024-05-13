<?php
    session_start();
    include "../Model/db_config2.php";

    
    $name="";
    $err_name="";
    $category=""; 
    $err_category="";
    $price="";
    $err_price="";
    $quantity="";
    $err_quantity="";
    $db_error_message="";
    $delivery_charge="";
    $err_delivery_charge="";
    $picture="";
    $err_picture="";

    
    

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $has_db_error=false;

        
        
        $name=sanitize($_POST["name"]);

        if(empty($name)){
            $err_name="Name Required";
            $_SESSION['err_name']=$err_name;
            $has_error=true;            
        }

        else if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $name)){
            $err_name="Only letters, numbers and white space allowed";
            $_SESSION['err_name']=$err_name;
            $has_error=true;           
        }
        


    

        $category=sanitize($_POST["category"]);

        if(empty($category)){
            $err_category="User Name Required";
            $_SESSION['err_category']=$err_category;
            $has_error=true;   
        }

        else if (!preg_match("/^[a-zA-Z-' ]*$/",$category)){
            $err_category="Only letters and white space allowed";
            $_SESSION['err_category']=$err_category;
            $has_error=true;           
        }       
       

          
        $price=sanitize($_POST["price"]);

        if(empty($price)){
            $err_price="price Required";
            $_SESSION['err_price']=$err_price;
            $has_error=true;   
        }
     
    

      
        $quantity=sanitize($_POST["quantity"]);

        if(empty($quantity)){
            $err_quantity="Phone number required";
            $_SESSION["err_quantity"]=$err_quantity;
            $has_error=true;
        }

       
        $delivery_charge=sanitize($_POST["delivery_charge"]);

        if(empty($delivery_charge)){
            $err_delivery_charge="Delivery Charge Required";
            $_SESSION["err_delivery_charge"]=$err_delivery_charge;
            $has_error=true;
        }

        
        

        if(empty($_FILES['picture']['name'])){
            $err_picture="Picture must be uploaded";
            $_SESSION["err_picture"]=$err_picture;
            $has_error=true;
        }
        
        
       
       
            
        



       

/*
        $sql=$conn->prepare("select * from product_datas where category=?");
        $sql->bind_param("s",$category);
        $sql->execute();
        $data=$sql->get_result();


        
        if(mysqli_num_rows($data)>0){
            $has_error=true;
            $err_category="This category is already taken";
            $_SESSION['err_category']= $err_category;
        }*/
     


  
 
            
                  
    }

  





        if($has_error==false){


            $filename=$_FILES['picture']['name'];
            $tmploc=$_FILES['picture']['tmp_name'];
            $uploc="../Views/images/".$filename;
            move_uploaded_file($tmploc,$uploc);


            $discount=0;
            $price_after_discount=$price;

            $null_value=null;
            $sql=$conn->prepare("insert into product_datas values(?,?,?,?,?,?,?,?,?)");
            $sql->bind_param("issssssss",$null_value,$category,$name,$price,$quantity,$discount,$price_after_discount,$delivery_charge,$filename);
            $sql->execute();
         


            
            $db_error= true;

            if($db_error === true){       
                echo "<script type='text/javascript'>alert('Product added successfully..'); window.location.href=' ../Views/manage_product.php';</script>";    
            }
            else{
                
            }
            

        }    
        else{
            header("location: ../Views/add_product.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    ?>