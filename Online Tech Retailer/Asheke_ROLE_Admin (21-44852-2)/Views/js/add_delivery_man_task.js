function validate() {

    const task_title = document.getElementById("task_title");
    const task_description = document.getElementById("task_description");
  
    

    const err_task_title = document.getElementById("err_task_title");
    const err_task_description = document.getElementById("err_task_description");

    
    let flag = true;

    if(task_title.value === "") {
        err_task_title.innerHTML = "Please flll up task title";
        flag = false;
    }

    
    if(task_description.value === "") {
        err_task_description.innerHTML = "Please flll up task description";
        flag = false;
    }

    

 
    
    return flag;
    }