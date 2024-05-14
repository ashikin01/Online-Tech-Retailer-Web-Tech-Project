var iPrice = document.getElementsByClassName('iPrice');
var iQuantity = document.getElementsByClassName('iQuantity');
var iTotal = document.getElementsByClassName('iTotal');
var gTotal = document.getElementById('gTotal');
var gt = 0;

function subTotal() {
    gt = 0;
    for (i = 0; i < iPrice.length; i++) {
        iTotal[i].innerText = (iPrice[i].value) * (iQuantity[i].value);
        gt += (iPrice[i].value) * (iQuantity[i].value);
        gTotal.innerText = gt;
    }
}


        // function loadDoc() {
        //     const xhttp = new XMLHttpRequest();
        //     xhttp.onload = function() {
        //         document.getElementById("container").innerHTML =
        //             this.responseText;
        //     }
        //     xhttp.open("POST", "../Controller/cart_action.php");
        //     xhttp.send();
        // }

subTotal();


//order_history total
var sPrice = document.getElementsByClassName('sPrice');
var sQuantity = document.getElementsByClassName('sQuantity');
var sTotal = document.getElementsByClassName('sTotal');

function total() {
    for (i = 0; i < sPrice.length; i++) {
        sTotal[i].innerText = (sPrice[i].value) * (sQuantity[i].value);
    }
}

total();