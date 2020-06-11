<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLreceta($datos){
//print_r($datos);
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

            <div class="galeria">
HTML;


foreach($datos['pasos'] as $paso)
    echo "<div class='galeria-imagen'><img src='$paso[fichero]'></div>";

echo <<< HTML
            </div>

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
                <form action="index.php" method="post">
                    <input type="hidden" value="receta-eliminar" name="peticion" />
HTML;

echo '<input type="hidden" value='.$datos['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$datos['id'].' name="idreceta" />';
echo <<< HTML
                    <input class="btn-eliminar-receta" type="image" src="View/img/close.png" />
                </form>

                <form action="index.php" method="post">
                    <input type="hidden" value="receta-editar" name="peticion" />
HTML;
echo '<input type="hidden" value='.$datos['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$datos['id'].' name="idreceta" />';
echo <<< HTML
                    <input class="btn-editar-receta" type="image" src="View/img/edit.png" />
                </form>

                <form action="index.php" method="post">
                    <input class="btn-comentar-receta" type="image" src="View/img/mail.png" />
                </form>
            </section>
        </section>
HTML;
}
