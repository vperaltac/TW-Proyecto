<?php

function HTMLgestionCategorias($datos){
echo <<< HTML
<main id="bloque-principal">
    <section class="informacion">
    	<div class="cabecera-log">
        	<h1>Gestión de categorias</h1>
        </div>
        <ul class="items-log">
    <table id="tabla-log" style="width:100%">
    <form action="index.php" method="get">
            <input type="hidden" value="nueva-categoria" name="acc">
            <input class="btn-editar" type="submit" value="Nueva categoria">
    </form>
HTML;

    foreach($datos as $dato){
        echo "<tr>";
        echo "<td>$dato[nombre]</td>";
        echo "<td><input type='submit' class='btn-eliminar btn-pasos' name='logout' value='Borrar'></td>";
        echo "</tr>";
    }

echo <<< HTML
    </table>
    </ul>
    </section>
</div>
HTML;
}