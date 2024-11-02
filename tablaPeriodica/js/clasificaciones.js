let tiposElementos = ["no-metales", "metales-alcalinos", "alcalinoterreos", "metales-transicion", "otros-metales", "metaloides", "halogenos", "gases-nobles", "lantanidos", "actinidos", "no-especifico"];
//let boton = [false, false, false, false, false, false, false, false, false, false];

function pop(checkElementos) {
    for (let cont = 0; cont <= 11; cont++) {
        if (checkElementos[cont] == 0) {
            const collection = document.getElementsByClassName(tiposElementos[cont]);

            for (let largo = 0; largo < collection.length; largo++) {
                collection[largo].style.animation = "unpop 0.2s linear 0s 1 forwards";
            }
        }
        else if (checkElementos[cont] == 1) {
            const collection = document.getElementsByClassName(tiposElementos[cont]);

            for (let largo = 0; largo < collection.length; largo++) {
                collection[largo].style.animation = "pop 1s";
            }
        }
    }
}