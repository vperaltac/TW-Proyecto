<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'View/comunes.php';
require_once 'View/receta.php';
require_once 'View/principal.php';
require_once 'View/contacto.php';
require_once 'View/listado.php';

require_once 'Controller/usuarios.php';
require_once 'Controller/contacto.php';
require_once 'Controller/recetas.php';
require_once 'Controller/render.php';

$uri = $_SERVER['REQUEST_URI'];

if(!isset($_GET['acc']))
    $dest = "principal";
else
    $dest = $_GET['acc'];

switch($_SERVER['REQUEST_METHOD']){
    //------------------------------------  GET  ------------------------------------------
    case 'GET':
        switch($dest){
            case 'receta':
                renderizarReceta();
            break;

            case 'contacto':
                renderizarContacto();
            break;

            case 'listado':
                renderizarListado();
            break;

            case 'principal':
                renderizarPrincipal();
            break;

            case 'nueva_receta':
                if(sesionIniciada())
                    renderizarNuevaReceta();
                else
                    renderizarPrincipal();
            break;

            case 'registro':
                renderizarRegistro();
            break;
        }
    break;

    //------------------------------------  POST  ------------------------------------------
    case 'POST':
        print_r($_POST);

        switch($_POST['peticion']){
            case 'registro':
                pedirRegistrarUsuario();
            break;

            case 'iniciar-sesion':
                pedirIniciarSesion();
                renderizarPrincipal();
            break;

            case 'desconectar':
                cerrarSesion();
                renderizarPrincipal();
            break;

            case 'contacto':
                $errores = validarContacto($_POST);
                renderizarContactoEnviado($errores);
            break;

            case 'nueva-receta':
                $res = subirNuevaReceta();

                if(!$res)
                    renderizarNuevaRecetaError();
                else
                    renderizarListado();    
            break;
        }
    break;
}
?>