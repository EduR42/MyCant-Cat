<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
use SoftDeletes;
protected $table='estado';
protected $primaryKey = 'IdEstado';
   
   protected $fillable=['IdEstado','NombreEstado','Activo'];
						 
  protected $date=['deleted_at'];	
}
