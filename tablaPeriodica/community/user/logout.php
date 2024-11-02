<h2>Cerrar sesi&oacute;n</h2>
<?php
require_once("../configuracion.php");

//destruir la sesión creada
unset($_SESSION['UserSession']);

//SI EXISTE UNA SESION EN COOKIES, GUARDADA , DESPUES DE 1HR Y 10MIN (4200SEG) SE ELIMINA O SE BORRA
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time() - 4200, '/');
}
header("Location: " . ROOTURL);

?>