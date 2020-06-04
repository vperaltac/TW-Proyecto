<?php

function HTMLnueva_receta(){
echo <<< HTML
<main id="bloque-principal">
    <section class="info-contacto">
    <h2>Añadir nueva receta</h2>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="grupo-formulario">
            <label>Título: </label> 
            <input type="text" name="titulo">

            <label>Autor:</label> 
            <input type="text" name="autor">
            
            <label>Categoría:</label> 
            <input type="text" name="categoria">
            
            <label>Descripción:</label>
            <textarea type="text" name="descripcion"></textarea>

            <label>Ingredientes: (separar ingredientes con #)</label>
            <textarea type="text" name="ingredientes"></textarea>

            <label>Preparación: (separar pasos con #)</label>
            <textarea type="text" name="preparacion"></textarea>

            <label for="dificultad">Dificultad:</label>
            <select name="dificultad">
                <option value="facil">Fácil</option>
                <option value="dificil">Difícil</option>
            </select>

            <label>Tiempo:</label> 
            <input type="text" name="tiempo">

            <p>Imagen:
                <input name="img" type="file"/>
            </p>

            <input type="hidden" value="nueva-receta" name="peticion" />
            <input class="boton" type="submit" value="Añadir evento" name="guardarEvento" id="guardarEvento">
    </form>
    </section>
</div>
HTML;
}

function HTMLnueva_recetaError(){
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
            <p>Imagen: (la imagen debe estar en el directorio img de View)
                <form method="POST" enctype="multipart/form-data">
                    <input name="img" type="file"/>
                </form>
            </p>

            <input class="boton" type="submit" value="Añadir evento" name="guardarEvento" id="guardarEvento">
    </form>
    </section>
</div>
HTML;
}