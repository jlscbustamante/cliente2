$(document).ready(function() {

/*    var id = document.getElementById('vid').value;
    console.log('id : '+id);

    $.ajax({
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
    });
*/
    
        $("#editar_paciente").on('click',function(e){
        //$("#editar_paciente").submit(function(e){
            e.preventDefault();
    
            console.log('Habil');
            //$("submit[name='nuevo_paciente']").prop('disabled', true);
            
            //return false;
    
            id = document.getElementById('edit_vid').value;
            nombres = document.getElementById('e_nombres').value;
            apellidos = document.getElementById('e_apellidos').value;
            tipo_doc = document.getElementById('e_tipo_doc').value;
            nro_doc = document.getElementById('e_nro_doc').value;
            fecha_nac = document.getElementById('e_fecha_nac').value;
        
            //'nro_doc'=>'required|numeric|digits_between:8,20', 'tipo_doc'=>'required|alpha'
            //, 'nombres'=>'required', 'apellidos'=>'required', 'fecha_nac'=>'required|date_format:Y-m-d'
        
            const pacienteData = new FormData();
        
            pacienteData.append("nombres", nombres);
            pacienteData.append("apellidos", apellidos);
            pacienteData.append("tipo_doc", tipo_doc);
            pacienteData.append("nro_doc", nro_doc);
            pacienteData.append("fecha_nac", fecha_nac);
            pacienteData.append("_method", 'PUT');
            
        
            $.ajax({
                type: "POST",
                url: '/api/pacientes/'+id,
                processData: false,
                contentType: false,
                cache: false,
                data: pacienteData,
                success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                    
                    if (resp.success==true){
                        alert('se modificó el paciente correctamente.');
                        $('#edit_paciente_modal').modal('hide');                        
                        window.location.replace("/home");                        

                    } else {
                        for (const key in resp.data) {
                            //console.log(`${key} -> ${resp.data[key]}`);
                            alert(`${key} -> ${resp.data[key]}`)
                          }
                        
                    }
                },
                /*complete: function(){                                       
                    callFunctionAfterAjaxCallComplete();
                },*/
                dataType: "json",
                error: function(err) {
                    console.log(err);
        
                }
            });

            return false;
        });


        function callFunctionAfterAjaxCallComplete(){
            console.log('function has been called');
        }

    
    });