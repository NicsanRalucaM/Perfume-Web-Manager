function search() {
    var input = document.getElementById("searchQueryInput");
    window.location.href = 'http://localhost:63342/Perfume-Web-Manager/PerMvar1/search.html?input=' + input.value;
}