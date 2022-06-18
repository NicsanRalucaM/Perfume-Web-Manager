function dataFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("wishs_details").style.display = 'none';
    document.getElementById("orders_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'none';
    document.getElementById("password_details").style.display = 'none';
    document.getElementById("signout_details").style.display = 'none';
    document.getElementById("personal_data").style.display = 'block';
    let a = getCookie("id");
    get_firstname(a);
    get_lastname(a);
    getEmail(a);


    document.getElementById("data").classList.add("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
}

function orderFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("personal_data").style.display = 'none';
    document.getElementById("wishs_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'none';
    document.getElementById("password_details").style.display = 'none';
    document.getElementById("signout_details").style.display = 'none';


    document.getElementById("orders_details").style.display = 'block';

    document.getElementById("order").classList.add("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
}

function wishsFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("personal_data").style.display = 'none';
    document.getElementById("orders_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'none';
    document.getElementById("password_details").style.display = 'none';
    document.getElementById("signout_details").style.display = 'none';


    document.getElementById("wishs_details").style.display = 'block';


    document.getElementById("wishs").classList.add("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
}

function passwordFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("personal_data").style.display = 'none';
    document.getElementById("orders_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'none';
    document.getElementById("wishs_details").style.display = 'none';
    document.getElementById("signout_details").style.display = 'none';


    document.getElementById("password_details").style.display = 'block';


    document.getElementById("password").classList.add("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("signout").classList.remove("active");

}

function signoutFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("personal_data").style.display = 'none';
    document.getElementById("orders_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'none';
    document.getElementById("password_details").style.display = 'none';
    document.getElementById("wishs_details").style.display = 'none';


    document.getElementById("signout_details").style.display = 'block';


    document.getElementById("signout").classList.add("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");
    document.getElementById("password").classList.remove("active");
    document.getElementById("address").classList.remove("active");
    document.getElementById("order").classList.remove("active");

}

function addressFunction() {
    document.getElementById("start").style.display = 'none';
    document.getElementById("personal_data").style.display = 'none';
    document.getElementById("wishs_details").style.display = 'none';
    document.getElementById("orders_details").style.display = 'none';
    document.getElementById("password_details").style.display = 'none';
    document.getElementById("signout_details").style.display = 'none';
    document.getElementById("address_details").style.display = 'block';


    document.getElementById("address").classList.add("active");
    document.getElementById("wishs").classList.remove("active");
    document.getElementById("data").classList.remove("active");

    document.getElementById("password").classList.remove("active");
    document.getElementById("order").classList.remove("active");
    document.getElementById("signout").classList.remove("active");
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

                document.getElementById("title_user").innerHTML = "Welcome, " + this.responseText + " !! ^^";
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