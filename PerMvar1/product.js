var baseUrl = (window.location).href;
var koopId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
window.onload = set_data(koopId);


function set_data(id) {
    checkLogin();
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                const a = JSON.parse(this.responseText);
                document.getElementById("title_details").innerText = a.name;
                document.getElementById("gen").innerText = a.gen + " perfume";
                document.getElementById("img_details").src = "imagesProduct/" + a.image_1;
                document.getElementById("description_details").innerText = a.description;
                document.getElementById("price").innerText = "PRICE: " + a.price + " $";
                if (parseInt(a.stoc) != 0) {
                    document.getElementById("addToCart").addEventListener("click", addProduct);
                    document.getElementById("addToFav").addEventListener("click", addWish);
                } else
                    document.getElementById("stoc").innerText = "The product is no longer in stock";


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


function addProduct() {
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

        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/addToCart.php?product=" + koopId);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send();
    }

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

function iterateRec(item, index) {
    document.getElementById("prod_rec").innerHTML += `
    <div class="prod1" >
                    <h1>${item.name}</h1>
                    <a href="${"http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=" + item.id}" ><img src="${"imagesProduct/" + item.image_1}" id="imgg" alt=""></a>
                </div>
    `;
}

function setRec(brand_id) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                var a = JSON.parse(this.responseText);
                let length = a['records'].length;
                if(length!=0)
                a['records'].forEach(iterateRec);
                else
                    document.getElementById("rec_title").innerText="There are no other recommendations";
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/readByBrandIdRec.php?brand_id=" + brand_id+"&id="+koopId);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

    setCom();

}

function iterate(item, index) {

    document.getElementById("com_afis").innerHTML += `       
        <div class="com">
        <h3>${item.name}:</h3>
        <p>${item.comment}</p>
        </div>
        `;


}

function setCom() {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            a = JSON.parse(this.responseText);
            if(a['records'].length!=0)
            a['records'].forEach(iterate);
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Comment/readByProductId.php?product=" + koopId);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

function save() {
    var name = document.getElementById("fname").value;
    var comment = document.getElementById("fcomment").value;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            document.getElementById("fname").value = "";
            document.getElementById("fcomment").value = "";
            window.location.reload();


        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Comment/addComment.php?product=" + koopId + "&name=" + name + "&comment=" + comment);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}
