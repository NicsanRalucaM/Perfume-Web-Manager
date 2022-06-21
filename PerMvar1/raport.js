var baseUrl = (window.location).href;
var input = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);


window.onload = set();

function set() {
    if (input == "stock")
        raportStock();
    else if (input == "brand")
        raportBrands();
    else if (input == "season")
        raportSeason();
    else if (input == "users")
        raportUsers();

}

function iterateStock(item, index) {
    document.getElementById("tb").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
    </tr>
    `;
}

function raportStock() {

    console.log("sa");
    document.getElementById("titlu").innerText = "Raport stocuri existente";
    document.getElementById("continut").innerHTML = ` <table id="tb">
                      <tr>
                        <th id="nr">NR</th>
                        <th id="name">Name</th>
                        <th id="brand">Brand</th>
                        <th id="stock">Stock</th>
                      </tr>
                    </table>`;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                a = JSON.parse(this.responseText);
                a['records'].forEach(iterateStock);
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Product/readBrandName.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}

function raportBrands() {
    document.getElementById("titlu").innerText = "Raport situatie vanzari pe brand ";
    document.getElementById("continut").innerHTML = ` <table id="tb_brand">
                      <tr>
                        <th id="nr">NR</th>
                        <th id="name">Name</th>
                        <th id="brand">Brand</th>
                        <th id="stock">Stock</th>
                        <th id="vanzari">Sold</th>
                      </tr>
                    </table>`;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                a = JSON.parse(this.responseText);
                a['records'].forEach(iterateBrand);
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Order/ex.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}

function iterateBrand(item, index) {

     document.getElementById("tb_brand").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
        <td class="vanzari">${item.nr}</td>
    </tr>
    `;
}
function raportSeason()
{
    document.getElementById("titlu").innerText = "Raport situatie vanzari pe sezon ";
    document.getElementById("continut").innerHTML = ` <table id="tb_brand">
                      <tr>
                        <th id="nr">NR</th>
                        <th id="season">Spring</th>
                        <th id="name">Name</th>
                        <th id="brand">Brand</th>
                        <th id="stock">Stock</th>
                        <th id="vanzari">Sold</th>
                      </tr>
                    </table>`;
    setSeason("spring");
    setSeason("summer");
    setSeason("winter");
    setSeason("autumn");

}
function setSeason(input)
{
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                a = JSON.parse(this.responseText);
                if(input=="spring")
                a['records'].forEach(iterateSeasonSpring);
                if(input=="summer")
                    a['records'].forEach(iterateSeasonSummer);
                if(input=="winter")
                    a['records'].forEach(iterateSeasonWinter);
                if(input=="autumn")
                    a['records'].forEach(iterateSeasonAutumn);

            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Order/sezon.php?sez="+input.toLowerCase());
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();
}
function iterateSeasonSpring(item, index) {

    document.getElementById("tb_brand").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="season">Spring</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
        <td class="vanzari">${item.nr}</td>
    </tr>
    `;
}
function iterateSeasonSummer(item, index) {

    document.getElementById("tb_brand").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="season">Summer</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
        <td class="vanzari">${item.nr}</td>
    </tr>
    `;
}
function iterateSeasonWinter(item, index) {

    document.getElementById("tb_brand").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="season">Winter</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
        <td class="vanzari">${item.nr}</td>
    </tr>
    `;
}
function iterateSeasonAutumn(item, index) {

    document.getElementById("tb_brand").innerHTML += `
   <tr>
    
        <td class="nr">${index + 1}.</td>
        <td class="season">Autumn</td>
        <td class="name">${item.name}</td>
        <td class="brand">${item.brand}</td>
        <td class="stoc">${item.stoc}</td>
        <td class="vanzari">${item.nr}</td>
    </tr>
    `;
}
function raportUsers()
{
    console.log("sa");
    document.getElementById("titlu").innerText = "Raport stocuri existente";
    document.getElementById("continut").innerHTML = ` <table id="tb">
                      <tr>
                        <th id="nr">NR</th>
                        <th id="name">Name</th>
                        <th id="brand">Brand</th>
                        <th id="stock">Stock</th>
                      </tr>
                    </table>`;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    var a;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            {
                a = JSON.parse(this.responseText);
                a['records'].forEach(iterateUsers);
            }
        }
    });

    xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Order/readAll.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send();

}
function iterateUsers(item,index)
{

}
