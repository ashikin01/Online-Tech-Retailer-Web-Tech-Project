<?php

// session_start();

include "../Model/db_config.php";
include("top_section.php");
if (isset($_SESSION["update_msg"])) {
    include("alert_box2.php");
}
include("../View/logout.php");
include("report_button.php");



$usernameX = $_SESSION['username'];

$sql = $conn->prepare("select * from customer where username=?");
$sql->bind_param("s", $usernameX);
$sql->execute();
$result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

foreach ($result as $row) {
    $id = $row["Id"];
    $username = $row["Username"];
    $fullName = $row["Full_Name"];
    $email = $row["Email"];
    $phone = $row["Phone"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Style2.css">
    <script type="text/javascript" src="js/profile.js"></script>
    <script type="text/javascript" src="js/changePassword.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper-profile">
        <div class="wrapper-details">
            <form action="../Controller/profile_action.php" method="post" onsubmit="return validate();" novalidate>
                <h1>Personal Details</h1>
                <span>
                    <?php
                    if (isset($_SESSION['db_error_message'])) {
                        echo $_SESSION['db_error_message'];
                    }
                    unset($_SESSION['db_error_message']);
                    ?>
                    </span>
                <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                            echo $id;
                                                        }; ?>">
                <div class="input-box">
                    <!-- <div class="input-field"> -->
                    <Label>Username</Label><br>
                    <input type="text" name="username" placeholder="Username" value="<?php if (isset($username)) {
                                                                                            echo $username;
                                                                                        }; ?>" readonly>
                    <!-- <i class='bx bxs-user'></i> -->
                </div>

                <div class="error-msg">
                    <span id="err_username">
                        <?php
                        if (isset($_SESSION["err_username"])) {
                            echo $_SESSION["err_username"];
                        }
                        unset($_SESSION["err_username"]);
                        ?>
                    </span>
                </div>

                <div class="input-box">
                    <label>Full Name</label><br>
                    <input type="text" name="fullName" placeholder="Full Name" value="<?php if (isset($fullName)) {
                                                                                            echo $fullName;
                                                                                        }; ?>">
                    <!-- <i class='bx bxs-lock-alt' ></i> -->
                </div>

                <div class="error-msg">
                    <span id="err_fullName">
                        <?php
                        if (isset($_SESSION["err_fullName"])) {
                            echo $_SESSION["err_fullName"];
                        }
                        unset($_SESSION["err_fullName"]);
                        ?>
                    </span>
                </div>

                <div class="input-box">
                    <Label>Email</Label><br>
                    <input type="text" name="email" placeholder="Email" value="<?php if (isset($email)) {
                                                                                    echo $email;
                                                                                }; ?>">
                    <!-- <i class='bx bxs-user'></i> -->
                </div>

                <div class="error-msg">
                    <span id="err_email">
                        <?php
                        if (isset($_SESSION["err_email"])) {
                            echo $_SESSION["err_email"];
                        }
                        unset($_SESSION["err_email"]);
                        ?>
                    </span>
                </div>

                <div class="input-box">
                    <label>Phone</label><br>
                    <input type="text" name="phone" placeholder="Phone" value="<?php if (isset($phone)) {
                                                                                    echo $phone;
                                                                                }; ?>">
                </div>

                <div class="error-msg">
                    <span id="err_phone">
                        <?php
                        if (isset($_SESSION["err_phone"])) {
                            echo $_SESSION["err_phone"];
                        }
                        unset($_SESSION["err_phone"]);
                        ?>
                    </span>
                </div>

                <button type="submit" name="update" class="btn-profile">Update</button>

            </form>
        </div>

        <div class="wrapper-pass">
            <form action="../Controller/changePassword_action.php" method="post" onsubmit="return validate2();" novalidate>
                <h2>Change Password</h2>
                <div class="input-box">
                    <label>Current Password</label><br>
                    <input type="password" name="currentPassword" placeholder="Current Password">
                </div>

                <div class="error-msg">
                    <span id="err_currentPassword">
                        <?php
                        if (isset($_SESSION["err_currentPassword"])) {
                            echo $_SESSION["err_currentPassword"];
                        }
                        unset($_SESSION["err_currentPassword"]);
                        ?>
                    </span>
                </div>

                <div class="input-box">
                    <Label>New Password</Label><br>
                    <input type="password" name="newPassword" placeholder="New Password">
                </div>

                <div class="error-msg">
                    <span id="err_newPassword">
                        <?php
                        if (isset($_SESSION["err_newPassword"])) {
                            echo $_SESSION["err_newPassword"];
                        }
                        unset($_SESSION["err_newPassword"]);
                        ?>
                    </span>
                </div>

                <div class="input-box">
                    <label>Confirm Password</label><br>
                    <input type="password" name="confirmPassword" placeholder="Confirm Password">
                </div>

                <div class="error-msg">
                    <span id="err_confirmPassword">
                        <?php
                        if (isset($_SESSION["err_confirmPassword"])) {
                            echo $_SESSION["err_confirmPassword"];
                        }
                        unset($_SESSION["err_confirmPassword"]);
                        ?>
                    </span>
                </div>

                <button type="submit" class="btn-profile">Change Password</button>

            </form>
        </div>
    </div>

</body>

</html>