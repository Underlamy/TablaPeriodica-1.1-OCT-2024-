<?php
// En este documento de php boy a crear mis variables globales he utilizare en toda mi 
// aplicacion web

// SINTAXIS
// define('nombreVariable', 'valor');

// AUTOR DEL CODIGO
define("AUTOR", "Cazares Tapia Fernando");

// NONMBRE DEL SITIO WEB
define("SITENAME", "TablaPeriodica.org");

// RUTA DE MI CARPETA DE TRABAJO
define("ROOTURL", "http://localhost/tablaPeriodica/");

// RUTA FISICA DE MI CARPETA DE TRABAJO
// (Donde esta guardada mi carpeta en el disco duro)
// $_SERVER["DOCUMENT_ROOT"] es para conocer la ruta original donde 
// se guardara mi carpeta de trabajo,
// La ruta original de una pc o computadora o de un servidor
define("DOCROOT", $_SERVER["DOCUMENT_ROOT"].'/tablaPeriodica/');

// Variables para la conexion con la base de datos
define("DBHOST", "localhost"); //nombre del sevidor
define("DBUSER", "root"); //nombre del usuario
define("DBPASSWD", ""); //contraseña, NO HAY
define("DBNAME", "tablaperiodica"); //Nombre de la base de datos

// VARIABLES PARA LAS RUTAS DE MI header.php Y footer.php
define("HEADER", DOCROOT."header.php");
define("FOOTER", DOCROOT."footer.php");

// VARIABLES PARA IMAGENES GENERALES, 
// ARCHIVOS DE DISEñO (.CSS)
// ARCHIVOS DE ANIMACIONES Y VALIDACION DE DATOS (.js)
define("IMAGENES", ROOTURL."imagenes/"); //imagenes como el logo, favicon, autores
define("CSS", ROOTURL."css/"); //archivos de diseño
define("JS", ROOTURL."js/"); // archivos de javascript
?>