<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialMedico extends Model
{
    use SoftDeletes;
    protected $table='historialmedico';
   protected $primaryKey = 'IdHistorial';
   
   protected $fillable=['IdHistorial','IdCliente','NombreMascota','MotivoCita',
                         'FechaCita','Diagnostico','Tratamiento','ProximaC'];
						 
  protected $date=['deleted_at'];	
}
