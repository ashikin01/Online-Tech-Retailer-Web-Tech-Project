<?php

session_start();

session_destroy();
header("Location: http://localhost/sublimeText/new/Views/Login_Layout.php");
exit; 
?>