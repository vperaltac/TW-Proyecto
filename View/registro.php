<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLregistro(){
echo <<< HTML
<main id="bloque-principal">
<div class="contenido-inicio-sesion">
    <form class="zona-registro formulario-inicio" method="POST" enctype="multipart/form-data">
        <h2>Regístrate</h2>

        <label for="email">Email</label>
        <input type="text" name="email" id="email-registro" required>
    
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre-registro" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos-registro" required>

        <label for="psw">Contraseña</label>
        <input type="password" name="psw" id="pwd-registro" required>

        <label for="psw">Repita la contraseña</label>
        <input type="password" name="psw-re" id="pwdr-registro" required>

        <label for="img">Imagen:</label>
        <input name="img" type="file"/>
    
        <input type="hidden" value="registro" name="peticion" />
        <input class="boton" type="submit" value="Registrar" name="" id="boton-registro">
    </form>
</div>
HTML;
}