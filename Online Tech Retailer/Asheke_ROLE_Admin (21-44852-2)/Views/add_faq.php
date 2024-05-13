<?php 
session_start();     
    
      
    
?>
    
    <html>
        <head>
        <link rel="stylesheet" href="../CSS/add_employees.css">
        <script type="text/javascript" src="js/add_employee.js"></script>
        </head>
        <body>
            <?php 
                if(!isset($_SESSION['username'])){
                    header("location: login.php");
                }
                else{
                   include "header_after_login.php";
                }
            ?>
            <form action="../Controllers/add_faq_action.php" method="post" onsubmit="return validate();"  novalidate; >
                
                <fieldset>
                <table>
                    <legend>Add FAQ</legend>
                    
                    <tr>
                        <th><label for="question">Question</label></th>
                        <td>:</td>
                        <td><input type="text" id="question" name="question" placeholder="Question" value="">
                        <span class="error" id="err_question">
                            <?php
                            if (isset($_SESSION['err_question'])) {
                                echo $_SESSION['err_question'];                           
                            }
                            unset($_SESSION['err_question']);
                            ?>
                        </span>
                        </td>                    
                    </tr>
                    
                    <tr>
                        <th><label for="answer">Answer</label></th>
                        <td>:</td>
                        <td><input type="text" id="answer" name="answer" placeholder="Answer" value="">
                        <span class="error" id="err_answer">
                            <?php
                            if (isset($_SESSION['err_answer'])) {
                                echo $_SESSION['err_answer'];                           
                            }
                            unset($_SESSION['err_answer']);
                            ?>
                        </span>
                        </td>                    
                    </tr>
     
                    

              
                       
                    <tr>
                        <td></td>
                        <td></td>               
                        <td align="right"><input type="submit" value="Add FAQ"></td>
                    </tr>
    
                </table>
                </fieldset>
            </form>
            <?php include("footer.php"); ?>
        </body>
    </html>








