<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleccion</title>
    <link rel="stylesheet" href="<?= CSS ?>/menu.css">
</head>

<body>
    <video muted autoplay loop>
        <source src="resources\video\Zebra_Background_Black-grey.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>

    <div class="Texto">
        <h1>BIENVENDIO A TABLA DINAMICA </h1>
    </div>
    <div class="container">
        <div class="box laboratorio">
            <a href="<?= ROOTURL ?>?accion=laboratorio">
                <h2>Laboratorio</h2>
                <img class="Cambiar" src="resources/img/laboratorio.gif" alt="Laboratorio">
            </a>
        </div>
        <div class="box tabla">
            <a href="<?= ROOTURL ?>?accion=tabla">
                <h2>Tabla</h2>
                <img class="Cambiar" style="transform: scale(1.7);" src="resources/img/tabla.gif" alt="Tabla">
            </a>
        </div>

        <div class="small-container">
            <div class="box community">
                <a href="<?= ROOTURL ?>/community">
                    <h2>Community</h2>
                    <i class="fa-solid fa-envelope menu"></i>
                </a>
            </div>

            <div class="box github">
                <a href="<?= ROOTURL ?>?accion=tabla">
                    <h2>Codigo</h2>
                    <i class="fa-brands fa-github menu"></i>
                </a>
            </div>
        </div>
    </div>

    <script src="<?= JS ?>/menu.js"></script>
</body>

</html>