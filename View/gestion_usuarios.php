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
        	<a href="index.php?acc=listado-usuarios">Listado</a>	
        	<a href="index.php?acc=listado-usuarios">Añadir nuevo</a>	
        </div>

        <div class="listado-usuarios">
	        <table>
				<tr>
					<th></th>
					<th></th> 
					<th></th>
				</tr>
				<tr>
					<td> <img src="imagenUsuario"> </td>
					<td>
						<tr>
							
						</tr>
						<tr>
							
						</tr>
						<tr>
							
						</tr>
					</td>
					<td>
						<tr>
							<form action="index.php" method="get">
								<input type="hidden" value="30" name="edi-user">
								<input type="hidden" value="edit-user" name="acc">
	                    		<input class="btn-edit-user" type="image" src="View/img/edit.png">
	                		</form>
	       	 				<form action="index.php" method="get">
								<input type="hidden" value="30" name="de-user">
								<input type="hidden" value="del-user" name="acc">
	                    		<input class="btn-del-user" type="image" src="View/img/close.png">
	                		</form>
	        			</tr>
					</td>
				</tr>
			</table>
		</div>
    
    </section>
    </div>
HTML;
}