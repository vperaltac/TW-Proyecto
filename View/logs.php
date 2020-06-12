<?php

function HTMLlogs($datos){
echo <<< HTML
    <section>
    	<div class="cabecera-log">
        	<h1>Log del sistema</h1>
        </div>

        <ul class="items-log">
        	<li> <p> $datos['fecha'] <span> El usuario datos['']</span> </p></li>
        </ul>
    </section>
HTML;
}