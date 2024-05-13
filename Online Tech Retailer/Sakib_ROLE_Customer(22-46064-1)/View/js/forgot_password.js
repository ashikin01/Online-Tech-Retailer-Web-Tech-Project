function validate() {

    const username = document.getElementById("username");
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    const err_username = document.getElementById("err_username");
    const err_newPassword = document.getElementById("err_new_password");
    const err_confirmPassword = document.getElementById("err_confirmPassword");

    let flag = true;

    if (username.value === "") {
        err_username.innerHTML = "Please flll up the username";
        flag = false;
    }

    if (newPassword.value === "") {
        err_newPassword.innerHTML = "Please flll up the new password section";
        flag = false;
    }

    if (confirmPassword.value === "") {
        err_confirmPassword.innerHTML = "Please flll up the confirm password";
        flag = false;
    }
    
    return flag;
}