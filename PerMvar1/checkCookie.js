function checkCookieAccount()
{
    var id=getCookie('id');
    if(id==null||id==0)
        window.location.href="login.html";
    else
        window.location.href="profile.html";

}
function checkCookieWishs()
{
    var id=getCookie('id');
    if(id==null||id==0)
        window.location.href="login.html";
    else
        window.location.href="favorite.html";

}
function checkCookieCart()
{
    var id=getCookie('id');
    if(id==null||id==0)
        window.location.href="login.html";
    else
        window.location.href="cart.html";

}
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
    return null;
}
function checkLogin() {
    var id = getCookie('id');
    console.log("initial=" + id);
    if (id != null&& id!=0) {
        document.getElementById("login").style.display = 'none';
        document.getElementById("logout").style.display = 'block';
    }
}

function deleteCookie() {
    const clearCookies = document.cookie.split(';').forEach(cookie => document.cookie = cookie.replace(/^ +/, '').replace(/=.*/, `=;expires=${new Date(0).toUTCString()};path=/`));
    window.location.href = "news.html";
}