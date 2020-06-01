<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'View/comunes.php';
require_once 'View/receta.php';
require_once 'View/principal.php';
require_once 'View/contacto.php';
require_once 'View/listado.php';

require_once 'Controller/usuario.php';
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
        }
    break;

    //------------------------------------  POST  ------------------------------------------
    case 'POST':
        if(isset($_POST['logout'])){
            cerrarSesion();
            renderizarPrincipal();
        }
        else if(isset($_POST['mensaje'])){
            $errores = validarContacto($_POST);
            
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
        else if(isset($_POST['descripcion'])){
            $res = subirNuevaReceta();

            if(!$res){
                renderizarNuevaRecetaError();
                echo "error";
            }
            else
                renderizarListado();
        }
        else{
            $admin = iniciarSesion($_POST['uname'],$_POST['psw']);
            renderizarPrincipal();
        }
    break;
}
?>