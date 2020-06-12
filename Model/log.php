<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function registrarAccesoUsuario($nombre,$apellidos,$email,$accion){
    $descripcion = "El usuario " . $nombre . " ". $apellidos . " (" . $email . ")";

    switch($accion){
        case 'nuevo-usuario':
            $descripcion .= " ha sido registrado en el sistema";
        break;

        case 'login':
            $descripcion .= " accede al sistema";
        break;

        case 'logout':
            $descripcion .= " sale del sistema";
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