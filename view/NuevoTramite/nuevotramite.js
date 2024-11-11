
let arrDocument=[];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone('.dropzone',{
    url:'../../assets/document',
    maxFilesize: 2,
    maxFiles: 5,
    acceptedFiles: 'application/pdf',
    addRemoveLinks: true,
    dictRemoveFile: 'Quitar',
});

myDropzone.on('maxfilesexceeded',function(file){
    Swal.fire({
        title: "Mesa de Partes",
        text: "Solo se permiten un máximo de 5 archivos.",
        icon: "error",
        confirmButtonColor: "#5156be",
    });
    myDropzone.removeFile(file);
});

myDropzone.on('addedfile',function(file){
    if(file.size > 2 * 1024 * 1024){
        Swal.fire({
            title: "Mesa de Partes",
            text: 'El archivo "'+ file.name +'" excede el tamaño maximo de 2 MB.',       
            icon: "error",
            confirmButtonColor: "#5156be",
        });
        myDropzone.removeFile(file);
    }
});

myDropzone.on('addedfile',file=>{
    arrDocument.push(file);
});

myDropzone.on('removedfile',file=>{
    let i = arrDocument.indexOf(file);
    arrDocument.splice(i,1);
});

function init(){
    $("#documento_form").on("submit",function(e){
        guardar(e);
    });
}

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#documento_form")[0]);

    var totalfiles = arrDocument.length;
    for (var i=0;i < totalfiles ; i++){
        formData.append("file[]",arrDocument[i]);
    }

    $.ajax({
        url:"../../controller/documento.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){

            $('#documento_form')[0].reset();
            Dropzone.forElement('.dropzone').removeAllFiles(true);

            
            console.log(data);

            Swal.fire({
                title: "Mesa de Partes",
                html: "Su tramite a sido registrado con exito con Nro: "+ data + "",
                icon: "success",
                confirmButtonColor: "#5156be",
            });
        }
    })
}

$(document).ready(function() {

    $.post("../../controller/area.php?op=combo",function(data){
        $('#area_id').html(data);
    });

    $.post("../../controller/tramite.php?op=combo",function(data){
        $('#tra_id').html(data);
    });

    $.post("../../controller/tipo.php?op=combo",function(data){
        $('#tip_id').html(data);
    });

});

init();