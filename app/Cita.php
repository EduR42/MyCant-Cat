<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cita extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'IdCita';
    protected $table='cita';
    protected $fillable=['IdCita','NombreCli','ApellidosCli','FechaCita',
                          'IdEstadoMas','NombreMas','IdTipoMas','MotivoCit','IdTipoCit'];
                          
   protected $date=['deleted_at'];	
}
