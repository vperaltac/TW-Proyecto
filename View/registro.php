<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLeditarUsuario($registro,$datos){
    if($registro){
        $input = '<input type="hidden" value="usuario-registrar" name="peticion" />';
        $input .= '<input class="boton" type="submit" value="Registrar" name="" id="boton-registro">';
        $titulo = '<h1>Regístrate con nosotros</h1>';
    }
    else{
        $input = '<input type="hidden" value="usuario-editar" name="peticion" />';
        $input .= '<input class="boton" type="submit" value="Editar" name="" id="boton-registro">';
        $titulo = '<h1>Editar usuario</h1>';
    }

echo <<< HTML
<main id="bloque-principal">
<div class="contenido-inicio-sesion">
    <form class="zona-registro-formulario-inicio" method="POST" enctype="multipart/form-data">
        $titulo

        <label for="email">Email</label>
HTML;

echo '<input type="text" name="email" id="email-registro" required value='.$datos['email'].'>';
echo '<label for="nombre">Nombre</label>';
echo '<input type="text" name="nombre" id="nombre-registro" required value='.$datos['nombre'].'>';
echo '<label for="apellidos">Apellidos</label>';
echo '<input type="text" name="apellidos" id="apellidos-registro" required value='.$datos['apellidos'].'>';
echo '<label for="psw">Contraseña</label>';
echo '<input type="password" name="psw" id="pwd-registro" required>';
echo '<label for="psw">Repita la contraseña</label>';
echo '<input type="password" name="psw-re" id="pwdr-registro" required>';
echo <<< HTML
        <label for="img">Imagen:</label>
        <input name="img" type="file"/>
    
        $input
    </form>
</div>
HTML;
}