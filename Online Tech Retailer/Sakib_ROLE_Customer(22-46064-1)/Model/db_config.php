<?php

$db_server="localhost";
$db_username="root";
$db_password="";
$db_name="tech retailer";

$conn=new mysqli($db_server,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    $db_error===true;
    die("Connection failed:". $conn->connect_error);
}

?>