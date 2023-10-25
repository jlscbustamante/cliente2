$(document).ready(function() {
    
        $("#eliminar_concepto").on('click',function(e){
        //$("#editar_paciente").submit(function(e){
            e.preventDefault();
    
            console.log('Elim Activ');
            
            var id = document.getElementById('d_cpt_vid').value;
            var id_paciente = document.getElementById('d2_pac_vid').value;
            const pacienteData = new FormData();
        
                    
            $.ajax({
                type: "DELETE",
                url: '/api/conceptos/'+id,
                processData: false,
                contentType: false,
                cache: false,        
                success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                    
                    if (resp.success==true){
                        alert('se eliminó la concepto correctamente.');
                        $('#delete_concepto_modal').modal('hide');                        
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