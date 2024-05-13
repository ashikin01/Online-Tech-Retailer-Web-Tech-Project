function validateForm() {
    const x = document.getElementById('username');
    const y = document.getElementById('password');

    const a = document.getElementById('error1');
    const b = document.getElementById('error2');

    let flag = true;

    if (x.value === '') {
        a.innerHTML = "Please fill up username";
        flag = false;
    }
    else {
        error1.innerHTML = "";
    }

    if (y.value === '') {
        b.innerHTML = "Please fill up password";
        flag = false;
    }
    else {
        error2.innerHTML = "";
    }

    return flag;
}