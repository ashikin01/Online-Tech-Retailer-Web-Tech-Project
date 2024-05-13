<?php session_start();?>
<? $_SESSION[""]
<html>
<head>

</head>

<body>
  <table>
    <tr>
      <th align="middle">XYZ Tech Retailer</th>
    </tr>
    <tr>
      <td width="100%">.</td>
      <td width="10%" align="right">
        <form action="home.php">
          <button type="submit">Home</button>
        </form>
      </td>
      <td width="20%" align="right">
        <form action="login.php">
          <button type="submit">Login</button>
        </form>
      </td>
      <td width="30%" align="right">
        <form action="sign_up.php">
          <button type="submit">Sign Up</button>
        </form>
      </td>
    </tr>
  </table>
