$(document).ready(function() {
//$(function() {

    $("#crear_actividad").on('click',function(e){
        e.preventDefault();

        console.log('Crear');

        nombres = document.getElementById('c_nombres').value;
       
        const pacienteData = new FormData();
    
        pacienteData.append("nombres", nombres);
        
        /*
        'Authorization': 'Bearer ' + Laravel.apiToken,
        */
        
    
        $.ajax({
            type: "POST",
            url: '/api/actividads',
            processData: false,
            contentType: false,
            cache: false,
            data: pacienteData,
            // Añade un header:
            //headers: {'Authorization': 'Bearer '+ Laravel.apiToken},
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    alert('se creo la actividad correctamente.');
                    $('#create_actividad_modal').modal('hide');
                    //window.location.replace("/home");
                    $('#lista').DataTable().ajax.reload();//Ok, funciono sin recargar la pagina                    
                    
                } else {
                    for (const key in resp.data) {
                        //console.log(`${key} -> ${resp.data[key]}`);
                        alert(`${key} -> ${resp.data[key]}`)
                      }
                    
                }
            },
            dataType: "json",
            
            error: function(err) {
                console.log(err);
    
            }
        });

        return false;
    });

});