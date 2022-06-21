window.onload = checkLogin();

function checkFields() {
    const inputFeilds = document.querySelectorAll("input");

    const validInputs = Array.from(inputFeilds).filter(input => input.value !== "");
    console.log(validInputs.length);
    console.log(document.getElementById("ccnum"));
    if (validInputs.length !== 12) {
        document.getElementById("errormsg").style.display = 'block';
        document.getElementById("errormsg").innerText = "Please complete all fields !!";
        window.scroll(0, 0);

        window.scroll(0, 0);
    } else if (!cardnumber(document.getElementById("ccnum")) || !exprY(document.getElementById("expyear"), document.getElementById("expmonth"))) {
        document.getElementById("errormsg").style.display = 'block';
        document.getElementById("errormsg").innerText = "Wrong data card";
        window.scroll(0, 0);
    } else if (!cvv(document.getElementById("cvv"))) {
        document.getElementById("errormsg").style.display = 'block';
        document.getElementById("errormsg").innerText = "Wrong data card";
        window.scroll(0, 0);
    } else {

        checkOrder();

    }


}

function exprY(input1, input2) {
    var currentDate = new Date();
    if (input1.value > currentDate.getFullYear())
        return true;
    else if (input2.value > currentDate.getMonth())
        return true;
    else
        return false;

}

function cvv(input) {
    if (input.value > 99 && input.value < 1000)
        return true;
    else
        return false;
}

function cardnumber(inputtxt) {
    var cardno1 = '4(?:[0-9]{12}|[0-9]{15})';
    var cardno2 = '3[47][0-9]{13}';
    var cardno3 = '3(?:0[0-5][0-9]{11}|[68][0-9]{12})';
    var cardno4 = '5[1-5][0-9]{14}';
    if (inputtxt.value.match(cardno1) || inputtxt.value.match(cardno2) || inputtxt.value.match(cardno3) || inputtxt.value.match(cardno4))
        return true;
    else
        return false;
}

function checkOrder() {
    if (getCookie('id') != null) {

        checkItemsStock();

    } else
        window.location.href = "login.html";
}

function removeFromCart() {
    var id = getCookie("id");
    var xhr4 = new XMLHttpRequest();
    xhr4.withCredentials = true;
    xhr4.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            window.location.href = "news.html";
        }
    });
    xhr4.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/removeByUserId.php?user=" + id);
    xhr4.setRequestHeader("Content-Type", "application/json");
    xhr4.send();

}

function decreasesStock(id) {

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            const b = JSON.parse(this.responseText);


        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/decreasesStock.php?product=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();


}
function checkItemsStock()
{
    var xhr4 = new XMLHttpRequest();
    xhr4.withCredentials = true;
    xhr4.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            a=JSON.parse(this.responseText);
            if(a==0)
             saveOrder();
            else
            {
                document.getElementById("errormsg").style.display = 'block';
                document.getElementById("errormsg").innerText = "Out of stock! Rechoose the products !!";
                window.scroll(0, 0);
            }
        }
    });
    xhr4.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/readValid.php?id="+getCookie('id'));
    xhr4.setRequestHeader("Content-Type", "application/json");
    xhr4.send();
}

function saveOrder() {

    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var items = [10];
    var adresa;
    let id = getCookie("id");
    var val_order=0;

    var xhr3 = new XMLHttpRequest();
    xhr3.withCredentials = true;
    //document.getElementById("form").submit();
    var currentdate = new Date();
    var datetime = currentdate.getDate() + "/"
        + (currentdate.getMonth() + 1) + "/"
        + currentdate.getFullYear() + " @ "
        + currentdate.getHours() + ":"
        + currentdate.getMinutes() + ":"
        + currentdate.getSeconds() + ":"
        + currentdate.getMilliseconds()
    ;
    var adr = document.getElementById("adr").value;
    var city = document.getElementById("city").value;
    var zip = document.getElementById("zip").value;
    var state = document.getElementById("state").value;
    console.log(datetime);
    xhr3.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                adresa = parseInt(this.responseText);

                var xhr2 = new XMLHttpRequest();
                xhr2.withCredentials = true;
                xhr2.addEventListener("readystatechange", function () {
                    if (this.readyState === 4) {
                        {
                            b = JSON.parse(this.responseText);
                            for (var j = 0; j < b['records'].length; j++) {
                                items[j] = b['records'][j].product;
                                val_order=val_order+parseInt(b['records'][j].price);
                                //console.log(parseInt(b['records'][j].price));
                                decreasesStock(items[j]);


                            }
                           // console.log(val_order);
                            var xhr = new XMLHttpRequest();
                            xhr.withCredentials = true;
                            var a;
                            xhr.addEventListener("readystatechange", function () {
                                if (this.readyState === 4) {
                                    {
                                        removeFromCart();
                                    }
                                }
                            });
                            xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Order/addOrder.php?name=" + name + "&email=" + email + "&address=" + adresa + "&price=" + val_order + "&product1=" + items[0] + "&product2=" + items[1] + "&product3=" + items[2] + "&product4=" + items[3] + "&product5=" + items[4] + "&product6=" + items[5] + "&product7=" + items[6] + "&product8=" + items[7] + "&product9=" + items[8] + "&product10=" + items[9]);
                            xhr.setRequestHeader("Content-Type", "application/json");

                            xhr.send();


                        }
                    }
                });

                xhr2.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/read.php?id=" + id);
                xhr2.setRequestHeader("Content-Type", "application/json");
                xhr2.send();
            }
        }
    });

    xhr3.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Address/addAddress.php?address=" + adr + "&city=" + city + "&zip=" + zip + "&state=" + state + "&time=" + datetime);
    xhr3.setRequestHeader("Content-Type", "application/json");

    xhr3.send();


}