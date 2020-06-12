<?php

function HTMLlogs($datos){
echo <<< HTML
    <section class="informacion">
    	<div class="cabecera-log">
        	<h1>Log del sistema</h1>
        </div>

        <ul class="items-log">
        	<li> <p> $datos['descripcion'] </p></li>
        </ul>
    </section>
HTML;
}