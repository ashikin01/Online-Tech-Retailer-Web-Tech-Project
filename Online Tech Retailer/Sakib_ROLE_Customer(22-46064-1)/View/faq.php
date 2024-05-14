<?php

include "../Model/db_config.php";
include("top_section.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        h1 {
            font-size: 22px;
            margin-left: 275px;
            margin-top: 100px;
            font-weight: bold;
        }

        .faq-container {
            /* min-height: 200vh; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .faq {
            text-align: left;
            color: #121212;
            margin-top: 55px;
            width: 800px;
            min-height: 420px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 20px rgb(55 55 55 / 15%);
            padding: 60px;
        }

        .question {
            font-size: 22px;
            background: teal;
            box-shadow: 0 0 10px rgb(55 55 55 / 15%);
            padding: 10px;
        }

        .answer {
            font-size: 15px;
            background: #eeeeee;
            box-shadow: 0 0 15px rgb(55 55 55 / 1%);
            padding: 10px;

        }
    </style>

</head>

<body>
    <h1>FAQ</h1>
    <div class="faq-container">
        <div class="faq">
            <?php
            $sql = $conn->prepare("select * from faq");
            $sql->execute();
            $result = $sql->get_result();

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="question">
                    <h6><?php echo $row["question"]; ?></h6>
                </div>
                <div class="answer">
                    <p><?php echo $row["answer"]; ?></p>
                </div><br><br>
            <?php } ?>
        </div>
    </div>

</body>

</html>