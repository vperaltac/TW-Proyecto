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
HTML;

if((isset($_SESSION['tipo']) and $_SESSION['tipo'] == 'administrador') or (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] == $receta['idautor'])){
echo <<< HTML
                    <div class="botones-listado">
                        <form action="index.php" method="post">
HTML;
echo '<input type="hidden" value='.$receta['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$receta['id'].' name="idreceta" />';
echo <<< HTML
                            <input type="hidden" value="receta-eliminar" name="peticion" />
                            <input class="btn-eliminar-receta" id="btn-eliminar-receta" type="image" src="View/img/close.png" />
                        </form>

                        <form action="index.php" method="get">
HTML;
echo '<input type="hidden" value='.$receta['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$receta['id'].' name="idreceta" />';
echo <<< HTML
                            <input type="hidden" value="receta-editar" name="acc" />
                            <input class="btn-editar-receta" type="image" src="View/img/edit.png" />
                        </form>
                    </div>
HTML;
}

echo <<< HTML
                </div>
            </a>
        </div>    
HTML;
}

echo <<< HTML
<div class="paginas-listado">
    <form action="index.php" method="post">
        <input type="hidden" value="receta-eliminar" name="peticion" />
        <input class="btn-eliminar-receta" id="btn-eliminar-receta" type="image" src="View/img/pprev.png" />
    </form>
    <form action="index.php" method="post">
        <input type="hidden" value="receta-eliminar" name="peticion" />
        <input class="btn-eliminar-receta" id="btn-eliminar-receta" type="image" src="View/img/rprev.png" />
    </form>
    <form action="index.php" method="post">
        <input type="hidden" value="receta-eliminar" name="peticion" />
        <input class="btn-eliminar-receta" id="btn-eliminar-receta" type="image" src="View/img/rnext.png" />
    </form>
    <form action="index.php" method="get">
        <input type="hidden" value="receta-editar" name="acc" />
        <input class="btn-editar-receta" type="image" src="View/img/pnext.png" />
    </form>
</div> 
HTML;

    echo "</section>";
    echo '<script type="text/javascript" src="View/js/eliminar_receta.js"></script>';
}