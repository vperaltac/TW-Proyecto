<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLreceta($datos){
echo <<< HTML
    <main id="bloque-principal">
        <section class="informacion">
            <div class="cabecera-receta">
                <h1>$datos[nombre]</h1>
                <img class="puntuacion" src='View/img/puntuacion.png' alt='puntuacion'>
            </div>


            <div class="tags-autor">
                <div class="tags">$datos[categorias]</div>
                <div class="autor">Autor: $datos[autor]</div>
            </div>

            <section id="descripcion">
HTML;

echo '<img class="foto-receta" src="'.$datos['imagen'].'">';

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

<!--             <div class="galeria">
                <div class="galeria-imagen"><img src="img/min1.png"></div>
            </div>
 -->
            <section class="comentarios">
                <div class="comentario">
                    <div class="comentario-fecha">10/07/2020.</div>
                    <div class="comentario-usuario">Juanita Pérez</div>
                    <div class="comentario-texto">Hmmmmm ... ¡qué buena pinta tiene!</div>    
                </div>

                <div class="comentario">
                    <div class="comentario-fecha">12/07/2020.</div>
                    <div class="comentario-usuario">Anónimo</div>
                    <div class="comentario-texto">Sí, mañana lo voy a probar y ya os contaré</div>    
                </div>
            </section>
            
            <section class="paginas">
                <img class="numero-pagina" src="View/img/close.png">
                <img class="numero-pagina" src="View/img/edit.png">
                <img class="numero-pagina" src="View/img/mail.png">
            </section>
        </section>
HTML;
}
