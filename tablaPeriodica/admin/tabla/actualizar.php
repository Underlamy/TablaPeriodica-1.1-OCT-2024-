<?php
include('../configuracion.php');
include('../conexionBD.php');

$partes = [];
$tabla = $_POST['tabla'];
$columna = $_POST['columna'];
$keyName = $_POST['keyName'];
$key = $_POST['key'];
$limit = $_POST['limit'];


$datos = [];
$column = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
$resultadoQueryHTML = mysqli_query($miConexion, $column);

while ($dato = mysqli_fetch_assoc($resultadoQueryHTML)) {
    if (!$dato['COLUMN_KEY']) {
        $datos[$dato['COLUMN_NAME']] = $_POST['txt' . $dato['COLUMN_NAME']];
    }
}
foreach ($datos as $campo => $valor) {
    $partes[] = "$campo = '$valor'";
}

$camposValores = implode(", ", $partes);

$query = "UPDATE $columna SET $camposValores WHERE $keyName = $key";

if ($resultado = mysqli_query($miConexion, $query)) {
    header("Location: ".ROOTURL."?q=".$columna."&limit=".$limit);
} else {
?>
    <h3>"Hubo un error"</h3>
<?php }
?>
