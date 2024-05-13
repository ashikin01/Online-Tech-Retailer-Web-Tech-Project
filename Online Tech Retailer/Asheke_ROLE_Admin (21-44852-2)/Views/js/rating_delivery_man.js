function validate() {

 
    const rating = document.getElementById("rating");
    


    const err_rating = document.getElementById("err_rating");
    
    let flag = true;

    if(rating.value === "") {
        err_rating.innerHTML = "Please type the rating before submitting";
        flag = false;
    }

  
    return flag;
    }