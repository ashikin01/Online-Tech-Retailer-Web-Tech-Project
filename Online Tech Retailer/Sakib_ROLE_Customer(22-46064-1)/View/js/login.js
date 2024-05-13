function validate()
{
    const username = document.getElementById["username"];
    const password = document.getElementById["password"];

    const err_username = document.getElementsByClassName["err_username"];
    const err_password = document.getElementsByClassName["err_password"];

    let flag=true;

    if(username.value === ""){
        err_username.innerHTML="Please fill up the username";
        flag=false;
    }

    if(password.value === ""){
        err_password.innerHTML="Please fill up the password";
        flag=false;
    }

    return flag;
}