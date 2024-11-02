<?php
include("../conexionBD.php");

$tabla = "tablaperiodica";
$columna = $_GET["q"] ? $_GET["q"] : null;
$limit = $_GET["limit"] ? $_GET["limit"] : null;
?>

<div id="formulario">
    <span id="close" onclick="closeForm()">X</span>
    <br>
    <div class="nombre allCaps">AGREGAR <?= $columna ?></div>
    <br>
    <form method="POST" action="tabla/agregar.php">
        <?php
        $query = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
        $resultadoQueryHTML = mysqli_query($miConexion, $query);

        while ($dato2 = mysqli_fetch_assoc($resultadoQueryHTML)) {
            if (!$dato2["COLUMN_KEY"]) {
                if ($dato2["DATA_TYPE"] == "varchar") { ?>
                    <div class="button">
                        <textarea name="txt<?= $dato2['COLUMN_NAME'] ?>" class="inputBox" placeholder="<?= $dato2['COLUMN_NAME'] ?>"></textarea>
                    </div><br>
                <?php } else { ?>
                    <div class="button">
                        <input type="text" name="txt<?= $dato2['COLUMN_NAME'] ?>" class="inputBox" placeholder="<?= $dato2['COLUMN_NAME'] ?>">
                    </div><br>
        <?php }
            }
        } ?>

        <input type="hidden" name="tabla" value="<?= $tabla ?>">
        <input type="hidden" name="columna" value="<?= $columna ?>">
        <input type="hidden" name="limit" value="<?= $limit ?>">

        <div id="MensajeAviso">
            <label>RELLENAR LOS CAMPOS</label>
            <br><br>
        </div>

        <input type="submit" onmouseover="confirmData()" id="btnFORM" value="AGREGAR">
        <br><br>
    </form>
</div>