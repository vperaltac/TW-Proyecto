<?php
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