const input = document.getElementsByClassName("btn-del-user");

for(let i=0;i<input.length;i++){
    input[i].addEventListener('click',function(e){
        if(!confirm('Confirmar borrado de usuario'))
            e.preventDefault();
    })
}
