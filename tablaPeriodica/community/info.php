<?php
$year = array();
$month = array();
$day = array();

$date = isset($_GET['date']) ? $_GET['date'] : null;
$miConexion = new mysqli("localhost","root","","tablaperiodica");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<section class="info">
    <?php
    if ($date == null) { ?>
        <div class="alert">No hay ningun registro</div>
        <div class="alert"> en esta fecha!</div>
    <?php } else {
        $query = "SELECT * FROM logbook WHERE Fecha = '$date' ORDER BY Seccion ASC";
        $resultadoQueryHTML = mysqli_query($miConexion, $query); ?>

        <h3><?= $date ?></h3>
        <?php while ($fecha = mysqli_fetch_assoc($resultadoQueryHTML)) { ?>
            <h1><?= $fecha["Titulo"] ?></h1>
            <h3><?= $fecha["Texto"] ?></h3>
    <?php }
    } ?>
</section>
</body>
</html>