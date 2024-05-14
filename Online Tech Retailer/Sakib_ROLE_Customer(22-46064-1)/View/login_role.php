<?php

include("top_section.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      text-decoration: none;
      list-style: none;
      scroll-behavior: smooth;
    }

    .login-role {
      /* position: absolute; */
      padding: 15px 10px 22px;
      background-color: darkslategrey;
      color: #fff;
      width: 550px;
      height: 200px;
      margin-top: 200px;
      margin-left: 395px;
      /* box-shadow: 5px 30px 56px rgb(55 55 55 / 10%); */
      box-shadow: 10px 10px 10px rgb(55 55 55 / 25%);
      border-radius: 5px;
    }

    .login-role h1 {
      font-size: 20px;
      margin-top: 12px;
      font-weight: bold;
      text-align: center;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 50px 30px;
    }

    .btn-admin {
      background: rgb(11, 212, 129);
      width: 115px;
      height: 35px;
      border: .5px solid rgb(102, 178, 178);
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
      font-weight: bold;
      box-shadow: 0 0 10px rgb(55 55 55 / 35%);
    }

    .btn-admin:hover {
      background: transparent;
      color: #fff;
    }

    .btn-employee {
      background: rgb(173, 228, 24);
      width: 140px;
      height: 35px;
      border: .5px solid rgb(102, 178, 178);
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
      font-weight: bold;
      box-shadow: 0 0 10px rgb(55 55 55 / 35%);
    }

    .btn-employee:hover {
      background: transparent;
      color: #fff;
    }

    .btn-delivery {
      background: rgb(10, 157, 202);
      width: 160px;
      height: 35px;
      border: .5px solid rgb(102, 178, 178);
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
      font-weight: bold;
      box-shadow: 0 0 10px rgb(55 55 55 / 35%);
    }

    .btn-delivery:hover {
      background: transparent;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="login-role">
    <h1>Choose login role ?</h1>

    <div class="btn-container">
      <!-- <form action="" method="post" novalidate>
        <button >Admin Login</button>
      </form>

      <form action="" method="post" novalidate>
        <button >Employee Login</button>
      </form> -->

      <a href="../../Asheke_ROLE_Admin (21-44852-2)/Views/login.php"><input class="btn-admin" type="button" name="company_owners" value="Admin Login"></a>
      <a href="../../Yeameen_ROLE_Employee (21-44886-2)/Views/Login_Layout.php"><input class="btn-employee" type="button" name="company_owners" value="Employee Login"></a>
      <a href="../../Pranto_ROLE_Delivery_Man(21-45026-2)/views/login.php"><input class="btn-delivery" type="button" name="company_owners" value="Delivery Man Login"></a>

      <!-- <form action="" method="post" novalidate>
        <button >Delivery Man Login</button>
      </form> -->
    </div>
  </div>

</body>

</html>