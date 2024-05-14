<?php
session_start();

include "../Model/db_config.php";


$username="";
$err_username="";
$password= "";
$err_password="";

function sanitize($data) {
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $has_error=false;

    $username=sanitize($_POST["username"]);

    if(empty($username)){
        $err_username= "Username required";
        $_SESSION["err_username"]=$err_username;
        $has_error=true;
        // header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^[a-zA-Z0-9]{4,20}$/",$username)){
    //     $err_username= "Username must be 4-20 characters and contain only letters and numbers";
    //     $_SESSION["err_username"]=$err_username;
    //     $has_error=true;
    // }
    else(setcookie("username",$username,time()+ 84000,"/"));
    $has_error=false;

    $password=sanitize($_POST["password"]);

    if(empty($password)){
        $err_password="Password required";
        $_SESSION["err_password"]=$err_password;
        $has_error=true;
        header('location: ../View/login.php');
    }
    // else if(!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
    //     $err_password= "Password must be at least 8 characters and contain at least one uppercase letter, lowercase letter, number, and symbol";
    //     $_SESSION["err_password"]=$err_password;
    //     $has_error=true;
    // }
    else{
        $has_error=false;
    }
}
// else{

// }

if($has_error==false){ 
    $sql=$conn->prepare("select * from customer where username=? and password=?");
    $sql->bind_param("ss",$username, $password);
    $sql->execute();
    $result=$sql->get_result();

    if(mysqli_num_rows($result)>0){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header('location: ../View/profile.php');
    }
    else{
        $err_username= "Username & password did't matched";
        $_SESSION['err_username']=$err_username;
        header('location: ../View/login.php');
    }
}
else{
    header("location: ../View/login.php");
}

?>