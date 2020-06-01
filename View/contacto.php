<?php
function HTMLcontacto(){
    echo <<< HTML
    <main id="bloque-principal">
        <section class="info-contacto">
        <div class="texto-lateral">
                <h1>Contacto</h1>
        </div>

        <form class="formulario" method="POST">
            <div class="grupo-formulario">
                <label>Nombre: </label>
                <input type="text" name="nombre">
            </div>
            <div class="grupo-formulario">
                <label>Email: </label>
                <input type="text" name="email">
            </div>
            <div class="grupo-formulario">
                <label>Teléfono: </label>
                <input type="text" name="tlf">
            </div>
            <div class="grupo-formulario">
                <label>Mensaje: </label>
                <textarea name="mensaje"></textarea>
            </div>

            <input class="boton" type="submit" value="Enviar" name="">
        </form>
        </section>
HTML;
}

function HTMLcontactoExito(){
    echo <<< HTML
    <main id="bloque-principal">
        <section class="info-contacto">
        <div class="texto-lateral">
                <h1>Comentario enviado.</h1>
        </div>

        <form class="formulario" action="index.php?acc=principal">
            <input class="boton" type="submit" name="volver" value="Volver a inicio" />
        </form>
        </section>
HTML;
}

function HTMLcontactoError($errores, $campos){
    echo <<< HTML
    <main id="bloque-principal">
        <section class="info-contacto">
        <div class="texto-lateral">
HTML;

    foreach($errores as &$error){
        echo <<< HTML

        <p class="text-error">$error</p>
HTML;
    }

    echo <<< HTML
                <h1>Contacto</h1>
        </div>

        <form class="formulario" method="POST">
            <div class="grupo-formulario">
                <label>Nombre: </label>
HTML;

    echo '<input type ="text" name="nombre" value='.$campos['nombre'].'>'; 

    echo <<< HTML
            </div>
            <div class="grupo-formulario">
                <label>Email: </label>
HTML;

    echo '<input type="text" name="email" value='.$campos['email'].'>';

    echo <<< HTML
            </div>
            <div class="grupo-formulario">
                <label>Teléfono: </label>
HTML;

    echo '<input type="text" name="tlf" value='.$campos['tlf'].'>';

    echo <<< HTML
            </div>
            <div class="grupo-formulario">
                <label>Mensaje: </label>
HTML;

    echo '<textarea name="mensaje">';
    echo $campos['mensaje'];
    echo "</textarea>";

    echo <<< HTML
            </div>

            <input class="boton" type="submit" value="Enviar" name="">
        </form>
        </section>

HTML;
}