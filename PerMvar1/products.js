function iterate(item, index) {
    console.log(item.stoc);
    if (parseInt(item.stoc) != 0) {
        document.getElementById("box_cont").innerHTML += ` <div class="box" name="box_item" id="box_det" >
       
        <button class="fas fa-heart" type="submit" name="add_to_wishlist" id="addWish" onclick="addWish(${item.id})"></button>
       
        <a href="${"http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + item.id}" ><img src="${"imagesProduct/" + item.image_1}" id="imgg" alt=""></a>
        <div class="flex">
            <div class="name" id="abc"><b>${item.name}</b></div>
            <div class="price" id="price_det"><span><b>${item.price + " $"}</b></span><b></b></div>
        </div>
        <div class="btn"  name="add_to_cart" id="addCart" onclick="addProduct(${item.id})">Add to cart
       </div>
    </div>`;
    } else {
        document.getElementById("box_cont").innerHTML += ` <div class="box" name="box_item" id="box_det" >
       
        <button class="fas fa-heart" type="submit" name="add_to_wishlist" id="addWish" onclick=""></button>
       
        <a href="${"http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + item.id}" ><img src="${"imagesProduct/" + item.image_1}" id="imgg" alt=""></a>
        <div class="flex">
            <div class="name" id="abc"><b>${item.name}</b></div>
            <div class="price" id="price_det"><span><b>${item.price + " $"}</b></span><b></b></div>
            <div class="stoc" id="stoc"><span><b>The product is no longer in stock</b></span><b></b></div>
        </div>
        <div class="btn"  name="add_to_cart" id="addCart" onclick="">Add to cart
       </div>
    </div>`;
    }

}

function productss() {
    checkLogin();
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                a = JSON.parse(this.responseText);
                a['records'].forEach(iterate);
            }
        }
    });


    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/read.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

window.onload = productss();

function addProduct(id) {
    if (getCookie('id') != null) {
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                {
                    const a = JSON.parse(this.responseText);

                    if (a != null) {

                    }

                }
            }
        });

        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/addToCart.php?product=" + id);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send();
    }

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

