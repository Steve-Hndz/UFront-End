const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.navbar__links');
const links = document.querySelector('.navbar__links li');
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle("open");
});


$(document).ready(function(){
    $('#tblDonantes').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    })

    $('#tblPacientes').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    })
})
$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: `/web/Municipios.php?departamento=${consulta}`,
        type: 'POST',
        dataType: 'html',
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
        console.log(valor)
        buscar_datos(valor);
    }else {
        buscar_datos();
    }
});

/* (() => {
    const departamentosSelect = document.getElementById('departamento')
    departamentosSelect.addEventListener('change', (event) => {
        const value = document.getElementById('departamento').value
        console.log(value)
    })
})()

 */