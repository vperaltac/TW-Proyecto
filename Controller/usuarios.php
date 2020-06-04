<?php
require_once 'Controller/utils.php';
require_once 'Model/usuarios.php';

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

function pedirIniciarSesion(){
    $inicio = iniciarSesion($_POST['uname'],$_POST['psw']);

    if(isset($inicio)){
        // activar sesión
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION["usuario"] = 'admin';
        $_SESSION["id_usuario"] = $inicio["id"];
        $_SESSION["email"] = $inicio["email"];         
        $_SESSION["nombre"]  = $inicio["nombre"];
        $_SESSION["apellidos"]  = $inicio["apellidos"];
        $_SESSION["tipo"]    = $inicio["tipo"];
    }
}