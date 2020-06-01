<?php

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