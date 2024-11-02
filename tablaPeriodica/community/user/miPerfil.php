<?php
include("conexionSereneSpace.php");

$sesion = $_SESSION["user_session"];
$id = $sesion['IDUsuario'];

$query = "SELECT * FROM usuarios WHERE IDUsuario = $id";
$query2 = "SELECT * FROM foros WHERE IDUsuario = $id";
$resultadoQueryHTML = mysqli_query($miConexion, $query);
$resultadoQueryHTML2 = mysqli_query($miConexion, $query2);
$dato = mysqli_fetch_assoc($resultadoQueryHTML);
?>

<head>
    <link rel="stylesheet" href="<?= CSS ?>/publicaciones.css">
    <script src="<?= JS ?>/publicaciones.js"></script>
    <script src="<?= JS ?>/sesion.js"></script>
</head>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 class="text-white m-0">INFORMACION</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form method='POST' action='usuarios/actualizarPerfil.php'>
                            <input type="hidden" name="txtIDUsuario" value="<?= $id ?>">
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='txtNombre' placeholder="Nombre(s)" value="<?= $dato['Nombre'] ?>" required readonly />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='txtAPaterno' placeholder="Apellido Paterno" value="<?= $dato['APaterno'] ?>" required readonly />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='txtAMaterno' placeholder="Apellido Materno" value="<?= $dato['AMaterno'] ?>" required readonly />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='txtCorreo' placeholder="Correo Electronico" value="<?= $dato['Correo'] ?>" required readonly />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" name='txtContrasena' placeholder="Contraseña" value="<?= $dato['Contrasena'] ?>" required readonly />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3" id="boton" type="button" onclick="editar()">EDITAR</button>
                            </div>
                            <div class="hide">
                                <button class="btn btn-primary btn-block py-3" id="submit" type="submit">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <br><br><br>
        <?php while ($dato2 = mysqli_fetch_assoc($resultadoQueryHTML2)) {
            if ($dato2['Validacion'] != "negado") { ?>
                <div class="publicacion bg-light shadow" id="<?php echo $dato2['IDMensaje'] ?>">
                    <form method="POST" action="publicaciones/actualizarPublicacion.php">
                        <input type="hidden" name="txt" value="perfil">
                        <input type="hidden" name="txtMensaje" value="<?php echo $dato2['IDMensaje'] ?>">
                        <div class="titulo <?php echo $dato2['Validacion'] ?>">
                            <textarea readonly name="txtTitulo" id="titulo#<?php echo $dato2['IDMensaje'] ?>" class="edit titulo" oninput="autoresize(event)"><?php echo $dato2['Titulo'] ?></textarea>
                            <span class="idTitulo"><?php echo $dato2['Validacion'] ?></span>
                        </div>
                        <div class="texto">
                            <textarea readonly name="txtTexto" id="text#<?php echo $dato2['IDMensaje'] ?>" class="edit texto-full" oninput="autoresize(event)"><?php echo $dato2['Contenido'] ?></textarea>
                        </div>
                        <div class="opciones" style="padding: 0 10px 5px 10px;">
                            <input type="hidden" name="txtMensaje" value="<?php echo $dato2['IDMensaje'] ?>">
                            <button id="editar#<?php echo $dato2['IDMensaje'] ?>" class="show" type="button" onclick="editPublicacion(event, <?php echo $dato2['IDMensaje'] ?>);resize()">Editar</button>
                            <button id="enviar#<?php echo $dato2['IDMensaje'] ?>" class="hide" type="hidden">Enviar</button>
                    </form>
                    <div style="padding-top: 10px;">
                        <form action="publicaciones/eliminarPublicacion.php" method="POST">
                            <input name="txtMensaje" type="hidden" value="<?php echo $dato2['IDMensaje'] ?>">
                            <input type="hidden" name="txt" value="perfil">
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
    </div>
<?php } else { ?>
    <form method="POST" action="../publicaciones/eliminarPublicacion.php">
        <input type="hidden" name="txt" value="perfil">
        <input type="hidden" name="txtMensaje" value="<?php echo $dato2['IDMensaje'] ?>">
        <div class="publicacion bg-light shadow" id="<?php echo $dato2['IDMensaje'] ?>">
            <div class="titulo <?php echo $dato2['Validacion'] ?>">
                <span class="edit titulo"><?php echo $dato2['Titulo'] ?></span>
                <span class="idTitulo"><?php echo $dato2['Validacion'] ?></span>
            </div>
            <div class="texto">
                <span class="edit texto-full"><?php echo $dato2['Contenido'] ?></span>
            </div>
            <div class="opciones">
                <input name="txtMensaje" type="hidden" value="<?php echo $dato2['IDMensaje'] ?>">
                <input type="hidden" name="txt" value="perfil">
                <button type="submit">Eliminar</button>
            </div>
        </div>
    </form>
<?php
            }
        }   ?>
</div>
</div>