<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLnueva_receta($categorias){
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    
    <div class="cabecera-receta">
        <h2>Añadir nueva receta</h2>
    </div>
    
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            <label>Título: </label> 
            <input type="text" name="titulo" id="new-titulo">
            
            <label>Descripción:</label>
            <textarea type="text" name="descripcion" id="new-descripcion"></textarea>

            <label>Ingredientes: (separar ingredientes con #)</label> <textarea type="text" name="ingredientes" id="new-ingredientes"></textarea>

            <label>Preparación: (separar pasos con #)</label>
            <textarea type="text" name="preparacion" id="new-preparacion"></textarea>
HTML;

foreach($categorias as $categoria){
echo <<< HTML
    <div id="contenedor-categorias">
        <label class="checkcontainer">$categoria[nombre]
HTML;

echo '<input type="checkbox" class="categoria" id="c1" name="categoria" value='.$categoria['nombre'].'>';
echo <<< HTML
            <span class="checkmark"></span>
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
            <input type="hidden" value="nueva-receta" name="peticion" />
            <input class="boton" type="submit" value="Añadir receta" name="nuevaReceta" id="nuevaReceta">
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

function HTMLnueva_recetaError($data){
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    <p class="text-error">Es obligatorio rellenar todos los campos</p>
    <h2>Añadir nueva receta</h2>
    <form class="formulario" method="POST">
        <div class="grupo-formulario">
            <label>Título: </label> 
HTML;

echo '<input type ="text" name="titulo" value='.$_POST['titulo'].'>'; 

echo <<< HTML

            <label>Autor:</label> 
HTML;
echo '<input type ="text" name="autor" value='.$_POST['autor'].'>'; 
echo <<< HTML
<label>Categoría:</label>
HTML;
echo '<input type ="text" name="categoria" value='.$_POST['categoria'].'>'; 

echo '<label>Descripción:</label>';
echo '<textarea type="text" name="descripcion">';
echo $_POST['descripcion'];
echo "</textarea>";

echo '<label>Ingredientes: (separar ingredientes con #)</label>';
echo '<textarea type="text" name="ingredientes">';
echo $_POST['ingredientes'];
echo "</textarea>";

echo '<label>Preparación: (separar pasos con #)</label>';
echo '<textarea type="text" name="preparacion">';
echo $_POST['preparacion'];
echo "</textarea>";

echo <<< HTML
            <label for="dificultad">Dificultad:</label>
            <select name="dificultad">
                <option value="facil">Fácil</option>
                <option value="dificil">Difícil</option>
            </select>

            <label>Tiempo:</label> 
HTML;

echo '<input type ="text" name="tiempo" value='.$_POST['tiempo'].'>'; 

echo <<< HTML
            <p>Imagen:
                <input name="img" type="file" id="imgPrincipal"/>
                <img src="" id="imgPrincipal-preview" width="150">
            </p>

            <input type="hidden" value="nueva-receta" name="peticion" />
            <input class="boton" type="submit" value="Añadir evento" name="guardarEvento" id="guardarEvento">
    </form>
    </section>
</div>

<script type="text/javascript" src="View/js/preview_imgs.js"></script>
HTML;
}