<script src="https://kit.fontawesome.com/3fbe9e080a.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>

<?php
$accion = isset($_GET['accion'])?$_GET['accion']:null;
include("configuracion.php");

if($accion >= 1 && $accion <= 118){
    include('info.php');
}
else{
    switch($accion)
    {
        case 'laboratorio':
            include('laboratorio.php');
        break;

        case 'tabla':
            include('tablaPeriodica/tablaPeriodica.php');
        break;
        
        case 'menu':
            include('menu.php');
        break;

        case 'prueba':
            include('prueba/prueba.php');
        break;

        default:
        include('menu.php');
        break;
    }
}
?>