<?php

include "../Model/db_config.php";
include("top_section.php");
if(isset($_SESSION["question_msg"])){
    include("alert_box2.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="customer_question.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section>
    <h1>Question</h1>
    <div class="container">
        <table>
            <th>Question</th>
        </table>

        <form action="../Controller/customer_question_action.php" method="post" novalidate>
            <!-- <div class="question-info">
                <Label>Username</Label><br> -->
                <input type="hidden" name="username" placeholder="Username" value="<?php echo $_SESSION["username"] ?>" readonly>
            <!-- </div> -->

            <div class="question-info">
                <textarea name="question" class="txt-question" rows="4" cols="8" placeholder="Type your question.."></textarea>
            </div>
            <div class="error-msg">
                <span id="err_question">
                <?php
                if (isset($_SESSION["err_question"])) {
                    echo $_SESSION["err_question"];
                 }
                 unset($_SESSION["err_question"]);
                 ?>
                </span>
            </div>

            <!-- <div class="btn-container"> -->
                <button name="purchase" class="btn-send">Send</button>
            <!-- </div> -->
    </form>
    </div>

    <div class="table-container">
    <table class="content-table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $usernameX = $_SESSION["username"];
                $sql = $conn->prepare("select * from customer_question where customer_name=?");
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

                while ($data_fetch = mysqli_fetch_assoc($result)) {
                    echo "
                <tr>
                <td>$data_fetch[Question]</td>
                <td>$data_fetch[Answer]</td>
                </tr>
                ";
                }

                ?>

            </tbody>
        </table>
    </div>
    </section>
</body>

</html>