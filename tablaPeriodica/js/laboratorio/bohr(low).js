function drop(event) {
    //Obtener ID Padre (ID del elemento seleccionado en el toolbox)
    event.preventDefault();
    let id = event.dataTransfer.getData("text");

    //Crear un div(atomo) donde se anexen los orbitales y el nucleo    
    let newAtomo = document.createElement("div");

    event.target.appendChild(newAtomo);
    getCoords(event, newAtomo);

    newAtomo.setAttribute("id", numAtomo(newAtomo));
    newAtomo.style.position = "absolute";

    //Crear div(s) donde se muestren los orbitales
    crearOrbitales(document.getElementById(id).getAttribute("data-periodo"), newAtomo, document.getElementById(id).getAttribute("data-electrones"));

    //Crear un div donde se muestre el atomo
    let newNucleo = document.createElement("div");
    newAtomo.appendChild(newNucleo);

    let idNucleo = document.getElementById(id).getAttribute("data-simbolo");
    newNucleo.setAttribute("id", idNucleo);
    newNucleo.innerHTML = idNucleo;

    let claseNucleo = document.getElementById(id).getAttribute("class");
    claseNucleo = claseNucleo.slice(7, claseNucleo.length);
    newNucleo.setAttribute("class", "labBloque" + " " + claseNucleo);

    let atomoLargo = newAtomo.style.width;
    atomoLargo = atomoLargo.slice(0, atomoLargo.length - 2);
    let nucleoLargo = newNucleo.style.width;
    nucleoLargo = nucleoLargo.slice(0, nucleoLargo.length - 2);

    newNucleo.style.left = (atomoLargo - nucleoLargo - 18) / 2;
    newNucleo.style.top = (atomoLargo - nucleoLargo - 18) / 2;

    newNucleo.style.position = "absolute";

    //Añadir evento mouse down al atomo
    newAtomo.addEventListener('mousedown', mouseDown);
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

function crearOrbitales(numOrbitales, id, numElectrones) {
    for (let cont = numOrbitales; cont > 0; cont--) {
        tagName = "orbital" + cont;
        let tag = document.createElement(tagName);
        tag.setAttribute("id", tagName);

        tag.style.width = (55 * cont) + "px";
        tag.style.height = (55 * cont) + "px";

        tag.style.position = "absolute";
        tag.style.border = "2.5px solid white";
        tag.style.borderRadius = "100%";

        tag.style.zIndex = 1;

        let atomoLargo = id.style.width;
        atomoLargo = atomoLargo.slice(0, atomoLargo.length - 2);
        let orbitalLargo = tag.style.width;
        orbitalLargo = orbitalLargo.slice(0, orbitalLargo.length - 2);

        tag.style.left = (atomoLargo - orbitalLargo) / 2;
        tag.style.top = (atomoLargo - orbitalLargo) / 2;

        id.appendChild(tag);
        crearElectrones(numElectrones, cont, tag, (55 * cont));
    }
}

function crearElectrones(electrones, periodo, id, largoOrbital) {
    let maxElec = nivelesEnergeticos(electrones, periodo);

    for (let cont = 0; cont < maxElec; cont++) {
        tagName = "electron" + cont;
        let tag = document.createElement(tagName);

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

        for(let cont2 = 0; cont2 < letra; cont2++){
            electonesTotal++;
	    periodos[periodo]++;

            if(electonesTotal >= electrones){
                cont = nivelE.length;
                cont2 = letra;
            }
        }
    }
	return periodos[p];
}


function orbitaElectron(tag, largo) {
    var pos = Math.floor(Math.random() * 360);
    setInterval(frame, 21);
    function frame() {
        pos += 5;
        let cos = Math.cos(pos * Math.PI / 180);
        let x = (cos * (largo / 2)) + (largo / 2) - 5;

        let sin = Math.sin(pos * Math.PI / 180);
        let y = (sin * (largo / 2)) + (largo / 2) - 5;

        tag.style.top = x + 'px';
        tag.style.left = y + 'px';
    }
}