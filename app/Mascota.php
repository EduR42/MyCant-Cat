<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mascota extends Model
{
    use SoftDeletes;
    protected $table='mascota';
   protected $primaryKey = 'IdMascota';
   
   protected $fillable=['IdMascota','IdCliente','NombreMas','Raza',
                         'Foto','IdTipoMas','Activo'];
						 
  protected $date=['deleted_at'];	
}
