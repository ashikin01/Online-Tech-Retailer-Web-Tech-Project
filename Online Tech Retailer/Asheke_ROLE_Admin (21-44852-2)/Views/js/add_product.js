function validate() {

    const name = document.getElementById("name");
    const price = document.getElementById("price");
    const category = document.getElementById("category");
    const quantity = document.getElementById("quantity");
   
    

    const err_name = document.getElementById("err_name");
    const err_price = document.getElementById("err_price");
    const err_category = document.getElementById("err_category");
    
    const err_quantity = document.getElementById("err_quantity");
   
    
    let flag = true;

    if(category.value === "") {
        err_category.innerHTML = "Please flll up the category";
        flag = false;
    }

    if (price.value === "") {
        err_price.innerHTML = "Please flll up the price";
        flag = false;
    }
    

    
    
    if (name.value === "") {
        err_name.innerHTML = "Please flll up the name";
        flag = false;
    }
    
    if (quantity.value === "") {
        err_quantity.innerHTML = "Please flll up the quantity ";
        flag = false;
    }

   

 
    
    return flag;

    }