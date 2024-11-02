let dalton = true;

function drop(event) {
    //Obtener ID Padre (ID del elemento seleccionado en el toolbox)
    event.preventDefault();
    let id = event.dataTransfer.getData("text");

    //Crear un div(atomo) donde se anexen los orbitales y el nucleo    
    let newAtomo = document.createElement("div");

    event.target.appendChild(newAtomo);
    getCoords(event, newAtomo);

    newAtomo.setAttribute("id", numAtomo(newAtomo));
    newAtomo.setAttribute("class", "atomo");
    newAtomo.style.position = "absolute";

    //Crear un div donde se muestre el atomo
    let newNucleo = document.createElement("div");
    let idNucleo = document.getElementById(id).getAttribute("data-simbolo");
    newNucleo.setAttribute("id", idNucleo);
    newNucleo.innerHTML = idNucleo;
    newNucleo.setAttribute("class", "daltonAtomo");
    newAtomo.appendChild(newNucleo);

    //Crear div(s) donde se muestren los orbitales
    crearOrbitales(document.getElementById(id).getAttribute("data-periodo"), newNucleo, newAtomo, document.getElementById(id).getAttribute("data-electrones"));

    //Añadir evento mouse down al atomo
    newAtomo.addEventListener('mousedown', mouseDown);
}

function crearOrbitales(numOrbitales, id, parent, numElectrones) {
    tagName = "orbital";
    let tag = document.createElement(tagName);
    tag.setAttribute("id", tagName);

    tag.style.position = "absolute";
    tag.style.border = "2.5px solid white";
    tag.style.borderRadius = "100%";

    tag.style.zIndex = 1;

    let atomoAncho = window.getComputedStyle(document.getElementsByClassName("daltonAtomo")[document.getElementsByClassName("daltonAtomo").length - 1], null).getPropertyValue("width");
    atomoAncho = (atomoAncho.slice(0, atomoAncho.length - 2)) * 1.3;

    tag.style.width = atomoAncho + "px";
    tag.style.height = atomoAncho + "px";

    tag.style.left = 0 - atomoAncho / 10;
    tag.style.top = 0 - atomoAncho / 10;

    parent.appendChild(tag);
    crearElectrones(numElectrones, numOrbitales, tag, atomoAncho);

    parent.removeChild(id);
    tag.appendChild(id);
}

function crearElectrones(electrones, periodo, id, largoOrbital) {
    let maxElec = nivelesEnergeticos(electrones, periodo);

    for (let cont = 0; cont < maxElec; cont++) {
        tagName = "electron" + cont;
        let tag = document.createElement(tagName);

        tag.style.zIndex = "100";
        tag.style.width = "10px";
        tag.style.height = "10px";
        tag.style.borderRadius = "100%";
        tag.style.backgroundColor = "white";

        let largo = id.style.width;
        largo = largo.slice(0, largo.length - 2);

        tag.style.left = ((largo - 10) / 2) + "px";
        tag.style.top = -5 + "px";

        tag.style.position = "absolute";
        id.appendChild(tag);

        tag.addEventListener("mousedown", linea);
        orbitaElectron(tag, largoOrbital);
    }
}

function nivelesEnergeticos(electrones, p) {
    let nivelE = ["1s", "2s", "2p", "3s", "3p", "4s", "3d", "4p", "5s", "4d", "5p", "6s", "4f", "5d", "6p", "7s", "5f", "6d", "7p", "6f", "7d", "7f"];
    let periodos = [0, 0, 0, 0, 0, 0, 0, 0];
    let electonesTotal = 0;

    for (let cont = 0; cont < nivelE.length; cont++) {
        let periodo = nivelE[cont].slice(0, 1);
        let letra = nivelE[cont].slice(1, 2);

        switch (letra) {
            case "s":
                letra = 2;
                break;

            case "p":
                letra = 6;
                break;

            case "d":
                letra = 10;
                break;

            case "f":
                letra = 14;
                break;
        }

        for (let cont2 = 0; cont2 < letra; cont2++) {
            electonesTotal++;
            periodos[periodo]++;

            if (electonesTotal >= electrones) {
                cont = nivelE.length;
                cont2 = letra;
            }
        }
    }
    return periodos[p];
}

function orbitaElectron(tag, largo) {
    var pos = Math.floor(Math.random() * 360);

    let cos = Math.cos(pos * Math.PI / 180);
    let x = (cos * (largo / 2)) + (largo / 2) - 5;

    let sin = Math.sin(pos * Math.PI / 180);
    let y = (sin * (largo / 2)) + (largo / 2) - 5;

    tag.style.top = x + 'px';
    tag.style.left = y + 'px';
}

function numAtomo() {
    contAtomo++;
    let nombre = "atomo" + contAtomo;

    return nombre;
}

function getCoords(event, ID) {
    X = event.clientX;
    Y = event.clientY;

    X1 = X + "px";
    Y1 = Y + "px";

    ID.style.top = Y1;
    ID.style.left = X1;
}

function idElementos(data) {
    nombres++;
    let nombre;

    simbolo = data.getAttribute("data-simbolo");
    nombre = simbolo + nombres;

    data.setAttribute("id", nombre);
}

function linea(event) {
    ID2 = event.target.id;
    ID = document.getElementById(ID2);

    if (document.getElementById("palo") == null) {
        let palo = document.createElement("div");
        palo.setAttribute("id", "palo");
        palo.setAttribute("class", "palo");
        palo.style.display = "none";
        document.getElementsByTagName("body")[0].appendChild(palo);
    }
    else {
        document.getElementById("palo").remove();

        let palo = document.createElement("div");
        palo.setAttribute("id", "palo");
        palo.setAttribute("class", "palo");
        palo.style.display = "none";
        document.getElementsByTagName("body")[0].appendChild(palo);
    }

    //origen de la linea
    let puntoX = 0;
    let puntoY = 0;

    document.getElementById("fondo").addEventListener('mouseup', mouseUp);
    document.getElementById("fondo").addEventListener('mousemove', mouseMovement);

    mouseMovement(event);

    function mouseUp() {
        document.getElementById("fondo").removeEventListener('mousemove', mouseMovement);
        document.getElementById("fondo").removeEventListener('mouseup', mouseUp);
    }

    function mouseMovement(event) {
        let mouseX = event.clientX - palo.style.width / 2;
        let mouseY = event.clientY;

        let X = (mouseX + puntoX) / 2;
        let Y = (mouseY + puntoY) / 2;

        let x = -1* (mouseX - puntoX);
        let y = mouseY - puntoY;

        let c = Math.sqrt(Math.pow(x, 2) + Math.pow(y, 2));
        document.getElementById("palo").style.height = c + 10 + "px";

        let angulo = 90 - (Math.atan(y / x) / Math.PI * 180);
        document.getElementById("palo").style.rotate = "z " + angulo + "deg";

        palo.style.display = "block";
        palo.style.top = Y - c / 2;
        palo.style.left = X;
    }
}