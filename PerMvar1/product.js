function set_data(id) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                const a = JSON.parse(this.responseText);
                document.getElementById("title_details").innerText = a.name;
                document.getElementById("gen").innerText = a.gen+" perfume";
                document.getElementById("img_details").src = "imagesProduct/" + a.image_1;
                document.getElementById("description_details").innerText = a.description;
                document.getElementById("price").innerText = "PRICE: " + a.price + " $";
                document.getElementById("addToCart").addEventListener("click", addProduct);
                document.getElementById("addToFav").addEventListener("click", addWish);


                document.getElementById("ingredient1").innerText = a.ingredient1;
                document.getElementById("ingredient1").href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=" + a.ingredient1;
                document.getElementById("ingredient2").innerText = a.ingredient2;
                document.getElementById("ingredient2").href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=" + a.ingredient2;

                document.getElementById("ingredient3").innerText = a.ingredient3;
                document.getElementById("ingredient3").href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=" + a.ingredient3;

                document.getElementById("ingredient4").innerText = a.ingredient4;
                document.getElementById("ingredient4").href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=" + a.ingredient4;
                document.getElementById("anotimp").innerText = a.anotimp;

                document.getElementById("anotimp").href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=" + a.anotimp;
                setRec(a.brand_id);

            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/read_one.php?id=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();
}

var baseUrl = (window.location).href;
var koopId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
window.onload = set_data(koopId);

function addProduct() {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/addToCart.php?product=" + koopId);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}

function addWish() {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Fav/addToFav.php?product=" + koopId);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function setRec(brand_id) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                var a = JSON.parse(this.responseText);
                let length = a['records'].length;

                document.getElementById("titlu_rec1").innerText = a['records'][0].name;
                document.getElementById("titlu_rec2").innerText = a['records'][1].name;
                document.getElementById("titlu_rec3").innerText = a['records'][2].name;
                document.getElementById("img1").src = "imagesProduct/" + a['records'][0].image_1;
                document.getElementById("img2").src = "imagesProduct/" + a['records'][1].image_1;
                document.getElementById("img3").src = "imagesProduct/" + a['records'][2].image_1;
                document.getElementById("prod1").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][0].id;
                };
                document.getElementById("prod2").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][1].id;
                };
                document.getElementById("prod3").onclick = function () {
                    location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + a['records'][2].id;
                };
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/readByBrandId.php?brand_id=" + brand_id);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}
