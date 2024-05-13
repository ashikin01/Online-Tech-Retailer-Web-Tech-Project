function validate() {

    const delivery_charge = document.getElementById("delivery_charge");
    
    const err_delivery_charge = document.getElementById("err_delivery_charge");

    
    let flag = true;

    if(delivery_charge.value === "") {
        err_delivery_charge.innerHTML = "Please flll up delivery charge field";
        flag = false;
    }
 
   
    return flag;
    }