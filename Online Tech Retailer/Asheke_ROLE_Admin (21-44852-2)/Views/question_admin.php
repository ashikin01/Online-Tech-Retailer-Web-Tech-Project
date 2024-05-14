<html lang="en">
<head>

   <title>Admin - Customer Questions</title>
    <link rel="stylesheet" href="../CSS/question_admin.css"> 
</head>
<body>



<?php
session_start();
 

include "header_after_login.php";
include "../Model/db_config2.php";



$sql=$conn->prepare("select * from customer_question");
$sql->execute();
$data=$sql->get_result();





if (mysqli_num_rows($data)>0) {
   
    
    echo "<table class='question-table' >";
    echo "<tr><td colspan='5' align='center'><b>Unanswered Questions</td></tr>";
    echo "<tr><th>Question ID</th><th>Customer ID</th><th>Customer Name</th><th>Question</th><th>Answer</th></tr>";
    
    
    
    foreach($data as $row) {
        
        $check_answer=$row["Answer"];

        

        if(empty($check_answer)){  
        
        $question_id = $row["Question_Id"];
        $customer_id = $row["customer_id"];
        $customer_name = $row["Customer_Name"];
        $question_temp = $row["Question"]; 

        

        $question=sanitize($question_temp);


        echo "<tr>
            <td>$question_id</td>
            <td>$customer_id</td>
            <td>$customer_name</td>
            <td>$question</td>
            <td>
                <form action='../Controllers/question_admin_action.php' method='post' >
                    <input type='hidden' name='question_id' value='$question_id'>
                    <textarea name='answer' rows='4' cols='50'></textarea>
                    <button type='submit'>Submit Answer</button>
                </form>
            </td>
        </tr>";
    

        }
        else{}
    

}

echo "</table>";
} 

else {
    echo "<h3>No questions found.</h3>";
}

function sanitize($data){      
    $data=htmlspecialchars($data);
    return $data;
}

?>

</body>

<?php  include("footer.php"); ?>
</html>


