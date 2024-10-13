
function init() {
    /* TODO: Escucha el evento submit del formulario */
    $("#mnt_form").on("submit", function (e) {
        /* TODO: Evita que el formulario se envíe automáticamente */
        e.preventDefault();
    });
}


function registrar(){
    var formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
        }
        
    });
}

init();

console.log("test");

