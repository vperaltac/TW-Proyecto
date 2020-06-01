<?php
function HTMLlistado($recetas){
    echo <<< HTML
        <main id="bloque-principal">
        <section class="lista-recetas">
HTML;

    foreach($recetas as &$receta){
        echo <<< HTML
            <div class="wrap-receta">
HTML;

        echo '<a href="index.php?acc=receta&r='.$receta['id_receta'].'">';
        echo <<< HTML
                    <div class="receta-lista">
HTML;
        echo '<img class="foto-receta-lista" src="data:image/jpg;base64,'.base64_encode( $receta['imagen'] ).'">';
        echo <<< HTML

                        <section id="info-lista-receta">
                            <h1>$receta[titulo]</h1>
                            <p class="info-lista-receta-texto">$receta[descripcion]</p>
                        </section>                

                    </div>

                    <div class="fast-info">
                        <div class="dificultad">
                            <div class="tiempo-receta">$receta[dificultad]</div>
                        </div>

                        <div class="tiempo">
                            <div class="dificultad-receta">$receta[tiempo]</div>
                        </div>
                    </div>    
                </a>
            </div>
HTML;
    }

    echo "</section>";
}