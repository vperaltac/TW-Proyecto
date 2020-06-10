<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function registrarUsuario($nombre,$apellidos,$email,$foto,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id FROM usuarios WHERE email='$email';");

    if($peticion->num_rows === 0){
        $email = $mysqli->real_escape_string($email);
        $tipo = "colaborador";

        $sentencia = $mysqli->prepare("INSERT INTO usuarios (nombre,apellidos,email,foto,password,tipo) VALUES (?,?,?,?,?,?);");
        $sentencia->bind_param("ssssss",$nombre,$apellidos,$email,$foto,$passwd,$tipo);
        $sentencia->execute();

        echo "Correcto";
    }
    else{
        echo "Error: el usuario indicado ya existe";
    }

}

function iniciarSesion($correo,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        echo "Usuario no existe";
    }
    else if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();

        if(password_verify($passwd,$row['password'])){
            echo "Login correcto";
            return $row;
        }
        else
            echo "Contraseña incorrecta";
    }
    else
        echo "Existen múltiples usuarios con el mismo correo";

    return false;
}