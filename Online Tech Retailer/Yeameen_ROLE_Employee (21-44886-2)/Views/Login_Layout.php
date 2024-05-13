<?php 

session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Login By Employee</title>
	<script type="text.javascript" src=js/login.js></script>
</head>
<body>
   <form action="#"  method="POST" onsubmit="return validate();">
<div class ="center">
	
	<h1>Login</h1>

	<div class="form">
		<input type="text" name="username" class="textfilled" placeholder="Username"></br>
	</br>
		<input type="password" name="password" class="textfilled" placeholder="Password">
	</br>

	  <div class="forgetpass"><a href ="http://localhost/sublimeText/new/Views/ForgetPassword.php" class="link">Forget Password? </a></div>
	  </br>
	 <input type="submit" name="login" value="Login" class="btn">
	 </br>

      <div class = "signup">New Member? <a href="http://localhost/sublimeText/new/Views/RegistrationForm.php" class="link">SignUp Here</a></div>
   </div>
</div>

</form>

<script>
 	function message()
 	 {
 	 	 alert ("Password not entered")
 	 }

 </script>


</body>
</html>

<?php 

include("../Model/DataCon.php");


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];


    $query = "SELECT * FROM employee_dash WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $pwd);


    $stmt->execute();


    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $_SESSION['User_Name'] = $username;
      header('Location: ../Views/HomePage.php');
    } else {
        echo "Login Failed";
    }

    // Close statement
    $stmt->close();
}

?>
