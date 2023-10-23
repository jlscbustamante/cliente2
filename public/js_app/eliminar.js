$(document).ready(function() {
    //$(function() {

    var id = document.getElementById('delete_vid').value;

    /*$.ajax({
        type: "GET",
        url: '/api/pacientes/'+id,
        processData: false,
        contentType: false,
        cache: false,
        //data: pacienteData,
        success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
            
            if (resp.success==true){
                //alert('se leyo el paciente correctamente.');
                //$("submit[name='grabar_delete']").prop('disabled', false);
                var paciente = resp.data;

                $('#nombres').val(paciente.nombres);
                $('#apellidos').val(paciente.apellidos);
                $('#tipo_doc').val(paciente.tipo_doc);
                $('#nro_doc').val(paciente.nro_doc);
                $('#fecha_nac').val(paciente.fecha_nac);
                
            } else {
                alert('no fue posible leer los datos del paciente.');
                
            }
        },
        dataType: "json",
        error: function(err) {
            console.log(err);

        }
    });*/

        //$("#eliminar_paciente").submit(function(e){
        $("#eliminar_paciente").on('click',function(e){
            e.preventDefault();
    
            console.log('Delete Habil');
            //$("submit[name='nuevo_paciente']").prop('disabled', true);
            
            //return false;
    
            id = document.getElementById('delete_vid').value;            
        
                   
            $.ajax({
                type: "DELETE",
                url: '/api/pacientes/'+id,
                processData: false,
                contentType: false,
                cache: false,
               
                success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                    
                    if (resp.success==true){
                        alert('se eliminó el paciente correctamente.');
                        //window.location.replace("/home");
                        //$("#nuevo_paciente").prop('disabled', true);
                        $('#lista').DataTable().ajax.reload();//Ok, funciono sin recargar la pagina                    
                        
                    } else {
                        alert('No se pudo eliminar el registro.');

                        
                    }
                    $('#delete_paciente_modal').modal('hide');
                    
                },
                dataType: "json",
                error: function(err) {
                    console.log(err);
        
                }
            });
    
            return false;
        });
    
    });