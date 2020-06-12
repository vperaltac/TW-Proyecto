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

function pedirEditarUsuario(){
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    if(!$_FILES['img']['name'] == ""){
        $imagen = subirImagen("img");
        $datos_usuario = getDatosUsuario($_SESSION['id_usuario']);
        unlink($datos_usuario['foto']);
    }
    else
        $imagen = NULL;

    $hash = password_hash($_POST['psw'],PASSWORD_DEFAULT);
    $datos = editarUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$imagen,$hash);

    $_SESSION["id_usuario"]    = $datos["id"];
    $_SESSION["email"]         = $datos["email"];         
    $_SESSION["nombre"]        = $datos["nombre"];
    $_SESSION["apellidos"]     = $datos["apellidos"];
    $_SESSION["tipo"]          = $datos["tipo"];
    $_SESSION["imgUsuario"]    = $datos["foto"];
}

function pedirDatosUsuario(){
    return getDatosUsuario($_SESSION['id_usuario']);
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
        $_SESSION["imgUsuario"]    = $inicio["foto"];

        registrarAccesoUsuario($inicio["nombre"],$_SESSION['apellidos'],$inicio["email"],'login');
    }
    else{
        registrarIntentoAcceso($_SERVER['REMOTE_ADDR'],$_POST['uname']);
    }
}

function pedirLog(){
    return getLog();
}