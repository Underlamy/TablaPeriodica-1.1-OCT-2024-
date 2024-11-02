<?php
include("conexionBD.php");
$query = "SELECT * FROM administradores";

$sesion = $_SESSION["admin_session"];
?>

<link rel="stylesheet" href="<?= CSS ?>/form.css">
<script src="<?= JS ?>/script.js"></script>

<div id="formulario">
    <div class="nombre">CERRAR SESION</div>
    <br>
    <form method="POST" name="formEmpleado" id="formEmpleado" action="Perfil/logout.php">
        <input type="hidden" name="accion" id="accion" value="login" />

        <div class="button">
            <input type="text" name="txtIDAdmin" id="txtIDAdmin" class="inputBox readonly" placeholder="ID del Admin" value="<?= $sesion['IDAdmin'] ?>" readonly>
            <i class="fa-solid fa-user"></i>
        </div><br>

        <div class="button">
            <input type="password" name="txtContrasena" id="txtContrasena" class="inputBox readonly" placeholder="Contrasena" value="<?= $sesion['Contrasena'] ?>" readonly>
            <button type="button" onclick="showPassword()"><i class="fa-solid fa-eye-slash" id="show"></i></button>
        </div><br>

        <input type="submit" onmouseover="confirmData()" name="btnRegistrarEmpleados" id="btnFORM" value="CERRAR SESION">
        <br><br>
    </form>
</div>