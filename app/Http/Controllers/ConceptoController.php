<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Concepto;
use Illuminate\Http\Request;

class ConceptoController extends Controller
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
        $concepto = Concepto::create($request->all()); //Laravel 5.4
        return response()->json([
            "success" => true,
            "message" => "Concepto creado correctamente.",
            "data" => $concepto
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function show(Concepto $concepto)
    {
        return response()->json([
            "success" => true,
            "message" => "Concepto {$concepto->nombre} leído correctamente.",
            "data" => $concepto
        ],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function edit(Concepto $concepto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concepto $concepto)
    {
        $concepto_upd = $request->all();

        /*
        se usa la validacion de la existencia del campo _method,
        porque $request->all() devuelve todos los campos desde el form, incluido el _method 
        y produce un error al ejecutarse el update en la BD
        */
        if ($request->has('_method')){
            
            $modif_concepto = $request->except('_method');
       }

       //concepto_aff_rows : affected rows en operacion
        $concepto_aff_rows = Concepto::where('id', $concepto->id)                
                ->update($modif_concepto);

        //Si el registro se actualizo correctamente, se devuelve 
        //el objeto actualizado
        if ($concepto_aff_rows==1){
            
            return response()->json([
                "success" => true,
                "message" => "Concepto {$concepto->nombre} actualizado correctamente.",
                "data" => $concepto_upd
            ],201);
        }else{
            return response()->json([
                "success" => false,
                "message" => "Error en la BD",
                "data" => $concepto_upd
            ],501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concepto $concepto)
    {
        $concepto->delete();
    
        return response()->json([
            "success" => true,
            "message" => "Concepto {$concepto->nombre} borrado correctamente.",
            "data" => $concepto
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
            $startDate = isset($request->startDate)?$request->startDate:date('d/m/Y',strtotime(date('Y-m-d')));
            $endDate = isset($request->endDate)?$request->endDate:date('d/m/Y',strtotime(date('Y-m-d')));
            $id_paciente = isset($request->id_paciente)?$request->id_paciente:0;

            $guion_startDate = str_replace('/', '-', $startDate);
            $guion_endDate = str_replace('/', '-', $endDate);
            $Ymd_startDate = date('Y-m-d', strtotime($guion_startDate));
            $Ymd_endDate = date('Y-m-d',strtotime($guion_endDate));

            if ($id_paciente>0){
                $conceptos = Paciente::find($id_paciente)
                            ->conceptos()
                            ->whereBetween('created_at', [$Ymd_startDate." 00:00:00", $Ymd_endDate." 23:59:59"])
                            ->get();
/*                            concepto::whereBetween('created_at', [$startDate, $endDate])
                                    //->where('nombre', 'like', '%' . $nombre. '%')
                                    ->get();*/

            $total_records=$conceptos->count();

            //$pacientes = $endDate; 
            //$total_records = 0;
            $dataset = array(
                "echo" => 1,
                "totalrecords" => $total_records,
                "totaldisplayrecords" => $total_records,
                "data" => $conceptos
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
