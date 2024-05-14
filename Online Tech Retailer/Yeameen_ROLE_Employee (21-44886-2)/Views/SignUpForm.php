<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="SigUpStyle.css">
    <title>Sign Up</title>
</head>
<body>
    <form action="#" method="POST" onsubmit="return validateSignUpForm();">
        <div class="center">
            <h1>Sign Up</h1>
            <div class="form">
                <input type="text" name="username" class="textfilled" placeholder="Username" required><br><br>
                <input type="email" name="email" class="textfilled" placeholder="Email" required><br><br>
                <input type="password" name="password" class="textfilled" placeholder="Password" required><br><br>
                <input type="password" name="confirm_password" class="textfilled" placeholder="Confirm Password" required><br><br>
                <input type="text" name="phone" class="textfilled" placeholder="Phone" required><br><br>
                <input type="text" name="address" class="textfilled" placeholder="Address" required><br><br>
                <label for="gender">Gender:</label>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br><br>
                <input type="submit" name="signup" value="Sign Up" class="btn"><br><br>
                <div class="login">Already have an account? <a href="http://localhost/sublimeText/new/Views/Login_Layout.php" class="link">Log In</a></div>
            </div>
        </div>
    </form>

    <script>
        function validateSignUpForm() {
            var password = document.forms["signupForm"]["password"].value;
            var confirm_password = document.forms["signupForm"]["confirm_password"].value;
            if (password != confirm_password) {
                alert("Passwords do not match");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php
session_start();

include("../Model/ECon.php");

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO employee_dash (Username, Email, Password, Phone, Address, Gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $username, $email, $password, $phone, $address, $gender);
    
    if ($stmt->execute()) {
        echo "User registered successfully";
       
        header('Location: ../Views/Login_Layout.php');
        exit();
    } else {
        echo "Error registering user";
    }

    $stmt->close();
}
?>
