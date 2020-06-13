<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLlistado($recetas){
    echo <<< HTML
        <main id="bloque-principal">
        <section class="lista-recetas">
HTML;

    echo <<< HTML
        <form action="index.php" method="get">
            <input type="hidden" value="filtrar-listado" name="acc"/>
            <input class="btn-editar" type="submit" value="Filtrar"/>
        </form>
HTML;

    foreach($recetas as &$receta){
        echo <<< HTML
            <div class="wrap-receta">
HTML;

        echo '<a href="index.php?acc=receta&r='.$receta['id'].'">';
        echo <<< HTML
                    <div class="receta-lista">
HTML;
        echo '<img class="foto-receta-lista" src='.$receta['imagen'].'>';
        echo <<< HTML

                        <section id="info-lista-receta">
                            <h1>$receta[nombre]</h1>
                            <p class="info-lista-receta-texto">$receta[descripcion]</p>
                        </section>                

                    </div>
                </a>
            </div>
HTML;
    }

    echo "</section>";
}