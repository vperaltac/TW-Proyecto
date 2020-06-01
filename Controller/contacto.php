<?php
function validarContacto($post){
    $errores = (array) null;

    if($post['nombre'] == "")
        array_push($errores,"El nombre no puede estar vacío.");
    
    $regex_email = "/^(([^<>()[\]\\.,;:\s@\']+(\.[^<>()[\]\\.,;:\s@\']+)*)|(\'.+\'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    if(!preg_match($regex_email,$post['email']))
        array_push($errores,"Formato de correo erróneo.");

    // el campo telefono solo acepta un conjunto finito de dígitos
    $regex = "/^\d+$/";
    if(!preg_match($regex,$post['tlf']))
        array_push($errores,"Formato de teléfono erróneo.");

    if($post['mensaje'] == "")
        array_push($errores,"El comentario no puede estar vacío.");

    return $errores;
}