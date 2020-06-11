const input = document.getElementById("imgPrincipal");
const preview = document.getElementById("imgPrincipal-preview");
const input_imgs = document.getElementsByClassName("imgs-pasos");
const preview1 = document.getElementsByClassName("img-pasos-preview");
const img_paso = document.getElementsByClassName("img-paso-receta");
const boton_img_paso = document.getElementsByClassName("btn-pasos");
const enviar_receta  = document.getElementById("nuevaReceta");
const checkedBoxes = document.getElementsByName("categoria");

enviar_receta.addEventListener("click", function(e){
    e.preventDefault();


    const titulo = document.getElementById("new-titulo").value;
    const descripcion = document.getElementById("new-descripcion").value;
    const ingredientes = document.getElementById("new-ingredientes").value;
    const preparacion = document.getElementById("new-preparacion").value;
    const idautor = document.getElementById("idautor").value;
    const img = input.files[0];

    let datos_receta = new FormData();
    datos_receta.append('peticion','nueva-receta');
    datos_receta.append('titulo',titulo);
    datos_receta.append('descripcion',descripcion);
    datos_receta.append('ingredientes',ingredientes);
    datos_receta.append('preparacion',preparacion);
    datos_receta.append('idautor',idautor);
    datos_receta.append('img',img);

    for(let i=0;i<checkedBoxes.length;i++){
        if(checkedBoxes[i].checked)
            datos_receta.append(checkedBoxes[i].value,checkedBoxes[i].value);
    }

    let peticion = new XMLHttpRequest();
    peticion.open('POST',"index.php");
    peticion.send(datos_receta);
    peticion.onload = function(){
        let data = new FormData();
        data.append("peticion","subir-paso-receta");
        let titulo  = document.getElementById("new-titulo").value;
        data.append("titulo",titulo);
    
        for(let i=0;i<input_imgs.length;i++){
            if(input_imgs[i].files[0])
                data.append('img' + i,input_imgs[i].files[0]);
        }
    
        let request = new XMLHttpRequest();
        request.open('POST',"index.php");
        request.send(data);    
    }
});

for(let i=0;i<input_imgs.length;i++){
    input_imgs[i].addEventListener("change", function(){
        const img = this.files[0];

        const reader = new FileReader();
    
        reader.addEventListener("load", function(){
            preview1[i].setAttribute("src", this.result);
        });
    
        reader.readAsDataURL(img);

        boton_img_paso[i].setAttribute("type","submit");
        if(i+1 < input_imgs.length-1)
            img_paso[i+1].removeAttribute("hidden");
    });
}

for(let i=0;i<boton_img_paso.length;i++){
    boton_img_paso[i].addEventListener("click", function(e){
        e.preventDefault();
        
        input_imgs[i].value = "";
        preview1[i].setAttribute("src","");
        this.setAttribute("type","hidden");
    })
}

input.addEventListener("change", function(){
    const imgPrincipal = this.files[0];

    const reader = new FileReader();

    reader.addEventListener("load", function(){
        preview.setAttribute("src", this.result);
    });

    reader.readAsDataURL(imgPrincipal);
});