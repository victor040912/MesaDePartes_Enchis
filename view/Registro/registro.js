function init() {
    /* Escucha el evento submit del formulario */
    $("#mnt_form").on("submit", function (e) {
        /* Evita que el formulario se envíe automáticamente */
        e.preventDefault();
        registrar();  // Asegúrate de que registrar() se llame aquí
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
            alert("Usuario registrado con éxito.");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud: " + textStatus, errorThrown);
            alert("Hubo un error al registrar el usuario.");
        }
    });
}

init();

