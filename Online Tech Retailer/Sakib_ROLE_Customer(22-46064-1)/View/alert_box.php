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
      margin-top: 95px;
      margin-left: 480px;
      border: 1px solid rgb(102, 178, 178);
      box-shadow: 5px 30px 56px rgb(55 55 55 / 10%);
      border-radius: 5px;
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
    <p><?php if (isset($_SESSION["change_msg"])) {
          echo $_SESSION["change_msg"];
        } else if (isset($_SESSION["forgot_msg"])) {
          echo $_SESSION["forgot_msg"];
        } else if (isset($_SESSION["register_msg"])) {
          echo $_SESSION["register_msg"];
        }
        unset($_SESSION["change_msg"]);
        unset($_SESSION["forgot_msg"]);
        unset($_SESSION["register_msg"]);
        ?>

    </p>
  </div>


</body>

</html>