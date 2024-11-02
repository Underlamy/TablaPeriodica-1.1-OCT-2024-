<?php
include("../conexionBD.php");

$key = isset($_GET['key']) ? $_GET['key'] : null;
$tabla = "tablaperiodica";
$columna = $_GET["q"] ? $_GET["q"] : null;
$limit = $_GET["limit"] ? $_GET["limit"] : null;
?>

<div id="formulario">
    <span id="close" onclick="closeForm()">X</span>
    <br>
    <div class="nombre allCaps">MODIFICAR <?= $columna ?></div>
    <br>

    <form method="POST" action="tabla/actualizar.php">
        <?php
        $queryColumna = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna' AND COLUMN_KEY = 'PRI'";
        $resultadoQueryPrimatyKey = mysqli_query($miConexion, $queryColumna);
        $dato = mysqli_fetch_assoc($resultadoQueryPrimatyKey);
        $keyName = $dato['COLUMN_NAME'];

        $query = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
        $resultadoQueryHTML = mysqli_query($miConexion, $query);

        while ($dato2 = mysqli_fetch_assoc($resultadoQueryHTML)) {
            if (!$dato2["COLUMN_KEY"]) {
                $sql = "SELECT * FROM $columna WHERE $keyName = $key";
                $resultadoQuerySQL = mysqli_query($miConexion, $sql);
                $data = mysqli_fetch_assoc($resultadoQuerySQL);
                $name = $dato2['COLUMN_NAME'];
                
                if($dato2['DATA_TYPE'] == "varchar"){ ?>
                    <div class="button">
                    <textarea name="txt<?= $dato2['COLUMN_NAME'] ?>" class="inputBox"><?= $data[$name] ?></textarea>
                    </div><br>
                <?php } else{?>
                <div class="button">
                    <input type="text" name="txt<?= $dato2['COLUMN_NAME'] ?>" class="inputBox" value="<?= $data[$name] ?>">
                </div><br>
        <?php }
        }
        }
        ?>

        <input type="hidden" name="tabla" value="<?= $tabla ?>">
        <input type="hidden" name="columna" value="<?= $columna ?>">
        <input type="hidden" name="keyName" value="<?= $keyName ?>">
        <input type="hidden" name="key" value="<?= $key ?>">
        <input type="hidden" name="limit" value="<?= $limit ?>">

        <div id="MensajeAviso">
            <label>RELLENAR LOS CAMPOS</label>
            <br><br>
        </div>

        <input type="submit" onmouseover="confirmData()" id="btnFORM" value="ACTUALIZAR">
        <br><br>
    </form>
</div>