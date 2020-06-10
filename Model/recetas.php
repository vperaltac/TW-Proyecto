<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

require_once "database.php";

// devuelve las recetas de la base de datos en formato JSON
function pedirReceta($id_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_receta = $mysqli->real_escape_string($id_receta);

    $peticion = $mysqli->query("SELECT * FROM recetas WHERE id='$id_receta';");
    return $peticion->fetch_assoc();
}

function getRecetaRandom(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM recetas order by rand() limit 1;");
    return $peticion->fetch_assoc();
}

function getCategoriasReceta($id_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_receta = $mysqli->real_escape_string($id_receta);

    $peticion = $mysqli->query("SELECT * FROM categorias WHERE receta_id='$id_receta';");
    $id_categorias = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $id_categorias[$i] = $fila;
        $i++;
    }

    $categorias = array();
    $j = 0;
    foreach($id_categorias as $id_categoria){
        $id = $id_categoria['categorias_id'];

        $pet = $mysqli->query("SELECT nombre FROM listacategorias WHERE id='$id';");
        $categorias[$j] = $pet->fetch_assoc();
        $j++;
    }

    return $categorias;
}

function pedirTodasRecetas(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM recetas;");
    $recetas = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $recetas[$i] = $fila;
        $i++;
    }

    return $recetas;
}


function nuevaReceta($nombre,$idautor,$descripcion,$ingredientes,$preparacion,$categorias_receta,$imagen){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $nueva_receta = $mysqli->prepare("INSERT INTO recetas (idautor,nombre,descripcion,ingredientes,preparacion,imagen) VALUES(?,?,?,?,?,?)");
    $nueva_receta->bind_param("isssss",$idautor,$nombre,$descripcion,$ingredientes,$preparacion,$imagen);
    $nueva_receta->execute();

    $peticion = $mysqli->query("SELECT id FROM recetas WHERE nombre='$nombre';");
    $fila = $peticion->fetch_assoc();
    $id_receta = $fila['id'];

    foreach($categorias_receta as $categoria){
        $add_categorias = $mysqli->prepare("INSERT INTO categorias (receta_id,categorias_id) VALUES(?,?)");
        $add_categorias->bind_param("ii",$id_receta,$categoria);
        $add_categorias->execute();    
    }
}

function countRecetas(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT COUNT(*) FROM recetas;");
    return $peticion->fetch_assoc();
}

function getCategorias(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM listacategorias;");
    $categorias = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $categorias[$i] = $fila;
        $i++;
    }

    return $categorias;
}