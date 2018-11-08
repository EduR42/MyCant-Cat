<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calificacion extends Model
{
   use SoftDeletes;
   protected $table='calificacion';
   protected $primaryKey = 'IdCalificacion';
   protected $fillable=['IdCalificacion','NombreCli','IdMascota',
                         'NivelServicio','Satisfaccion','Sugerencia'];
						 
  protected $date=['deleted_at'];					 
}

