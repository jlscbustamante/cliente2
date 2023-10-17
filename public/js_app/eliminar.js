$(document).ready(function() {
    //$(function() {
    
        $("#eliminar_paciente").submit(function(e){
            e.preventDefault();
    
            console.log('Habil');
            //$("submit[name='nuevo_paciente']").prop('disabled', true);
            
            //return false;
    
            id = document.getElementById('idv').value;            
        
                   
            $.ajax({
                type: "DELETE",
                url: '/api/pacientes/'+id,
                processData: false,
                contentType: false,
                cache: false,
               
                success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                    
                    if (resp.success==true){
                        alert('se eliminó el paciente correctamente.');
                       
                        //$("#nuevo_paciente").prop('disabled', true);
                        
                    } else {
                        alert('No se pudo eliminar el registro.');

                        
                    }
                    window.location.replace("/lista");
                },
                dataType: "json",
                error: function(err) {
                    console.log(err);
        
                }
            });
    
            return false;
        });
    
    });