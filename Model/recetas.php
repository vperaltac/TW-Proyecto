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

    $peticion = $mysqli->query("SELECT * FROM recetas WHERE id_receta='$id_receta';");
    return $peticion->fetch_assoc();
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


function nuevaReceta($titulo,$autor,$categoria,$descripcion,$ingredientes,$preparacion,$tiempo,$dificultad,$imagen){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("INSERT INTO recetas (titulo,autor,categoria,descripcion,ingredientes,preparacion,tiempo,dificultad,imagen) VALUES(?,?,?,?,?,?,?,?,?)");
    $sentencia->bind_param("sssssssss",$titulo,$autor,$categoria,$descripcion,$ingredientes,$preparacion,$tiempo,$dificultad,$imagen);
    $sentencia->execute();
}

function countRecetas(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT COUNT(*) FROM recetas;");
    return $peticion->fetch_assoc();
}