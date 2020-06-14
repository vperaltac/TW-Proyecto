<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLnuevoComentario($idreceta){
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    
    	<div class="cabecera-receta">
        	<h2>Tu opinión es muy importante</h2>
    	</div>


    	<form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            
            <label>Déjanos tu comentario :</label>
            <textarea type="text" name="descripcion" id="new-descripcion"></textarea>
           
    </form>

    	<div class="formulario">
HTML;


echo '<input type="hidden" value='.$idreceta.' name="idreceta" />';
echo '<input type="hidden" value="nuevo-comentario" name="peticion" />';
echo <<< HTML
            <input class="boton" type="submit" value="Comentar" name="aplicarFiltro" id="aplicarFiltro">
        </div>

    </section>
</div>
HTML;
}