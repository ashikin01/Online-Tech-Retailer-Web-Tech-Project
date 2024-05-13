function validateUpdateProfileForm() {
   
    var username = document.getElementsByName("username")[0].value.trim();
    var oldPassword = document.getElementsByName("old_password")[0].value.trim();
    var newPassword = document.getElementsByName("new_password")[0].value.trim();
    var confirmPassword = document.getElementsByName("confirm_password")[0].value.trim();

  
    var errorMessage = "";

 
    if (username === "") {
        errorMessage += "Please enter a new username.\n";
    }

   
    if (oldPassword === "") {
        errorMessage += "Please enter your old password.\n";
    }

 
    if (newPassword === "") {
        errorMessage += "Please enter a new password.\n";
    }

   
    if (confirmPassword === "") {
        errorMessage += "Please confirm your new password.\n";
    } else if (newPassword !== confirmPassword) {
        errorMessage += "New password and confirm password do not match.\n";
    }

  
    if (errorMessage !== "") {
        alert(errorMessage);
        return false; 
    }

    return true; 
