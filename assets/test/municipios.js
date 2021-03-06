$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: 'carpeta/Municipios.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
        .done(function(respuesta){
            $('#municipio').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
}

$(document).on('change', '#departamento', function(){
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);
    }else {
        buscar_datos();
    }
});