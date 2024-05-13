<?php
    session_start();
    include "../Model/db_config2.php";

    
    $question="";
    $err_question="";
   
    $answer="";
    $err_answer="";
  


    
    

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $has_error=false;
        $has_db_error=false;

        
        
        $question=sanitize($_POST["question"]);

        if(empty($question)){
            $err_question="question Required";
            $_SESSION['err_question']=$err_question;
            $has_error=true;            
        }

               
        $answer=sanitize($_POST["answer"]);

        if(empty($answer)){
            $err_answer="Answer Required";
            $_SESSION['err_answer']=$err_answer;
            $has_error=true;   
        }

    


  
 
            
                  
    }

  





        if($has_error==false){

            $sql=$conn->prepare("insert into faq values(null,?,?)");
            $rating=0;
            $sql->bind_param("ss",$question,$answer);
            $sql->execute();

            
            $db_error= true;

            if($db_error === true){       
            header("location: ../Views/faq.php");
            }
            else{
               
            }
            

        }    
        else{
            header("location: ../Views/add_employees.php");
        }

      


    

        
      
    
    


    function sanitize($data){      
        $data=htmlspecialchars($data);
        return $data;
    }

   