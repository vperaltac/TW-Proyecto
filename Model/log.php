<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function registrarAccionUsuario($accion){
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    $descripcion = "El usuario " . $_SESSION['nombre'] . " ". $_SESSION['apellidos'] . " (" . $_SESSION['email'] . ")";

    switch($accion){
        case 'nuevo-usuario':
            $descripcion .= " ha sido registrado en el sistema";
        break;

        case 'editar-usuario':
            $descripcion .= " ha editado su información personal";
        break;

        case 'eliminar-usuario':
            $descripcion .= " ha borrado un usuario";

        case 'login':
            $descripcion .= " accede al sistema";
        break;

        case 'logout':
            $descripcion .= " sale del sistema";
        break;

        case 'nueva-receta':
            $descripcion .= " ha añadido una receta";
        break;

        case 'editar-receta':
            $descripcion .= " ha editado una receta";
        break;

        case 'eliminar-receta':
            $descripcion .= " ha borrado una receta";
        break;

        case 'nuevo-comentario':
            $descripcion .= " ha añadido un comentario";
        break;

        case 'editar-comentario':
            $descripcion .= " ha editado un comentario";
        break;

        case 'eliminar-comentario':
            $descripcion .= " ha borrado un comentario";
        break;
    }

    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("INSERT INTO log (fecha,descripcion) VALUES (NOW(),?);");
    $sentencia->bind_param("s",$descripcion);
    $sentencia->execute();
}

function registrarIntentoAcceso($ip,$email){
    $descripcion = "Intento de acceso a la cuenta " . $email . " desde la IP " . $ip;

    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("INSERT INTO log (fecha,descripcion) VALUES (NOW(),?);");
    $sentencia->bind_param("s",$descripcion);
    $sentencia->execute();
}

function getLog(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM log;");
    $log = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $log[$i] = $fila;
        $i++;
    }

    return $log;
}