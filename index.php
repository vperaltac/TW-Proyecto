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
require_once 'Controller/comentarios.php';

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
                renderizarUltimaReceta();
            break;

            case 'registro':
                renderizarEditarUsuario(1);
            break;

            case 'filtrar-listado':
                $categorias = pedirCategorias();
                renderizarFiltrar($categorias);
            break;
        }

        if(sesionIniciada()){
            switch($dest){
                case 'listado-usuario':
                    renderizarListadoUsuario();
                break;
    
                case 'nueva_receta':
                    $categorias = pedirCategorias();
                    renderizarNuevaReceta($categorias,1);
                break;
    
                case 'receta-editar':
                    $categorias = pedirCategorias();
                    renderizarNuevaReceta($categorias,0);
                break;
    
                case 'usuario-editar':
                    renderizarEditarUsuario(0);
                break;
        
                case 'nuevo-comentario':
                    renderizarNuevoComentario(1);
                break;
    
                case 'editar-comentario':
                    renderizarNuevoComentario(0);
                break;
            }

            if($_SESSION['tipo'] == 'administrador'){
                switch($dest){
                    case 'logs':
                        $datos = pedirLog();
                        renderizarLogs($datos);
                    break;
        
                    case 'gestion-usuarios':
                        renderizarGestionUsuarios();
                    break;
        
                    case 'gestion-db':
                        renderizarGestionDB();
                    break;
        
                    case 'gestion-categorias':
                        $categorias = pedirCategorias();
                        renderizarGestionCategorias($categorias);
                    break;    
                }
            }
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

            case 'filtro':
                renderizarListadoFiltrado();
            break;
        }

        if(sesionIniciada()){
            switch($_POST['peticion']){
                case 'usuario-editar':
                    pedirEditarUsuario();
                    renderizarListado();
                break;
    
                case 'usuario-eliminar':
                    pedirEliminarUsuario();
                    renderizarGestionUsuarios();
                break;
    
                case 'nueva-receta':
                    $res = subirNuevaReceta();
                    renderizarListado();
                break;
    
                case 'editar-receta':
                    pedirEditarReceta();
                break;
    
                case 'evaluar-receta':
                    pedirEvaluarReceta();
                break;
    
                case 'subir-paso-receta':
                    subirPasosReceta();
                break;
    
                case 'receta-eliminar':
                    pedirEliminarReceta();
                    renderizarListado();
                break;
    
                case 'nuevo-comentario':
                    subirComentario();
                    renderizarUltimaReceta();
                break;
    
                case 'editar-comentario':
                    pedirEditarComentario();
                    renderizarUltimaReceta();
                break;
    
                case 'eliminar-comentario':
                    pedirEliminarComentario();
                    renderizarUltimaReceta();
                break;

                case 'nueva-categoria':
                    pedirNuevaCategoria();
                    $categorias = pedirCategorias();
                    renderizarGestionCategorias($categorias);
                break;

                case 'eliminar-categoria':
                    pedirEliminarCategoria();
                    $categorias = pedirCategorias();
                    renderizarGestionCategorias($categorias);
                break;
            }    
        }
    break;
}
?>