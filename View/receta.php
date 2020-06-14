<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLreceta($datos){
    if(isset($_SESSION['id_usuario']) and $_SESSION["id_usuario"] == $datos['idautor'])
        $receta_propia = 1;
    else
        $receta_propia = 0;

    if(isset($_SESSION['id_usuario']))
        echo '<input type="hidden" id="valoracion-idusuario" value='.$_SESSION['id_usuario'].' name="valoracion-idusuario">';

echo '<input type="hidden" id="valoracion" value='.$datos['valoracion'].' name="valoracion">';
echo <<< HTML
    <main id="bloque-principal">
        <section class="informacion">
            <div class="cabecera-receta">
                <h1>$datos[nombre]</h1>
                <form class="form-Valoracion">
                    <p class="clasificacion">
                        <!-- Para vincular una etiqueta <label> con un elemento de entrada <input>,  el valor del atributo for de <label> tiene que ser igual al valor del atributo id del <input>
                        Los comentarios son para que las estrellas aparezcan juntas -->
                        <input id="radio1" class="estrellas" type="radio" name="estrellas" value="5"><!--
                        --><label for="radio1">★</label><!--
                        --><input id="radio2" class="estrellas" type="radio" name="estrellas" value="4"><!--
                        --><label for="radio2">★</label><!--
                        --><input id="radio3" class="estrellas" type="radio" name="estrellas" value="3"><!--
                        --><label for="radio3">★</label><!--
                        --><input id="radio4" class="estrellas" type="radio" name="estrellas" value="2"><!--
                        --><label for="radio4">★</label><!--
                        --><input id="radio5" class="estrellas" type="radio" name="estrellas" value="1"><!--
                        --><label for="radio5">★</label>
                  </p>
                </form>
            </div>


            <div class="tags-autor">
                <div class="tags">$datos[categorias]</div>
                <div class="autor">Autor: $datos[autor]</div>
            </div>

            <section id="descripcion">
HTML;

echo '<img class="foto-receta" src="'.$datos['imagen'].'">';

echo <<< HTML
            <p class="descripcion-texto">$datos[descripcion]</p>
            </section>

            <div class="info-ingredientes">            
                <section id="ingredientes">
                    <h3>Ingredientes</h3>
                    <ul>
HTML;

foreach($datos['ingredientes'] as &$ingr)
    echo"<li>$ingr</li>";

echo <<< HTML
                    </ul>
                </section>
            </div>
            <ol>
HTML;

foreach($datos['preparacion'] as &$prep)
    echo "<li><p>$prep</p></li>";

echo <<< HTML
            </ol>

            <div class="galeria">
HTML;


foreach($datos['pasos'] as $paso)
    echo "<div class='galeria-imagen'><img src='$paso[fichero]'></div>";

echo <<< HTML
            </div>
            <section class="comentarios">
HTML;

foreach($datos['comentarios'] as $comentario){
echo <<< HTML
                <div class="comentario">
                    <div class="comentario-fecha">$comentario[fecha].</div>
                    <div class="comentario-usuario">$comentario[nombre] $comentario[apellidos]</div>
                    <div class="comentario-texto">$comentario[comentario]</div>    
                
                    <div class="botones-gestion-comentarios">
						<form action="index.php" method="get">
							<input type="hidden" value="30" name="edi-user">
							<input type="hidden" value="edit-user" name="acc">
			        		<input class="btn-edit-com" type="image" src="View/img/pencil.png">
			    		</form>
						<form action="index.php" method="get">
							<input type="hidden" value="30" name="de-user">
							<input type="hidden" value="del-user" name="acc">
			        		<input class="btn-del-com" type="image" src="View/img/delete.png">
			    		</form>
					</div>

                </div>
HTML;
}
echo <<< HTML
            </section>
            <section class="paginas">
HTML;

if($receta_propia or $_SESSION['tipo'] == "administrador"){
echo <<< HTML
                <form action="index.php" method="post">
                    <input type="hidden" value="receta-eliminar" name="peticion" />
HTML;

echo '<input type="hidden" value='.$datos['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$datos['id'].' name="idreceta" />';
echo <<< HTML
                    <input class="btn-eliminar-receta" id="btn-eliminar-receta" type="image" src="View/img/close.png" />
                </form>

                <form action="index.php" method="get">
                    <input type="hidden" value="receta-editar" name="acc" />
HTML;
echo '<input type="hidden" value='.$datos['idautor'].' name="idautor" />';
echo '<input type="hidden" value='.$datos['id'].' name="idreceta" />';
echo <<< HTML
                    <input class="btn-editar-receta" type="image" src="View/img/edit.png" />
                </form>
HTML;
}

echo <<< HTML
                <form action="index.php" method="get">
HTML;

echo '<input type="hidden" value='.$datos['id'].' name="idreceta" />';
echo <<< HTML
                    <input type="hidden" value="nuevo-comentario" name="acc" />
                    <input class="btn-comentar-receta" type="image" src="View/img/mail.png" />
                </form>
            </section>
        </section>
        <script type="text/javascript" src="View/js/evaluar_receta.js"></script>
        <script type="text/javascript" src="View/js/eliminar_receta.js"></script>
HTML;
}
