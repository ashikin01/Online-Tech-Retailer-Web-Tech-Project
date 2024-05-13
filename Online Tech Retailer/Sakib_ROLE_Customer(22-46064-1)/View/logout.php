<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Style2.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <h1>Profile</h1>
    <div class="profile-header">

        <form action="../Controller/logout_action.php" method="post" novalidate>
            <!-- <nav> -->
            <div class="container-header">
                <a href="profile.php" class="nav-link">Account Details</a>
                <a href="order_history.php" class="nav-link">Order History</a>
            </div>
            <!-- </nav> -->

            <div class="wrapper-btn-logout">
                <button type="submit" class="btn-logout">Logout</button>
            </div>
        </form>

    </div>

    <script scr="js/button2.js"></script>
</body>

</html>