<?php
include('../../configuracion.php');
include('../../BD/conexionBD.php');

print_r($_GET);
$usuario = $_GET["usuario"];
$sugerencia = $_GET["sugerencia"];
$tipo = $_GET["tipo"];

$query = "INSERT INTO votes(IDUsuario, IDSugerencia, Tipo) VALUES ($usuario, $sugerencia, '$tipo')";

if ($resultado = mysqli_query($miConexion, $query)) {
    header("Location: ".ROOTURL."?q=sugerencias");
} else {
?>
    <h3>"Hubo un error"</h3>
<?php }
?>