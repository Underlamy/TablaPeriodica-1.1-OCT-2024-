<?php
include('../../configuracion.php');
include('../../BD/conexionBD.php');

print_r($_GET);
$usuario = $_GET["usuario"];
$sugerencia = $_GET["sugerencia"];
$tipo = $_GET["tipo"];

$query = "UPDATE votes SET Tipo = '$tipo' WHERE IDUsuario = $usuario AND IDSugerencia = $sugerencia";

if ($resultado = mysqli_query($miConexion, $query)) {
    header("Location: ".ROOTURL."?q=sugerencias");
} else {
?>
    <h3>"Hubo un error"</h3>
<?php }
?>
