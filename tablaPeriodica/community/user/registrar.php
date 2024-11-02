<?php
    include("../BD/conexionBD.php");

    $Usuario = $_POST['txtUsername'];
    $Correo = $_POST['txtCorreo'];
    $Contrasena = $_POST['txtContrasena'];

    $query = "INSERT INTO usuarios(Username,Correo,Password,Dificultad,UserInfo)VALUES('$Usuario','$Correo','$Contrasena','',0)";

    $resultado = mysqli_query($miConexion, $query);
?>

<form name="myform" method="POST" action="login.php">
    <input type="hidden" name="txtCorreo" value="<?=$Correo?>" />
    <input type="hidden" name="txtContrasena" value="<?=$Contrasena?>" />
</form>

<script type="text/javascript">
    document.myform.submit();
</script>