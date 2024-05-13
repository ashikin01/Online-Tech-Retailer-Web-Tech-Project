<?php
include("../Model/DataCon.php");

if(isset($_POST['Register'])) {
    // Extracting form data
    $fname = $_POST['fname'];
    $lastname = $_POST['lastname'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['conpass'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO EMPFORM (Fname,Lname, Password, ConPass, gender, emaill, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?,?)");


    // Bind parameters
    $stmt->bind_param("ssssssss", $fname, $lastname, $pwd, $cpwd, $gender, $email, $phone, $address);

    // Execute the statement
    if($stmt->execute()) {
        echo "Data Inserted Successfully";
    } else {
        echo "Failed to Insert";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tech Retailer Shop</title>
    <script type="text/javascript" src="js/Registration.js"></script>
</head>
<body>
<div class="container">
    <form name="registrationForm" action="#" method="POST" onsubmit="return validateForm()">  

        <div class="title"><h1>
            Employee Registration Form
        </h1></div>
        <div class="form">
            <div class="input field">
                <label>First Name</label>
                <input type="text" class="input" name="fname">
            </div>

            <div class="input field">
                <label>Last Name</label>
                <input type="text" class="input" name="lastname">
            </div>

            <div class="input field">
                <label>Password</label>
                <input type="password" class="input" name="password">
            </div>

            <div class="input field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="conpass">
            </div>

            <div class="input field">
                <label>Gender</label>
                <div class="Custom Select">
                    <select name="gender">
                        <option value="Not selected">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>

            <div class="input field">
                <label>Email</label>
                <input type="text" class="input" name="email">
            </div>

            <div class="input field">
                <label>Phone</label>
                <input type="text" class="input" name="phone">
            </div>

            <div class="input field">
                <label>Address</label>
                <textarea name="address"></textarea>
            </div>

            <div class="input field">
                <label class="check">
                    <input type="checkbox" name="terms" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and condition</p>
            </div>

            <div class="input field">
                <input type="submit" value="Register" name="Register" class="btn">
            </div>

            <button type="button" class="btn" onclick="window.location.href='http://localhost/sublimeText/new/Views/Login_Layout.php'"><=Back to Login</button>


        </div>
    </form>
</div>
</body>
</html>
