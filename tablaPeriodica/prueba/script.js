function mouseDown(event) {
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

    let puntoX = document.getElementsByClassName("a")[0].offsetLeft;
    let puntoY = document.getElementsByClassName("a")[0].offsetTop;

    ID = document.getElementsByClassName("a")[0];

    document.getElementsByTagName("body")[0].addEventListener('mouseup', mouseUp);
    document.getElementsByTagName("body")[0].addEventListener('mousemove', mouseMovement);

    mouseMovement(event);

    function mouseUp() {
        document.getElementsByTagName("body")[0].removeEventListener('mousemove', mouseMovement);
        document.getElementsByTagName("body")[0].removeEventListener('mouseup', mouseUp);
    }

    function mouseMovement(event) {
        let mouseX = event.clientX - palo.style.width / 2;
        let mouseY = event.clientY;

        let X = (mouseX + puntoX) / 2;
        let Y = (mouseY + puntoY) / 2;

        let x = -1 * (mouseX - puntoX);
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
