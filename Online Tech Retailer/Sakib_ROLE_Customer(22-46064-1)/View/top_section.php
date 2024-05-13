<?php

session_start();
// include("cart_action.php");
$count = 0;
if (isset($_SESSION["cart"])) {
    if ($_SESSION['cart']) {
        $count = count($_SESSION['cart']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Retailer</title>
    <!-- <script type="text/javascript"></script> -->
    <link rel="stylesheet" href="Style3.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8372dfe193.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <section class="container">
        <header>
            <div class="header-container">
                <nav>
                    <h1 class="retailer">Tech Retailer</h1>
                    <div class="menu">
                        <a href="homepage.php" class="button-value">Home</a>
                        <a href="product.php" class="button-value">Product</a>
                        <a href="registration.php" class="button-value">About</a>
                        <a href="faq.php" class="button-value">FAQ</a>
                    </div>

                    <div class="search">
                        <button type="submit" id="search" class="search-button"><img src="assets/search_1.png" alt=""></button>
                        <input type="search" name="" id="search-input" placeholder="Search Product..." onkeyup="search()">

                        <!-- <button type="submit" id="search" class="search-button"><img src="assets/search_1.png" alt=""></button> -->
                    </div>

                    <div class="icon">
                        <a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i><span class="cart-value"><?php  echo $count; ?></span></a>
                        <?php if (isset($_SESSION["username"])) { ?>
                            <a href="profile.php"><i class="fa-solid fa-user"></i></a>
                        <?php } 
                        else { ?>
                            <a href="login.php"><i class="fa-solid fa-user"></i></a>
                        <?php } ?>

                    </div>
                </nav>
            </div>
        </header>
    </section>
    <!-- <section class="container">
        <div class="home-product">
              <div>
                <a href="homepage.php">Home</a>
                <a href="">Product</a>
              </div>
        </div>
    </section> -->
    <script src="js/button.js"></script>
</body>

</html>