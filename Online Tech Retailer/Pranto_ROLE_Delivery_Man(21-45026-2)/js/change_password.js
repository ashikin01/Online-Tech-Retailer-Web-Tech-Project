function validateForm() {
    const username = document.getElementById('username');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');

    const errorUsername = document.getElementById('error_username');
    const errorNewPassword = document.getElementById('error_new_password');
    const errorConfirmPassword = document.getElementById('error_confirm_password');

    let isValid = true;

    errorUsername.textContent = '';
    errorNewPassword.textContent = '';
    errorConfirmPassword.textContent = '';

    if (username.value === '') {
        errorUsername.textContent = 'Please fill in username';
        isValid = false;
    }

    if (newPassword.value === '') {
        errorNewPassword.textContent = 'Please fill in new password';
        isValid = false;
    }

    if (confirmPassword.value === '') {
        errorConfirmPassword.textContent = 'Please fill in confirm password';
        isValid = false;
    } else if (confirmPassword.value !== newPassword.value) {
        errorConfirmPassword.textContent = 'Passwords do not match';
        isValid = false;
    }

    return isValid;
}