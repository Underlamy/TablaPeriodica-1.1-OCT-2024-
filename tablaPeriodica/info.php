<?php
include('BD/conexionBD.php');

$query = "SELECT * FROM elementos WHERE numAtomico = '$accion'";
$resultado = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultado);

$query2 = "SELECT * FROM isotopos WHERE z = '$accion' ORDER BY abundancia DESC LIMIT 1";
$resultado2 = mysqli_query($miConexion, $query2);
$isotopo = mysqli_fetch_assoc($resultado2);
?>
<html>

<head>
    <link rel="stylesheet" href="css/gradiantes.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/settings.css">

    <title><?= $dato['nombre'] ?></title>
    <script>
        document.getElementsByTagName("title")[0].innerHTML = document.getElementsByTagName("title")[0].innerHTML.toUpperCase();
    </script>
</head>

<body>
    <video muted autoplay loop>
        <source src="resources\video\Zebra_Background_Black-grey.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>

    <a href="<?= ROOTURL ?>" id="menu" class="fa-sharp fa-solid fa-house cba"></a>

    <canvas id="canvaElemento" class="box"></canvas>

    <div class="bloque <?= $dato['tipo'] ?>">
        <div id="simbolo" data-value="<?= $dato['simbolo'] ?>"><?= $dato['simbolo'] ?></div>
        <div id="nombre" data-value="<?= $dato['nombre'] ?>"><?= $dato['nombre']; ?>-<?= $isotopo['masaAtomica'] ?></div>
    </div>

    <div id="electrones" class="box fila1 columna4" data-value="<?= $dato['numAtomico']; ?>">
        <div class="titulo">ELECTRONES</div>
        <div class="info"><?= $dato['numAtomico']; ?></div>
    </div>
    <canvas id="canvaElectron"></canvas>

    <div id="protones" class="box fila2 columna4" data-value="<?= $dato['numAtomico']; ?>">
        <div class="titulo">PROTONES</div>
        <div class="info"><?= $dato['numAtomico']; ?></div>
    </div>
    <canvas id="canvaProton"></canvas>

    <div id="neutrones" class="box fila3 columna4" data-value="<?= $isotopo['masaAtomica'] - $dato['numAtomico']; ?>">
        <div class="titulo">NEUTRONES</div>
        <div class="info"><?= $isotopo['masaAtomica'] - $dato['numAtomico']; ?></div>
    </div>
    <canvas id="canvaNeutron"></canvas>

    <div id="tipo" class="large-box fila4 columna1" data-value="<?= $dato['tipo'] ?>">
        <div class="titulo">TIPO</div>
        <div class="info tipo"><?= $dato['tipo'] ?></div>
    </div>

    <div id="tipo" class="large-box fila5 columna1" data-value="<?= $isotopo['vidaMedia'] ?>">
        <div class="titulo">VIDA MEDIA</div>
        <div class="info">
            <?php
            if ($isotopo['vidaMedia'] == 0) {
                echo ("Eterno");
            } else {
                echo ($isotopo['vidaMedia']);
            }
            ?>
        </div>
    </div>

    <div id="periodo" class="small-box fila6 columna1" data-value="<?= $dato['periodo']; ?>">
        <div class="titulo">PERIODO</div>
        <div class="info"><?= $dato['periodo'] ?></div>
    </div>
    <div id="grupo" class="small-box fila6 columna5" data-value="<?= $dato['grupo']; ?>">
        <div class="titulo">GRUPO</div>
        <div class="info"><?= $dato['grupo'] ?></div>
    </div>

    <div id="masaAtomica" class="weird-box fila6 columna6" data-value="<?= $isotopo['masaAtomica'] ?>">
        <div class="titulo">MASA ATOMICA</div>
        <div class="info"><?= $isotopo['masaAtomica'] ?></div>
    </div>

    <div id="abundancia" class="medium-box fila6 columna7" data-value="<?= $isotopo['abundancia'] ?>">
        <div class="titulo">ABUNDACNIA</div>
        <div class="info">
            <?php
            if ($isotopo['abundancia'] == 0) {
                echo ("Artificial");
            } else {
                echo ($isotopo['abundancia'] . "%");
            }
            ?>
        </div>
    </div>

    <script type="importmap">
        {
			"imports": {
			"three": "https://unpkg.com/three/build/three.module.js"
			}
		}
	</script>
    <script src="js/colores.js"></script>
    <script>
        for (let cont = 0; cont < nombres.length; cont++) {
            if (nombres[cont][0] == document.getElementsByClassName("tipo")[0].innerHTML) {
                document.getElementsByClassName("tipo")[0].innerHTML = nombres[cont][1];
            }
        }
    </script>
    <script src="js/info/atomo.js" type="module"></script>
</body>

</html>