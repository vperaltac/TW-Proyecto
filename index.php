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

            case 'listado-usuario':
                renderizarListadoUsuario();
            break;

            case 'principal':
                renderizarUltimaReceta();
            break;

            case 'nueva_receta':
                if(sesionIniciada()){
                    $categorias = pedirCategorias();
                    renderizarNuevaReceta($categorias);
                }
                else
                    renderizarUltimaReceta();
            break;

            case 'registro':
                renderizarEditarUsuario(1);
            break;

            case 'usuario-editar':
                echo "AAAAAAAAAAAAAAAAAA";
                renderizarEditarUsuario(0);
            break;

            case 'logs':
                $datos = pedirLog();
                renderizarLogs($datos);
            break;
        }
    break;

    //------------------------------------  POST  ------------------------------------------
    case 'POST':
        print_r($_POST);

        switch($_POST['peticion']){
            case 'usuario-registrar':
                pedirRegistrarUsuario();
                renderizarListado();
            break;

            case 'usuario-editar':
                pedirEditarUsuario();
            break;

            case 'iniciar-sesion':
                pedirIniciarSesion();
                renderizarUltimaReceta();
            break;

            case 'desconectar':
                cerrarSesion();
                renderizarListado();
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

            case 'subir-paso-receta':
                subirPasosReceta();
            break;

            case 'receta-editar':
                echo "EDITAR RECETA";
            break;

            case 'receta-eliminar':
                pedirEliminarReceta();
                renderizarListado();
            break;
        }
    break;
}
?>