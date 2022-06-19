function dataFunction() {
    let id = getCookie("id");
    console.log(id);

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {

                var user = JSON.parse(this.responseText);
                document.getElementById("right").innerHTML = ` 
                                     <div id="personal_data">
                                                <div class="data">
                                                    <span><b><br>First Name: </b></span>
                                                    <span id="firstname">${user.firstname}</span><br>
                                                </div>
                                                <div class="data">
                                                    <span><b>Last Name: </b></span>
                                                    <span id="lastname">${user.lastname}</span><br>
                                                </div>
                                                <div class="data">
                                                    <span><b>Email: </b></span>
                                                    <span id="email">${user.email}</span>
                                                </div>
                                                
                                    </div>  `;


                document.getElementById("data").classList.add("active");

                document.getElementById("order").classList.remove("active");

            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/User/get.php?id=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

function iterate(item, index) {
    let adr;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                adr = JSON.parse(this.responseText);
                console.log(adr);
                document.getElementById("orders").innerHTML += `
    <div class="order">
        <div class="titlu" id="titlu">
            <h2>OrderId: ${item.id}</h2>
            <h2>Date: ${adr.time}</h2>
        </div>
        <h3>Product list: </h3>
        <div class="order_items">
        <a id="${item.id}item1" href="" style="display: none"></a>
        <a id="${item.id}item2" href="" style="display: none"></a>
        <a id="${item.id}item3" href="" style="display: none"></a>
        <a id="${item.id}item4" href="" style="display: none"></a>
        <a id="${item.id}item5" href="" style="display: none"></a>
        <a id="${item.id}item6" href="" style="display: none"></a>
        <a id="${item.id}item7" href="" style="display: none"></a>
        <a id="${item.id}item8" href="" style="display: none"></a>
        <a id="${item.id}item9" href="" style="display: none"></a>
        <a id="${item.id}item10" href="" style="display: none"></a>
</div>
    </div>
    `;
                setProd(item.product1,1,item.id);
                setProd(item.product2,2,item.id);
                setProd(item.product3,3,item.id);
                setProd(item.product4,4,item.id);
                setProd(item.product5,5,item.id);
                setProd(item.product6,6,item.id);
                setProd(item.product7,7,item.id);
                setProd(item.product8,8,item.id);
                setProd(item.product9,9,item.id);
                setProd(item.product10,10,item.id);
            }

        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Address/readById.php?id=" + item.address);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();


}
function setProd(id,i,nr){
    if(id!=0)
    {
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        var a;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                {
                    a=JSON.parse(this.responseText);
                    document.getElementById(nr+"item"+i).style.display='block';
                    document.getElementById(nr+"item"+i).innerText="> "+a.name;
                    document.getElementById(nr+"item"+i).href="http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id="+id;
                }
            }
        });

        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/read_One.php?id=" + id);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.send();

    }
}

function orderFunction() {
    let id = getCookie("id");
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                var orders = JSON.parse(this.responseText);
                var length = orders['records'].length;
                document.getElementById("right").innerHTML = `
                <div class="orders" id="orders"> 
                <h1>You have ${length} comands</h1>
                </div>
                `;
                orders['records'].forEach(iterate);

            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Order/readByUser.php?user=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();



    document.getElementById("data").classList.remove("active");
    document.getElementById("order").classList.add("active");
}


function wishsFunction() {


    document.getElementById("order").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
    document.getElementById("wishs").classList.add("active");
}

function passwordFunction() {


    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
    document.getElementById("password").classList.add("active");

}

function signoutFunction() {


    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("signout").classList.add("active");

}

function addressFunction() {
    document.getElementById("signout").classList.remove("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("address").classList.add("active");

}

function get_firstname(str) {

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                document.getElementById("firstname").innerHTML = this.responseText;
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/User/get_FirstName.php?id=" + str);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

function get_lastname(str) {

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                document.getElementById("lastname").innerHTML = this.responseText;
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/User/get_LastName.php?id=" + str);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

function getEmail(str) {

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                document.getElementById("email").innerHTML = this.responseText;
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/User/getEmail.php?id=" + str);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function getTitle() {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {

                document.getElementById("title_user").innerHTML = "Welcome, " + this.responseText+"!";
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/User/get_FirstName.php?id=" + getCookie("id"));
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

window.onload = getTitle();

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}