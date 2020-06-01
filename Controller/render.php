<?php
require_once 'View/comunes.php';
require_once 'View/receta.php';
require_once 'View/principal.php';
require_once 'View/contacto.php';
require_once 'View/listado.php';
require_once 'View/nueva_receta.php';
require_once 'Controller/usuario.php';
require_once 'Controller/contacto.php';
require_once 'Controller/recetas.php';

function renderizarReceta(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    $datos = recetas($_GET['r']);
    HTMLreceta($datos);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarContacto(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLcontacto();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarListado(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);

    $recetas = todasRecetas();
    HTMLlistado($recetas);
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();        
}

function renderizarPrincipal(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLprincipal();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarNuevaReceta(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLnueva_receta();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}

function renderizarNuevaRecetaError(){
    $admin = sesionIniciada();
    $cantidad = countRecetas();

    HTMLinicio();
    HTMLcabecera();
    HTMLnav($admin);
    HTMLnueva_recetaError();
    HTMLsidebar($admin,$cantidad['COUNT(*)']);
    HTMLfooter();
    HTMLfin();
}