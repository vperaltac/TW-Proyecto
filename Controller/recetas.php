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

function todasRecetas(){
    $recetas = pedirTodasRecetas();

    foreach($recetas as &$receta){
        $receta['ingredientes'] = explode("#",$receta['ingredientes']);
        $receta['preparacion'] = explode("#",$receta['preparacion']);
    }

    return $recetas;
}

function subirNuevaReceta(){
    if($_POST['titulo'] == "" or $_POST['idautor'] == "" or $_POST['descripcion'] == "" or $_POST['ingredientes'] == "" or $_POST['preparacion'] == "")
        return false;

    $categorias = getCategorias();
    print_r($categorias);

    $categorias_receta = array();
    $i = 0;
    foreach($categorias as $categoria){
        if(isset($_POST[$categoria['nombre']])){
            $categorias_receta[$i] = $categoria['id'];
            $i++;
        }
    }

    print_r($categorias_receta);


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