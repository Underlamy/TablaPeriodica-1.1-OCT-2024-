let IdAtomo;
let dalton = false;
function drop(event) {
    //Obtener ID Padre (ID del elemento seleccionado en el toolbox)
    event.preventDefault();
    let id = event.target.id;
    IdAtomo = id;

    //Crear un div(atomo) donde se anexen los orbitales y el nucleo    
    let newAtomo = document.createElement("div");

    document.getElementById("fondo").appendChild(newAtomo);
    getCoords(event, newAtomo);

    newAtomo.setAttribute("id", numAtomo(newAtomo));
    newAtomo.style.position = "absolute";

    //Crear div(s) donde se muestren los orbitales
    crearOrbitales(document.getElementById(id).getAttribute("data-periodo"), newAtomo);

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

function crearOrbitales(numOrbitales, id) {
    tagName = "orbital" + numOrbitales;
    let tag = document.createElement(tagName);
    tag.setAttribute("id", tagName);

    tag.style.width = 150 + "px";
    tag.style.height = 150 + "px";

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
    crearElectrones(tag, 150);
}

function crearElectrones(id, largoOrbital) {
    let maxElec = nivelesEnergeticos(document.getElementById(IdAtomo).getAttribute("data-electrones"), document.getElementById(IdAtomo).getAttribute("data-periodo"));

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

const container = document.getElementById("canvaElemento");
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1000);
var group = new THREE.Object3D();

const renderer = new THREE.WebGLRenderer({
    canvas: canvaElemento,
    alpha: true
});

renderer.setSize(window.innerWidth, window.innerHeight);
console.log(window.innerWidth + ", " + window.innerHeight);

const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
scene.add(directionalLight);

let electron = [];

function crearAtomo(event, electrones) {
    let mouseX = event.clientX;
    let mouseY = -1 * (event.clientY);
    console.log(mouseX + ", " + mouseY);

    const geometry = new THREE.IcosahedronGeometry(5, 0);
    const material = new THREE.MeshToonMaterial({ color: 0x8000FF });
    nucleo = new THREE.Mesh(geometry, material);
    nucleo.position.set(mouseX - (window.innerWidth / 2), mouseY + (window.innerHeight / 2), 0);
    scene.add(nucleo);
    rotate(nucleo);

    for (let cont = 0; cont < electrones; cont++) {
        const geometry = new THREE.IcosahedronGeometry(1, 0);
        const material = new THREE.MeshToonMaterial({ color: 0xEEEEEE });
        electron[cont] = new THREE.Mesh(geometry, material);
        electron[cont].position.set(0, 0, 0);
        scene.add(electron[cont]);
        //orbital(electron[cont]);
    }
}

function orbital(element) {
    var angle = Math.floor(Math.random() * 360);
    setInterval(frame, 10);

    function frame() {
        angle = angle + 1;
        let cos = Math.cos(angle * Math.PI / 180);
        let x = (cos * 20);

        let sin = Math.sin(angle * Math.PI / 180);
        let y = (sin * 20);

        element.rotation.x = cos;
        element.rotation.y = sin;

        element.position.set(x + 5, y + 5, 0);

        renderer.render(scene, camera);
    }
}

function rotate(element) {
    var angle = Math.floor(Math.random() * 360);
    setInterval(frame, 5);

    function frame() {
        angle = angle + 1;
        let cos = Math.cos(angle * Math.PI / 180);
        let sin = Math.sin(angle * Math.PI / 180);

        element.rotation.x = cos;
        element.rotation.y = sin;
        
        renderer.render(scene, camera);
    }
}

camera.position.z = 1000;
renderer.render(scene, camera);