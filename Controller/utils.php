<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function subirImagen($nombre){
    $imagen = $_FILES[$nombre];
    $imagen_arr = explode('.',$imagen['name']);
    $imagen_formato = strtolower(end($imagen_arr));
    $permitido = array('jpg','jpeg','png');

    if(in_array($imagen_formato,$permitido)){
        if($imagen['error'] == 0){
            if($imagen['size'] < 1000000){
                $nuevo_nombre = uniqid('',true).".".$imagen_formato;
                $destino = 'View/img/'.$nuevo_nombre;
                if(!move_uploaded_file($imagen['tmp_name'],$destino))
                    echo "Error al subir imagen";
            }
            else
                echo "El archivo es demasiado grande";
        }
        else
            echo "Error al subir la imagen";
    }
    else
        echo "Formato no permitido";

    return $destino;
}

function validarCorreo($email){
    $regex_email = "/^(([^<>()[\]\\.,;:\s@\']+(\.[^<>()[\]\\.,;:\s@\']+)*)|(\'.+\'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";

    if(preg_match($regex_email,$email))
        return true;
    else
        return false;
}