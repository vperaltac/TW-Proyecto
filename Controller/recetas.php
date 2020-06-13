<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

require_once 'Model/usuarios.php';
require_once 'Model/recetas.php';
require_once 'Controller/utils.php';

// obtener datos sobre eventos
function recetas($id_receta){
    if($id_receta == -1)
        $datos = getRecetaRandom();
    else
        $datos = pedirReceta($id_receta);

    if(!isset($datos['id']))
        return false;

    $datos['ingredientes'] = explode("#",$datos['ingredientes']);
    $datos['preparacion'] = explode("#",$datos['preparacion']);

    $autor = getNombreUsuario($datos['idautor']);
    $categorias = getCategoriasReceta($id_receta);

    $datos['categorias'] = $categorias;
    $datos['autor'] = $autor['nombre'];
    $datos['autor'] .= " ".$autor['apellidos'];
    $datos['pasos'] = getPasosReceta($id_receta);

    $cat_nombres = array();
    $i=0;
    foreach($datos['categorias'] as $categoria){
        $cat_nombres[$i] = $categoria['nombre'];
        $i++;
    }

    $datos['categorias'] = implode(", ", $cat_nombres);

    return $datos;
}

function pedirDatosRecetaEditar($id_receta){
    $datos = recetas($id_receta);

    $ingredientes = array();
    $i=0;
    foreach($datos['ingredientes'] as $ingrediente){
        $ingredientes[$i] = $ingrediente;
        $i++;
    }

    $datos['ingredientes'] = implode("#", $ingredientes);

    $preparacion = array();
    $i=0;
    foreach($datos['preparacion'] as $prep){
        $preparacion[$i] = $prep;
        $i++;
    }

    $datos['preparacion'] = implode("#", $preparacion);
    $datos['categorias'] = explode(", ", $datos['categorias']);

    return $datos;
}

function todasRecetas(){
    $recetas = pedirTodasRecetas();

    foreach($recetas as &$receta){
        $receta['ingredientes'] = explode("#",$receta['ingredientes']);
        $receta['preparacion'] = explode("#",$receta['preparacion']);
    }

    return $recetas;
}

function todasRecetasUsuario(){
    $recetas = getRecetasUsuario($_SESSION['id_usuario']);

    foreach($recetas as &$receta){
        $receta['ingredientes'] = explode("#",$receta['ingredientes']);
        $receta['preparacion'] = explode("#",$receta['preparacion']);
    }

    return $recetas;
}

function pedirCategorias(){
    $categorias = getCategorias();

    return $categorias;
}


function subirNuevaReceta(){
    if($_POST['titulo'] == "" or $_POST['idautor'] == "" or $_POST['descripcion'] == "" or $_POST['ingredientes'] == "" or $_POST['preparacion'] == "")
        return false;

    $categorias = getCategorias();

    $categorias_receta = array();
    $i = 0;
    foreach($categorias as $categoria){
        if(isset($_POST[$categoria['nombre']])){
            $categorias_receta[$i] = $categoria['id'];
            $i++;
        }
    }

    $nombre = $_POST['titulo'];
    $idautor  = $_POST['idautor'];
    $descripcion = $_POST['descripcion'];
    $ingredientes = $_POST['ingredientes'];
    $preparacion = $_POST['preparacion'];

    $imagen = subirImagen("img");
    
    nuevaReceta($nombre,$idautor,$descripcion,$ingredientes,$preparacion,$categorias_receta,$imagen);
    return true;
}

function subirPasosReceta(){
    foreach(array_keys($_FILES) as $key){
        $imagen = subirImagen($key);
        nuevoPasoReceta($imagen,$_POST['titulo']);
    }
}

function pedirEliminarReceta(){
    $imgs = getPasosReceta($_POST['idreceta']);
    $imgPrincipal = pedirReceta($_POST['idreceta']);
    foreach($imgs as $img){
        unlink($img['fichero']);
    }
    unlink($imgPrincipal['imagen']);

    eliminarReceta($_POST['idreceta']);

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    $receta = pedirReceta($_COOKIE[$_SESSION['id_usuario']]);
    if(!isset($receta) or $receta['id'] == $_POST['idreceta']){
        $nueva_receta = getRecetaRandom();
        setcookie($_SESSION['id_usuario'],$nueva_receta['id'], time() + (86400 * 30), "/");
    }
}

function pedirEditarReceta(){
    if($_POST['titulo'] == "" or $_POST['idautor'] == "" or $_POST['descripcion'] == "" or $_POST['ingredientes'] == "" or $_POST['preparacion'] == "")
        return false;


    $categorias = getCategorias();

    $categorias_receta = array();
    $i = 0;
    foreach($categorias as $categoria){
        if(isset($_POST[$categoria['nombre']])){
            $categorias_receta[$i] = $categoria['id'];
            $i++;
        }
    }

    $nombre = $_POST['titulo'];
    $idautor  = $_POST['idautor'];
    $idreceta = $_POST['idreceta'];
    $descripcion = $_POST['descripcion'];
    $ingredientes = $_POST['ingredientes'];
    $preparacion = $_POST['preparacion'];

    if(!$_FILES['img']['name'] == ""){
        $imagen = subirImagen("img");
        $datos_antiguos = recetas($idreceta);
        unlink($datos_antiguos['imagen']);
    }
    else
        $imagen = NULL;

    editarReceta($idreceta,$nombre,$idautor,$descripcion,$ingredientes,$preparacion,$categorias_receta,$imagen);
    return true;
}