<?php 
session_start();
include("../Model/ECon.php");

if(isset($_SESSION['User_Name'])) {
    echo "Welcome ".$_SESSION['User_Name'] . "<br>"; 
} else {
    header('location:..Views/Login_Layout.php');
    exit(); 
}

if(isset($_POST['logout'])) {
    unset($_SESSION['User_Name']); // 
    session_destroy();
    header('location:..Views/Login_Layout.php');
    exit(); 
}

$userprofile = $_SESSION['User_Name'];

if(isset($_POST['update_profile'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

 
    $query = "SELECT * FROM employee_dash WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $userprofile, $old_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        if($new_password == $confirm_password) {
            
            $update_query = "UPDATE empform SET Fname = ?, Password = ?, ConPass = ? WHERE emaill = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ssss", $username, $new_password, $new_password, $userprofile);
            $stmt->execute();

            if($stmt->affected_rows > 0) {
                echo "Profile updated successfully." . "<br>"; 
                
                $_SESSION['User_Name'] = $username;
            } else {
                echo  "Failed to update profile." . "<br>";
            }
        } else {
            echo "New password and confirm password do not match." . "<br>"; 
        }
    } else {
        echo "Old password is incorrect." . "<br>"; 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Display Page</title>
    <script type="text.javascript" src="js/DisplayUpdate.js"></script>

</head>
<body>
    <h1>Welcome to Display</h1>
    <a href="http://localhost/sublimeText/new/Views/Login_Layout.php"><input type="submit" name="" value="Log Out"></a>
    <a href="http://localhost/sublimeText/new/Views/HomePage.php"><input type="submit" name="" value="=> Home"></a>


    <div class="container">
        <div class="profile">
            <h2>Update Profile</h2>
            <form method="POST" action="" onsubmit="return validateUpdateProfileForm()">

                <input type="text" name="username" placeholder="New Username"><br><br>
                <input type="password" name="old_password" placeholder="Old Password"><br><br>
                <input type="password" name="new_password" placeholder="New Password"><br><br>
                <input type="password" name="confirm_password" placeholder="Confirm New Password"><br><br>
                <input type="submit" name="update_profile" value="Update Profile">
            </form>
        </div>
    </div>
</body>
</html>
