<?php
include('../../configuracion.php');
include('../../BD/conexionBD.php');

print_r($_GET);
$usuario = $_GET["usuario"];
$sugerencia = $_GET["sugerencia"];

$query = "DELETE FROM votes WHERE IDUsuario = $usuario AND IDSugerencia = $sugerencia";

//Se verifica si se registo la informacion
if($resultado = mysqli_query($miConexion, $query)){
    header("Location: ".ROOTURL."?q=sugerencias");
}
else{
    ?>
    <h3>"Hubo un error"</h3>
<?php }
?>