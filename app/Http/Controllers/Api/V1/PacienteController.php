<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\PacientePostRequest;

class PacienteController extends Controller
{

    public function __construct()
	{
		//$this->middleware('auth.basic',['only'=>['store','update','destroy']]);
	}   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();

        $total_records=$pacientes->count();

        $dataset = array(
            "echo" => 1,
            "totalrecords" => $total_records,
            "totaldisplayrecords" => $total_records,
            "data" => $pacientes
        );


        return response()->json($dataset,200);
    }

    /**
     * Edit a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente/create');
    }     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientePostRequest $request)
    {
        /*return response()->json([
            "success" => true
        ],201);*/

        //$paciente = Paciente::create($request->validated()); //Laravel 7+
        $paciente = Paciente::create($request->all()); //Laravel 5.4
        return response()->json([
            "success" => true,
            "message" => "Paciente {$paciente->nro_doc} creado correctamente.",
            "data" => $paciente
        ],201);
    }   
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {      

        return response()->json([
            "success" => true,
            "message" => "Paciente {$paciente->nro_doc} leído correctamente.",
            "data" => $paciente
        ],201);
    }

    
    /**
     * Edit a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('paciente/edit',compact('paciente'));
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(PacientePostRequest $request, Paciente $paciente)
    {
        //$paciente_upd = $request->validated();

        $paciente_upd = $request->all();

        /*
        se usa la validacion de la existencia del campo _method,
        porque $request->all() devuelve todos los campos desde el form, incluido el _method 
        y produce un error al ejecutarse el update en la BD
        */
        if ($request->has('_method')){
            
            $modif_paciente = $request->except('_method');
       }

        /*
        se usa un nuevo array, porque $request->all()
        devuelve todos los campos desde el form, incluido el _method 
        y eso falla al ejecutarse el update en la BD
        $modif_paciente = array();

        //$modif_paciente->id=$paciente_upd['nombres'];

        $modif_paciente['nombres']=$paciente_upd['nombres'];
        $modif_paciente['apellidos']=$paciente_upd['apellidos'];
        $modif_paciente['tipo_doc']=$paciente_upd['tipo_doc'];
        $modif_paciente['nro_doc']=$paciente_upd['nro_doc'];
        $modif_paciente['fecha_nac']=$paciente_upd['fecha_nac'];

        */

        $paciente_aff_rows = Paciente::where('id', $paciente->id)                
                ->update($modif_paciente);

        //Si el registro se actualizo correctamente, se devuelve 
        //el objeto actualizado
        if ($paciente_aff_rows==1){
            
            return response()->json([
                "success" => true,
                "message" => "Paciente {$paciente->nro_doc} actualizado correctamente.",
                "data" => $paciente_upd
            ],201);
        }else{
            return response()->json([
                "success" => false,
                "message" => "Error en la BD",
                "data" => $paciente_upd
            ],501);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
    
        return response()->json([
            "success" => true,
            "message" => "Paciente {$paciente->nro_doc} borrado correctamente.",
            "data" => $paciente
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show_by_fecha_atencion($startDate, $endDate)
    {      
        $pacientes = Paciente::whereBetween('fecha_nac', [$startDate, $endDate])->get();

        $total_records=$pacientes->count();

        $dataset = array(
            "echo" => 1,
            "totalrecords" => $total_records,
            "totaldisplayrecords" => $total_records,
            "data" => $pacientes
        );

        return response()->json($dataset,200);
    }

    
    public function show_by_filters(Request $request)
    {  
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $nombre = $request->nombre;
        
        if (($startDate=="")&&($endDate=="")&&($nombre=="")){
            $dataset = array(
                "echo" => 1,
                "totalrecords" => 0,
                "totaldisplayrecords" => 0,
                "data" => []
            );

        }else{
            $startDate = isset($request->startDate)?$request->startDate:date('Y-m-d');
            $endDate = isset($request->endDate)?$request->endDate:date('Y-m-d');
            $nombre = isset($request->nombre)?$request->nombre:"";

            $pacientes = Paciente::whereBetween('fecha_nac', [$startDate, $endDate])
                                    ->where('nombres', 'like', '%' . $nombre. '%')
                                    ->get();

            $total_records=$pacientes->count();

            //$pacientes = $endDate; 
            //$total_records = 0;
            $dataset = array(
                "echo" => 1,
                "totalrecords" => $total_records,
                "totaldisplayrecords" => $total_records,
                "data" => $pacientes
            );

        }
        
        return response()->json($dataset,200);
    }   

}
