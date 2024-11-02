//miscellaneous
const container = document.getElementById("canvaElemento");
const scene = new THREE.Scene();
var draggable = new THREE.Object3D;
let dalton = false;
let elemento = [], tiempo = [], oxi = [];;

//mouse
const mouseMove = new THREE.Vector2();
const raycaster = new THREE.Raycaster();

let IdAtomo, atomSelected = undefined, infoSelected = undefined;
let raycasterX, raycasterY, mouseX, mouseY, mouseDown = false;

//camera
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 100, 1000);
camera.position.z = 1000;

//rendererz
const renderer = new THREE.WebGLRenderer({
    canvas: canvaElemento,
    alpha: true
});

function getWidth() {
    return parseInt(window.getComputedStyle(container).width);
}

function getHeight() {
    return parseInt(window.getComputedStyle(container).height);
}

let vFOV = (camera.fov * Math.PI) / 180;
let height = 2 * Math.tan(vFOV / 2) * Math.abs(camera.position.z);
let width = height * camera.aspect;

renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(window.devicePixelRatio);

renderer.render(scene, camera);

// light
const light = new THREE.AmbientLight(0xffffff, 0.5);
light.castShadow = true;
scene.add(light);

const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
directionalLight.position.set(0, 32, 64)
scene.add(directionalLight);

//fondo
const fondoGeometry = new THREE.BoxGeometry(window.innerWidth * 2, window.innerHeight * 2, 1);
const fondoMaterial = new THREE.MeshBasicMaterial({ color: "rgb(26, 26, 26)" });
const fondo = new THREE.Mesh(fondoGeometry, fondoMaterial);
fondo.visible = false;
fondo.name = "fondo";
fondo.position.set(0, 0, 0);
scene.add(fondo);

//mouse functions
function onMouseMove(event) {
    mouseX = event.clientX;
    mouseY = event.clientY;

    mouseMove.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouseMove.y = - (event.clientY / window.innerHeight) * 2 + 1;

    raycaster.setFromCamera(mouseMove, camera);
    const clickObject = raycaster.intersectObjects(scene.children);

    if (clickObject.length > 0) {
        if (mouseX && mouseY) {
            if (clickObject[0].object.name == "fondo") {
                raycasterX = clickObject[0].point.x;
                raycasterY = clickObject[0].point.y;
            }
            else {
                raycasterX = clickObject[1].point.x;
                raycasterY = clickObject[1].point.y;
            }
        }
    }

    if (mouseDown == true && atomSelected != undefined && clickObject[0] != undefined) {
        scene.getObjectById(atomSelected).position.set(raycasterX, raycasterY, 0);
        elemento[atomSelected].x = raycasterX;
        elemento[atomSelected].y = raycasterY;

        let wiwi = toScreenPosition(scene.getObjectById(atomSelected), camera);
        document.getElementById(atomSelected).style.left = (wiwi.x - 20) + "px";
        document.getElementById(atomSelected).style.top = (wiwi.y - 20) + "px";
    }
}

window.addEventListener("mousedown", function () {
    mouseDown = true;

    raycaster.setFromCamera(mouseMove, camera);
    const intersects = raycaster.intersectObjects(scene.children);

    if (intersects.length > 0 && intersects[0].object.userData.draggable) {
        atomSelected = intersects[0].object.id;
    }

    container.style.zIndex = 1;
});

window.addEventListener("mouseup", function (event) {
    mouseDown = false;

    if (atomSelected) {
        eliminar(event);
        basura(event);
        unir();

        atomSelected = undefined;
    }

    container.style.zIndex = -1;
});

window.addEventListener("contextmenu", (event) => {
    event.preventDefault();

    raycaster.setFromCamera(mouseMove, camera);
    const intersects = raycaster.intersectObjects(scene.children);

    if (intersects.length > 0 && intersects[0].object.userData.draggable) {
        document.getElementsByClassName("objectInfo")[0].style.opacity = "100%";
        infoSelected = intersects[0].object.id;

        let titule = [];
        let texte = [];
        for (const [key, value] of Object.entries(elemento[infoSelected])) {
            titule = titule.concat(`${key}`);
            texte = texte.concat(`${value}`);
        }

        info(infoSelected, titule, texte);
    }
});

window.addEventListener("resize", () => {
    camera.aspect = getWidth() / getHeight();
    camera.updateProjectionMatrix();

    vFOV = (camera.fov * Math.PI) / 180;
    height = 2 * Math.tan(vFOV / 2) * Math.abs(camera.position.z);
    width = height * camera.aspect;

    borderX = width / 2;
    borderY = height / 2;
}, false);

//functions
function crearAtomo(event) { 
    container.style.zIndex = 1;
    const selected = event.target;

    let colorNucleo;

    for (let cont = 0; cont < colores.length; cont++) {
        if (colores[cont][0] == selected.getAttribute("data-tipo")) {
            colorNucleo = colores[cont][1];
        }
    }

    const geometry = new THREE.IcosahedronGeometry(radioAtomico(selected.getAttribute("data-periodo"), selected.getAttribute("data-grupo")), 0);
    const material = new THREE.MeshToonMaterial({ color: colorNucleo });
    nucleo = new THREE.Mesh(geometry, material);
    atomSelected = nucleo.id;
    nucleo.name = "elemento";
    nucleo.position.set(raycasterX, raycasterY, 0);
    nucleo.userData.draggable = true;
    scene.add(nucleo);

    let nombre = document.createElement("div");
    document.getElementsByTagName("body")[0].appendChild(nombre);
    nombre.setAttribute("id", nucleo.id);
    nombre.setAttribute("class", "nombre");
    nombre.innerHTML = selected.getAttribute("data-simbolo") + "<sup>" + selected.getAttribute("data-superindice") + "</sup>";

    elemento[atomSelected] = {
        "simbolo": selected.getAttribute("data-simbolo"),
        "nombre": selected.getAttribute("data-nombre"),
        "oxidacion": selected.getAttribute("data-superindice"),
        "z": selected.getAttribute("data-numatomico"),
        "periodo": selected.getAttribute("data-periodo"),
        "grupo": selected.getAttribute("data-grupo"),
        "tipo": selected.getAttribute("data-tipo"),
        "radioAtomico": radioAtomico(selected.getAttribute("data-periodo"), selected.getAttribute("data-grupo")),
        "id": atomSelected,
        "subindice": 1,
        "elemento": true,
        "x": nucleo.position.x,
        "y": nucleo.position.y,
        "angle": Math.floor(Math.random() * 360),
        "rgb": [nucleo.material.color.r, nucleo.material.color.g, nucleo.material.color.b]
    }

    if (elemento[atomSelected].simbolo == null) {
        console.error("objeto " + atomSelected + " corrputo");
        descomponer(atomSelected);
    }
}

function unir() {
    let selectedX = scene.getObjectById(atomSelected).position.x;
    let selectedY = scene.getObjectById(atomSelected).position.y;

    let selectedRGB = scene.getObjectById(atomSelected).material.color;

    try {
        for (let cont = 0; cont <= scene.children.length; cont++) {
            if (scene.children[cont].userData.draggable && atomSelected != scene.children[cont].id) {
                let atom = scene.children[cont].id;

                let atomX = scene.getObjectById(atom).position.x;
                let atomY = scene.getObjectById(atom).position.y;
                let atomAncho = (scene.getObjectById(atom).geometry.parameters.radius * 2) * .85;

                let atomRGB = scene.getObjectById(atom).material.color;

                if (selectedX >= (atomX - atomAncho) && selectedX <= (atomX + atomAncho)
                    && selectedY >= (atomY - atomAncho) && selectedY <= (atomY + atomAncho)) {

                    const geometry = new THREE.IcosahedronGeometry((elemento[atom].radioAtomico + elemento[atomSelected].radioAtomico) / 1.5, 0);
                    const material = new THREE.MeshToonMaterial({ color: "rgb(" + Math.floor(((selectedRGB.r + atomRGB.r) / 2) * 255) + ", " + Math.floor(((selectedRGB.g + atomRGB.g) / 2) * 255) + ", " + Math.floor(((selectedRGB.b + atomRGB.b) / 2) * 255) + ")" });
                    nucleo = new THREE.Mesh(geometry, material);
                    nucleo.userData.draggable = true;
                    nucleo.position.set((atomX + selectedX) / 2, (atomY + selectedY) / 2, 0);
                    nucleo.userData.draggable = true;
                    scene.add(nucleo);

                    let compuesto = [], componente = [];

                    if (elemento[atomSelected].elemento == true) {
                        compuesto = compuesto.concat(elemento[atomSelected]);
                        componente = componente.concat(elemento[atomSelected]);
                    } else {
                        for (let cont = 0; cont < elemento[atomSelected].compuestos.length; cont++) {
                            compuesto = compuesto.concat(elemento[atomSelected].compuestos[cont]);
                        }

                        for (let cont = 0; cont < elemento[atomSelected].componentes.length; cont++) {
                            componente = componente.concat(elemento[atomSelected].componentes[cont]);
                        }
                    }

                    if (elemento[atom].elemento == true) {
                        compuesto = compuesto.concat(elemento[atom]);
                        componente = componente.concat(elemento[atom]);
                    } else {
                        for (let cont = 0; cont < elemento[atom].compuestos.length; cont++) {
                            compuesto = compuesto.concat(elemento[atom].compuestos[cont]);
                        }

                        for (let cont = 0; cont < elemento[atom].componentes.length; cont++) {
                            componente = componente.concat(elemento[atom].componentes[cont]);
                        }
                    }

                    let oxidacion = 0;
                    for (let cont = 0; cont < componente.length; cont++) {
                        oxidacion += parseInt(componente[cont].oxidacion);
                    }

                    let nombre = document.createElement("div");
                    document.getElementsByTagName("body")[0].appendChild(nombre);
                    nombre.setAttribute("id", nucleo.id);
                    nombre.setAttribute("class", "nombre");
                    nombre.innerHTML = nombreCompuesto(compuesto, componente);

                    elemento[nucleo.id] = {
                        "": "",
                        "simbolo": nombreCompuesto(compuesto, componente),
                        "componentes": componente,
                        "oxidacion": oxidacion,
                        "": "",
                        "radioAtomico": Math.floor((elemento[atom].radioAtomico + elemento[atomSelected].radioAtomico) / 1.5),
                        "compuestos": compuesto,
                        "elemento": false,
                        "id": nucleo.id,
                        "x": (atomX + selectedX) / 2,
                        "y": (atomY + selectedY) / 2,
                        "angle": Math.floor(Math.random() * 360),
                        "rgb": [nucleo.material.color.r, nucleo.material.color.g, nucleo.material.color.b]
                    }

                    scene.remove(scene.getObjectById(atom));
                    scene.remove(scene.getObjectById(atomSelected));

                    document.getElementById(atom).remove();
                    document.getElementById(atomSelected).remove();

                    tiempo[atom] = undefined;
                    oxi[atom] = undefined;

                    tiempo[atomSelected] = undefined;
                    oxi[atomSelected] = undefined;

                    if (oxidacion > 0) {
                        tiempo[nucleo.id] = Math.floor(100 / oxidacion);
                    } else if (oxidacion < 0) {
                        tiempo[nucleo.id] = Math.floor(100 / (-1 * oxidacion));
                    }

                    if (document.getElementById("info" + atom)) {
                        document.getElementById("info" + atom).style.opacity = 0;
                        info(undefined, undefined, undefined);
                    }

                    if (document.getElementById("info" + atomSelected)) {
                        document.getElementById("info" + atomSelected).style.opacity = 0;
                        info(undefined, undefined, undefined);
                    }

                    elemento[atomSelected] = undefined;
                    elemento[atom] = undefined;
                }
            }
        }
    } catch (err) {
        if (err.name == "TypeError") {
            err = null;
        } else {
            console.error(err);
        }
    }
}

function spawn(target, child, parent) {
    let colorNucleo;

    for (let cont = 0; cont < colores.length; cont++) {
        if (colores[cont][0] == target.getAttribute("data-tipo")) {
            colorNucleo = colores[cont][1];
        }
    }

    const geometry = new THREE.IcosahedronGeometry(radioAtomico(target.getAttribute("data-periodo"), target.getAttribute("data-grupo")), 0);
    const material = new THREE.MeshToonMaterial({ color: colorNucleo });
    nucleo = new THREE.Mesh(geometry, material);
    nucleo.position.set(parent.x, parent.y, 0);
    nucleo.userData.draggable = true;
    scene.add(nucleo);

    elemento[nucleo.id] = child;

    if (Math.random() <= 0.5) {
        scene.getObjectById(nucleo.id).position.x += (Math.random() * parent.radioAtomico * 2);
        elemento[nucleo.id].x = scene.getObjectById(nucleo.id).position.x;
    } else {
        scene.getObjectById(nucleo.id).position.x -= (Math.random() * parent.radioAtomico * 2);
        elemento[nucleo.id].x = scene.getObjectById(nucleo.id).position.x;
    }

    if (Math.random() * 1 <= 0.5) {
        scene.getObjectById(nucleo.id).position.y += (Math.random() * parent.radioAtomico * 2);
        elemento[nucleo.id].y = scene.getObjectById(nucleo.id).position.y;
    } else {
        scene.getObjectById(nucleo.id).position.y -= (Math.random() * parent.radioAtomico * 2);
        elemento[nucleo.id].y = scene.getObjectById(nucleo.id).position.y;
    }

    let nombre = document.createElement("div");
    document.getElementsByTagName("body")[0].appendChild(nombre);
    nombre.setAttribute("id", nucleo.id);
    nombre.setAttribute("class", "nombre");
    nombre.innerHTML = target.getAttribute("data-simbolo") + "<sup>" + target.getAttribute("data-superindice") + "</sup>";
}

function fusionar(parentID, childID) {
    let parent = scene.getObjectById(parentID);
    let child = scene.getObjectById(childID);

    if (parent != undefined && child != undefined) {
        let parentX = parent.position.x;
        let parentY = parent.position.y;

        let childX = child.position.x;
        let childY = child.position.y;
        let childAncho = (elemento[parentID].radioAtomico * 2) * .85;

        if (parentX >= (childX - childAncho) && parentX <= (childX + childAncho)
            && parentY >= (childY - childAncho) && parentY <= (childY + childAncho)) {

            const geometry = new THREE.IcosahedronGeometry((elemento[childID].radioAtomico + elemento[parentID].radioAtomico) / 1.5, 0);
            const material = new THREE.MeshToonMaterial({ color: "rgb(" + Math.floor(((elemento[parentID].rgb[0] + elemento[childID].rgb[0]) / 2) * 255) + ", " + Math.floor(((elemento[parentID].rgb[1] + elemento[childID].rgb[1]) / 2) * 255) + ", " + Math.floor(((elemento[parentID].rgb[2] + elemento[childID].rgb[2]) / 2) * 255) + ")" });
            nucleo = new THREE.Mesh(geometry, material);
            nucleo.userData.draggable = true;
            nucleo.position.set((childX + parentX) / 2, (childY + parentY) / 2, 0);
            nucleo.userData.draggable = true;
            scene.add(nucleo);

            let compuesto = [], componente = [];

            if (elemento[parentID].elemento == true) {
                compuesto = compuesto.concat(elemento[parentID]);
                componente = componente.concat(elemento[parentID]);
            } else {
                for (let cont = 0; cont < elemento[parentID].compuestos.length; cont++) {
                    compuesto = compuesto.concat(elemento[parentID].compuestos[cont]);
                }

                for (let cont = 0; cont < elemento[parentID].componentes.length; cont++) {
                    componente = componente.concat(elemento[parentID].componentes[cont]);
                }
            }

            if (elemento[childID].elemento == true) {
                compuesto = compuesto.concat(elemento[childID]);
                componente = componente.concat(elemento[childID]);
            } else {
                for (let cont = 0; cont < elemento[childID].compuestos.length; cont++) {
                    compuesto = compuesto.concat(elemento[childID].compuestos[cont]);
                }

                for (let cont = 0; cont < elemento[childID].componentes.length; cont++) {
                    componente = componente.concat(elemento[childID].componentes[cont]);
                }
            }

            let oxidacion = 0;
            for (let cont = 0; cont < componente.length; cont++) {
                oxidacion += parseInt(componente[cont].oxidacion);
            }

            let nombre = document.createElement("div");
            document.getElementsByTagName("body")[0].appendChild(nombre);
            nombre.setAttribute("id", nucleo.id);
            nombre.setAttribute("class", "nombre");
            nombre.innerHTML = nombreCompuesto(compuesto, componente);

            elemento[nucleo.id] = {
                "": "",
                "simbolo": nombreCompuesto(compuesto, componente),
                "componentes": componente,
                "oxidacion": oxidacion,
                "": "",
                "radioAtomico": Math.floor((elemento[childID].radioAtomico + elemento[parentID].radioAtomico) / 1.5),
                "compuestos": compuesto,
                "elemento": false,
                "id": nucleo.id,
                "x": (childX + parentX) / 2,
                "y": (childY + parentY) / 2,
                "angle": Math.floor(Math.random() * 360),
                "rgb": [nucleo.material.color.r, nucleo.material.color.g, nucleo.material.color.b]
            }

            scene.remove(scene.getObjectById(childID));
            scene.remove(scene.getObjectById(parentID));

            document.getElementById(childID).remove();
            document.getElementById(parentID).remove();

            tiempo[childID] = undefined;
            oxi[childID] = undefined;

            tiempo[parentID] = undefined;
            oxi[parentID] = undefined;

            elemento[childID] = undefined;
            elemento[parentID] = undefined

            if (oxidacion > 0) {
                tiempo[nucleo.id] = Math.floor(100 / oxidacion);
            } else if (oxidacion < 0) {
                tiempo[nucleo.id] = Math.floor(100 / (-1 * oxidacion));
            }

            if (document.getElementById("info" + childID)) {
                document.getElementById("info" + childID).style.opacity = 0;
                info(undefined, undefined, undefined);
            }

            if (document.getElementById("info" + parentID)) {
                document.getElementById("info" + parentID).style.opacity = 0;
                info(undefined, undefined, undefined);
            }
        }
    }
}

function nombreCompuesto(compuestosArray, componentesArray) {
    let nombre = "";
    for (let cont = 0; cont < compuestosArray.length; cont++) {
        let check = compuestosArray[cont];
        for (let cont1 = cont + 1; cont1 < compuestosArray.length; cont1++) {
            let checking = compuestosArray[cont1];

            if (check.simbolo == checking.simbolo) {
                check.subindice = check.subindice + checking.subindice;

                index = compuestosArray.map(e => e.id).indexOf(compuestosArray[cont1].id);
                if (index > -1) {
                    compuestosArray.splice(index, 1);
                }
            }
        }
        if (check.subindice <= 1) {
            nombre += check.simbolo;
        } else {
            let sub = check.subindice.toString();
            nombre += check.simbolo + sub.sub();
        }
    }

    let oxidacion = 0;
    for (let cont = 0; cont < componentesArray.length; cont++) {
        oxidacion += parseInt(componentesArray[cont].oxidacion);
    }

    if (oxidacion != 0) {
        oxidacion = oxidacion.toString();
        nombre = "(" + nombre + ")" + oxidacion.sup();
    }

    return nombre;
}

function eliminar(event) {
    if (event.clientX >= (window.innerWidth * 0.81)) {
        if (elemento[atomSelected].elemento == true) {
            alert("warning", "elemento " + document.getElementById(atomSelected).innerHTML + " eliminado");
        } else {
            alert("warning", "compuesto " + document.getElementById(atomSelected).innerHTML + " eliminado");
        }
        console.warn("OBJETO " + atomSelected + " ELIMINADO");

        scene.remove(scene.getObjectById(atomSelected));
        document.getElementById(atomSelected).remove();
        elemento[atomSelected] = undefined;
        if (document.getElementById("info" + atomSelected)) {
            document.getElementById("info" + atomSelected).style.opacity = 0;
            info(undefined, undefined, undefined);
        }

        tiempo.splice(atomSelected, 1);
        oxi.splice(atomSelected, 1);

        atomSelected = undefined;
    }
}

function basura() {
    let basurero = document.getElementsByClassName("trashcan")[0];
    let simbolo = document.getElementById(atomSelected);

    if (parseInt(simbolo.style.top) >= parseInt(window.getComputedStyle(basurero).top) - 50 && parseInt(simbolo.style.left) >= parseInt(window.getComputedStyle(basurero).left) - 50) {
        if (elemento[atomSelected].elemento == true) {
            alert("warning", "elemento " + document.getElementById(atomSelected).innerHTML + " eliminado");
        } else {
            alert("warning", "compuesto " + document.getElementById(atomSelected).innerHTML + " eliminado");
        }

        if (document.getElementById("info" + atomSelected)) {
            document.getElementById("info" + atomSelected).style.opacity = 0;
            info(undefined, undefined, undefined);
        }

        descomponer(atomSelected);
    }
}

function radioAtomico(periodo, grupo) {
    let radio;

    radio = (20 * periodo) * (((grupo - 18) * -1) / 10);
    if (radio < 51) {
        radio = 50;
    }

    return radio;
}

function descomponer(id) {
    scene.remove(scene.getObjectById(id));
    document.getElementById(id).remove();
    elemento[id] = undefined;

    tiempo[atomSelected] = undefined;
    oxi[atomSelected] = undefined;

    atomSelected = undefined;
}

function vida() {
    for (let cont = 0; cont < tiempo.length; cont++) {
        tiempo[cont] = tiempo[cont] - 1;
        if (tiempo[cont] <= 0) {
            try {
                for (let cont1 = 0; cont1 < elemento[cont].componentes.length; cont1++) {
                    let element = elemento[cont].componentes[cont1];
                    element.subindice = 1;
                    spawn(document.getElementById(element.simbolo + "-" + element.oxidacion), element, elemento[cont]);
                }

                alert("info", "compuesto " + document.getElementById(cont).innerHTML + " se ha desestabilizado");

                scene.remove(scene.getObjectById(cont));
                document.getElementById(cont).remove();
                elemento[cont] = undefined;
            } catch (err) {
                console.log(err);
                console.log(cont);
                console.log(tiempo);
                console.log(elemento);
            }
            tiempo[cont] = undefined;
        }
    }
}

function gravedad() {
    for (let cont = 0; cont < elemento.length; cont++) {
        if (document.getElementById(cont) != undefined && atomSelected != cont) {
            let wawa = elemento[cont].oxidacion;
            if (wawa <= -1) {
                wawa = wawa * -1;
            }

            oxi[cont] = {
                "oxidacion": 0,
                "x": 0,
                "y": 0
            };

            for (let cont1 = 0; cont1 < elemento.length; cont1++) {
                if (document.getElementById(cont1) != undefined && cont != cont1 && atomSelected != cont1) {
                    let wewe = elemento[cont1].oxidacion;
                    if (wewe <= -1) {
                        wewe = wewe * -1;
                    }

                    if (elemento[cont].x - (wawa * 50) <= elemento[cont1].x + (wewe * 50)
                        && elemento[cont].x + (wawa * 50) >= elemento[cont1].x - (wewe * 50)
                        && elemento[cont].y - (wawa * 50) <= elemento[cont1].y + (wewe * 50)
                        && elemento[cont].y + (wawa * 50) >= elemento[cont1].y - (wewe * 50)) {

                        if (elemento[cont].oxidacion >= 1) {
                            if (elemento[cont1].oxidacion >= 1) {
                                oxi[cont].oxidacion += parseInt(elemento[cont1].oxidacion);
                                oxi[cont].x += elemento[cont].x - elemento[cont1].x;
                                oxi[cont].y += elemento[cont].y - elemento[cont1].y;
                            }
                        } else if (elemento[cont].oxidacion <= -1) {
                            if (elemento[cont1].oxidacion <= -1) {
                                oxi[cont].oxidacion += -1 * (parseInt(elemento[cont1].oxidacion));
                                oxi[cont].x += elemento[cont].x - elemento[cont1].x;
                                oxi[cont].y += elemento[cont].y - elemento[cont1].y;
                            } else if (elemento[cont1].oxidacion >= 1) {
                                oxi[cont].oxidacion += oxi[cont].oxidacion + (-1 * (parseInt(elemento[cont1].oxidacion)));
                                oxi[cont].x += elemento[cont].x - elemento[cont1].x;
                                oxi[cont].y += elemento[cont].y - elemento[cont1].y;
                            }
                        }
                    }
                }
            }
        }
    }

    for (let cont = 0; cont < oxi.length; cont++) {
        if (oxi[cont] != undefined && scene.getObjectById(cont) != undefined) {
            if (scene.getObjectById(cont).position.x + (elemento[cont].radioAtomico * 2) <= (width / 2) * 0.65 && scene.getObjectById(cont).position.x - (elemento[cont].radioAtomico * 1.75) >= -(width / 2)
                && scene.getObjectById(cont).position.y + (elemento[cont].radioAtomico * 1.75) <= height / 2 && scene.getObjectById(cont).position.y - (elemento[cont].radioAtomico * 1.75) >= -(height / 2)) {

                if (oxi[cont].oxidacion >= 1) {
                    let a = oxi[cont].x;
                    let b = oxi[cont].y;
                    let c = Math.sqrt((a * a) + (b * b));
                    let beta = b / c;
                    let alfa = a / c;
                    b = beta * oxi[cont].oxidacion;
                    a = alfa * oxi[cont].oxidacion;

                    scene.getObjectById(cont).position.set(scene.getObjectById(cont).position.x + a, scene.getObjectById(cont).position.y + b, 0);
                    elemento[cont].x = elemento[cont].x + a;
                    elemento[cont].y = elemento[cont].y + b;
                } else if (oxi[cont].oxidacion <= -1) {
                    let a = -oxi[cont].x;
                    let b = -oxi[cont].y;
                    let c = Math.sqrt((a * a) + (b * b));
                    let beta = b / c;
                    let alfa = a / c;
                    b = beta * oxi[cont].oxidacion;
                    a = alfa * oxi[cont].oxidacion;

                    scene.getObjectById(cont).position.set(scene.getObjectById(cont).position.x - a, scene.getObjectById(cont).position.y - b, 0);
                    elemento[cont].x = elemento[cont].x - a;
                    elemento[cont].y = elemento[cont].y - b;
                }
            }
        }
    }
}

function toScreenPosition(obj, camera) {
    var vector = new THREE.Vector3();

    var widthHalf = 0.5 * parseInt(container.style.width);
    var heightHalf = 0.5 * parseInt(container.style.height);

    obj.updateMatrixWorld();
    vector.setFromMatrixPosition(obj.matrixWorld);
    vector.project(camera);

    vector.x = (vector.x * widthHalf) + widthHalf;
    vector.y = - (vector.y * heightHalf) + heightHalf;

    return {
        x: vector.x,
        y: vector.y
    };
}

//animation functions
setInterval(function () {
    gravedad();

    renderer.render(scene, camera);
}, 10);

setInterval(function () {
    window.addEventListener('mousemove', onMouseMove);

    for (let cont = 0; cont < elemento.length; cont++) {
        if (elemento[cont] != undefined) {
            let element = scene.getObjectById(cont);
            if (element != undefined && element != null) {

                elemento[cont].angle = elemento[cont].angle + 1;
                let cos = Math.cos(elemento[cont].angle * Math.PI / 180);
                let sin = Math.sin(elemento[cont].angle * Math.PI / 180);

                element.rotation.x = cos;
                element.rotation.y = sin;


                if (elemento[cont].oxidacion != 0 && atomSelected != cont) {
                    let shake = elemento[cont].oxidacion * 25 / 8;
                    if (shake < 0) {
                        shake = shake * -1;
                    }

                    if (shake >= 25) {
                        shake = 25;
                    }

                    if (Math.random() * 1 > 0.5) {
                        element.position.x = elemento[cont].x + ((Math.random() * shake));
                    }
                    else {
                        element.position.x = elemento[cont].x - ((Math.random() * shake));
                    }

                    if (Math.random() * 1 > 0.5) {
                        element.position.y = elemento[cont].y + ((Math.random() * shake));
                    }
                    else {
                        element.position.y = elemento[cont].y - ((Math.random() * shake));
                    }
                }
                let wiwi = toScreenPosition(element, camera);
                document.getElementById(cont).style.left = (wiwi.x - 20) + "px";
                document.getElementById(cont).style.top = (wiwi.y - 20) + "px";

                for (let cont1 = 0; cont1 < elemento.length; cont1++) {
                    if (elemento[cont1] != undefined && cont != cont1 && atomSelected != cont && atomSelected != cont1) {
                        fusionar(cont, cont1);
                    }
                }
            }
        }
    }
}, 40);

setInterval(function () {
    vida();
}, 1000);