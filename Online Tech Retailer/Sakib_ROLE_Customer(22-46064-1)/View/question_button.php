<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech Retailer</title>
    <link rel="stylesheet" href="CSS/report.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8372dfe193.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .btn-container form{
            position: fixed;
            margin-left: 1290px;
            margin-top: 400px;
        }

        .btn-question {
            /* margin-top: 35px; */
            display: flex;
            justify-content: center;
            padding: 0.3rem 0.7rem;
            background: whitesmoke;
            cursor: pointer;
            font-size: 25px;
            color: teal;
            /* font-weight: bold; */
            border: 1px solid rgb(102, 178, 178);
            border-radius: 12px;
            box-shadow: 0 0 10px rgb(55 55 55 / 35%);
        }

        .btn-:hover {
            background: rgb(102, 178, 178);
            color: whitesmoke
        }
    </style>
</head>

<body>
    <div class="btn-container">
        <form action="customer_question.php" method="post" novalidate>
        <button class="btn-question"><i class='bx bx-message-square-detail'></i></button>
    </form>
    </div>
</body>

</html>