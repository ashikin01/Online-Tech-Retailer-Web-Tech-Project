function validate() {

const username = document.getElementById("username");
const password = document.getElementById("password");

const err_username = document.getElementById("err_username");
const err_password = document.getElementById("err_password");

let flag = true;
if(username.value === "") {
    err_username.innerHTML = "Please flll up the username";
    flag = false;
}
if (password.value === "") {
    err_password.innerHTML = "Please flll up the password";
    flag = false;
}

return flag;
}