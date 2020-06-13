<?php

function HTMLfiltrar(){
echo <<< HTML
<main id="bloque-principal">
    <section class="informacion">
    	<div class="cabecera-log">
        	<h1>Datos de la receta</h1>
        </div>

        <form class="formulario-filtrado" method="POST" enctype="multipart/form-data">
        
        <div class="grupo-formulario">
            <label>Buscar en título: </label> 
            <input type="text" name="buscaTit" id="buscaTit">

            <label>Buscar en receta: </label> 
            <input type="text" name="buscaRec" id="buscaRec">
            
            <div id="contenedor-categorias-filtro">
                <label class="checkcontainer">Carnes
                <span class="checkmark"></span>
                    <input type="checkbox" class="categoria" id="c1" name="categoria" value="carnes">
                    
                </label> 
                <label class="checkcontainer">Pescados
                    <input type="checkbox" class="categoria" id="c2" name="categoria" value="pescados">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Arroz
                    <input type="checkbox" class="categoria" id="c3" name="categoria" value="arroz">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Sopa
                    <input type="checkbox" class="categoria" id="c4" name="categoria" value="sopa">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Fácil
                    <input type="checkbox" class="categoria" id="c5" name="categoria" value="facil">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Difícil
                    <input type="checkbox" class="categoria" id="c6" name="categoria" value="dificil">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Ligero
                    <input type="checkbox" class="categoria" id="c7" name="categoria" value="ligero">
                    <span class="checkmark"></span>
                </label>
                <label class="checkcontainer">Pesado
                    <input type="checkbox" class="categoria" id="c8" name="categoria" value="pesado">
                    <span class="checkmark"></span>
                </label>
            </div> 
        </div>           
    	</form>

    	<div class="cabecera-log">
        	<h2>Ordenar por</h2>
        </div>

        <div id="contenedor-tipo-ordenacion">
        	<label class="checkcontainer2">
            	<input type="radio" class="ordenacion" id="o1" name="ordenacion" value="alfabetico">Alfabético
            	<span class="checkmark2"></span>
            </label>
            <label class="checkcontainer2">
         		<input type="radio" class="ordenacion" id="o2" name="ordenacion" value="masComentadas">De más a menos comentadas
         		<span class="checkmark2"></span>
         	</label>
         	<label class="checkcontainer2">
         		<input type="radio" class="ordenacion" id="o3" name="ordenacion" value="masPuntuacion">De más a menos puntuación
         		<span class="checkmark2"></span>
         	</label>
        </div>


        <div class="cabecera-log">
        	<p>Recetas por página</p>
        	<select name="recetasPorPagina">

				<option>3 recetas</option>
				<option>5 recetas</option>
				<option>10 recetas</option>

				<option selected></option>
			</select>
        </div>

        <div class="formulario-filtrado">
	        <input type="hidden" value="nuevo-filtro" name="peticion" />
	        <input class="boton" type="submit" value="Aplicar criterios de ordenación y búsqueda" name="aplicarFiltro" id="aplicarFiltro">
        </div>

    </section>

HTML;
}