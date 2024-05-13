function validateForm() {
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const mobileNumber = document.getElementById('mobile_number');

    const errorUsername = document.getElementById('error_username');
    const errorPassword = document.getElementById('error_password');
    const errorMobileNumber = document.getElementById('error_mobile_number');

    let flag = true;

    if (username.value === '') {
        errorUsername.innerHTML = "Please fill in username";
        flag = false;
    }
    else {
        errorUsername.innerHTML = "";
    }

    if (password.value === '') {
        errorPassword.innerHTML = "Please fill in password";
        flag = false;
    }
    else {
        errorPassword.innerHTML = ""; 
    }

    if (mobileNumber.value === '') {
        errorMobileNumber.innerHTML = "Please fill in mobile number";
        flag = false;
    }
    else {
        errorMobileNumber.innerHTML = ""; 
    }

    return flag;
}