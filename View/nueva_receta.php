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
            <input type="text" name="titulo">
            
            <label>Descripción:</label>
            <textarea type="text" name="descripcion"></textarea>

            <label>Ingredientes: (separar ingredientes con #)</label> <textarea type="text" name="ingredientes"></textarea>

            <label>Preparación: (separar pasos con #)</label>
            <textarea type="text" name="preparacion"></textarea>

            <label for="carnes">Carnes</label> 
            <input type="checkbox" id="c1" name="c1" value="Carnes">
            
            <label for="pescados">Pescados</label>
            <input type="checkbox" id="c2" name="c2" value="Pescados">

            <label for="facil">Fácil</label>
            <input type="checkbox" id="c3" name="c3" value="Fácil">

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