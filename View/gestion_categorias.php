<?php

function HTMLgestionCategorias($datos){
echo <<< HTML
<main id="bloque-principal">
    <section class="informacion-categorias">
    	<div class="cabecera-categorias">
        	<h1>Gestión de categorias</h1>
        </div>

        <div class="cabecera-nueva-cat">
            <h2>Listado de categorías</h2>
        </div>

        <ul class="items-log">
    <table id="tabla-categorias" style="width:100%">
HTML;

    foreach($datos as $dato){
        echo "<tr>";
        echo "<td>$dato[nombre]";
        echo <<< HTML
            <div class="formulario-categoria">
            <form action="index.php" method="post">
HTML;
        echo '<input type="hidden" value='.$dato['id'].' name="idcategoria" />';
        echo <<< HTML
                <input type="hidden" value="eliminar-categoria" name="peticion">
                <input class="btn-del-user" type="image" src="View/img/delete.png">
            </form>
            </div></td>
HTML;
        echo "</tr>";
    }

echo <<< HTML
    </table>
    </ul>

        <div class="cabecera-nueva-cat">
            <h2>Añadir nueva categoría</h2>
        </div>

        <form class="formulario-filtrado" method="POST" enctype="multipart/form-data">
            <label>Inserta el nombre de la nueva categoría: </label> 
            <input type="text" name="newCat" id="newCat">

            <form action="index.php" method="get">
                <input type="hidden" value="nueva-categoria" name="peticion">
                <input class="btn-nueva-cat" type="submit" value="Añadir">
            </form>
        </form>

    </section>
</div>
HTML;
}



