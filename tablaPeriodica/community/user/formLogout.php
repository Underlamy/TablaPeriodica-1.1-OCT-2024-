<?php
session_start();
include("../BD/conexionBD.php");

$sesion = $_SESSION["UserSession"];
$id = $sesion['IDUsuario'];

$query = "SELECT * FROM usuarios WHERE IDUsuario = $id";
$resultadoQueryHTML = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQueryHTML);
?>

<div id="formulario">
    <span id="close" onclick="closeForm()">X</span>
    <br>
    <div class="nombre allCaps">CERRAR SESION</div>
    <br>
    <form method="POST" action="user/logout.php">
        <div class="button">
            <input type="email" name="txtCorreo" class="inputBox" value="<?= $dato["Correo"] ?>"  readonly>
        </div><br>

        <div class="button">
            <input type="password" name="txtContrasena" id="txtContrasena" class="inputBox" value="<?= $dato["Password"] ?>" readonly>
            <button type="button" onclick="showPassword()"><i class="fa-solid fa-eye-slash" id="show"></i></button>
        </div><br>

        <input type="submit" id="btnFORM" value="LOGOUT">
        <br><br>
    </form>
</div>