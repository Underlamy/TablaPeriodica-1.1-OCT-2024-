<?php
include('../configuracion.php');
include('../conexionBD.php');

$tabla = $_POST['tabla'];
$columna = $_POST['columna'];
$keyName = $_POST['keyName'];
$key = $_POST['key'];
$limit = $_POST['limit'];


$query = "DELETE FROM $columna WHERE $keyName = '$key'";

//Se verifica si se registo la informacion
if($resultado = mysqli_query($miConexion, $query)){
    header("Location: ".ROOTURL."?q=".$columna."&limit=".$limit);
}
else{
    ?>
    <h3>"Hubo un error"</h3>
<?php }
?>