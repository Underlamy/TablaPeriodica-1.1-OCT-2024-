<?php
    include("../configuracion.php");
?>

<div id="formulario">
    <span id="close" onclick="closeForm()">X</span>
    <br>
    <div class="nombre allCaps">INICIAR SESION</div>
    <br>
    <form method="POST" action="user/login.php">
        <div class="button">
            <input type="email" name="txtCorreo" class="inputBox" placeholder="Correo">
        </div><br>

        <div class="button">
            <input type="password" name="txtContrasena" id="txtContrasena" class="inputBox" placeholder="Contraseña">
            <button type="button" onclick="showPassword()"><i class="fa-solid fa-eye-slash" id="show"></i></button>
        </div><br>

        <div class="sub">
            <label>No tienes cuenta? </label><button onclick="loadRegister()">Registrate</button>
            <br><br>
        </div>

        <div id="MensajeAviso">
            <label>RELLENAR LOS CAMPOS</label>
            <br><br>
        </div>

        <input type="submit" onmouseover="confirmData()" id="btnFORM" value="AGREGAR">
        <br><br>
    </form>
</div>