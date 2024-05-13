function validate() {

    const otp = document.getElementById("otp");
    const username = document.getElementById("username");
    const new_password = document.getElementById("new_password");

    

    const err_otp = document.getElementById("err_otp");
    const err_username = document.getElementById("err_username");
    const err_new_password = document.getElementById("err_new_password");
    
    
    let flag = true;

    if(otp.value === "") {
        err_otp.innerHTML = "Please flll up the otp";
        flag = false;
    }
    
    if (new_password.value === "") {
        err_new_password.innerHTML = "Please flll up the new password section";
        flag = false;
    }
    
    if (username.value === "") {
        err_username.innerHTML = "Please flll up the username section";
        flag = false;
    }



 
    
    return flag;
    }