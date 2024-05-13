
<?php 

    $db_server="localhost";
    $db_user_name="root";
    $db_password="";
    $db_name="webtech project";

    

    $conn=new mysqli($db_server,$db_user_name,$db_password,$db_name);

    if($conn->connect_error){
        $db_error === true;
        die( "Connection Failed:". $conn->connect_error);
    }

?>

