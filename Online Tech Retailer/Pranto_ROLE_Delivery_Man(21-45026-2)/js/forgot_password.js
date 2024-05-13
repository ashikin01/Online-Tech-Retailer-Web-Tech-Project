function validateForm() {
    const username = document.getElementById('username');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');

    const errorUsername = document.getElementById('error_username');
    const errorNewPassword = document.getElementById('error_new_password');
    const errorConfirmPassword = document.getElementById('error_confirm_password');

    let flag = true;

    if (username.value=== '') {
        errorUsername.innerHTML = "Please fill in username";
        flag = false;
    }
    else {
        errorUsername.innerHTML = "";
    }

    if (newPassword.value === '') {
        errorNewPassword.innerHTML = "Please fill in new password";
        flag = false;
    }
    else {
        errorNewPassword.innerHTML = ""; 
    }

    if (confirmPassword.value.trim() === '') {
        errorConfirmPassword.innerHTML = "Please fill in confirm password";
        flag = false;
    }
    else if (confirmPassword.value !== newPassword.value.trim()) {
        errorConfirmPassword.innerHTML = "Passwords do not match";
        flag = false;
    }
    else {
        errorConfirmPassword.innerHTML = ""; 
    }

    return flag;
}