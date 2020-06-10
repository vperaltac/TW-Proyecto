<?php

/*
    Autores : 
        - Víctor Peralta Cámara
        - Jesús Ruiz Castellano
*/

function HTMLnueva_receta(){
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    <h2>Añadir nueva receta</h2>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            <label>Título: </label> 
            <input type="text" name="titulo" id="new-titulo">
            
            <label>Descripción:</label>
            <textarea type="text" name="descripcion" id="new-descripcion"></textarea>

            <label>Ingredientes: (separar ingredientes con #)</label> <textarea type="text" name="ingredientes" id="new-ingredientes"></textarea>

            <label>Preparación: (separar pasos con #)</label>
            <textarea type="text" name="preparacion" id="new-preparacion"></textarea>

            <div id="contenedor-categorias">
                <label class="checkcontainer">Carnes
                    <input type="checkbox" class="categoria" id="c1" name="carnes" value="Carnes">
                    <span class="checkmark"></span>
                </label> 

                <label class="checkcontainer">Pescados
                    <input type="checkbox" class="categoria" id="c2" name="pescados" value="Pescados">
                    <span class="checkmark"></span>
                </label>
                
                <label class="checkcontainer">Fácil
                    <input type="checkbox" class="categoria" id="c3" name="facil" value="Fácil">
                    <span class="checkmark"></span>
                </label>
            </div>

            <p>Imagen:
                <input name="img" type="file" id="imgPrincipal"/>
                <img src="" id="imgPrincipal-preview" width="150">
            </p>
HTML;

echo '<input type="hidden" name="idautor" value='.$_SESSION['id_usuario'].'>'; 
echo <<< HTML
            <input type="hidden" value="nueva-receta" name="peticion" />
            <input class="boton" type="submit" value="Añadir receta" name="nuevaReceta" id="nuevaReceta">
    </form>
    </section>
</div>

<script type="text/javascript" src="View/js/preview_imgs.js"></script>
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