function loadForm(type, column, key, limit) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("fondo").innerHTML +=
            this.responseText;
    }
    xhttp.open("GET", "tabla/form" + type + ".php?q=" + column + "&key=" + key + "&limit=" + limit);
    xhttp.send();
}

function closeForm(){
    document.getElementById("formulario").remove();
}