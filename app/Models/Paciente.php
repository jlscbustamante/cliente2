<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Actividad;
use App\Concepto;

class Paciente extends Model
{
    //use HasFactory;
    protected $primaryKey = 'id';
	
	//public $timestamps = false;
    protected $table = "pacientes";

    protected $fillable = [
        'nro_doc'
        ,'tipo_doc'
        ,'nombres'
        ,'apellidos'
        ,'fecha_nac'       

    ];

    public function actividads()
    {
        return $this->hasMany(Actividad::class,'id_paciente');
    }
}
