<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $primaryKey = 'id';
	
    //public $timestamps = false;
    protected $table = "conceptos";

    protected $fillable = [
        'nombre','id_paciente'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Paciente');
    }
}
