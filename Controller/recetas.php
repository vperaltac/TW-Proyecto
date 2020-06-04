<?php
require_once 'Model/recetas.php';
require_once 'Controller/utils.php';

// obtener datos sobre eventos
function recetas($id_receta){
    $datos = pedirReceta($id_receta);
    $datos['ingredientes'] = explode("#",$datos['ingredientes']);
    $datos['preparacion'] = explode("#",$datos['preparacion']);

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
    if(     $_POST['titulo']      == ""
        or $_POST['autor']       == "" or $_POST['categoria']    == ""
        or $_POST['descripcion'] == "" or $_POST['ingredientes'] == ""
        or $_POST['preparacion'] == "" or $_POST['dificultad']   == ""
        or $_POST['tiempo']      == ""){
            return false;
    }

    $titulo = $_POST['titulo'];
    $autor  = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $ingredientes = $_POST['ingredientes'];
    $preparacion = $_POST['preparacion'];
    $tiempo = $_POST['tiempo'];
    $dificultad = $_POST['dificultad'];

    $imagen = subirImagen("img");
    
    //nuevaReceta($titulo,$autor,$categoria,$descripcion,$ingredientes,$preparacion,$tiempo,$dificultad,$imagen);
    return true;
}