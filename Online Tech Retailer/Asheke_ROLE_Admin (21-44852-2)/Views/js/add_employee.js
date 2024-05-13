function validate() {

    const name = document.getElementById("name");
    const employee_id = document.getElementById("employee_id");
    const email = document.getElementById("email");
    const salary = document.getElementById("salary");
    const bonus = document.getElementById("bonus");
    
    
    

    const err_name = document.getElementById("err_name");
    const err_employee_id = document.getElementById("err_employee_id");
    const err_email = document.getElementById("err_email");
    const err_salary = document.getElementById("err_salary");
    const err_bonus = document.getElementById("err_bonus");
  
    
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

    
    if (salary.value === "") {
        err_salary.innerHTML = "Please flll up the salary ";
        flag = false;
    }

    if (bonus.value === "") {
        err_bonus.innerHTML = "Please flll up the bonus ";
        flag = false;
    }

 
    
    return flag;
    }