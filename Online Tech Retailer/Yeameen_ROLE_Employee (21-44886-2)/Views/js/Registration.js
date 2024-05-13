function validateForm() {
    const fname = document.forms["registrationForm"]["fname"].value.trim();
    const lastname = document.forms["registrationForm"]["lastname"].value.trim();
    const password = document.forms["registrationForm"]["password"].value.trim();
    const conpass = document.forms["registrationForm"]["conpass"].value.trim();
    const gender = document.forms["registrationForm"]["gender"].value;
    const email = document.forms["registrationForm"]["email"].value.trim();
    const phone = document.forms["registrationForm"]["phone"].value.trim();
    const address = document.forms["registrationForm"]["address"].value.trim();
    const terms = document.forms["registrationForm"]["terms"].checked;

    const errorMessages = {};

    if (fname === "") {
        errorMessages["fname"] = "Please enter your first name";
    }

    if (lastname === "") {
        errorMessages["lastname"] = "Please enter your last name";
    }

    if (password === "") {
        errorMessages["password"] = "Please enter a password";
    }

    if (conpass === "" || conpass !== password) {
        errorMessages["conpass"] = "Passwords do not match";
    }

    if (gender === "Not selected") {
        errorMessages["gender"] = "Please select your gender";
    }

    if (email === "") {
        errorMessages["email"] = "Please enter your email";
    }

    if (phone === "") {
        errorMessages["phone"] = "Please enter your phone number";
    }

    if (address === "") {
        errorMessages["address"] = "Please enter your address";
    }

    if (!terms) {
        errorMessages["terms"] = "Please agree to the terms and conditions";
    }

 
    for (const field in errorMessages) {
        const errMsg = errorMessages[field];
        const errField = document.getElementById(`err_${field}`);
        if (errField) {
            errField.innerHTML = errMsg;
        }
    }

    
    return Object.keys(errorMessages).length === 0;
}
