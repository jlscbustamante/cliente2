$(document).ready(function() {
//$(function() {

    $("#crear_paciente").on('click',function(e){
        e.preventDefault();

        console.log('Crear');
        //$("submit[name='nuevo_paciente']").prop('disabled', true);
        
        //return false;

        nombres = document.getElementById('c_nombres').value;
        apellidos = document.getElementById('c_apellidos').value;
        tipo_doc = document.getElementById('c_tipo_doc').value;
        nro_doc = document.getElementById('c_nro_doc').value;
        fecha_nac = document.getElementById('c_fecha_nac').value;
    
        //'nro_doc'=>'required|numeric|digits_between:8,20', 'tipo_doc'=>'required|alpha'
        //, 'nombres'=>'required', 'apellidos'=>'required', 'fecha_nac'=>'required|date_format:Y-m-d'
    
        const pacienteData = new FormData();
    
        pacienteData.append("nombres", nombres);
        pacienteData.append("apellidos", apellidos);
        pacienteData.append("tipo_doc", tipo_doc);
        pacienteData.append("nro_doc", nro_doc);
        pacienteData.append("fecha_nac", fecha_nac);

        /*
        'Authorization': 'Bearer ' + Laravel.apiToken,
        */
        
    
        $.ajax({
            type: "POST",
            url: '/api/pacientes',
            processData: false,
            contentType: false,
            cache: false,
            data: pacienteData,
            // Añade un header:
            //headers: {'Authorization': 'Bearer '+ Laravel.apiToken},
            success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                
                if (resp.success==true){
                    alert('se creo el paciente correctamente.');
                    $('#create_paciente_modal').modal('hide');
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