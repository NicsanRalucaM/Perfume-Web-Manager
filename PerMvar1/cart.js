window.onload = getItems();


function getItems() {
    checkLogin();
    if (getCookie('id') != null) {
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                {
                    a = JSON.parse(this.responseText);
                    if (a['records'].length == 0)
                        document.getElementById("item_det").innerHTML += `
                        <h1>You still have no products in your cart</h1>`;
                    else
                        a['records'].forEach(iterate);
                }
            }
        });


        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/read.php?id=" + 1);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.send();
    } else
        window.location.href = "login.html";
}

function iterate(item, index) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                b = JSON.parse(this.responseText);
                document.getElementById("item_det").innerHTML += `
                    <div class="box" name="box_item" id="box_det">

            <button class="fas fa-heart" type="submit" name="add_to_wishlist" id="addWish" onclick="addWish(${b.id})"></button>
            <a href="${"http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + b.id}" id="redict" class="fas fa-eye"></a>
            <img src="${"imagesProduct/" + b.image_1}" id="imgg" alt="">
            <div class="flex">
                <div class="name" id="abc"><b>${b.name}</b></div>
                <div class="gen" id="gen"><b>${b.gen} perfume</b></div>
                <div class="price" id="price_det"><span><b>${b.price} $</b></span><b></b></div>
            </div>
            <button type="submit" class="btn" name="add_to_cart" id="addCart" onclick="removeProduct(${item.id})">Remove</button>

        </div>

`;
                document.getElementById("pret").innerText = parseInt(document.getElementById("pret").innerText) + parseInt(b.price) + "$";
                document.getElementById("pret2").innerText = document.getElementById("pret").innerText;
                console.log(parseInt(b.price));
                document.getElementById("address").href = "checkout.html";
            }
        }
    });


    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/read_one.php?id=" + item.product);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function addWish(id) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                //document.getElementById("abc").innerText = "saluttyy";

            }
        }
    });


    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Fav/addToFav.php?product=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function removeProduct(id) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                //document.getElementById("abc").innerText = "saluttyy";
                window.location.href = "http://localhost:63342/Perfume-Web-Manager/PerMvar1/cart.html";

            }
        }
    });


    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/removeFromCart.php?id=" + id);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}