<?php
include('BD/conexionBD.php');
$query = "SELECT * FROM elementos";
$resultadoQueryHTML = mysqli_query($miConexion, $query);
?>
<html>

<head>
    <link rel="stylesheet" href="css/gradiantes.css">
    <link rel="stylesheet" href="css/laboratorio.css">
    <link rel="stylesheet" href="css/settings.css">
    <title>LABORATORIO</title>
    <script src="js/colores.js"></script>
</head>

<body>
    <a href="<?= ROOTURL ?>" id="menu" class="fa-sharp fa-solid fa-house cba"></a>

    <canvas id="canvaElemento"></canvas>

    <div class=trashcan><i class="fa-solid fa-trash"></i></div>

    <div id="toolbox">
        <input type="text" name="buscar" oninput="buscar()" id="searchbox" placeholder="buscar...">

        <div id="scrollbox">
            <?php
            while ($dato = mysqli_fetch_assoc($resultadoQueryHTML)) {  ?>
                <div id="<?php echo $dato['nombre'] ?>" class="buscables bloque <?php echo $dato['tipo'] ?>" onmousedown="isotopos(event)">
                    <?= $dato['simbolo'] . " (" . $dato['nombre'] . ")" ?>
                </div>

                <div class="isotopos" style="display: none;">
                    <?php
                    $z = $dato['numAtomico'];
                    $query2 = "SELECT * FROM oxidacion WHERE z = $z";
                    $resultadoQueryHTML2 = mysqli_query($miConexion, $query2);
                    $dato2 = mysqli_fetch_assoc($resultadoQueryHTML2);

                    $estados = $dato2['Estados'];
                    $estados = substr($estados, 1, -1);
                    $estados = explode(", ", $estados);

                    for ($cont = 0; $cont < count($estados); $cont++) { ?>
                        <div id="<?= $dato['simbolo'] ?>-<?= $estados[$cont] ?>" class="bloque <?= $dato['tipo'] ?>"
                            data-simbolo="<?= $dato['simbolo'] ?>" data-nombre="<?= $dato['nombre'] ?>" data-numAtomico="<?= $dato['numAtomico'] ?>"
                            data-periodo="<?= $dato['periodo'] ?>" data-grupo="<?= $dato['grupo'] ?>" data-tipo="<?= $dato['tipo'] ?>"
                            data-superindice="<?= $estados[$cont] ?>" onmousedown="crearAtomo(event)">
                            <?= $dato['simbolo'] ?><sup><?= $estados[$cont] ?></sup>
                        </div>
                    <?php   } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="objectInfo">
        <canvas id="canvaInfo"></canvas>
        <div class="info">
        </div>
    </div>

    <video muted autoplay loop>
        <source src="resources\video\Zebra_Background_Black-grey.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>
</body>

<script src="js/laboratorio/dalton.js"></script>
<script src="js/laboratorio/daltonInfo.js"></script>
<script src="js/laboratorio/laboratorio.js"></script>

</html>