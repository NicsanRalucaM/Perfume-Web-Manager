window.onload = productss();

function productss() {
    checkLogin();
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {


                let a = JSON.parse(this.responseText);
                const n = a['records'].length;
                document.getElementById("title1").innerText = a['records'][n - 1].name;
                document.getElementById("img1").src = "imagesProduct/" + a['records'][n - 1].image_1;
                document.getElementById("desc1").innerText = a['records'][n - 1].description;
                document.getElementById("btn1").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][n - 1].id;
                };

                document.getElementById("title2").innerText = a['records'][n - 2].name;
                document.getElementById("img2").src = "imagesProduct/" + a['records'][n - 2].image_1;
                document.getElementById("desc2").innerText = a['records'][n - 2].description;
                document.getElementById("btn2").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][n - 2].id;
                };

                document.getElementById("title3").innerText = a['records'][n - 3].name;
                document.getElementById("img3").src = "imagesProduct/" + a['records'][n - 3].image_1;
                document.getElementById("desc3").innerText = a['records'][n - 3].description;
                document.getElementById("btn3").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][n - 3].id;
                };

            }
        }
    );


    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/read.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function search() {
    var input = document.getElementById("searchQueryInput");
    window.location.href = 'http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=' + input.value;
}

function checkLogin() {
    var id = getCookie('id');
    console.log("initial=" + id);
    if (id != null) {
        document.getElementById("login").style.display = 'none';
        document.getElementById("logout").style.display = 'block';
    }
}

function deleteCookie() {
    const clearCookies = document.cookie.split(';').forEach(cookie => document.cookie = cookie.replace(/^ +/, '').replace(/=.*/, `=;expires=${new Date(0).toUTCString()};path=/`));
    window.location.href = "news.html";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}