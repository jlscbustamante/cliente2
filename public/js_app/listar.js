
$(document).ready(function() {

    $('#edit_paciente_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var vid = button.data('edit_vid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var modal = $(this)
        modal.find('.modal-title').text('Modificar paciente ID : ' + vid)
        modal.find('.modal-body input[name="edit_vid"]').val(vid)

        //var id = document.getElementById('vid').value;
        console.log('id : '+vid);
    
        $.ajax({
            type: "GET",
            url: '/api/pacientes/'+vid,
            processData: false,
            contentType: false,
            cache: false,
            //data: pacienteData,
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    //alert('se leyo el paciente correctamente.');
                    //$("submit[name='grabar_delete']").prop('disabled', false);
                    var paciente = resp.data;
    
                    $('#e_nombres').val(paciente.nombres);
                    $('#e_apellidos').val(paciente.apellidos);
                    $('#e_tipo_doc').val(paciente.tipo_doc);
                    $('#e_nro_doc').val(paciente.nro_doc);
                    $('#e_fecha_nac').val(paciente.fecha_nac);
                    
                } else {
                    alert('no fue posible leer los datos del paciente.');
                    
                }
            },
            dataType: "json",
            error: function(err) {
                console.log(err);
    
            }
        });
      });
      //fin de carga de edit en modal

      $('#delete_paciente_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var vid = button.data('delete_vid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var modal = $(this)
        modal.find('.modal-title').text('Eliminar paciente ID : ' + vid)
        modal.find('.modal-body input[name="delete_vid"]').val(vid)

        //var id = document.getElementById('vid').value;
        console.log('id : '+vid);
    
        $.ajax({
            type: "GET",
            url: '/api/pacientes/'+vid,
            processData: false,
            contentType: false,
            cache: false,
            //data: pacienteData,
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    //alert('se leyo el paciente correctamente.');
                    //$("submit[name='grabar_delete']").prop('disabled', false);
                    var paciente = resp.data;
    
                    $('#d_nombres').val(paciente.nombres);
                    $('#d_apellidos').val(paciente.apellidos);
                    $('#d_tipo_doc').val(paciente.tipo_doc);
                    $('#d_nro_doc').val(paciente.nro_doc);
                    $('#d_fecha_nac').val(paciente.fecha_nac);
                    
                } else {
                    alert('no fue posible leer los datos del paciente.');
                    
                }
            },
            dataType: "json",
            error: function(err) {
                console.log(err);
    
            }
        });
      })
      //fin de carga de eliminar en modal

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
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_paciente_modal" data-edit_vid="'+data.id+'">Editar</button>';
            }},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field                
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_paciente_modal" data-delete_vid="'+data.id+'">Eliminar</button>';
                
            }}
        ]
    });

});