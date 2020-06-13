const input = document.getElementById("boton-registro");
var confirmacion = false;

input.addEventListener('click',function(e){
    if(!confirmacion){
        e.preventDefault();
        confirmacion = true;

        document.getElementById("email-registro").disabled = true;
        document.getElementById("nombre-registro").disabled = true;
        document.getElementById("apellidos-registro").disabled = true;
        document.getElementById("pwd-registro").disabled = true;
        document.getElementById("pwdr-registro").disabled = true;
        document.getElementById("imgPrincipal").disabled = true;

        scrollToTop();
    }
    else{
        document.getElementById("email-registro").disabled = false;
        document.getElementById("nombre-registro").disabled = false;
        document.getElementById("apellidos-registro").disabled = false;
        document.getElementById("pwd-registro").disabled = false;
        document.getElementById("pwdr-registro").disabled = false;
        document.getElementById("imgPrincipal").disabled = false;
    }
})