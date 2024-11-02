import { OrbitControls } from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls.js';

let colorNucleo;

for (let cont = 0; cont < colores.length; cont++) {
    if (colores[cont][0] == document.getElementById("tipo").getAttribute("data-value")) {
        colorNucleo = colores[cont][1];
    }
}

const renderer = new THREE.WebGLRenderer({
    canvas: canvaElemento,
    alpha: true,
});

const canvas = document.getElementById("canvaElemento");

function getWidth() {
    return parseInt(window.getComputedStyle(canvas).width);
}

function getHeight() {
    return parseInt(window.getComputedStyle(canvas).height);
}

renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(getWidth(), getHeight());

addEventListener("resize", () => {
    camera.aspect = getWidth() / getHeight();
    camera.updateProjectionMatrix();
}, false);

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, getWidth() / getHeight(), 0.1, 1000);

const controls = new OrbitControls(camera, renderer.domElement);

const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
const directionalLight2 = new THREE.DirectionalLight(0xffffff, 0.5);

directionalLight.position.x = 50;
directionalLight.position.y = 50;
scene.add(directionalLight);

directionalLight2.position.x = -50;
directionalLight2.position.y = -50;
scene.add(directionalLight2);

let nucleo = [];
let electron = [];
let periodo = [];

let atomo = [];
const geometry = new THREE.IcosahedronGeometry(5, 0);
const material = new THREE.MeshToonMaterial({ color: "rgb(255,255,255)" });
nucleo = new THREE.Mesh(geometry, material);
nucleo.position.set(5, 5, 0);
scene.add(nucleo);
nucleo.userData.angle = Math.floor(Math.random() * 360);

for (let cont1 = 1; cont1 < document.getElementById("periodo").getAttribute("data-value") + 1; cont1++) {
    let maxElec = nivelesEnergeticos(cont1);
    for (let cont = 0; cont < maxElec; cont++) {
        const geometry = new THREE.IcosahedronGeometry(1.5, 0);
        const material = new THREE.MeshToonMaterial({ color: 0xEEEEEE });
        electron[cont] = new THREE.Mesh(geometry, material);
        electron[cont].position.set(Math.random() * 10, Math.random() * 10, 0);
        scene.add(electron[cont]);

        atomo[atomo.length++] = {
            Object3D: electron[cont],
            distance: (10 + (10 * cont1)),
            angle: (Math.floor(Math.random() * 360))
        };
    }
}

for (let cont = 1; cont <= document.getElementById("periodo").getAttribute("data-value"); cont++) {
    const geometry = new THREE.TorusGeometry((10 + (10 * cont)), 0.2, 16, 100);
    const material = new THREE.MeshBasicMaterial({ color: "rgb(151,151,151)" });
    const torus = new THREE.Mesh(geometry, material);
    torus.position.set(5, 5, 0);
    scene.add(torus);
}

document.getElementById("canvaElemento").addEventListener("mousedown", function () {
    document.getElementById("canvaElemento").style.cursor = "grabbing";
});

document.getElementById("canvaElemento").addEventListener("mouseup", function () {
    document.getElementById("canvaElemento").style.cursor = "default";
});

camera.position.x = 5;
camera.position.y = 5;
camera.position.z = 120;
renderer.render(scene, camera);

window.addEventListener("keydown", mover);
function mover(event) {
    if (event.key == "w") {
        camera.position.z -= 1;
    }
    if (event.key == "s") {
        camera.position.z += 1;
    }
    if (event.key == "a") {
        camera.position.x -= 1;
    }
    if (event.key == "d") {
        camera.position.x += 1;
    }

    if (event.key == " " || event.code == "Space" || event.keyCode == 32) {
        camera.position.y += 1;
    }
    if (event.shiftKey) {
        camera.position.y -= 1;
    }
    renderer.render(scene, camera);
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

const ElectronRenderer = new THREE.WebGLRenderer({
    canvas: canvaElectron,
    alpha: true,
});

const ProtonRenderer = new THREE.WebGLRenderer({
    canvas: canvaProton,
    alpha: true,
});

const NeutronRenderer = new THREE.WebGLRenderer({
    canvas: canvaNeutron,
    alpha: true,
});

function getWidthElectron() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaElectron")).width);
}

function getHeightElectron() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaElectron")).height);
}

function getWidthProton() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaProton")).width);
}
function getHeightProton() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaProton")).height);
}

function getWidthNeutron() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaNeutron")).width);
}
function getHeightNeutron() {
    return parseInt(window.getComputedStyle(document.getElementById("canvaNeutron")).height);
}

ElectronRenderer.setPixelRatio(window.devicePixelRatio);
ElectronRenderer.setSize(getWidthElectron(), getHeightElectron());

ProtonRenderer.setPixelRatio(window.devicePixelRatio);
ProtonRenderer.setSize(getWidthProton(), getHeightProton());

NeutronRenderer.setPixelRatio(window.devicePixelRatio);
NeutronRenderer.setSize(getWidthNeutron(), getHeightNeutron());

const ModelosScene = new THREE.Scene();

const ElectronCamera = new THREE.PerspectiveCamera(75, getWidthElectron() / getHeightElectron(), 0.1, 1000);
const ProtonCamera = new THREE.PerspectiveCamera(75, getWidthProton() / getHeightProton(), 0.1, 1000);
const NeutronCamera = new THREE.PerspectiveCamera(75, getWidthNeutron() / getHeightNeutron(), 0.1, 1000);

const directionalLight3 = new THREE.DirectionalLight(0xffffff, 0.5);
const directionalLight4 = new THREE.DirectionalLight(0xffffff, 0.5);

directionalLight3.position.x = 50;
directionalLight3.position.y = 50;
ModelosScene.add(directionalLight3);

directionalLight4.position.x = -50;
directionalLight4.position.y = -50;
ModelosScene.add(directionalLight4);

let electron2 = new THREE.Mesh(new THREE.IcosahedronGeometry(0.8, 0), new THREE.MeshToonMaterial({ color: 0xEEEEEE }));
electron2.userData.angle = Math.floor(Math.random() * 360);
electron2.position.set(5, 5, 0);
ModelosScene.add(electron2);

let proton = new THREE.Mesh(new THREE.IcosahedronGeometry(1.5, 0), new THREE.MeshToonMaterial({ color: 0x00F4FF }));
proton.userData.angle = Math.floor(Math.random() * 360);
proton.position.set(15, 5, 0);
ModelosScene.add(proton);
let neutron = new THREE.Mesh(new THREE.IcosahedronGeometry(1.5, 0), new THREE.MeshToonMaterial({ color: 0xE500FF }));
neutron.userData.angle = Math.floor(Math.random() * 360);
neutron.position.set(25, 5, 0);
ModelosScene.add(neutron);

ElectronCamera.position.set(5, 5, 5);
ProtonCamera.position.set(15, 5, 5);
NeutronCamera.position.set(25, 5, 5);

function orbital() {
    for (let cont = 0; cont < atomo.length; cont++) {
        atomo[cont].angle += 2;
        let cos = Math.cos(atomo[cont].angle * Math.PI / 180);
        let x = (cos * atomo[cont].distance);

        let sin = Math.sin(atomo[cont].angle * Math.PI / 180);
        let y = (sin * atomo[cont].distance);


        let tan = Math.sin(atomo[cont].angle * Math.PI / 180);
        let z = (tan * atomo[cont].distance);

        atomo[cont].Object3D.position.set(x + 5, y + 5);
    }
    renderer.render(scene, camera);
}
setInterval(orbital, 20);

function rotate() {
    nucleo.userData.angle += 7.5;
    nucleo.rotation.x = Math.cos(nucleo.userData.angle * Math.PI / 180);
    nucleo.rotation.y = Math.sin(nucleo.userData.angle * Math.PI / 180);

    electron2.userData.angle += 7.5;
    electron2.rotation.x = Math.cos(electron2.userData.angle * Math.PI / 180);
    electron2.rotation.y = Math.sin(electron2.userData.angle * Math.PI / 180);

    proton.userData.angle += 7.5;
    proton.rotation.x = Math.cos(proton.userData.angle * Math.PI / 180);
    proton.rotation.y = Math.sin(proton.userData.angle * Math.PI / 180);

    neutron.userData.angle += 7.5;
    neutron.rotation.x = Math.cos(neutron.userData.angle * Math.PI / 180);
    neutron.rotation.y = Math.sin(neutron.userData.angle * Math.PI / 180);

    ElectronRenderer.render(ModelosScene, ElectronCamera);
    ProtonRenderer.render(ModelosScene, ProtonCamera);
    NeutronRenderer.render(ModelosScene, NeutronCamera);
}
setInterval(rotate, 40);