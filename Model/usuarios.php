<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function getNombreUsuario($id_usuario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT nombre,apellidos FROM usuarios WHERE id='$id_usuario';");
    $row = $peticion->fetch_assoc();

    return $row;
}

function getDatosUsuario($id_usuario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM usuarios WHERE id='$id_usuario';");
    $row = $peticion->fetch_assoc();

    return $row;
}


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
    }
}

function editarUsuario($nombre,$apellidos,$email,$foto,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $p1 = $mysqli->query("SELECT id,password FROM usuarios WHERE email='$email';");
    $row = $p1->fetch_assoc();
    $id = $row['id'];


    if(password_verify($passwd,$row['password']))
        $password = $row['password'];
    else
        $password = $passwd;

    $peticion = $mysqli->query("UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',email='$email',password='$password' WHERE id='$id';");

    if($foto != NULL)
        $peticion = $mysqli->query("UPDATE usuarios SET foto='$foto' WHERE id='$id';");

    $p2 = $mysqli->query("SELECT * FROM usuarios WHERE email='$email';");
    $datos = $p2->fetch_assoc();

    return $datos;
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

function getTodosUsuarios(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM usuarios;");
    $usuarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $usuarios[$i] = $fila;
        $i++;
    }

    return $usuarios;
}

function eliminarUsuario($idusuario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $p1 = $mysqli->query("DELETE FROM usuarios WHERE id='$idusuario';");
}