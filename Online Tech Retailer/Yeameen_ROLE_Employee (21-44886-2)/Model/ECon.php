<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "employee_form";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($conn)
{
  //echo "Connection OK";


}
else 
{

echo "Connection failed".mysqli_connect_error();


}

?>