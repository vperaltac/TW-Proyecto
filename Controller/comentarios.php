<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/
require_once 'Model/comentarios.php';
require_once 'Model/log.php';
require_once 'Controller/utils.php';

function pedirComentarios($id_receta){
    return getComentarios($id_receta);
}

function subirComentario(){
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    nuevoComentario($_POST['idreceta'],$_SESSION['id_usuario'],$_POST['descripcion']);
    registrarAccionUsuario('nuevo-comentario');
}

function pedirEliminarComentario(){
    eliminarComentario($_POST['idreceta'],$_POST['idcomentario']);
}