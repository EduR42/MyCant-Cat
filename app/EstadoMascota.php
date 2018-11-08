<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoMascota extends Model
{
    use SoftDeletes;
    protected $table='estadomascota';
   protected $primaryKey = 'IdEstadoMas';
   
   protected $fillable=['IdEstadoMas','TipoEstadoMas','Activo'];
						 
  protected $date=['deleted_at'];	
}
