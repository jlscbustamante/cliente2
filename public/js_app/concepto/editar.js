$(document).ready(function() {

    
        $("#editar_concepto").on('click',function(e){
        //$("#editar_paciente").submit(function(e){
            e.preventDefault();
    
            console.log('Edit Activ');
            //$("submit[name='nuevo_paciente']").prop('disabled', true);
            
            //return false;
    
            var id = document.getElementById('e_cpt_vid').value;
            var nombre = document.getElementById('e_cpt_nombre').value;
            var id_paciente = document.getElementById('e2_pac_vid').value;
            
            const pacienteData = new FormData();
        
            pacienteData.append("nombre", nombre);
            pacienteData.append("id_paciente", id_paciente);            
            pacienteData.append("_method", 'PUT');
                    
            $.ajax({
                type: "POST",
                url: '/api/conceptos/'+id,
                processData: false,
                contentType: false,
                cache: false,
                data: pacienteData,
                success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                    
                    if (resp.success==true){
                        alert('se modificó la concepto correctamente.');
                        $('#edit_concepto_modal').modal('hide');                        
                        //window.location.replace("/home");    
                        $('#lista_concept').DataTable().ajax.reload();//Ok, funciono sin recargar la pagina

                    } else {
                        for (const key in resp.data) {
                            //console.log(`${key} -> ${resp.data[key]}`);
                            alert(`${key} -> ${resp.data[key]}`)
                          }
                        
                    }
                },
                /*complete: function(){                                       
                    callFunctionAfterAjaxCallComplete();
                    
                    $.getScript( "js_app/lista_datatable.js", function( data, textStatus, jqxhr ) {
                        //console.log( data ); // Data returned
                        //console.log( textStatus ); // Success
                        //console.log( jqxhr.status ); // 200
                        //console.log( "Load was performed." );

                    });
                },*/
                dataType: "json",
                error: function(err) {
                    console.log(err);
        
                }
            });

            return false;
        });


/*        function callFunctionAfterAjaxCallComplete(){
            console.log('function has been called');
        }*/

    
    });