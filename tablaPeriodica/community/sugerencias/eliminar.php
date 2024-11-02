<?php
include('../configuracion.php');
include('../BD/conexionBD.php');

print_r($_GET);
$id = $_GET["id"];

$query = "DELETE FROM sugerencias WHERE IDSugerencia = $id";

//Se verifica si se registo la informacion
if($resultado = mysqli_query($miConexion, $query)){
    header("Location: ".ROOTURL."?q=sugerencias");
}
else{
    ?>
    <h3>"Hubo un error"</h3>
<?php }
?>