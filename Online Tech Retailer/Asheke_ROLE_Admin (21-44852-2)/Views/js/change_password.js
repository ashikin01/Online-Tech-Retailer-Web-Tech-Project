function validate() {

    const old_password = document.getElementById("old_password");
    const new_password = document.getElementById("new_password");
    const confirm_new_password = document.getElementById("confirm_new_password");

    

    const err_old_password = document.getElementById("err_old_password");
    const err_new_password = document.getElementById("err_new_password");
    const err_confirm_new_password = document.getElementById("err_confirm_new_password");
    
    
    let flag = true;

    if(old_password.value === "") {
        err_old_password.innerHTML = "Please flll up the old password section";
        flag = false;
    }
    
    if (new_password.value === "") {
        err_new_password.innerHTML = "Please flll up the new password section";
        flag = false;
    }
    
    if (confirm_new_password.value === "") {
        err_confirm_new_password.innerHTML = "Please flll up the confirm password section";
        flag = false;
    }



 
    
    return flag;
    }