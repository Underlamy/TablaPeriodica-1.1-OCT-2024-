<?php
include('../configuracion.php');
include('../BD/conexionBD.php');

$idUsuario = $_POST["usuario"];
$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$tipo = $_POST["tipo"];

$query = "INSERT INTO sugerencias(IDUsuario, Titulo, Texto, Tipo) VALUES ($idUsuario, '$titulo', '$texto', '$tipo')";

if ($resultado = mysqli_query($miConexion, $query)) {
    header("Location: ".ROOTURL."?q=sugerencias");
} else {
?>
    <h3>"Hubo un error"</h3>
<?php }
?>