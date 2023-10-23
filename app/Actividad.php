<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
        //use HasFactory;
        protected $primaryKey = 'id';
	
        //public $timestamps = false;
        protected $table = "actividads";
    
        protected $fillable = [
            'nombre','id_paciente'
        ];

        public function user()
  {
    return $this->belongsTo('App\Models\Paciente');
  }
}
