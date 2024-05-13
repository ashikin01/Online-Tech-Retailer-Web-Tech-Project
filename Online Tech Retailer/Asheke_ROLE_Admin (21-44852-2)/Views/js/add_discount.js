function validate() {

    const discount = document.getElementById("discount");
    
    const err_discount = document.getElementById("err_discount");

    
    let flag = true;

    if(discount.value === "") {
        err_discount.innerHTML = "Please flll up discount field";
        flag = false;
    }
 
   
    return flag;
    }