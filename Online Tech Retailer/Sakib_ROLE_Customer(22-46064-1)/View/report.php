<?php

include "../Model/db_config.php";
include("top_section.php");
if(isset($_SESSION["report_msg"])){
    include("alert_box2.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="report.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section>
    <h1>Report</h1>
    <div class="container">
        <table>
            <th>Report</th>
        </table>

        <form action="../Controller/report_action.php" method="post" novalidate>
            <div class="report-info">
                <Label>Order Id</Label><br>
                <input type="text" name="order_id" placeholder="Order Id">
            </div>

            <div class="error-msg">
                <span id="err_order_id">
                <?php
                if (isset($_SESSION["err_order_id"])) {
                    echo $_SESSION["err_order_id"];
                 }
                 unset($_SESSION["err_order_id"]);
                 ?>
                </span>
            </div>

            <div class="report-info">
                <Label>Username</Label><br>
                <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION["username"] ?>" readonly>
            </div>

            <div class="report-info">
                <textarea name="report_message" class="txt-report" rows="4" cols="8" placeholder="Type your report.."></textarea>
            </div>

            <div class="error-msg2">
                <span id="err_report_message">
                <?php
                if (isset($_SESSION["err_report_message"])) {
                    echo $_SESSION["err_report_message"];
                 }
                 unset($_SESSION["err_report_message"]);
                 ?>
                </span>
            </div>

            <!-- <div class="btn-container"> -->
                <button name="purchase" class="btn-report">Report</button>
            <!-- </div> -->
    </form>
    </div>

    <div class="table-container">
    <table class="content-table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <!-- <th>Item Name</th> -->
                    <th>Report Message</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $usernameX = $_SESSION["username"];
                $sql = $conn->prepare("select * from customer_report where username=?");
                $sql->bind_param("s", $usernameX);
                $sql->execute();
                $result = $sql->get_result();

                // $sql2 = $conn->prepare("select * from customer_order where customer_name=?");
                // $sql2->bind_param("s", $usernameX);
                // $sql2->execute();
                // $result2 = $sql2->get_result();

                // while($item_fetch=mysqli_fetch_assoc($result2)){
                //     $item=$item_fetch["Item_Name"];
                // }

                while ($user_fetch = mysqli_fetch_assoc($result)) {
                    echo "
                <tr>
                <td>$user_fetch[Order_Id]</td>
                <td>$user_fetch[Report_Message]</td>
                </tr>
                ";
                }

                ?>

            </tbody>
        </table>
    </div>
    </section><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>

</html>