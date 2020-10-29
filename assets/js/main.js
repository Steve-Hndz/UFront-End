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
});

(() => {
    const departamentosSelect = document.getElementById('departamento')
    departamentosSelect.addEventListener('change', async (event) => {
        const municipiosSelectInput = document.getElementById('municipio')
        const departamentoId = document.getElementById('departamento').value
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
        const request = await fetch(`/web/Municipios.php?departamento=${departamentoId}`)
        const selectOptions = await request.text()
        municipiosSelectInput.innerHTML = selectOptions
    })
})()