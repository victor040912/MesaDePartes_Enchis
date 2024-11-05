

function init(){
    $("#documento_form").on("submit",function(e){
        guardar(e);
    });
}

function guardar(e){
    e.preventDefault();

    var formData = new FormData($("#documento_form")[0]);
    $.ajax({
        url:"../../controller/documento.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data);
        }
    });
}

$(document).ready(function() {

    $.post("../../controller/area.php?op=combo",function(data){
        $('#area_id').html(data);
    })
    
    $.post("../../controller/tramite.php?op=combo",function(data){
        $('#tra_id').html(data);
    })

    $.post("../../controller/tipo.php?op=combo",function(data){
        $('#tipo_id').html(data);
    });
});
