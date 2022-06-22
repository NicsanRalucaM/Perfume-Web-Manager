function checkLogin() {
    var id = getCookie('id');
    console.log("initial=" + id);
    if (id != null) {
        document.getElementById("login").style.display = 'none';
        document.getElementById("logout").style.display = 'block';
    }
}

function deleteCookie() {
    // const clearCookies = document.cookie.split(';').forEach(cookie => document.cookie = cookie.replace(/^ +/, '').replace(/=.*/, `=;expires=${new Date(0).toUTCString()};path=/news.html`));
    document.cookie = 'id=; Max-Age=-99999999;';
   // console.log("helooo");
   // window.location.href = "news.html";
    //window.reload();
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