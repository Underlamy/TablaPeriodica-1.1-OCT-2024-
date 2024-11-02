function load(name) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML =
            this.responseText;
    }
    xhttp.open("GET", name);
    xhttp.send();
}