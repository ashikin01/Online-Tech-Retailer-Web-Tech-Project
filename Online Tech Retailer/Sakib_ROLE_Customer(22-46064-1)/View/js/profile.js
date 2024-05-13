function validate() {

    const username = document.getElementById("username");
    const fullName = document.getElementById("fullName");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    
    const err_username = document.getElementById("err_username");
    const err_fullName = document.getElementById("err_fullName");
    const err_email = document.getElementById("err_email");
    const err_phone = document.getElementById("err_phone");
    
    let flag = true;

    if(username.value === "") {
        err_username.innerHTML = "Please flll up the username";
        flag = false;
    }
    if (fullName.value === "") {
        err_fullName.innerHTML = "Please flll up the full name";
        flag = false;
    }
    if (email.value === "") {
        err_email.innerHTML = "Please flll up the email";
        flag = false;
    }

    if (phone.value === "") {
        err_phone.innerHTML = "Please flll up the phone number";
        flag = false;
    }
    
    return flag;
}