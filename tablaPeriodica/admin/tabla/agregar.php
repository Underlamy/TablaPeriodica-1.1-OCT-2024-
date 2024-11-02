<?php
include('../configuracion.php');
include('../conexionBD.php');

$tabla = "tablaperiodica";
$columna = $_POST['columna'];
$limit = $_POST['limit'];

$datos = [];
$column = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$tabla' AND table_name = '$columna'";
$resultadoQueryHTML = mysqli_query($miConexion, $column);

while ($dato = mysqli_fetch_assoc($resultadoQueryHTML)) {
    if (!$dato['COLUMN_KEY']) {
        $datos[$dato['COLUMN_NAME']] = $_POST['txt' . $dato['COLUMN_NAME']];
    }
}

print_r($datos);

$campos = implode(", ", array_keys($datos));
$valores = implode("', '", array_values($datos));

$query = "INSERT INTO $columna($campos) VALUES ('$valores')";

if ($resultado = mysqli_query($miConexion, $query)) {
    header("Location: ".ROOTURL."?q=".$columna."&limit=".$limit);
} else {
?>
    <h3>"Hubo un error"</h3>
<?php }
?>