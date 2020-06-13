const input = document.getElementById("btn-eliminar-receta");

input.addEventListener('click',function(e){
    if(!confirm('Confirmar borrado de receta'))
        e.preventDefault();
})