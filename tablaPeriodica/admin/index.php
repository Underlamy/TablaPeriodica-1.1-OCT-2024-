<?php
//Este es el index.php

$accion = isset($_GET['q']) ? $_GET['q'] : null;
// GET es una variable que lee datos desde los links

include("configuracion.php");

include(HEADERADMIN);
?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= CSS ?>/header.css">
    <link rel="stylesheet" href="<?= CSS ?>/inicio.css">
    <link rel="stylesheet" href="<?= CSS ?>/lista.css">
    <link rel="stylesheet" href="<?= CSS ?>/form.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3fbe9e080a.js" crossorigin="anonymous"></script>
    <script src="<?= JS ?>script.js"></script>
</head>

<?php
if (isset($_SESSION['admin_session'])) {
?>
    <div id="fondo">
        <?php
        if($accion == "logout"){
            include("Perfil/formularioLogout.php");
        }
        elseif ($accion) {
            include("tabla/lista.php");
        } else {
            include("home.php");
        }
        ?>
    </div>

<?php
} else {
?>
    <div id="fondo">
        <?php
        include('Perfil\formularioLogin.php')
        ?>
    </div>
<?php
}
//include(FOOTERADMIN);
?>