<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

// devuelve los comentarios de la base de datos en formato JSON
function getComentarios($id_receta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_receta = $mysqli->real_escape_string($id_receta);

    $peticion = $mysqli->query("SELECT comentarios.id, comentarios.idreceta, comentarios.idusuario, comentarios.comentario, comentarios.fecha, usuarios.nombre, usuarios.apellidos FROM comentarios INNER JOIN usuarios ON comentarios.idusuario = usuarios.id WHERE idreceta='$id_receta' ORDER BY comentarios.fecha;");
    $comentarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $comentarios[$i] = $fila;
        $i++;
    }

    return $comentarios;
}

function getTodosComentarios(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM comentarios;");
    $comentarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $comentarios[$i] = $fila;
        $i++;
    }

    return $comentarios;
}

// añade a la base de datos un nuevo comentario
function nuevoComentario($idreceta,$idusuario,$comentario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $idreceta = $mysqli->real_escape_string($idreceta);
    $idusuario = $mysqli->real_escape_string($idusuario);
    $comentario = $mysqli->real_escape_string($comentario);

    $sentencia = $mysqli->prepare("INSERT INTO comentarios (idreceta,idusuario,comentario,fecha) VALUES(?,?,?,NOW())");
    $sentencia->bind_param("iis",$idreceta,$idusuario,$comentario);
    $sentencia->execute();
}

function getDatosComentario($idcomentario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM comentarios WHERE id='$idcomentario';");
    $comentario = $peticion->fetch_assoc();

    return $comentario;
}

function editarComentario($idcomentario,$texto){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->query("UPDATE comentarios SET comentario='$texto',fecha=NOW() WHERE id='$idcomentario'");
}

function eliminarComentario($id_receta,$id_comentario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_receta = $mysqli->real_escape_string($id_receta);
    $id_comentario = $mysqli->real_escape_string($id_comentario);

    $sentencia = $mysqli->query("DELETE FROM comentarios WHERE idreceta='$id_receta' AND id='$id_comentario'");
}
?>