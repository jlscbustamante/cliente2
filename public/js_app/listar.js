$(document).ready(function() {
    var mytable = $('#lista').dataTable({
        //"processing": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aProcessing": true,
        "aServerSide": true,
        "ajax": "/api/pacientes",
        "columns": [
            {data: 'nombres'},
            {data: 'apellidos'},
            {data: 'tipo_doc'},
            {data: 'nro_doc'},
            {data: 'fecha_nac'},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field
                return '<a href="/pacientes/edit/'+data.id+'">editar</a>';
            }},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field
                return '<a href="/pacientes/delete/'+data.id+'">eliminar</a>';
                //return '<form method="POST" action="/api/v1/pacientes/'+data.id+'"><input type="hidden" name="_method" value="DELETE" /><button>eliminar</button></form>';
                //return '<button class="clseliminar" data-id="'+data.id+'">eliminar</button>';
            }}
        ]
    });

    /*
    var td =  mytable.cell($(this).parents('td')).node();


    $(td).find('button').html('I was ckicked');*/

    $('#lista button.clseliminar').on('click', function(){
        // Reset form
        alert('fdfdf');
     });

});