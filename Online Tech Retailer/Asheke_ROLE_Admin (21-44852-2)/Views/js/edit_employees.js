function validate() {

    const name = document.getElementById("name");
    const employee_id = document.getElementById("employee_id");
    const email = document.getElementById("email");
    const phone_number = document.getElementById("phone_number");
    const address = document.getElementById("address");
    

    const err_name = document.getElementById("err_name");
    const err_employee_id = document.getElementById("err_employee_id");
    const err_email = document.getElementById("err_email");
    const err_phone_number = document.getElementById("err_phone_number");
    const err_address = document.getElementById("err_address");
    
    let flag = true;

    if(employee_id.value === "") {
        err_employee_id.innerHTML = "Please flll up the Employee ID";
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

    if (address.value === "") {
        err_address.innerHTML = "Please flll up the address";
        flag = false;
    }

 
    
    return flag;
    }