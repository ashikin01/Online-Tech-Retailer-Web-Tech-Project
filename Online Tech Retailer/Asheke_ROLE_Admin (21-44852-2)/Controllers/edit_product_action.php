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
    $picture="";
    $err_picture="";
    $db_error_message="";

    
    

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $has_db_error=false;

        
        
        $name=sanitize($_POST["name"]);

        if(empty($name)){
            $err_name="Name Required";
            $_SESSION['err_name']=$err_name;
            $has_error=true;            
        }

    
    

        $category=sanitize($_POST["category"]);

        if(empty($category)){
            $err_category="Category Required";
            $_SESSION['err_category']=$err_category;
            $has_error=true;   
        }

        else if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $name)){
            $err_name="Only letters, numbers and white space allowed";
            $_SESSION['err_name']=$err_name;
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

        if(empty($_FILES['picture']['name'])){
            $err_picture="Picture must be uploaded";
            $_SESSION["err_picture"]=$err_picture;
            $has_error=true;
        }

       



 
                  
    }

  


        if($has_error==false){
            $edit_id=$_SESSION['edit_id'];

            $filename=$_FILES['picture']['name'];
            $tmploc=$_FILES['picture']['tmp_name'];
            $uploc="../Views/images/".$filename;
            move_uploaded_file($tmploc,$uploc);

            $sql=$conn->prepare("update product_datas set id=?,name=?,category=?,price=?,quantity=?,picture=? where id=?");
            $sql->bind_param("isssssi",$edit_id,$name,$category,$price,$quantity,$filename,$edit_id);
            $sql->execute();
            
            $db_error= true;

            if($db_error === true){       
            header("location: ../Views/manage_product.php");
            }
            else{
               
            }
            

        }    
        else{
            header("location: ../Views/edit_product.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

    