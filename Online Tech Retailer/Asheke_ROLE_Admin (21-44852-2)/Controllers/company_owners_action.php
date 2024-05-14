<?php
session_start();



$gettext=$_REQUEST['q'];

include "../Model/db_config2.php";

$sql=$conn->prepare("select * from company_owners where username=?");
$sql->bind_param("s",$gettext);
$sql->execute();
$data=$sql->get_result();

if(mysqli_num_rows($data)>0){
                
   foreach($data as $row){
   
    $full_name=$row['full_name'];
    $phone_number=$row['phone_number'];
    $email=$row['email'];
    $address=$row['address'];
   }
   
   echo "<table>
            <tr><th>Full Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
            </tr>

            <tr>
            <td>".$full_name."</td>
            <td>".$phone_number."</td>
            <td>".$email."</td>
            <td>".$address."</td>
            
            
            </tr>

            </table>
   
   ";
}
else{
    echo "Data not Found";
}

