<?php
error_reporting(E_ERROR | E_PARSE);
include("conexionBD.php");

$tabla = "tablaperiodica";
$columna = $_GET["q"] ? $_GET["q"] : null;
$limit = $_GET["limit"];
if ($limit < 0 || $limit == null) {
    $_GET["limit"] = 0;
    $limit = 0;
}
$cont = 0;

$limite1 = (10 * $limit) - 1;
if ($limite1 < 0) {
    $limite1 = 0;
}

$sql = "SELECT * FROM $columna LIMIT $limite1, 10";
$resultadoQueryHTML2 = mysqli_query($miConexion, $sql);

$query10 = "SELECT * FROM oxidacion WHERE z = 7";
$resultadoQueryHTML10 = mysqli_query($miConexion, $query10);
$dato10 = mysqli_fetch_assoc($resultadoQueryHTML10);
?>

<head>
    <script src="<?= JS ?>lista.js"></script>
</head>

<div class="nombre allCaps"><?= $columna ?></div>
<table>
    <tr>
        <?php
        $query = "SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
        $resultadoQueryHTML = mysqli_query($miConexion, $query);

        while ($dato = mysqli_fetch_assoc($resultadoQueryHTML)) { ?>
            <th><?= $dato['column_name'] ?></th>
        <?php } ?>

        <th colspan="2">Funciones</th>
    </tr>

    <?php
    while ($renglon = mysqli_fetch_assoc($resultadoQueryHTML2)) { ?>
        <tr id="<?php echo $cont++; ?>">
            <?php
            $query = "SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
            $resultadoQueryHTML = mysqli_query($miConexion, $query);

            while ($dato2 = mysqli_fetch_assoc($resultadoQueryHTML)) { ?>
                <td class="<?= $dato2['column_name'] ?>"><?= $renglon[$dato2["column_name"]] ?></td>
            <?php }

            $keys = "SHOW KEYS FROM $columna WHERE Key_name = 'PRIMARY'";
            $resultadoQueryKeys = mysqli_query($miConexion, $keys);
            $primary = mysqli_fetch_assoc($resultadoQueryKeys);
            $primaryKeys = $primary["Column_name"];
            ?>

            <td><button onclick="loadForm('Editar', '<?= $columna ?>', <?= $renglon[$primaryKeys] ?>, '<?= $_GET['limit'] ?>')">Editar</button></td>
            <td><button onclick="loadForm('Eliminar', '<?= $columna ?>', <?= $renglon[$primaryKeys] ?>, '<?= $_GET['limit'] ?>')">Eliminar</button></td>
        </tr>
    <?php } ?>
</table>

<span class="setting">
    <button class="left" id="btn" onclick="loadForm('Agregar', '<?= $columna ?>', 0, '<?= $_GET['limit'] ?>')">Agregar</button>
    <button class="right" id="btn" onclick="self.location='<?= ROOTURL ?>?q=<?= $columna ?>&limit=<?= ++$limit ?>'">></button>
    <button class="right" id="btn" onclick="self.location='<?= ROOTURL ?>?q=<?= $columna ?>&limit=<?= --$_GET['limit'] ?>'"> < </button>
</span>