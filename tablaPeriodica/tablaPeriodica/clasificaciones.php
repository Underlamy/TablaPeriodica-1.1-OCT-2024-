 <html>
    <head>
        <link rel="stylesheet" href="css/clasificaciones.css">
    </head>

    <script src="js/clasificaciones.js"></script>

    <body>
        <div>
            <button onclick="pop([1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1])">
                <div class="fila2 columna1 checkBox no-metales"></div>
                <div class="fila2 columna1 clasificacion"> NO METALES</div>
            </button>

            <button onclick="pop([0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1])">
                <div class="fila1 columna2 checkBox metales-alcalinos"></div>
                <div class="fila1 columna2 clasificacion"> METALES ALCALINOS</div>
            </button>

            <button onclick="pop([0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1])">
                <div class="fila1 columna3 checkBox alcalinoterreos"></div>
                <div class="fila1 columna3 clasificacion"> ALCALINOTERREOS</div>
            </button>

            <button onclick="pop([0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1])">
                <div class="fila1 columna4 checkBox metales-transicion"></div>
                <div class="fila1 columna4 clasificacion"> METALES DE TRANSICION</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1])">
                <div class="fila2 columna2 checkBox otros-metales"></div>
                <div class="fila2 columna2 clasificacion"> OTROS METALES</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])">
                <div class="fila2 columna3 checkBox metaloides"></div>
                <div class="fila2 columna3 clasificacion"> METALOIDES</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1])">
                <div class="fila2 columna4 checkBox halogenos"></div>
                <div class="fila2 columna4 clasificacion"> HALOGENOS</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1])">
                <div class="fila3 columna2 checkBox gases-nobles"></div>
                <div class="fila3 columna2 clasificacion"> GASES NOBLES</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1])">
                <div class="fila3 columna3 checkBox lantanidos"></div>
                <div class="fila3 columna3 clasificacion"> LANTANIDOS</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1])">
                <div class="fila3 columna4 checkBox actinidos"></div>
                <div class="fila3 columna4 clasificacion"> ACTINIDOS</div>
            </button>

            <button onclick="pop([1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1])">
                <div class="fila1 columna1 checkBox no-especifico"></div>
                <div class="fila1 columna1 clasificacion"> SELECCIONAR TODOS</div>
            </button>

            <button onclick="pop([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1])">
                <div class="fila3 columna1 checkBox no-especifico"></div>
                <div class="fila3 columna1 clasificacion"> DESCARTAR TODOS</div>
            </button>
        </div>
    </body>
</html>