function buscar() {
    let valor = (document.getElementById("searchBy").value).toLowerCase();
    let largo = document.getElementsByClassName(valor);
    let search = (document.getElementById("search").value).toLowerCase();

    for (let cont = 0; cont < largo.length; cont++) {
        let texto = (largo[cont].innerHTML).toLowerCase();
        texto = texto.slice(0, search.length);

        if (texto == search) {
            let id = largo[cont].parentElement.getAttribute("id");
            document.getElementById(id).setAttribute("class", "");
        }
        else {
            let id = largo[cont].parentElement.getAttribute("id");
            document.getElementById(id).setAttribute("class", "hide");
        }
    }
}

function confirmData() {
    let disabled = false;
    let largo = document.getElementsByClassName("button");
    let value = document.getElementsByClassName("inputBox");

    for (let cont = 0; cont < largo.length; cont++) {
        let valorInput = value[cont].value;
        if (!valorInput) {
            disabled = true;
            largo[cont].style.backgroundColor = "rgb(255, 150, 150)";
            value[cont].style.backgroundColor = "rgb(255, 150, 150)";
            value[cont].setAttribute("class", "inputBox error");
            largo[cont].focus();

            largo[cont].addEventListener("input", function () {
                largo[cont].style.backgroundColor = "white";
                value[cont].style.backgroundColor = "white";
            });
        }
        else if (valorInput) {
            largo[cont].style.backgroundColor = "white";
            if (largo[cont].readOnly == true) {
                value[cont].setAttribute("class", "inputBox");
                value[cont].setAttribute("readonly", true);
            }
            else {
                value[cont].setAttribute("class", "inputBox");
            }
        }
    }

    if (disabled == true) {
        document.getElementById("btnFORM").disabled = true;
        document.getElementById("btnFORM").style.cursor = "not-allowed";
        document.getElementById("MensajeAviso").style.display = "block";
    }
    else {
        document.getElementById("btnFORM").disabled = false;
        document.getElementById("btnFORM").style.cursor = "pointer";
        document.getElementById("MensajeAviso").style.display = "none";
    }
}

function showPassword() {
    if (document.getElementById("txtContrasena").type == "password") {
        document.getElementById("txtContrasena").type = "text";
        document.getElementById("show").setAttribute("class", "fa-solid fa-eye")
    }
    else {
        document.getElementById("txtContrasena").type = "password";
        document.getElementById("show").setAttribute("class", "fa-solid fa-eye-slash")
    }
}

function loadLogin() {
    if(document.getElementById("formulario")){
        closeForm();
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML +=
            this.responseText;
    }
    xhttp.open("GET", "user/formLogin.php");
    xhttp.send();
}

function loadLogout() {
    if(document.getElementById("formulario")){
        closeForm();
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML +=
            this.responseText;
    }
    xhttp.open("GET", "user/formLogout.php");
    xhttp.send();
}

function loadRegister() {
    if(document.getElementById("formulario")){
        closeForm();
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].innerHTML +=
            this.responseText;
    }
    xhttp.open("GET", "user/formRegistrar.php");
    xhttp.send();
}

function closeForm(){
    document.getElementById("formulario").remove();
}