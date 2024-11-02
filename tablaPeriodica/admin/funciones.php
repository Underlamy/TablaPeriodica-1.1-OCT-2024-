<?php
//ESTE ARCHIVO SE LLAMA funciones.php

//Este es mi primera funcion en php
//sintaxis
/*
function nombredelaFuncion($parametro)
{
    codigo
    mas codigo
    mas mas codigo
}
*/
function obtenerDatosCalificaciones($IDCalificacion)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDCalificacion,IDForo,Calificacion FROM calificaciones WHERE IDCalificacion = $IDCalificacion"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosCalificacion = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo   
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosCalificacion = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDCalificacion' => $renglon['IDCalificacion'],
                                        'IDForo' => $renglon['IDForo'],
                                        'Calificacion' => $renglon['Calificacion']
                                        );
        }
    }
    return $datosCalificacion;

}

function obtenerDatosTextos($IDTexto)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDTexto,Libro,Titulo,ContenidoTexto,FechaPublicacion,NoticiaPrincipal,Seccion FROM textos WHERE IDTexto = $IDTexto"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosTexto = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosTexto = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDTexto' => $renglon['IDTexto'],
                                        'Libro' => $renglon['Libro'],
                                        'Titulo' => $renglon['Titulo'],
                                        'ContenidoTexto' => $renglon['ContenidoTexto'],
                                        'FechaPublicacion' => $renglon['FechaPublicacion'],
                                        'NoticiaPrincipal' => $renglon['NoticiaPrincipal'],
                                        'Seccion' => $renglon['Seccion']
                                        );
        }
    }
    return $datosTexto;

}

function obtenerDatosAdministradores($IDAdmin)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDAdmin,APaterno,AMaterno,Nombre,Correo,Contrasena FROM administradores WHERE IDAdmin = $IDAdmin"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosAdmin = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosAdmin = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDAdmin' => $renglon['IDAdmin'],
                                        'APaterno' => $renglon['APaterno'],
                                        'AMaterno' => $renglon['AMaterno'],
                                        'Nombre' => $renglon['Nombre'],
                                        'Correo' => $renglon['Correo'],
                                        'Contrasena' => $renglon['Contrasena']
                                        );
        }
    }
    return $datosAdmin;

}

function obtenerDatosTemas($IDTema)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDTema,Nombre FROM temas WHERE IDTema = $IDTema"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosTema = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosTema = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDTema' => $renglon['IDTema'],
                                        'Nombre' => $renglon['Nombre']
                                        );
        }
    }
    return $datosTema;

}

function obtenerDatosUsuarios($IDUsuario)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDUsuario,APaterno,AMaterno,Nombre,Correo,Contrasena FROM usuarios WHERE IDUsuario = $IDUsuario"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosUsuario = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosUsuario = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDUsuario' => $renglon['IDUsuario'],
                                        'APaterno' => $renglon['APaterno'],
                                        'AMaterno' => $renglon['AMaterno'],
                                        'Nombre' => $renglon['Nombre'],
                                        'Correo' => $renglon['Correo'],
                                        'Contrasena' => $renglon['Contrasena']
                                        );
        }
    }
    return $datosUsuario;

}

function obtenerDatosForos($IDMensaje)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDMensaje,IDUsuario,Validacion,Fecha,Titulo,Contenido,IDTema FROM foros WHERE IDMensaje = $IDMensaje"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosForo = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosForo = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDMensaje' => $renglon['IDMensaje'],
                                        'IDUsuario' => $renglon['IDUsuario'],
                                        'Validacion' => $renglon['Validacion'],
                                        'Fecha' => $renglon['Fecha'],
                                        'Titulo' => $renglon['Titulo'],
                                        'Contenido' => $renglon['Contenido'],
                                        'IDTema' => $renglon['IDTema'],
                                        );
        }
    }
    return $datosForo;

}

function obtenerDatosLibros($IDLibro)
{
    //Incluir conexion con Base de Datos
    include('conexionSereneSpace.php');

    //Agregar mi sentencia
    $query = "SELECT IDLibro,Imagen,Descripcion,Titulo,Autor,Editorial,fechaPublicacion FROM libros WHERE IDLibro = $IDLibro"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $datosForo = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Este es un arreglo multidimensional
            //Con los datos de un solo EMPLEADO
            $datosForo = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDLibro' => $renglon['IDLibro'],
                                        'Imagen' => $renglon['Imagen'],
                                        'Descripcion' => $renglon['Descripcion'],
                                        'Titulo' => $renglon['Titulo'],
                                        'Autor' => $renglon['Autor'],
                                        'Editorial' => $renglon['Editorial'],
                                        'fechaPublicacion' => $renglon['fechaPublicacion'],
                                        );
        }
    }
    return $datosForo;

}
?>