<?php

function HTMLlogs($datos){
echo <<< HTML
<main id="bloque-principal">
    <section class="informacion">
    	<div class="cabecera-log">
        	<h1>Log del sistema</h1>
        </div>
        <ul class="items-log">

    <table style="width:100%">
        <tr>
            <th>Fecha</th>
            <th>Descripción</th>
        </tr>
HTML;

    foreach($datos as $dato){
        echo "<tr>";
        echo "<td>$dato[fecha]</td>";
        echo "<td>$dato[descripcion]</td>";
        echo "</tr>";
    }

echo <<< HTML
    </table>
    </ul>
    </section>
</div>
HTML;
}