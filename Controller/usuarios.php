<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

require_once 'Controller/utils.php';
require_once 'Model/usuarios.php';
require_once 'Model/log.php';

function sesionIniciada(){    
    // activar sesión
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    if(isset($_SESSION["id_usuario"])){
        return true;
    }
    else
        return false;
}

function cerrarSesion(){
    // activar sesión
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    registrarAccesoUsuario($_SESSION["nombre"],$_SESSION['apellidos'],$_SESSION["email"],'logout');
    // Eliminar la sesión
    session_destroy();
}

function pedirRegistrarUsuario(){
    $imagen = subirImagen("img");
    $hash = password_hash($_POST['psw'],PASSWORD_DEFAULT);

    registrarUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$imagen,$hash);
    registrarAccesoUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],'nuevo-usuario');
}

function pedirIniciarSesion(){
    $inicio = iniciarSesion($_POST['uname'],$_POST['psw']);

    if($inicio){
        // activar sesión
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        $_SESSION["id_usuario"] = $inicio["id"];
        $_SESSION["email"] = $inicio["email"];         
        $_SESSION["nombre"]  = $inicio["nombre"];
        $_SESSION["apellidos"]  = $inicio["apellidos"];
        $_SESSION["tipo"]    = $inicio["tipo"];

        registrarAccesoUsuario($inicio["nombre"],$_SESSION['apellidos'],$inicio["email"],'login');
    }
    else{
        registrarIntentoAcceso($_SERVER['REMOTE_ADDR'],$_POST['uname']);
    }
}