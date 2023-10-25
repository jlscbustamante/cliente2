<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Actividad;

use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $actividad = Actividad::create($request->all()); //Laravel 5.4
        return response()->json([
            "success" => true,
            "message" => "Actividad creada correctamente.",
            "data" => $actividad
        ],201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        return response()->json([
            "success" => true,
            "message" => "Actividad {$actividad->nombre} leída correctamente.",
            "data" => $actividad
        ],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        $actividad_upd = $request->all();

        /*
        se usa la validacion de la existencia del campo _method,
        porque $request->all() devuelve todos los campos desde el form, incluido el _method 
        y produce un error al ejecutarse el update en la BD
        */
        if ($request->has('_method')){
            
            $modif_actividad = $request->except('_method');
       }

       //actividad_aff_rows : affected rows en operacion
        $actividad_aff_rows = Actividad::where('id', $actividad->id)                
                ->update($modif_actividad);

        //Si el registro se actualizo correctamente, se devuelve 
        //el objeto actualizado
        if ($actividad_aff_rows==1){
            
            return response()->json([
                "success" => true,
                "message" => "Actividad {$actividad->nombre} actualizada correctamente.",
                "data" => $actividad_upd
            ],201);
        }else{
            return response()->json([
                "success" => false,
                "message" => "Error en la BD",
                "data" => $actividad_upd
            ],501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
    
        return response()->json([
            "success" => true,
            "message" => "Actividad {$actividad->nombre} borrada correctamente.",
            "data" => $actividad
        ],200);
    }

    public function show_by_filters(Request $request)
    {  
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $id_paciente = $request->e_pac_vid;        
        
        if (($startDate=="")&&($endDate=="")){
            $dataset = array(
                "echo" => 1,
                "totalrecords" => 0,
                "totaldisplayrecords" => 0,
                "data" => []
            );

        }else{
            $startDate = isset($request->startDate)?$request->startDate:date('Y-m-d');
            $endDate = isset($request->endDate)?$request->endDate:date('Y-m-d');
            $id_paciente = isset($request->id_paciente)?$request->id_paciente:0;

            if ($id_paciente>0){
                $actividades = Paciente::find($id_paciente)
                            ->actividads()
                            ->whereBetween('created_at', [$startDate." 00:00:00", $endDate." 23:59:59"])
                            ->get();
/*                            Actividad::whereBetween('created_at', [$startDate, $endDate])
                                    //->where('nombre', 'like', '%' . $nombre. '%')
                                    ->get();*/

            $total_records=$actividades->count();

            //$pacientes = $endDate; 
            //$total_records = 0;
            $dataset = array(
                "echo" => 1,
                "totalrecords" => $total_records,
                "totaldisplayrecords" => $total_records,
                "data" => $actividades
            );
            }else{
                $dataset = array(
                    "echo" => 1,
                    "totalrecords" => 0,
                    "totaldisplayrecords" => 0,
                    "data" => []
                );
            }
            

        }
        
        return response()->json($dataset,200);
    }   
}
