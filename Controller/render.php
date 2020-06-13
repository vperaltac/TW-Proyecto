<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

require_once 'View/comunes.php';
require_once 'View/receta.php';
require_once 'View/contacto.php';
require_once 'View/listado.php';
require_once 'View/registro.php';
require_once 'View/nueva_receta.php';
require_once 'View/logs.php';
require_once 'View/gestion_usuarios.php';
require_once 'View/nuevo_comentario.php';

require_once 'Controller/usuarios.php';
require_once 'Controller/contacto.php';
require_once 'Controller/recetas.php';

function renderizarReceta(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    if (session_status() == PHP_SESSION_NONE)
    session_start();
    
    if(isset($_SESSION['id_usuario']))
        setcookie($_SESSION['id_usuario'],$_GET['r'], time() + (86400 * 30), "/");

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    $datos = recetas($_GET['r']);
    HTMLreceta($datos);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarUltimaReceta(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    if(isset($_SESSION['id_usuario'])){
        if(!isset($_COOKIE[$_SESSION['id_usuario']])) {
            $datos = recetas(-1);
            HTMLreceta($datos);    
        }
        else{
            $datos = recetas($_COOKIE[$_SESSION['id_usuario']]);
            HTMLreceta($datos);
        }
    }
    else{
        $datos = recetas(-1);
        HTMLreceta($datos);    
    }

    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}


function renderizarContacto(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLcontacto();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarContactoEnviado($errores){            
    if(empty($errores)){
        $admin = sesionIniciada();
        $cantidad = countRecetas();

        HTMLinicio();
        HTMLcabecera();
        HTMLnav($admin);
        HTMLcontactoExito();
        HTMLsidebar($admin,$cantidad['COUNT(*)']);
        HTMLfooter();
        HTMLfin();
    }
    else{
        $admin = sesionIniciada();
        $cantidad = countRecetas();

        HTMLinicio();
        HTMLcabecera();
        HTMLnav($admin);
        HTMLcontactoError($errores,$_POST);
        HTMLsidebar($admin,$cantidad['COUNT(*)']);
        HTMLfooter();
        HTMLfin();
    }
}

function renderizarListado(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);

    $recetas = todasRecetas();
    HTMLlistado($recetas);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();        
}

function renderizarListadoUsuario(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);

    $recetas = todasRecetasUsuario();
    HTMLlistado($recetas);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();        
}


function renderizarNuevaReceta($categorias,$nueva){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    if(!$nueva)
        $datos = pedirDatosRecetaEditar($_GET['idreceta']);
    else
        $datos = NULL;

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLnueva_receta($categorias,$nueva,$datos);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarEditarUsuario($registro){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    if(!$registro)
        $datos = pedirDatosUsuario();
    else
        $datos = NULL;

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLeditarUsuario($registro,$datos);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarLogs($datos){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLlogs($datos);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarGestionUsuarios(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLgestionUsuarios();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarNuevoComentario(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLnuevoComentario();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}