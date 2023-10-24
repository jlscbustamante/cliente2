$(document).ready(function() {

    //eventos del boton nuevo
    //create_actividad_modal

    var f1="1995-06-01";
    var f2="1995-06-01";

    $('#edit_actividad_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        //var vid = $('#c_pac_vid').val(); // Extract info from data-* attributes

        var vid = button.data('edit_vid');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var modal = $(this)
        modal.find('.modal-title').text('Editar Actividad : ' + vid)
        //modal.find('.modal-body input[name="d_act_vid"]').val(vid)
        modal.find('.modal-body input[name="e_act_vid"]').val(vid);
        var pac_vid = $("#pac_vid").val();
        modal.find('.modal-body input[name="e_pac_vid"]').val(pac_vid);
        //e_pac_vid
        //pac_vid

        //var id = document.getElementById('vid').value;
        console.log('id Pac: '+vid);

        $.ajax({
            type: "GET",
            url: '/api/actividads/'+vid,
            processData: false,
            contentType: false,
            cache: false,
            //data: pacienteData,
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    //alert('se leyo el paciente correctamente.');
                    //$("submit[name='grabar_delete']").prop('disabled', false);
                    var actividad = resp.data;
    
                    $('#e_act_nombre').val(actividad.nombre);
                                       
                } else {
                    alert('no fue posible leer los datos de la actividad.');
                    
                }
            },
            dataType: "json",
            error: function(err) {
                console.log(err);
    
            }
        });

    });   
   
    var mytable_activ = $('#lista_activ').dataTable({
        //"processing": true,
        "searching":false,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aProcessing": true,
        "aServerSide": true,       
        "cache": false,
        autoWidth: false, 
        //"ajax": "/api/pacientes/show_by_filters/"+f1+"/"+f2+"/"+f3,
        "ajax": 
        {
            url: '/api/actividads/show_by_filters',
            type: 'POST',
            "data": {
                startDate: function() { return $('#f1_act_created_at').val() },
                endDate: function() { return $('#f2_act_created_at').val() },
                id_paciente : function() { return $('#pac_vid').val() },
                }
        },
        
        "columns": [
            {data: 'nombre'},
            {data: 'created_at'},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_actividad_modal" data-edit_vid="'+data.id+'">Editar</button>';
            }},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field                
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_actividad_modal" data-delete_vid="'+data.id+'">Eliminar</button>';
                
            }},
        ]
    });

    //
    $("#filtrar_act_created_at").on('click',function(e){

        $('#lista_activ').DataTable().ajax.reload();//Ok, funciono sin recargar la pagina                    

    });

});
