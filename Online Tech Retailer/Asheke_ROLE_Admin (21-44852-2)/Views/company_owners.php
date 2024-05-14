<html>

<head>

</head>

<body>

      
<?php session_start(); include("header_after_login.php"); ?>

    <h1>Select the owner, to know about their informations</h1><hr>

    <form action="">
        <select name="username" onchange="showUser(this.value)">
            <option value="">Select a Name</option>
            <option value="asheke">Md Asheke Rabbi</option>
            <option value="yeameen">Yeameen Aziz Abdullah</option>
            <option value="sakib">Md Sakibul Alam</option>
            <option value="pranto">Pranto Biswas</option>

        </select>
        </form>
        <div id="demo">Owner Infomation: </div>


        <script>
            function showUser(str){
                if(str==''){
                    document.getElementById('demo').innerHTML='';
                    return
                }
                const xhttp=new XMLHttpRequest();
                xhttp.onload=function(){
                    document.getElementById('demo').innerHTML=this.responseText;
                }
                xhttp.open('GET','../Controllers/company_owners_action.php?q='+str);
                xhttp.send();
            }
        </script>
    
</body>

<?php  include("footer.php"); ?>
</html>