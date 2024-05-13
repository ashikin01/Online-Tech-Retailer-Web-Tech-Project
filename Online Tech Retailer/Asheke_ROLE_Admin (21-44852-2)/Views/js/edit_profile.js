function validate() {

    const name = document.getElementById("name");
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const phone_number = document.getElementById("phone_number");
    

    const err_name = document.getElementById("err_name");
    const err_username = document.getElementById("err_username");
    const err_email = document.getElementById("err_email");
    const err_phone_number = document.getElementById("err_phone_number");
    
    let flag = true;

    if(username.value === "") {
        err_username.innerHTML = "Please flll up the username";
        flag = false;
    }
    
    if (name.value === "") {
        err_name.innerHTML = "Please flll up the name";
        flag = false;
    }
    
    if (email.value === "") {
        err_email.innerHTML = "Please flll up the email ";
        flag = false;
    }

    if (phone_number.value === "") {
        err_phone_number.innerHTML = "Please flll up the Phone Number";
        flag = false;
    }

 
    
    return flag;
    }