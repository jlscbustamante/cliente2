$(document).ready(function() {
//$(function() {

    $("#crear_concepto").on('click',function(e){
        e.preventDefault();

        console.log('Crear concepto');

        var nombre = document.getElementById('c_con_nombre').value;
        var vid = document.getElementById('c2_pac_vid').value;

        console.log('Id2 Pac : '+vid);
       
        const pacienteData = new FormData();
    
        pacienteData.append("nombre", nombre);
        pacienteData.append("id_paciente", vid);
        
        /*
        'Authorization': 'Bearer ' + Laravel.apiToken,
        */
        
        
    
        $.ajax({
            type: "POST",
            url: '/api/conceptos',
            processData: false,
            contentType: false,
            cache: false,
            data: pacienteData,
            // Añade un header:
            //headers: {'Authorization': 'Bearer '+ Laravel.apiToken},
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    alert('se creo el concepto correctamente.');
                    $('#create_concepto_modal').modal('hide');
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