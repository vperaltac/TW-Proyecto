<?php

function HTMLreceta($datos){
echo <<< HTML
    <main id="bloque-principal">
        <section class="informacion">
            <div class="cabecera-receta">
                <h1>$datos[titulo]</h1>
                <img class="puntuacion" src='View/img/puntuacion.png' alt='puntuacion'>
            </div>


            <div class="tags-autor">
                <div class="tags">$datos[categoria]</div>
                <div class="autor">Autor: $datos[autor]</div>
            </div>

            <section id="descripcion">
HTML;

echo '<img class="foto-receta" src="data:image/jpg;base64,'.base64_encode( $datos['imagen'] ).'">';

echo <<< HTML
            <p class="descripcion-texto">$datos[descripcion]</p>
            </section>

            <div class="info-ingredientes">            
                <section id="ingredientes">
                    <h3>Ingredientes</h3>
                    <ul>
HTML;

foreach($datos['ingredientes'] as &$ingr)
    echo"<li>$ingr</li>";

echo <<< HTML
                    </ul>
                </section>
            </div>
            <ol>
HTML;

foreach($datos['preparacion'] as &$prep)
    echo "<li><p>$prep</p></li>";

echo <<< HTML
            </ol>

            <section class="paginas">
                <img class="numero-pagina" src="View/img/close.png">
                <img class="numero-pagina" src="View/img/edit.png">
                <img class="numero-pagina" src="View/img/mail.png">
            </section>
        </section>
HTML;
}
