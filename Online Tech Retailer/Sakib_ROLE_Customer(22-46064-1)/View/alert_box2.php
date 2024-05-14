<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .alert {
      position: absolute;
      padding: 15px 10px 22px;
      background-color: darkslategrey;
      color: #fff;
      width: 400px;
      height: 7px;
      margin-top: -5px;
      margin-left: 483px;
      /* border: 1px solid rgb(102, 178, 178); */
      border: none;
      box-shadow: 5px 30px 56px rgb(55 55 55 / 10%);
      border-radius: 6px;
    }

    .alert p {
      font-size: 15px;
      margin-top: -8px;
    }

    .closebtn {
      margin-left: 15px;
      color: rgb(218, 3, 3);
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 10px;
      cursor: pointer;
      /* transition: 0.3s; */
    }

    .closebtn:hover {
      opacity: 0.9;
      color: #fff;
    }
  </style>
</head>

<body>

  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
    <p><?php if (isset($_SESSION["update_msg"])) {
          echo $_SESSION["update_msg"];
        } else if (isset($_SESSION["report_msg"])) {
          echo $_SESSION["report_msg"];
        } else if (isset($_SESSION["purchase_msg"])) {
          echo $_SESSION["purchase_msg"];
        } else if (isset($_SESSION["err_login"])) {
          echo $_SESSION["err_login"];
        } else if (isset($_SESSION["err_cart"])) {
          echo $_SESSION["err_cart"];
        } else if (isset($_SESSION["err_payment"])) {
          echo $_SESSION["err_payment"];
        } else if (isset($_SESSION["err_item"])) {
          echo $_SESSION["err_item"];
        } else if (isset($_SESSION["question_msg"])) {
          echo $_SESSION["question_msg"];
        } else if (isset($_SESSION["err_quantity"])) {
          echo $_SESSION["err_quantity"];
        }
        unset($_SESSION["update_msg"]);
        unset($_SESSION["report_msg"]);
        unset($_SESSION["purchase_msg"]);
        unset($_SESSION["err_login"]);
        unset($_SESSION["err_cart"]);
        unset($_SESSION["err_payment"]);
        unset($_SESSION["err_item"]);
        unset($_SESSION["question_msg"]);
        unset($_SESSION["err_quantity"]);
        ?>

    </p>
  </div>


</body>

</html>