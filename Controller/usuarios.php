<?php
require_once 'Controller/utils.php';
require_once 'Model/usuarios.php';

function iniciarSesion($usuario, $passwd){
    // activar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($usuario == "admin" and $passwd == "admin"){
        $_SESSION["usuario"] = $usuario;

        return true;
    }
    else
        return false;    
}

function sesionIniciada(){    
    // activar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION["usuario"]))
        return true;
    else
        return false;
}

function cerrarSesion(){
    // activar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Eliminar la sesión
    session_destroy();
}

function pedirRegistrarUsuario(){
    $imagen = subirImagen("img");
    $hash = password_hash($_POST['psw'],PASSWORD_DEFAULT);

    registrarUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$imagen,$hash);
}