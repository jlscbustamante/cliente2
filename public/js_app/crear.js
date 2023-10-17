$(document).ready(function() {
//$(function() {

    $("#nuevo_paciente").submit(function(e){
        e.preventDefault();

        console.log('Habil');
        //$("submit[name='nuevo_paciente']").prop('disabled', true);
        
        //return false;

        nombres = document.getElementById('nombres').value;
        apellidos = document.getElementById('apellidos').value;
        tipo_doc = document.getElementById('tipo_doc').value;
        nro_doc = document.getElementById('nro_doc').value;
        fecha_nac = document.getElementById('fecha_nac').value;
    
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
                    //$("submit[name='grabar_delete']").prop('disabled', false);
                    $("#nuevo_paciente").prop('disabled', true);
                    window.location.replace("/home");
                    
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