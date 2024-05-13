<?php 
    $db_server="localhost";
    $db_user_name="root";
    $db_password="";
    $db_name="webtech project";

    $conn= mysqli_connect($db_server,$db_user_name,$db_password,$db_name );

    
    
    if($conn){

     $query= "insert into admin_users values (null,'kaffrgssgimf','userkssgsgffarih','passwosfrfd141','kafrisdgsfm@gmailf.com','01864444665895')";

       mysqli_query($conn,$query);
           
        

    }
    $query= "select * from admin_users";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>User Name</td>";
    echo "<td>Email</td>";
    echo "<td>Phone Number</td>";
    echo "</tr>";
   
    
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["phone_number"]."</td>";
        echo "</tr>";
    }

    echo "</table>";