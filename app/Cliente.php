<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table='cliente';
   protected $primaryKey = 'IdCliente';
   
   protected $fillable=['IdCliente','NombreCli','Password','EmailCli',
                         'TelefonoCli','CalleyNumero','Colonia','CP','IdEstado','Activo'];
						 
  protected $date=['deleted_at'];	
}
