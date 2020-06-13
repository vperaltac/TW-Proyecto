<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLnueva_receta($categorias,$nueva,$datos){
    if($nueva){
        $input = '<input type="hidden" id="peticion" value="nueva-receta" name="peticion" />';
        $input .= '<input class="boton" type="submit" value="Añadir receta" name="nuevaReceta" id="nuevaReceta">';
        $titulo = '<h1>Añadir nueva receta</h1>';
    }
    else{
        $input = '<input type="hidden" id="peticion" value="editar-receta" name="peticion" />';
        $input .= '<input class="boton" type="submit" value="Editar receta" name="editarReceta" id="editarReceta">';
        $titulo = '<h1>Editar receta</h1>';
    }

    
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    
    <div class="cabecera-receta">
        $titulo
    </div>
    
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            <label>Título: </label> 
HTML;

echo "<input type ='text' name='titulo' id='new-titulo' value='$datos[nombre]'>";
echo '<label>Descripción:</label>';
echo '<textarea type="text" id="new-descripcion" name="descripcion">';
echo $datos['descripcion'];
echo "</textarea>";

echo '<label>Ingredientes: (separar ingredientes con #)</label>';
echo '<textarea type="text" id="new-ingredientes" name="ingredientes">';
echo $datos['ingredientes'];
echo "</textarea>";

echo '<label>Preparación: (separar pasos con #)</label>';
echo '<textarea type="text" id="new-preparacion" name="preparacion">';
echo $datos['preparacion'];
echo "</textarea>";

foreach($categorias as $categoria){
echo <<< HTML
    <div id="contenedor-categorias">
        <label class="checkcontainer">$categoria[nombre]
HTML;

if(in_array($categoria['nombre'],$datos['categorias']))
    echo '<input type="checkbox" checked class="categoria" id="c1" name="categoria" value='.$categoria['nombre'].'>';
else
    echo '<input type="checkbox" class="categoria" id="c1" name="categoria" value='.$categoria['nombre'].'>';

echo '<span class="checkmark">';

echo '</span>';
echo <<< HTML
        </label> 
    </div>
HTML;
}

echo <<< HTML

            <p>Imagen:
                <input name="img" type="file" id="imgPrincipal"/>
                <img src="" id="imgPrincipal-preview" width="150">
            </p>
HTML;

echo '<input type="hidden" id="idautor" name="idautor" value='.$_SESSION['id_usuario'].'>'; 
echo <<< HTML
            $input
    </form>

    <div class="cabecera-receta">
        <h2>Fotografías adjuntas</h2>
    </div>

    <div id="imgs-pasos-receta">
HTML;

echo <<< HTML
        <div class="img-paso-receta">
            <img src="" class="img-pasos-preview" width="150">
            <input type="hidden" class="btn-eliminar btn-pasos" name="logout" value="Borrar" />
            <input name="img-pasos" type="file" class="imgs-pasos"/>
        </div>
HTML;


for ($x = 0; $x <= 10; $x++) {
echo <<< HTML
        <div hidden class="img-paso-receta">
            <img src="" class="img-pasos-preview" width="150">
            <input type="hidden" class="btn-eliminar btn-pasos" name="logout" value="Borrar" />
            <input name="img-pasos" type="file" class="imgs-pasos"/>
        </div>
HTML;
}

echo <<< HTML
    </section>
</div>

<script type="text/javascript" src="View/js/nueva_receta.js"></script>
HTML;
}