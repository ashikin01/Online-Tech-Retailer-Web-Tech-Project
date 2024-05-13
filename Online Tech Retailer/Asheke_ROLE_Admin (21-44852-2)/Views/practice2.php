<?php 
include "../Model/db_config.php";


$query="select * from admin_users where username='agag'";
$result=get($query);
$c=count($result);
var_dump($result);
echo ".......................".$c;


?>