<?php

function HTMLlogs($datos){
    $dato = $datos[0];
echo <<< HTML
    <section class="informacion">
    	<div class="cabecera-log">
        	<h1>Log del sistema</h1>
        </div>

        <ul class="items-log">
        	<li> <p> $dato[descripcion] </p></li>
        </ul>
    </section>
HTML;
}