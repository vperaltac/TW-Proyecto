<?php

function HTMLgestionUsuarios(){
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
        	<a href="index.php?acc=listado-usuarios">Añadir nuevo</a>	
        </div>

        <ul class="listado-usuarios">
        	<li class="fila-usuario">
		       	<div class="imagenUser-gestion">
		       		<img src="View/img/user.jpg">
	      		</div>
				<div class="datos-usuario-gestion">
					<div class="nombre-email">
						<div class="nombre">
							<div class="enunciado">Usuario:</div>
							<div class="dato">Nombre Usuario</div>
						</div>
						<div class="email">
							<div class="enunciado">Email:</div>
							<div class="dato">usuario@email.com</div>
						</div>
					</div>

					<div class="dir-tlf">
						<div class="dir">
							<div class="enunciado">Dirección:</div>
							<div class="dato">dirección usuario, 34</div>
						</div>
						<div class="tlf">
							<div class="enunciado">Teléfono:</div>
							<div class="dato">666789123</div>
						</div>
					</div>

					<div class="rol-estado">
						<div class="rol">
							<div class="enunciado">Rol:</div>
							<div class="dato">Puto amo</div>
						</div>
						<div class="estado">
							<div class="enunciado">Estado:</div>
							<div class="dato">onfire</div>
						</div>
						
					</div>
				</div>

				<div class="botones-user-gestion">
					<form action="index.php" method="get">
						<input type="hidden" value="30" name="edi-user">
						<input type="hidden" value="edit-user" name="acc">
		        		<input class="btn-edit-user" type="image" src="View/img/pencil.png">
		    		</form>
					<form action="index.php" method="get">
						<input type="hidden" value="30" name="de-user">
						<input type="hidden" value="del-user" name="acc">
		        		<input class="btn-del-user" type="image" src="View/img/delete.png">
		    		</form>
				</div>					  
	        </li>

	        <li class="fila-usuario">
		       	<div class="imagenUser-gestion">
		       		<img src="View/img/user.jpg">
	      		</div>
				<div class="datos-usuario-gestion">
					<div class="nombre-email">
						<div class="nombre">
							<div class="enunciado">Usuario:</div>
							<div class="dato">Nombre Usuario user</div>
						</div>
						<div class="email">
							<div class="enunciado">Email:</div>
							<div class="dato">usuario2@email.com</div>
						</div>
					</div>

					<div class="dir-tlf">
						<div class="dir">
							<div class="enunciado">Dirección:</div>
							<div class="dato">dirección usuario, 35</div>
						</div>
						<div class="tlf">
							<div class="enunciado">Teléfono:</div>
							<div class="dato">666777888</div>
						</div>
					</div>

					<div class="rol-estado">
						<div class="rol">
							<div class="enunciado">Rol:</div>
							<div class="dato">menos amo</div>
						</div>
						<div class="estado">
							<div class="enunciado">Estado:</div>
							<div class="dato">apagado</div>
						</div>
						
					</div>
				</div>

				<div class="botones-user-gestion">
					<form action="index.php" method="get">
						<input type="hidden" value="30" name="edi-user">
						<input type="hidden" value="edit-user" name="acc">
		        		<input class="btn-edit-user" type="image" src="View/img/pencil.png">
		    		</form>
					<form action="index.php" method="get">
						<input type="hidden" value="30" name="de-user">
						<input type="hidden" value="del-user" name="acc">
		        		<input class="btn-del-user" type="image" src="View/img/delete.png">
		    		</form>
				</div>					
	        </li>		
		</ul>
    
    </section>
    </div>
HTML;
}