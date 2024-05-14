<?php

include("top_section.php");
include("../Model/db_config.php");

if (isset($_SESSION["username"])) {
    include("question_button.php");
}

if (isset($_SESSION["err_item"])) {
    include("alert_box2.php");
}

if (isset($_POST['sort_product'])) {
    $sort_by = $_POST['sort_product'];
} else {
    $sort_by = "Default";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="homepage.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

    <h1>Product Catalogs</h1>

    <!-- <form method="post" novalidate>
    <div class="filter-condition">
        <span>Sort By</span>
        <select name="sort_product" id="sort_product" class="sort-input">
            <option value="Default">Default</option>
            <option value="LowToHigh" class="lowtohigh">Low to High</option>
            <option value="HighToLow">High to Low</option>
        </select>
    </div>
    </form> -->

    <form method="post" novalidate>
        <div class="filter-condition">
            <span>Sort By</span>
            <select name="sort_product" id="sort_product" class="sort-input">
                <option value="Default" <?php echo ($sort_by == "Default") ? 'selected' : ''; ?>>Default</option>
                <option value="LowToHigh" <?php echo ($sort_by == "LowToHigh") ? 'selected' : ''; ?>>Low to High</option>
                <option value="HighToLow" <?php echo ($sort_by == "HighToLow") ? 'selected' : ''; ?>>High to Low</option>
            </select>
        </div>
    </form>

    <!-- <section class="product" id="product"> -->
    <!-- <h2 class="heading">Products</h2> -->
    <?php if ($sort_by == "Default") { ?>
        <div class="box-container" id="box-container">
            <?php
            $sql = $conn->prepare("select * from product_datas");
            $sql->execute();
            $result = $sql->get_result();

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="box">
                    <img src="<?php echo $row["picture"]; ?>">
                    <h3><?php echo $row["name"]; ?></h3>
                    <div class="price"><?php echo $row["price_after_discount"]; ?>৳</div>
                    <?php if ($row["price"] > $row["price_after_discount"]) { ?>
                        <div class="old-price"><del><?php echo $row["price"]; ?>৳</del></div>
                    <?php } else { ?>
                        <div class="new-arrival">New Arrival</div>
                    <?php } ?>
                    <form action="../Controller/cart_action.php" method="post" novalidate>
                        <?php if ($row["quantity"] == 0) { ?> <div class="stock"><?php echo "Stock out"; ?></div><?php } else { ?>
                            <button type="submit" name="add_to_cart" class="btn-cart"><i class='bx bx-cart-add'></i> Add to cart</button>
                        <?php } ?>
                        <input type="hidden" name="image" value="<?php echo $row["picture"]; ?>">
                        <input type="hidden" name="item_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="price" value="<?php echo $row["price_after_discount"]; ?>">
                    </form>

                </div>

            <?php } ?>
        </div>
    <?php } ?>

    <!-- Sort by low to high -->
    <?php if ($sort_by == "LowToHigh") { ?>
        <div class="box-container" id="box-container">
            <?php
            $sql = $conn->prepare("select * from product_datas order by price_after_discount asc");
            $sql->execute();
            $result = $sql->get_result();

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="box">
                    <img src="<?php echo $row["picture"]; ?>">
                    <h3><?php echo $row["name"]; ?></h3>
                    <div class="price"><?php echo $row["price_after_discount"]; ?>৳</div>
                    <?php if ($row["price"] > $row["price_after_discount"]) { ?>
                        <div class="old-price"><del><?php echo $row["price"]; ?>৳</del></div>
                    <?php } else { ?>
                        <div class="new-arrival">New Arrival</div>
                    <?php } ?>
                    <form action="../Controller/cart_action.php" method="post" novalidate>
                        <?php if ($row["quantity"] == 0) { ?> <div class="stock"><?php echo "Stock out"; ?></div><?php } else { ?>
                            <button type="submit" name="add_to_cart" class="btn-cart"><i class='bx bx-cart-add'></i> Add to cart</button>
                        <?php } ?>
                        <input type="hidden" name="image" value="<?php echo $row["picture"]; ?>">
                        <input type="hidden" name="item_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="price" value="<?php echo $row["price_after_discount"]; ?>">
                    </form>

                </div>

            <?php } ?>
        </div>
    <?php } ?>

    <!-- Sort by high to low -->
    <?php if ($sort_by == "HighToLow") { ?>
        <div class="box-container" id="box-container">
            <?php
            $sql = $conn->prepare("select * from product_datas order by price_after_discount desc");
            $sql->execute();
            $result = $sql->get_result();

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="box">
                    <img src="<?php echo $row["picture"]; ?>">
                    <h3><?php echo $row["name"]; ?></h3>
                    <div class="price"><?php echo $row["price_after_discount"]; ?>৳</div>
                    <?php if ($row["price"] > $row["price_after_discount"]) { ?>
                        <div class="old-price"><del><?php echo $row["price"]; ?>৳</del></div>
                    <?php } else { ?>
                        <div class="new-arrival">New Arrival</div>
                    <?php } ?>
                    <form action="../Controller/cart_action.php" method="post" novalidate>
                        <?php if ($row["quantity"] == 0) { ?> <div class="stock"><?php echo "Stock out"; ?></div><?php } else { ?>
                            <button type="submit" name="add_to_cart" class="btn-cart"><i class='bx bx-cart-add'></i> Add to cart</button>
                        <?php } ?>
                        <input type="hidden" name="image" value="<?php echo $row["picture"]; ?>">
                        <input type="hidden" name="item_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="price" value="<?php echo $row["price_after_discount"]; ?>">
                    </form>

                </div>

            <?php } ?>
        </div>
    <?php } ?>


    <!-- Javascript -->
    <script src="js/search.js"></script>
    
    <script>
        document.getElementById("sort_product").addEventListener("change", function() {
            this.form.submit();
        });
    </script>

</body>

</html>