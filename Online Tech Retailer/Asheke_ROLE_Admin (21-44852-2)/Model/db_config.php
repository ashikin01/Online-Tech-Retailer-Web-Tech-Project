
<?php 

    $db_server="localhost";
    $db_user_name="root";
    $db_password="";
    $db_name="webtech project";

    

    function execute($query){
        global $db_server,$db_user_name,$db_password,$db_name; 
        $conn= mysqli_connect($db_server,$db_user_name,$db_password,$db_name);

        if($conn){
            if(mysqli_query($conn,$query)){
                return true;
            }
            else{
                
                return mysqli_error($conn);
            }
            

        }

    }
    
    function get($query){
        global $db_server,$db_user_name,$db_password,$db_name; 
        $conn= mysqli_connect($db_server,$db_user_name,$db_password,$db_name);
        $data=array();

        if($conn){
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        }
        return $data;
    }
    
    function get_count($query){
        global $db_server,$db_user_name,$db_password,$db_name; 
        $conn= mysqli_connect($db_server,$db_user_name,$db_password,$db_name);
        

        if($conn){
            $result=mysqli_query($conn,$query);
            
        }
        return $result;
    }



?>

