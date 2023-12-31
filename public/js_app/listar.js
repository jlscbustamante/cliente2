
$(document).ready(function() {

      $("#edit_paciente_modal").appendTo("body");
      $("#lista_actividad_modal").appendTo("body");      
      $("#create_actividad_modal").appendTo("body");
      $("#edit_actividad_modal").appendTo("body");
      $("#delete_actividad_modal").appendTo("body");
      $("#lista_concepto_modal").appendTo("body");
      $("#create_concepto_modal").appendTo("body");
      $("#edit_concepto_modal").appendTo("body");
      $("#delete_concepto_modal").appendTo("body");
    
    //create_concepto_modal
    $('#lista_concepto_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        
        var vid = button.data('r2_pac_vid');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        if(typeof vid !== "undefined") {
            var modal = $(this)
            modal.find('.modal-title').text('Lista de Conceptos de ID : ' + vid)
            //modal.find('.modal-body input[name="d_act_vid"]').val(vid)
            modal.find('.modal-body input[name="cpt_pac_vid"]').val(vid)

            //var id = document.getElementById('vid').value;
            console.log('id Pac: '+vid);

        }else{
            console.log("Despues de clic en datepicker");
        }

        $('#f1_cpt_created_at').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,            
            //container: '#lista_actividad_modal modal-body'
        });

        $('#f2_cpt_created_at').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,            
            autoclose: true,            
            //container: '#lista_actividad_modal modal-body'
        });

      });    
      
    //fin evento concepto modal
       

    $('#lista_actividad_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        
        //r1_pac_vid es el id del paciente en el tag data- del boton Actividad
        var vid = button.data('r1_pac_vid'); //
        
        if(typeof vid !== "undefined") {
            console.log("Despues de clic en Boton detalle");
            var modal = $(this)
            modal.find('.modal-title').text('Actividades de paciente : ' + vid)
            
            modal.find('.modal-body input[name="pac_vid"]').val(vid)
            
            console.log('id Pac: '+vid);
            
        }else{
            console.log("Despues de clic en datepicker");
        }
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $('#f1_act_created_at').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,
            //container: '#lista_actividad_modal modal-body'
        });

        $('#f2_act_created_at').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,            
            autoclose: true,            
            //container: '#lista_actividad_modal modal-body'
        });

      });

    //fin evento actividad modal

    //evento show modal
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

      var f1="";//"1995-06-01";
      var f2="";//"1995-06-01";
      var f3="";//"Da";

      var mytable = $('#lista').dataTable({
        "searching":false,
        "bLengthChange": false,
        //"processing": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aProcessing": true,
        "aServerSide": true,       
        "cache": false,
        
        //"ajax": "/api/pacientes/show_by_filters/"+f1+"/"+f2+"/"+f3,
        "ajax": 
        {
            url: '/api/pacientes/show_by_filters',
            type: 'POST',
            "data": {
                startDate: function() { return $('#f1_fecha_nac').val() },
                endDate: function() { return $('#f2_fecha_nac').val() },
                nombre: function() { return $('#f3_nombre').val() },
               }
        },
        
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
                
            }},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field                
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lista_actividad_modal" data-r1_pac_vid="'+data.id+'">Actividad</button>';
                
            }},
            {data: null, render: function (data, type, row) {
                // Combine the first and last names into a single table field                
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lista_concepto_modal" data-r2_pac_vid="'+data.id+'">Concepto</button>';
                
            }},            
            
        ]
    });

    //datepickers

    //fin datepickers

      $("#filtrar_fecha_act").on('click',function(e){

        $('#lista').DataTable().ajax.reload();//Ok, funciono sin recargar la pagina                    
        
      });

    /*
    Actualiza el datatables
    Funciono para no tener que recargar toda la pagina
    
    function func(){
        console.log("Ran");
        $('#lista').DataTable().ajax.reload();
      }
      setInterval(func,1000);*/

});