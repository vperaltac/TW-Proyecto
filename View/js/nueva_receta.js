const nuevaReceta = document.getElementById("nuevaReceta");

nuevaReceta.onclick = function() {
    let categorias   = document.getElementsByClassName("categoria");
    let titulo       = document.getElementById("new-titulo").value;
    let descripcion  = document.getElementById("new-descripcion").value; 
    let ingredientes = document.getElementById("new-ingredientes").value;
    let preparacion  = document.getElementById("new-preparacion").value;

    let imgPrincipal = document.getElementById('imgPrincipal').files[0];
    //let imgs         = document.getElementsByClassName("new-imgs");
    
    let request = new XMLHttpRequest();
    request.open('POST',"index.php?acc=nueva_receta");
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "titulo"           : titulo,
                                "categorias"       : categorias,
                                "descripcion"      : descripcion,
                                "ingredientes"     : ingredientes,
                                "preparacion"      : preparacion,
                                "imgPrincipal"     : imgPrincipal
                            }));
    request.onload = function(){
        window.location.href = "panel-control";
    }
}