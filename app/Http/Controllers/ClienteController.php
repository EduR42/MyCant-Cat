<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Cliente;
use App\Mascota;
use App\TipoMascota;

class ClienteController extends Controller
{
    public function altaCli()
    {    $clavequesigue = cliente::withTrashed()->orderBy('IdCliente','desc')
        ->take(1)
        ->get();
    if(count($clavequesigue)==0)
        {
        $IdCliente= 1;
        }
    else{
        $IdCliente = $clavequesigue[0]->IdCliente+1;
        }
        
        //select * from carreras 
        //ORM ELOQUENT
        // select * from carreras where activo = 'si' order by nombre asc
        $estado = estado::where('Activo','=','Si')
                                  ->orderBy('NombreEstado','asc')
                                  ->get();
      
                              
        //return $carreras;
      return view ("VistasUser.Cliente")
      ->with('estado',$estado)
      ->with('IdCliente',$IdCliente);
           
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function guardaCli(Request $request)
{
    $IdCliente    = $request->IdCliente;
    $NombreCli    = $request->NombreCli;
    $Sexo         = $request->Sexo;
    $Password     = $request->Password;
    $EmailCli     = $request->EmailCli;
    $TelefonoCli  = $request->TelefonoCli;
    $CalleyNumero = $request->CalleyNumero;
    $Colonia      = $request->Colonia;
    $CP           = $request->CP;
    $IdEstado     = $request->IdEstado;
    $Activo       = $request->Activo;
    // NUNCA SE RECIBEN archivos
    
    $this->validate($request,[
     'NombreCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
     'Password'=>'required',
     'Sexo'=>'required',
     'EmailCli'=>'email',
     'TelefonoCli'=>['regex:/^[0-9]{10}$/'],
     'CalleyNumero'=>'required',
     'Colonia'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
     'CP'=>['regex:/^[0-9]{5}$/']
     ]);
     

        $est = new Cliente;
        $est->IdCliente    = $request->IdCliente;
        $est->NombreCli    = $request->NombreCli;
        $est->sexo         = $Sexo;
        $est->Password     = $Password;
        $est->EmailCli     = $request->EmailCli;
        $est->TelefonoCli  = $request->TelefonoCli;
        $est->CalleyNumero = $request->CalleyNumero;
        $est->Colonia      = $request->Colonia;
        $est->CP           = $request->CP;
        $est->IdEstado     = $request->IdEstado;
        $est->Activo      = $request->Activo;
        $est->save();
            $proceso = "Registro Cliente";
        $mensaje =  "Cliente agregado Correctamente";	
        return view ('Mensajes.mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
        }

        public function reporteCli()
        {
        $resultado=\DB::select("SELECT c.IdCliente,c.NombreCli,c.EmailCli,c.TelefonoCli,
        c.CalleyNumero,c.Colonia,c.CP,e.NombreEstado as est,c.deleted_at
        FROM cliente AS c
        INNER JOIN estado AS e ON c.IdEstado =  e.IdEstado");	
        return view('VistasRep.ReporteCliente')
        ->with('cliente',$resultado);
        }

        public function eliminaCli($IdCliente)
        {
        cliente::find($IdCliente)->delete();
        $proceso = "Dasactivación del Cliente";
        $mensaje =  "El Cliente ha sido Deshabilitado Correctamente";	
        return view ('Mensajes.mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
        }
        
        public function modificaCli($IdCliente)    
        {
		$cliente= cliente::where('IdCliente','=',$IdCliente)->get();
		$IdEstado = $cliente[0]->IdEstado;
		$estado = estado::where('IdEstado','=',$IdEstado)->get();
		$todosdemase = estado::where('IdEstado','!=',$IdEstado)
		                        ->orderBy('NombreEstado','asc')
								->get();
		
		//return $maestros;
		return view('VistasMod.ModificaCliente')
		->with('cliente',$cliente[0])
		->with('IdEstado',$IdEstado)
		->with('estado',$estado[0]->NombreEstado)
		->with('todosdemase',$todosdemase);
	}
	
    public function modificaCliente(Request $request)
	{
		
        $IdCliente    = $request->IdCliente;
        $NombreCli    = $request->NombreCli;
        $Sexo         = $request->Sexo;
        $Password     = $request->Password;
        $EmailCli     = $request->EmailCli;
        $TelefonoCli  = $request->TelefonoCli;
        $CalleyNumero = $request->CalleyNumero;
        $Colonia      = $request->Colonia;
        $CP           = $request->CP;
        $IdEstado     = $request->IdEstado;
        $Activo       = $request->Activo;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
            'NombreCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'Password'=>'required',
            'EmailCli'=>'email',
            'TelefonoCli'=>['regex:/^[0-9]{10}$/'],
            'CalleyNumero'=>'required',
            'Colonia'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'CP'=>['regex:/^[0-9]{5}$/']
            ]);
	 
            $est = Cliente::find($IdCliente);
            $est->IdCliente    = $request->IdCliente;
            $est->NombreCli    = $request->NombreCli;
            $est->sexo         = $Sexo;
            $est->Password     = $Password;
            $est->EmailCli     = $request->EmailCli;
            $est->TelefonoCli  = $request->TelefonoCli;
            $est->CalleyNumero = $request->CalleyNumero;
            $est->Colonia      = $request->Colonia;
            $est->CP           = $request->CP;
            $est->IdEstado     = $request->IdEstado;
            $est->Activo       = $request->Activo;
            $est->save();
            $proceso = "Modificacion del Cliente";
            $mensaje =  "El Cliente ha sido modificado Correctamente";	
            return view ('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
            }
    

        public function restauraCli($IdCliente)
            {
            Cliente::withTrashed()->where('IdCliente',$IdCliente)->restore();
            $proceso = "RESTAURACION DEL CLIENTE";	
            $mensaje="Cliente restaurado correctamente";
            return view('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
            }
        public function efisicaCli($IdCliente)
         {
            Cliente::withTrashed()->where('IdCliente',$IdCliente)->forceDelete();
            $proceso = "ELIMINACION FISICA DEL CLIENTE";	
            $mensaje="Cliente eliminado correctamente";
            return view('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
         }

}
