<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Update Profile</title>
    <script type="text/javascript" src="js/update_profile.js"></script>
</head>
<body>
    <form action="#" method="POST" onsubmit="return validateUpdateProfile();">
        <div class="center">
            <h1>Update Profile</h1>
            <div class="form">
                <input type="text" name="username" class="textfilled" placeholder="New Username"><br><br>
                <input type="password" name="old_password" class="textfilled" placeholder="Old Password"><br><br>
                <input type="password" name="new_password" class="textfilled" placeholder="New Password"><br><br>
                <input type="submit" name="update_profile" value="Update Profile" class="btn"><br><br>
                <div class="forgetpass"><a href ="http://localhost/sublimeText/new/Views/ForgetPassword.php" class="link">Forget Password? </a></div><br>
                <div class="signup">New Member? <a href="http://localhost/sublimeText/new/Views/SignUpForm.php" class="link">SignUp Here</a></div>
            </div>
        </div>
    </form>

    <script>
        function message() {
            alert("Password not entered");
        }
    </script>

</body>
</html>

<?php
session_start();

include("../Model/ECon.php");

if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $userprofile = $_SESSION['User_Name'];

    $query = "SELECT * FROM employee_dash WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $userprofile, $old_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $update_query = "UPDATE employee_dash SET Username = ?, Password = ? WHERE Email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sss", $username, $new_password, $userprofile);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Profile updated successfully.";
            $_SESSION['User_Name'] = $username;
            header('Location: ../Views/HomePage.php');
            exit();
        } else {
            echo  "Failed to update profile.";
        }
    } else {
        echo "Old password is incorrect.";
    }
}
?>
