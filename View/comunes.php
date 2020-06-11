<?php
function HTMLinicio(){
echo <<< HTML
    <!DOCTYPE html>
    <html lang="es-ES">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Víctor Peralta Cámara">
        <meta name="author" content="Jesús Ruiz Castellano">
        <link rel="stylesheet" type="text/css" href="View/css/estilo.css">
        <link rel="icon" href="View/img/burger-top.png" type="imgs">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi Página de recetas</title>
    </head>

    <body>
HTML;
}

function HTMLcabecera(){
echo <<< HTML
    <header class="cabecera">
        <img class="logo" src='View/img/burger-top.png' alt='logo'>
        <h1>Comida sana para todos los días</h1>
    </header>
HTML;
}

function HTMLnav($conectado){
    $add_receta = "";
    if($conectado == 1)
        $add_receta = "<a href='index.php?acc=nueva_receta'>Añadir nueva receta</a>";

echo <<< HTML
    <nav>
        <a href="index.php?acc=listado">Listado de recetas</a>
        $add_receta
        <a href="index.php?acc=contacto">Contacto</a>
    </nav>
HTML;
}


function HTMLsidebar($conectado,$cantidad){
    $widget_login = <<< HTML
        <section class="campo-lateral">
        <form action="index.php" id="login" method="post">
            <div class=cabecera-aside>
                <h2>Login</h2>
            </div> 

            <div class="grupo-formulario">
                <label for="uname"><p>Usuario</p></label>
                <input type="text" name="uname" id="email-inicio" required>
            </div>

            <div class="clr"></div>
            
            <div class="grupo-formulario">
                <label for="psw"><p>Clave</p></label>
                <input type="password" name="psw" id="pwd-inicio" required>
            </div>

            <input type="hidden" value="iniciar-sesion" name="peticion" />
            <input class="boton" type="submit" value="Login" name="" id="boton-inicio">
        </form>
    </section>
HTML;

    if($conectado){
        $widget_login = <<< HTML
            <section class="campo-lateral">
                  
                    <div class="nombreUsuario">
                        <p>$_SESSION[nombre] $_SESSION[apellidos]</p>
                    </div>

                    <div class="rolUsuario">
                        <p>$_SESSION[tipo]</p>
                    </div>

                    <div class="imgUsuario">
                        <img src="View/img/foto-carnet.jpg">    
                    </div>

                    <div class="botones-usuario">
                        <form action="index.php" method="post">
                            <input type="hidden" value="desconectar" name="peticion" />
                            <input class="btn-desconectar" type="submit" name="logout" value="Desconectar" />
                        </form>

                        <form action="index.php" method="post">
                            <input type="hidden" value="editar" name="peticion" />
                            <input class="btn-editar" type="submit" name="edit" value="Editar" />
                        </form>
                    </div>
            </section>
HTML;
    }


echo <<< HTML
    <aside class="barra-lateral">

    $widget_login

    <section id="mas-valoradas" class="campo-lateral">
        <div class=cabecera-aside>
            <h2>+ valoradas</h2>
        </div>

        <ol>
            <li>Risotto de calabaza y champiñones</li>
            <li>Pollo al salmorejo</li>
            <li>Ensalada de espinacas y mango</li>
        </ol>
    </section>

    <section id="n-recetas" class="campo-lateral">
        <div class=cabecera-aside>
            <h2>nº recetas</h2>
        </div>

        <p>el sitio contiene $cantidad recetas diferentes</p>
    </section>
    </aside>
    </main>
HTML;
}

function HTMLfin(){
echo <<< HTML
    </body>
    </html>
HTML;
}

function HTMLfooter(){
echo <<< HTML
    <footer>
        <p> <a href="https://www.ugr.es/estudiantes/grados/grado-ingenieria-informatica/tecnologias-web-tecnologias-informacion" target="_blank">&copy; 2020 Tecnologías Web,</a> <a href="mailto:victorperalta@correo.ugr.es"> Víctor Peralta Cámara,</a> <a href="mailto:jesusruiz@correo.ugr.es"> Jesús Ruiz Castellano</a> | <a href="#">Mapa del sitio</a> | <a href="TW-ProyectoFinal.pdf" target="_blank"> Documentación</a></p>
    </footer>
HTML;
}