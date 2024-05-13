function validate2() {

    const currentPassword = document.getElementById("currentPassword");
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    

    const err_currentPassword = document.getElementById("err_currentPassword");
    const err_newPassword = document.getElementById("err_newPassword");
    const err_confirmPassword = document.getElementById("err_confirmPassword");
    
    
    let flag = true;

    if(currentPassword.value === "") {
        err_currentPassword.innerHTML = "Please flll up the current password";
        flag = false;
    }
    
    if (newPassword.value === "") {
        err_newPassword.innerHTML = "Please flll up the new password";
        flag = false;
    }
    
    if (confirmPassword.value === "") {
        err_confirmPassword.innerHTML = "Please flll up the confirm password";
        flag = false;
    }

    return flag;
}