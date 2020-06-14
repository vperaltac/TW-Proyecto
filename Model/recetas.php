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

function getRecetasFiltradas($titulo,$texto,$ordenacion,$categorias){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    if($ordenacion == 'alfabetico')
        $order = "ORDER BY nombre";
    elseif($ordenacion == 'masComentadas')
        $order = "ORDER BY n_comentarios DESC";
    else
        $order = "";

    $peticion = $mysqli->query("SELECT * FROM (SELECT recetas.*, (SELECT COUNT(*) FROM comentarios WHERE comentarios.idreceta = recetas.id) AS n_comentarios FROM recetas) as rec WHERE rec.nombre LIKE '%$titulo%' AND (rec.descripcion LIKE '%$texto%' OR rec.ingredientes LIKE '%$texto%' OR rec.preparacion LIKE '%$texto%') $order;");
    $recetas = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $recetas[$i] = $fila;
        $i++;
    }

    sort($categorias); 
    $recetas_finales = array();
    $j=0;
    if(sizeof($categorias) > 0){
        foreach($recetas as $receta){
            $catgs = getCategoriasReceta($receta['id']);

            $valido = 1;
            $arr = array();
            $k = 0;
            foreach($catgs as $catg){
                $arr[$k] = $catg['nombre'];
                $k++;
            }

            sort($arr);
            $res = array_diff($categorias,$arr);

            if(sizeof($res) == 0){
                $recetas_finales[$j] = $receta;
                $j++;
            }
        }
    }
    else
        $recetas_finales = $recetas;

    return $recetas_finales;
}

function getRecetasUsuario($id_usuario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM recetas WHERE idautor='$id_usuario';");
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

function eliminarCategorias($idreceta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("DELETE FROM categorias WHERE receta_id='$idreceta';");
}

function nuevoPasoReceta($imagen,$nombre_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id FROM recetas WHERE nombre='$nombre_receta';");
    $fila = $peticion->fetch_assoc();
    $id_receta = $fila['id'];

    $peticion = $mysqli->prepare("INSERT INTO fotos (idreceta,fichero) VALUES(?,?)");
    $peticion->bind_param("is",$id_receta,$imagen);
    $peticion->execute();
}

function getPasosReceta($id_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT fichero FROM fotos WHERE idreceta='$id_receta';");
    $fotos = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $fotos[$i] = $fila;
        $i++;
    }

    return $fotos;
}

function eliminarReceta($id_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_receta = $mysqli->real_escape_string($id_receta);

    $sentencia = $mysqli->prepare("DELETE FROM recetas WHERE id=?");
    $sentencia->bind_param("i",$id_receta);
    $sentencia->execute();
}

function editarReceta($idreceta,$nombre,$descripcion,$ingredientes,$preparacion,$categorias_receta,$imagen){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("UPDATE recetas SET nombre='$nombre',descripcion='$descripcion',ingredientes='$ingredientes',preparacion='$preparacion' WHERE id='$idreceta';");

    if($imagen != NULL)
        $peticion = $mysqli->query("UPDATE recetas SET imagen='$imagen' WHERE id='$idreceta';");

    eliminarCategorias($idreceta);
    foreach($categorias_receta as $categoria){
        $add_categorias = $mysqli->prepare("INSERT INTO categorias (receta_id,categorias_id) VALUES(?,?)");
        $add_categorias->bind_param("ii",$idreceta,$categoria);
        $add_categorias->execute();    
    }
}

function evaluarReceta($idreceta,$idusuario,$valor){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT COUNT(*) FROM valoraciones WHERE idusuario='$idusuario' AND idreceta='$idreceta';");
    $fila = $peticion->fetch_assoc();
    
    if($fila['COUNT(*)'] != 0)
        $peticion = $mysqli->query("UPDATE valoraciones SET idreceta='$idreceta',idusuario='$idusuario',valoracion='$valor' WHERE idusuario='$idusuario';");
    else
        $peticion = $mysqli->query("INSERT INTO valoraciones (idreceta,idusuario,valoracion) VALUES('$idreceta','$idusuario','$valor');");
}

function getValoracionReceta($idreceta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT AVG(valoracion) FROM valoraciones WHERE idreceta='$idreceta';");
    $valoracion = $peticion->fetch_assoc();

    return $valoracion['AVG(valoracion)'];
}