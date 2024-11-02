<?php
//Este archivo se llama actualizar empleado

//En este archivo se va a recibirlos datos
//enviados en el formularioModificarEmpleado.php

//Aqui verifico como se reciben los datos

print_r($_POST);

//Se agrega la conexion a la base de datos
//el ../ quiere decir salir de la carpeta actual
include("../conexionSereneSpace.php");

//Declarar variable para obtener los datos enviados
//La variable POST es un arreglo

$IDUsuario = $_POST["txtIDUsuario"];
$APaterno = $_POST["txtAPaterno"];
$AMaterno = $_POST['txtAMaterno'];
$Nombre = $_POST['txtNombre'];
$Correo = $_POST['txtCorreo'];
$Contrasena = $_POST['txtContrasena'];
$query = "UPDATE usuarios SET APaterno = '$APaterno', AMaterno = '$AMaterno', Nombre = '$Nombre', Correo = '$Correo', Contrasena = '$Contrasena' WHERE IDUsuario = '$IDUsuario'";

//Se verifica si se registo la informacion
$resultado = mysqli_query($miConexion, $query);
header("LOCATION: http://localhost/05_CazaresFernando/?accion=verPerfil");
