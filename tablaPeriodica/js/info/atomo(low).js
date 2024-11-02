let nombre = document.getElementById("nombre").innerHTML;
document.getElementById("nombre").innerHTML = nombre.toUpperCase();

//Crear un div(atomo) donde se anexen los orbitales y el nucleo    
let newAtomo = document.createElement("div");

document.getElementById("fondo").appendChild(newAtomo);
newAtomo.style.position = "absolute";
newAtomo.setAttribute("id", "atomo");

//Crear div(s) donde se muestren los orbitales
crearOrbitales(newAtomo);

//Crear un div donde se muestre el atomo
let newNucleo = document.createElement("div");
newAtomo.appendChild(newNucleo);

let idNucleo = document.getElementById("simbolo").getAttribute("data-value");
newNucleo.innerHTML = idNucleo;

newNucleo.setAttribute("class", "atomo " + document.getElementById("tipo").getAttribute("data-value"));

let atomoLargo = newAtomo.style.width;
atomoLargo = atomoLargo.slice(0, atomoLargo.length - 2);
let nucleoLargo = newNucleo.style.width;
nucleoLargo = nucleoLargo.slice(0, nucleoLargo.length - 2);

newAtomo.style.left = "50%";
newAtomo.style.top = "50%";

newNucleo.style.left = "-23px";
newNucleo.style.top = "-23px";

newNucleo.style.position = "absolute";

function crearOrbitales(atomo) {
    for (let cont = document.getElementById("periodo").getAttribute("data-value"); cont > 0; cont--) {
        tagName = "orbital" + cont;
        let tag = document.createElement("span");
        tag.setAttribute("id", tagName);
        tag.setAttribute("class", "orbital");

        tag.style.width = (200 * (cont / 2)) + "px";
        tag.style.height = (200 * (cont / 2)) + "px";
        tag.style.backfaceVisibility = "visible";

        tag.style.position = "absolute";
        tag.style.border = "2.5px solid white";
        tag.style.borderRadius = "100%";

        tag.style.zIndex = 1;

        let atomoLargo = atomo.style.width;
        atomoLargo = atomoLargo.slice(0, atomoLargo.length - 2);
        let orbitalLargo = tag.style.width;
        orbitalLargo = orbitalLargo.slice(0, orbitalLargo.length - 2);

        tag.style.left = (atomoLargo - orbitalLargo) / 2;
        tag.style.top = (atomoLargo - orbitalLargo) / 2;

        atomo.appendChild(tag);
        crearElectrones(cont, tag, (200 * (cont / 2)));
    }
}

function crearElectrones(periodo, id, largoOrbital) {
    let maxElec = nivelesEnergeticos(periodo);

    for (let cont = 0; cont < maxElec; cont++) {
        tagName = "electron" + cont;
        let tag = document.createElement("span");

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

function nivelesEnergeticos(p) {
    let nivelE = ["1s", "2s", "2p", "3s", "3p", "4s", "3d", "4p", "5s", "4d", "5p", "6s", "4f", "5d", "6p", "7s", "5f", "6d", "7p", "6f", "7d", "7f"];
    let periodos = [0, 0, 0, 0, 0, 0, 0, 0];
    let electonesTotal = 0;
    let electrones = document.getElementById("electrones").getAttribute("data-value");

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

function cambiarAngulo(event) {
    let Xinicial = event.clientX;
    let Yinicial = event.clientY;
    document.getElementById("fondo").style.cursor = "grabbing";

    document.getElementById("fondo").addEventListener("mousemove", angulo);
    document.getElementById("fondo").addEventListener("mouseup", eliminar);

    function angulo(event) {
        let Xfinal = event.clientX;
        let Yfinal = event.clientY;

        let X = Xfinal - Xinicial;
        let Y = Yfinal - Yinicial;

        let a = document.getElementsByClassName("orbital");
        for (let cont = 0; cont < a.length; cont++) {
            a[cont].style.transform = "rotateX(" + Y + "deg)";
            a[cont].style.rotate = "y " + X + "deg";
        }
    }

    function eliminar() {
        document.getElementById("fondo").removeEventListener("mousemove", angulo);
        document.getElementById("fondo").removeEventListener("mouseup", eliminar);
        document.getElementById("fondo").style.cursor = "grab";
    }
}