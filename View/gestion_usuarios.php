<?php

function HTMLgestionUsuarios($usuarios){
echo <<< HTML
<main id="bloque-principal">
    <section class="informacion-gestion-users">
    	<div class="cabecera-gestion-users">
        	<h1>Gestión de usuarios</h1>
        </div>
        <div class="indicar-accion">
        	<p>Indique la acción a realizar</p>
        </div>
        <div class="acciones">	
        	<a href="index.php?acc=registro">Añadir nuevo</a>	
        </div>

        <ul class="listado-usuarios">
HTML;

foreach($usuarios as $usuario){
echo <<< HTML
        	<li class="fila-usuario">
		       	<div class="imagenUser-gestion">
HTML;

echo '<img src='.$usuario['foto'].'>';
echo <<< HTML
	      		</div>
				<div class="datos-usuario-gestion">
					<div class="nombre-email">
						<div class="nombre">
							<div class="enunciado">Usuario:</div>
							<div class="dato">$usuario[nombre] $usuario[apellidos]</div>
						</div>
						<div class="email">
							<div class="enunciado">Email:</div>
							<div class="dato">$usuario[email]</div>
						</div>
					</div>

<!-- 					<div class="dir-tlf">
						<div class="dir">
							<div class="enunciado">Dirección:</div>
							<div class="dato">dirección usuario, 34</div>
						</div>
						<div class="tlf">
							<div class="enunciado">Teléfono:</div>
							<div class="dato">666789123</div>
						</div>
					</div>
 -->
					<div class="rol-estado">
						<div class="rol">
							<div class="enunciado">Rol:</div>
							<div class="dato">$usuario[tipo]</div>
						</div>
						<div class="estado">
							<div class="enunciado">Estado:</div>
							<div class="dato">Activo</div>
						</div>
						
					</div>
				</div>

				<div class="botones-user-gestion">
					<form action="index.php" method="get">
HTML;
echo '<input type="hidden" value='.$usuario['id'].' name="idusuario">';
echo <<< HTML
						<input type="hidden" value="usuario-editar" name="acc">
		        		<input class="btn-edit-user" type="image" src="View/img/pencil.png">
		    		</form>
					<form action="index.php" method="post">
HTML;

echo '<input type="hidden" value='.$usuario['id'].' name="idusuario">';
echo <<< HTML
                        <input type="hidden" value="usuario-eliminar" name="peticion">
		        		<input class="btn-del-user" type="image" src="View/img/delete.png">
		    		</form>
				</div>					  
            </li>
HTML;
}

echo <<< HTML
		</ul>
    
    </section>
    </div>
HTML;
}