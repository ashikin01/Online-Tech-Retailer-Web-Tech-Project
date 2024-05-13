function validate() {
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    
    const err_username = document.getElementById("err_username");
    const err_password = document.getElementById("err_password");
    
    let flag = true;
    
    if (username.value === "") {
        err_username.innerHTML = "Please fill up the username";
        flag = false;
    } else {
        err_username.innerHTML = ""; // Clear error message if username is filled
    }
    
    if (password.value === "") {
        err_password.innerHTML = "Please fill up the password";
        flag = false;
    } else {
        err_password.innerHTML = ""; // Clear error message if password is filled
    }
    
    return flag;
}
