document.getElementsByTagName("body")[0].addEventListener("mouseleave", function () {
    mouseX = undefined;
    mouseY = undefined;
    mouseDown = false;
});

document.getElementsByTagName("body")[0].addEventListener("mouseenter", function () {
    if (atomSelected) {
        mouseDown = true;
    }
});

function isotopos(event) {
    const isotopos = event.target.nextElementSibling;

    if (isotopos.style.display == "none") {
        isotopos.style.display = "block";
    }
    else {
        isotopos.style.display = "none";
    }
}

function alert(type, text) {
    if (document.getElementsByClassName("alerta").length > 0) {
        document.getElementsByClassName("alerta")[0].remove();
        alert(type, text);
    } else {
        let typeClass = "";
        switch (type) {
            case "warning":
                typeClass += "fa-triangle-exclamation warning";
                break;

            case "error":
                typeClass += "fa-circle-xmark error";
                break;

            case "info":
                typeClass += "fa-circle-info info";
                break;
        }

        const alert = document.createElement("div");
        document.getElementsByTagName("body")[0].appendChild(alert);
        alert.setAttribute("class", "alerta");

        const icon = document.createElement("i");
        alert.appendChild(icon);
        icon.setAttribute("class", "fa-solid fa-2xl " + typeClass);

        const span = document.createElement("span");
        alert.appendChild(span);
        span.setAttribute("class", "text");
        span.innerHTML = text;

        setTimeout(function () {
            alert.remove();
        }, 10000)
    }
}   

function buscar(){
    let inputValue = (document.getElementById("searchbox").value).toLowerCase();
    let objects = document.getElementsByClassName("buscables");

    for(let cont = 0; cont < document.getElementsByClassName("isotopos").length; cont++){
        document.getElementsByClassName("isotopos")[cont].style.display = "none";
    }

    for(let cont = 0; cont < objects.length; cont++){
        let valor = objects[cont].getAttribute("id").slice(0, inputValue.length);
        
        if(inputValue != valor){
            objects[cont].style.display = "none";
        }else{
            objects[cont].style.display = "block";
        }
    }
}