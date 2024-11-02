<?php
session_start();

$sesion = isset($_SESSION["UserSession"]) ? $_SESSION["UserSession"] : null;
$q = isset($_GET['q']) ? $_GET['q'] : null;
include("configuracion.php");
?>

<head>
    <link rel="stylesheet" href="<?= CSS ?>/form.css">
    <link rel="stylesheet" href="<?= CSS ?>/body.css">
    <script src="https://kit.fontawesome.com/3fbe9e080a.js" crossorigin="anonymous"></script>
    <script src="<?= JS ?>/script.js"></script>
    <script src="<?= JS ?>/formUser.js"></script>
</head>

<?php
include(HEADERCOMMUNITY);

switch ($q) {
    case 'logbook':
        include('logbook.php');
        break;

    case 'tabla':
        include('tablaPeriodica/tablaPeriodica.php');
        break;

    case 'login':
        include('user/formLogin.php');
        break;

    case 'sugerencias':
        include('sugerencias/sugerencias.php');
        break;

    default:
        include('menu.php');
        break;
}

include(FOOTERCOMMUNITY);
?>