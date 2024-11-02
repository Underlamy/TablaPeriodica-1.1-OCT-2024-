<link rel="stylesheet" href="<?= CSS ?>/form.css">
<script src="<?= JS ?>/script.js"></script>

<div id="formulario">
    <div class="nombre">INICIAR SESION</div>
    <br>
    <form method="POST" action="Perfil/login_process.php">
        <input type="hidden" name="accion" id="accion" value="login" />

        <div class="button">
            <input type="text" name="txtIDAdmin" id="txtIDAdmin" class="inputBox" placeholder="ID del Admin">
            <i class="fa-solid fa-user"></i>
        </div><br>

        <div class="button">
            <input type="password" name="txtContrasena" id="txtContrasena" class="inputBox" placeholder="Contrasena">
            <button type="button" onclick="showPassword()"><i class="fa-solid fa-eye-slash" id="show"></i></button>
        </div><br>

        <div id="MensajeAviso">
            <label>RELLENAR LOS CAMPOS</label>
            <br><br>
        </div>

        <input type="submit" onmouseover="confirmData()" name="btnRegistrarEmpleados" id="btnFORM" value="INICIAR SESION">
        <br><br>
    </form>
</div>