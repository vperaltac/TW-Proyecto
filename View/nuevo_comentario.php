<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLnuevoComentario($idreceta,$nuevo,$datos){
    if($nuevo){
        $input = '<input type="hidden" value="nuevo-comentario" name="peticion" />';
        $titulo = '<h2>Tu opinión es muy importante</h2>';
    }
    else{
        $input = '<input type="hidden" value="editar-comentario" name="peticion" />';
        $titulo = '<h2>Editar comentario</h2>';
    }

echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    
    	<div class="cabecera-receta">
        	<h2>Tu opinión es muy importante</h2>
    	</div>


    	<form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            
            <label>Déjanos tu comentario :</label>
            <textarea type="text" name="descripcion" id="new-descripcion">$datos[comentario]</textarea>
           
    </form>

    	<div class="formulario">
HTML;

echo '<input type="hidden" value='.$datos['id'].' name="idcomentario" />';
echo '<input type="hidden" value='.$idreceta.' name="idreceta" />';
echo $input;
echo <<< HTML
            <input class="boton" type="submit" value="Comentar" name="aplicarFiltro" id="aplicarFiltro">
        </div>

    </section>
</div>
HTML;
}