<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCita extends Model
{
    use SoftDeletes;
    protected $table='tipocita';
   protected $primaryKey = 'IdTipoCit';
   
   protected $fillable=['IdTipoCit','NombreTipoC','Activo'];
						 
  protected $date=['deleted_at'];	
}