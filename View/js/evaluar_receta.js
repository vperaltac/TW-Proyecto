const input_val = document.getElementsByClassName("estrellas");
const valoracion = document.getElementById("valoracion");

for(let i=0;i<input_val.length;i++){
    if(valoracion.value == input_val[i].value)
        input_val[i].setAttribute('checked','checked');

    input_val[i].addEventListener('click',function(e){
        let idautor = document.getElementsByName('idautor');
        let idreceta = document.getElementsByName('idreceta');

        if (typeof idautor !== 'undefined' && typeof idreceta !== 'undefined') {
            let datos_eval = new FormData();
            datos_eval.append('peticion','evaluar-receta');
            datos_eval.append('valor',input_val[i].value);
            datos_eval.append('idautor',document.getElementById('valoracion-idusuario').value);
            datos_eval.append('idreceta',idreceta[0].value);

            let peticion = new XMLHttpRequest();
            peticion.open('POST',"index.php");
            peticion.send(datos_eval);    
        }
    })
}