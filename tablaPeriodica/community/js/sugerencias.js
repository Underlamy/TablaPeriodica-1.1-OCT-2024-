function vote(usuario, id, type, voted) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML =
            this.responseText;
    }

    switch (voted) {
        case false:
            xhttp.open("GET", "sugerencias/votes/agregar.php?usuario=" + usuario + "&sugerencia=" + id + "&tipo=" + type);
            break;

        case "up":
            if (type == "up") {
                xhttp.open("GET", "sugerencias/votes/eliminar.php?usuario=" + usuario + "&sugerencia=" + id);
            } else if (type == "down") {
                xhttp.open("GET", "sugerencias/votes/actualizar.php?usuario=" + usuario + "&sugerencia=" + id + "&tipo=" + type);
            }
            break;

        case "down":
            if (type == "down") {
                xhttp.open("GET", "sugerencias/votes/eliminar.php?usuario=" + usuario + "&sugerencia=" + id);
            } else if (type == "up") {
                xhttp.open("GET", "sugerencias/votes/actualizar.php?usuario=" + usuario + "&sugerencia=" + id + "&tipo=" + type);
            }
            break;
    }

    xhttp.send();
}

function editar() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML =
            this.responseText;
    }

    xhttp.open("GET", "sugerencias/votes/agregar.php?usuario=" + usuario + "&sugerencia=" + id + "&tipo=" + type);
    xhttp.send();
}

function eliminar(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML =
            this.responseText;
    }

    xhttp.open("GET", "sugerencias/eliminar.php?id=" + id);
    xhttp.send();
}