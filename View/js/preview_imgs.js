const input = document.getElementById("imgPrincipal");
const preview = document.getElementById("imgPrincipal-preview");

input.addEventListener("change", function(){
    const imgPrincipal = this.files[0];

    const reader = new FileReader();

    reader.addEventListener("load", function(){
        preview.setAttribute("src", this.result);
    });

    reader.readAsDataURL(imgPrincipal);
    console.log(imgPrincipal);
});