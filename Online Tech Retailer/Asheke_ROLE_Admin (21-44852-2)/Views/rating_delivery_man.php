<?php 
session_start();
include "../Model/db_config2.php";
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
else{
   include "header_after_login.php";
}

$rating="";                                                                                                                                                                                                                                                


if(isset($_GET['rating_delivery_man_user_id'])){
$rating_delivery_man_user_id=$_GET['rating_delivery_man_user_id'];
$_SESSION['rating_delivery_man_user_id']=$rating_delivery_man_user_id;



$sql=$conn->prepare("select * from delivery_men where ID=?");
$sql->bind_param("i",$rating_delivery_man_user_id);
$sql->execute();
$delivery_man_data_array=$sql->get_result();



foreach($delivery_man_data_array as $row){   
$rating=$row['Rating'];                                                                                                                                                                                                                                             

}


}


?>

<html>
    <head>
    <link rel="stylesheet" href="../CSS/edit_employees.css">
    <script type="text/javascript" src="js/rating_delivery_man.js"></script>
    </head>
    <body>
    <form action="../Controllers/rating_delivery_man_action.php" method="post" onsubmit="return validate();"  novalidate; >
                
                <fieldset>
                <table>
                    <legend>Give Rating for this delivery man</legend>                 

                    <tr>
                        <th><label for="rating">Rating</label></th>
                        <td>:</td>
                        <td><input type="number" id="rating" name="rating" placeholder="Give rating out of 5" value="<?php echo $rating ;?>">
                        <span class="error" id="err_rating">
                            <?php
                            if (isset($_SESSION['err_rating'])) {
                                echo $_SESSION['err_rating'];
                                
                            }
                            unset($_SESSION['err_rating']);
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