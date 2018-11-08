<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMascota extends Model
{
    use SoftDeletes;
    protected $table='tipomascota';
   protected $primaryKey = 'IdTipoMas';
   
   protected $fillable=['IdTipoMas','TipoMas','Activo'];
						 
  protected $date=['deleted_at'];	
}
